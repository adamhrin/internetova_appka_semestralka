<?php

include_once "Category.php";
include_once "Training.php";
include_once "Templates.php";

class DBStorage implements IStorage
{
    public function __construct()
    {
        $this->db = new mysqli('localhost','root','chester9397', 'semestralka');
        $this->checkERR();
    }

    public function getUser($nick, $password)
    {
        $sql = "SELECT * FROM semka_user WHERE nick = '{$nick}'";
        $DBResult = $this->db->query($sql);
        $this->checkERR();

        if ($DBResult->num_rows == 0)
        {
            return NULL;
        }
        else
        {
            while($user = $DBResult->fetch_assoc())
            {
                $hashedPwdCheck = password_verify($password, $user['password']);
                if($hashedPwdCheck == true)
                {
                    return $user;
                }
            }
        }
        return NULL;
    }

    public function getUserById($id_user)
    {
        $user = NULL;
        $sql = "SELECT * FROM semka_user WHERE id_user = {$id_user}";
        $DBResult = $this->db->query($sql);
        if ($DBResult->num_rows > 0)
        {
            $row = $DBResult->fetch_object();
            $user = new User($row->firstname, $row->surname, $row->email, $row->nick);
        }
        //kategorie ktore user sleduje
        $sql = "SELECT * FROM semka_user_in_category WHERE id_user = {$id_user}";
        $DBResult_categories = $this->db->query($sql);
        if ($DBResult->num_rows > 0)
        {
            while($row_categories = $DBResult_categories->fetch_object())
            {
                $user->addCategory($row_categories->id_category);
            }
        }
        return $user;
    }

    public function registerUser($firstname, $surname, $email, $nick, $password, &$id_user)
    {
        $firstname = $this->db->real_escape_string($firstname);
        $surname = $this->db->real_escape_string($surname);
        $email = $this->db->real_escape_string($email);
        $nick = $this->db->real_escape_string($nick);
        $password = $this->db->real_escape_string($password);

        if ($this->getUser($nick, $password) != NULL) // user s takym nickom a pwd uz existuje
        {
            return false;
        }

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO semka_user(firstname, surname, email, nick, password) 
                VALUES ('{$firstname}','{$surname}', '{$email}', '{$nick}', '{$hashedPwd}')";
        $this->db->query($sql);
        $this->checkERR();

        /*$sql = "SELECT id_user FROM semka_user WHERE".
            " firstname = '{$firstname}' and surname = '{$surname}' and email = '{$email}' and nick = '{$nick}' and password = '{$hashedPwd}'";
        $DBResult = $this->db->query($sql);
        $this->checkERR();
        if ($DBResult->num_rows == 1)
        {

        }*/
        $user = $this->getUser($nick, $password);
        $id_user = $user['id_user'];
        return true;
    }

    public function storeUser(User $data)
    {
        $sql = "INSERT INTO chat(nick, message) VALUES ('{$data->name}','{$data->surname}')";
        $this->db->query($sql);
        $this->checkERR();
    }

    /**
     * @return User[]
     */
    public function getAllUsers()
    {
        $r = [];
        $sql = "SELECT * FROM chat ORDER BY message_date DESC LIMIT 15";
        $DBResult = $this->db->query($sql);
        $this->checkERR();
        if ($DBResult->num_rows > 0)
        {
            while($row = $DBResult->fetch_object()){
                $r[] = new User($row->nick, $row->message, $row->message_date);
            }
        }
        return $r;
    }

    /**
     * @return Category[]
     */
    public function getAllCategories()
    {
        $r = [];
        $sql = "SELECT * FROM semka_category ORDER BY id_category";
        $DBResult = $this->db->query($sql);
        $this->checkERR();
        if ($DBResult->num_rows > 0)
        {
            while($category = $DBResult->fetch_assoc())
            {
                $r[] = new Category($category['id_category'], $category['title']);
            }
        }
        return $r;
    }

