<?php

include_once "Templates.php";
include_once "Training.php";

class App
{
    /**
     * @var IStorage
     */
    private $storage;
    private $templates;

    public function __construct()
    {
        //$this->storage = new FileStorage(); // zapis do subora
        $this->storage = new DBStorage(); // zapis do DB
        $this->templates = new Templates();
    }

    public function generateCategoriesCheckboxes()
    {
        $categories = [];
        $categories = $this->storage->getAllCategories();
        echo $this->templates->generateCategoriesCheckboxes($categories);
    }

    /**
     * prida 1 riadok do tabulky training
     * prida x riadkov do tabulky category_on_training (x=pocet kategorii pre ktore je trening urceny)
     * prida y riadkov do tabulky user_on_training (y=pocet userov, ktori subcsribuju aspon jednu kategoriu pre ktore je trening urceny (v tabulke user_in_category))
     */
    public function addTraining()
    {
        if (!empty($_POST['category']))
        {
            $training = Training::withCategories($_POST['location_form'], $_POST['date_time_form'], $_POST['duration_form'], $_POST['category']);

            if (!$this->storage->insertTraining($training))
            {
                echo("<script>alert(\"Tréning už existuje!\")</script>");
                die;
            }
            //echo("<script>alert(\"Training added to semka_training\")</script>");

            if (!$this->storage->insertCategoriesAndUsersOnTraining($training))
            {
                echo("<script>alert(\"Nepodarilo sa pridať kategórie pre tréning!\")</script>");
                die;
            }
            //echo("<script>alert(\"Training added for all categories\")</script>");
            echo("<script>alert(\"Tréning úspešne pridaný\")</script>");
        }
        else
        {
            echo("<script>alert(\"Aspoň jedna kategória musí byť vybratá!\")</script>");
            die;
        }
    }

    public function showTrainingsForUser($nick_user, $id_user)
    {
        //echo "<p>Ahoj from showTrainingsForUser {$id_user}</p>";
        $trainings = $this->storage->getTrainingsForUser($id_user);
        if ($trainings == NULL)
        {
            echo "<h1>Nezobrazujú sa ti žiadne tréningy</h1>";
            echo "<h4>1. Buď nemáš nastavené tréningové kategórie (nastavíš v My Account->Kategórie, ktoré sleduješ)</h4>";
            echo "<h4>2. Alebo pre tvoje kategórie nie sú vypísané žiadne tréningy</h4>";
        }
        else
        {
            foreach($trainings as $training)
            {
                //var_dump($training->categories);
                //$day = date("D", strtotime($training->date_time));
                //echo "<p>{$day}</p>";
                //echo "<p>{$training->id_training} {$training->location} {$training->date_time} {$training->duration} {$training->num_of_accepts}</p>";
                echo $this->templates->generateTraining($nick_user, $training);
            }
        }
        //echo $this->templates->generateTraining("Rosinska", "Utorok", "09.01.2018", "18:30", "01:30", "5", NULL);
    }

    public function addCategory()
    {
        if(!$this->storage->insertCategory($_POST['new_category']))
        {
            echo "No";
            die;
        }
        else
        {
            echo "Yes";
            die;
        }
    }

    public function userExpressesOnTraining($id_user, $decision, $id_training)
    {
        $this->storage->insertUsersExpressionOnTraining($id_user, $decision, $id_training);
    }

    public function generateTableHeadTrainingsPlayers($id_training)
    {
        $training = $this->storage->getTraining($id_training);
        echo $this->templates->generateTrainingHead($training);
    }

    public function generateTableTrainingPlayers($id_training)
    {
        $players = $this->storage->getUsersForTraining($id_training);
        if ($players != NULL)
        {
            foreach ($players as $player)
            {
                echo $this->templates->generateRowUserOnTraining($player);
            }
        }
    }

    public function generateAccountSettings($id_user)
    {
        $user = $this->storage->getUserById($id_user); // user aj s kategoriami ktore sleduje
        $all_categories = $this->storage->getAllCategories();
        if ($user != NULL)
        {
            echo $this->templates->generateAccountSettingsForUser($user, $all_categories);
        }
        else
        {
            echo "nieco";
        }
    }

    public function updateUsersInfo($id_user, $_ch_firstname, $ch_surname, $ch_email, $ch_nick, $categories)
    {
        if($this->storage->updateBaseInfo($id_user, $_ch_firstname, $ch_surname, $ch_email, $ch_nick))
        {
            if($this->storage->updateCategoriesForUser($id_user, $categories))
            {
                echo("<script>alert(\"Zmeny uložené\")</script>");
                return true;
            }

        }
        echo("<script>alert(\"Nastala chyba\")</script>");
        return false;
    }

    public function updatePassword($id_user, $nick, $old_password, $new_password)
    {
        //echo("<script>alert(\"{$id_user} {$nick} {$old_password} {$new_password}\")</script>");
        $result = $this->storage->updatePassword($id_user, $nick, $old_password, $new_password);
        if ($result == "wrongOldPwd")
        {
            echo("<script>alert(\"Staré heslo je nesprávne!\")</script>");
            return;
        }
        else if ($result == "userExists")
        {
            echo("<script>alert(\"Niekto s takými prihlasovacími údajmi už existuje!\")</script>");
            return;
        }
        echo("<script>alert(\"Zmeny uložené\")</script>");
    }

    public function deleteTraining($id_training)
    {
        $this->storage->deleteTraining($id_training);
    }

    public function generateCategoriesTable($id_user)
    {
        $categories = $this->storage->getCategoriesWithUsers();
        echo $this->templates->generateCategoriesPage($id_user, $categories);
    }

    public function debug_to_console($data)
    {
        if(is_array($data) || is_object($data))
        {
            echo("<script>console.log('PHP: ".json_encode($data)."');</script>");
        } else {
            echo("<script>console.log('PHP: ".$data."');</script>");
        }
    }
}