    public function insertTraining(Training $training)
    {
        $training->location = $this->db->real_escape_string($training->location);

        // checkne ci nie je uz taky trening v db
        $checkSql = "SELECT * FROM semka_training WHERE ".
            "location = '{$training->location}' and date_time = '{$training->date_time}' and duration = '{$training->duration}'";
        $DBResult = $this->db->query($checkSql);

        if ($DBResult->num_rows > 0)
        {
            return false; // presne taky isty trening uz v databaze existuje
        }

        $sql = "INSERT INTO semka_training(location, date_time, duration) VALUES".
            "('{$training->location}', '{$training->date_time}', '{$training->duration}')";
        $this->db->query($sql);
        $this->checkERR();
        return true;
    }

    public function insertCategoriesAndUsersOnTraining(Training $training)
    {
        $sql = "SELECT id_training FROM semka_training WHERE ".
            "location = '{$training->location}' and date_time = '{$training->date_time}' and duration = '{$training->duration}'";
        $DBResult = $this->db->query($sql);
        $this->checkERR();
        if ($DBResult->num_rows == 1)
        {
            $id_training_assoc = $DBResult->fetch_assoc();
            $id_training = $id_training_assoc['id_training'];

            // pridanie hracov na trening
            if ($this->insertUsersOnTraining($id_training, $training->categories))
            {
                //echo("<script>alert(\"Users added for training\")</script>");
            }
            else
            {
                echo("<script>alert(\"Nenašiel sa žiaden hráč pre tréning!\")</script>");
                //die();
            }

            // pridanie kategorii pre trening
            foreach($training->categories as $category)
            {
                //echo("<script>alert(\"Kategoria {$category}\")</script>");
                $sql = "INSERT INTO semka_category_on_training(id_category, id_training) VALUES ".
                    "('{$category}', '{$id_training}')";
                $this->db->query($sql);
                $this->checkERR();
            }
            return true;
        }
        return false;
    }

    public function insertUsersOnTraining($id_training, $categories)
    {
        $sql = "SELECT DISTINCT id_user FROM semka_user_in_category WHERE";
        foreach ($categories as $category)
        {
            $sql .= " id_category = {$category} OR";
        }
        $sql = rtrim($sql, "OR");

        //echo("<script>alert(\"{$sql}\")</script>");

        $DBResult = $this->db->query($sql);
        $this->checkERR();
        if ($DBResult->num_rows > 0)
        {
            while($user = $DBResult->fetch_assoc())
            {
                //echo("<script>alert(\"{$user['id_user']}\")</script>");
                $sql = "INSERT INTO semka_user_on_training(id_user, id_training) VALUES ('{$user['id_user']}', '{$id_training}')";
                $this->db->query($sql);
                $this->checkERR();
            }
            return true;
        }
        return false;
    }

    /**
     * vrati pole treningov pre hraca
     * @param $id_user
     */
    public function getTrainingsForUser($id_user)
    {
        $trainings = [];

        // vrati vsetky treningy ktore ma user
        $sql = "SELECT * FROM semka_user_on_training JOIN semka_training USING (id_training) WHERE id_user = '{$id_user}' ORDER BY date_time DESC";
        $DBResult_train = $this->db->query($sql);
        $this->checkERR();
        $pocetRiadkov = $DBResult_train->num_rows;
        //echo("<script>alert(\"Pocet treningov {$pocetRiadkov}\")</script>");
        if ($DBResult_train->num_rows > 0)
        {
            while($row_train = $DBResult_train->fetch_object())
            {
                $training = Training::withoutCategories($row_train->location, $row_train->date_time, $row_train->duration);
                $training->setId($row_train->id_training);
                $training->setAccept($row_train->accept);
                //echo("<script>alert(\"{$row_train->id_training} {$row_train->location} {$row_train->date_time} {$row_train->duration}\")</script>");

                // pre kazdy trening vrati vsetky kategorie
                $sql = "SELECT * FROM semka_category_on_training JOIN semka_category USING (id_category) WHERE id_training = '{$row_train->id_training}'";
                $DBResult_cat = $this->db->query($sql);
                $this->checkERR();
                if ($DBResult_cat->num_rows > 0)
                {
                    $categories = [];
                    while($row_cat = $DBResult_cat->fetch_object())
                    {
                        $categories[] = new Category($row_cat->id_category, $row_cat->title);
                        //echo("<script>alert(\"{$row_cat->id_category} {$row_cat->title}\")</script>");
                    }
                    $training->setCategories($categories);
                }

                // pre kazdy trening vrati pocet ludi, ktori zahlasovali ze pridu
                $sql = "SELECT COUNT(*) as num FROM `semka_user_on_training` WHERE id_training = '{$row_train->id_training}' and accept = b'1'";
                $DBResult_num = $this->db->query($sql);
                $this->checkERR();
                if ($DBResult_num->num_rows == 1)
                {
                    $row_num = $DBResult_num->fetch_object();
                    $training->setNumOfAccepts($row_num->num);

                }
                //var_dump($training);
                $trainings[] = $training;
                //var_dump($row_train);
            }
            //var_dump($row_train);
        }
        else
        {
            return NULL;
        }
        return $trainings;
    }

    public function insertCategory($newCategory)
    {
        $newCategory = $this->db->real_escape_string($newCategory);

        $sql = "SELECT * FROM semka_category WHERE title = '{$newCategory}'";
        $DBResult = $this->db->query($sql);
        if ($DBResult->num_rows > 0)
        {
            return false;
        }

        $sql = "INSERT INTO semka_category(title) VALUES ('{$newCategory}')";
        $this->db->query($sql);
        $this->checkERR();

        $sql = "SELECT * FROM semka_category WHERE title = '{$newCategory}'";
        $DBResult = $this->db->query($sql);
        if ($DBResult->num_rows > 0)
        {
            $temp = new Templates();
            echo $temp->generateCategoriesCheckboxes($DBResult->fetch_object());
            //echo json_encode();
            die;
        }

        return true;
    }

    public function insertUsersExpressionOnTraining($id_user, $decision, $id_training)
    {
        $accepts = "";
        if ($decision == "accept")
        {
            $accepts = "b'1'";
        }
        else
        {
            $accepts = "b'0'";
        }
        $sql = "UPDATE semka_user_on_training SET accept = {$accepts} WHERE id_user = '{$id_user}' and id_training = '{$id_training}'";
        $this->db->query($sql);
        $this->checkERR();
        die;
        return true;
    }

    public function getTraining($id_training)
    {
        $sql = "SELECT * FROM semka_training WHERE id_training = {$id_training}";
        $DBResult = $this->db->query($sql);
        $this->checkERR();
        if ($DBResult->num_rows > 0)
        {
            $row = $DBResult->fetch_object();
            $training = Training::withoutCategories($row->location, $row->date_time, $row->duration);
            $training->setId($id_training);
            return $training;
        }
        return NULL;
    }

    public function getUsersForTraining($id_training)
    {
        $users = NULL;
        $sql = "SELECT id_user, firstname, surname, nick, accept FROM semka_training JOIN semka_user_on_training USING (id_training) JOIN semka_user USING (id_user) WHERE id_training = {$id_training} ORDER BY surname";
        $DBResult = $this->db->query($sql);
        $this->checkERR();
        if ($DBResult->num_rows > 0)
        {
            while($row = $DBResult->fetch_object())
            {
                $user = new User($row->firstname, $row->surname, NULL, $row->nick);
                $user->setAccepts($row->accept);
                $users[] = $user;
            }
        }
        return $users;
    }

    public function updateBaseInfo($id_user, $ch_firstname, $ch_surname, $ch_email, $ch_nick)
    {
        $ch_firstname = $this->db->real_escape_string($ch_firstname);
        $ch_surname = $this->db->real_escape_string($ch_surname);
        $ch_email = $this->db->real_escape_string($ch_email);
        $ch_nick = $this->db->real_escape_string($ch_nick);

        $sql = "UPDATE semka_user SET firstname = '{$ch_firstname}', surname = '{$ch_surname}', email = '{$ch_email}', "
                ."nick = '{$ch_nick}' WHERE id_user = {$id_user}";
        $this->db->query($sql);
        $this->checkERR();
        return true;
    }

    public function updatePassword($id_user, $nick, $old_password, $new_password)
    {
        $old_password = $this->db->real_escape_string($old_password);
        $new_password = $this->db->real_escape_string($new_password);

        if ($user = $this->getUser($nick, $new_password) != NULL) // niekto, kto uz je zaregistrovany, ma rovnake prihlasovacie udaje ako tvoje nove udaje
        {
            return "userExists";
        }

        $sql = "SELECT * FROM semka_user WHERE id_user = {$id_user}";
        $DBResult = $this->db->query($sql);
        $this->checkERR();

        if ($DBResult->num_rows > 0)
        {
            $row = $DBResult->fetch_object();
            $hashedPwdCheck = password_verify($old_password, $row->password);

            if ($hashedPwdCheck == true)
            {
                $hashedPwd = password_hash($new_password, PASSWORD_DEFAULT);
                $sql = "UPDATE semka_user SET password = '{$hashedPwd}' WHERE id_user = {$id_user}";
                $this->db->query($sql);
                $this->checkERR();
                return "OK";
            }
            return "wrongOldPwd";
        }
        return "BAD";
    }

    public function updateCategoriesForUser($id_user, $categories)
    {
        //TODO checkni ci ides zmenit kategorie
        $sql = "SELECT id_category FROM semka_user_in_category WHERE id_user = {$id_user}";
        $DBResult = $this->db->query($sql);
        $this->checkERR();
        $numOfRowsInDb = $DBResult->num_rows;
        #region kontrola ci nie su zadane rovnake kategorie ako boli
        if ($numOfRowsInDb == sizeof($categories))
        {
            if ($numOfRowsInDb > 0)
            {
                $numOfRowsTheSame = 0;
                while($row = $DBResult->fetch_object())
                {
                    foreach ($categories as $usersIdCategory)
                    {
                        if ($row->id_category == $usersIdCategory)
                        {
                            $numOfRowsTheSame++;
                            break;
                        }
                    }
                }
                if ($numOfRowsTheSame == $numOfRowsInDb)
                {
                    //ma vybrate tie iste kategorie ako ma uz v db => neupdatuj
                    return true;
                }
            }
            else
            {
                //vybral si 0 kategorii a v db ma 0 kategorii => neupdatuj
                return true;
            }
        } #endofregion kontrola ci nie su zadane rovnake kategorie ako boli

        //deletnut vsetky riadky v semka_user_in_category pre usera (stare)
        $sql_delete_users_categories = "DELETE FROM semka_user_in_category WHERE id_user = {$id_user}";
        $this->db->query($sql_delete_users_categories);
        $this->checkERR();

        //pre vsetky nove kategorie insertnut riadok do semka_user_in_category pre usera (nove)
        foreach ($categories as $id_category)
        {
            //echo $category;
            $sql_insert_users_category = "INSERT INTO semka_user_in_category (id_user, id_category) VALUES ({$id_user}, {$id_category})";
            $this->db->query($sql_insert_users_category);
            $this->checkERR();
        }

        //pred tym ako deletnem vsetky riadky v treningoch pre usera tak si ich popytam a do pola si ulozim hodnoty acceptu
        $sql_select_trainings_for_user = "SELECT * FROM semka_user_on_training WHERE id_user = {$id_user}";
        $DBResult_trainings_for_user = $this->db->query($sql_select_trainings_for_user);
        $this->checkERR();
        $accepts_for_trainings = [];
        if ($DBResult_trainings_for_user->num_rows > 0)
        {
            while ($row = $DBResult_trainings_for_user->fetch_object())
            {
                $accepts_for_trainings[$row->id_training] = $row->accept;
            }
        }

        //deletnut vsetky riadky v semka_user_on_training pre usera (stare)
        $sql_delete_users_trainings = "DELETE FROM semka_user_on_training WHERE id_user = {$id_user}";
        $this->db->query($sql_delete_users_trainings);
        $this->checkERR();

        if (!empty($categories))//ak si prave neodskrtol vsetky kategorie
        {
            //insertunut do semka_user_on_training vsetky treningy ktore su pre nove userove kategorie
            $sql_select_trainings_for_categories = "SELECT DISTINCT id_training FROM semka_category_on_training WHERE";
            foreach ($categories as $id_category)
            {
                $sql_select_trainings_for_categories .= " id_category = {$id_category} OR";
            }
            $sql_select_trainings_for_categories = rtrim($sql_select_trainings_for_categories, "OR");
            $DBResult_trainings = $this->db->query($sql_select_trainings_for_categories);
            $this->checkERR();
            if ($DBResult_trainings->num_rows > 0)
            {
                while ($row = $DBResult_trainings->fetch_object())
                {
                    $accept_str = "NULL";
                    if (array_key_exists($row->id_training, $accepts_for_trainings)) //existuje zaznam k tomuto treningu
                    {
                        if ($accepts_for_trainings[$row->id_training] == 1)
                        {
                            $accept_str = "b'1'";
                        }
                        else if ($accepts_for_trainings[$row->id_training] == 0)
                        {
                            $accept_str = "b'0'";
                        }
                        else
                        {
                            $accept_str = "NULL";
                        }
                    }
                    $sql_insert_users_training = "INSERT INTO semka_user_on_training(id_user, id_training, accept) VALUES ({$id_user}, {$row->id_training}, {$accept_str})";
                    $this->db->query($sql_insert_users_training);
                    $this->checkERR();
                }
            }
        }

        return true;
    }

    public function deleteTraining($id_training)
    {
        //najprv deletnem vsetky riadky v semka_category_on_training pre tento trening
        $sql_delete_categories_on_training = "DELETE FROM semka_category_on_training WHERE id_training = {$id_training}";
        $this->db->query($sql_delete_categories_on_training);
        $this->checkERR();

        //potom deletnem vsetky riadky v semka_user_on_training pre tento trening
        $sql_delete_users_on_training = "DELETE FROM semka_user_on_training WHERE id_training = {$id_training}";
        $this->db->query($sql_delete_users_on_training);
        $this->checkERR();

        //nakoniec deletnem trening samotny
        $sql_delete_training = "DELETE FROM semka_training WHERE id_training = {$id_training}";
        $this->db->query($sql_delete_training);
        $this->checkERR();
    }

    public function getCategoriesWithUsers()
    {
        $categories = $this->getAllCategories();
        foreach ($categories as $category)
        {
            $users_in_category  = [];
            $id_category = $category->id_category;
            $sql_users_for_category = "SELECT * FROM semka_user_in_category JOIN semka_user USING (id_user) WHERE id_category = {$id_category} ORDER BY surname";
            $DBResult_users_in_category = $this->db->query($sql_users_for_category);
            if ($DBResult_users_in_category->num_rows > 0)
            {
                while ($row = $DBResult_users_in_category->fetch_object())
                {
                    $user = new User($row->firstname, $row->surname, $row->email, $row->nick);
                    $user->setIdUser($row->id_user);
                    $users_in_category[] = $user;
                }
            }
            $category->setUsers($users_in_category);
        }
        return $categories;
    }

    private function checkERR()
    {
        if ($this->db->error){
            echo("<script>alert(\"CHYBA {$this->db->error}\")</script>");
            die;
        }
    }

    private function debug_to_console($data)
    {
        if(is_array($data) || is_object($data))
        {
            echo("<script>console.log('PHP: ".json_encode($data)."');</script>");
        } else {
            echo("<script>console.log('PHP: ".$data."');</script>");
        }
    }
}