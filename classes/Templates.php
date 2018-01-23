<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 03.01.2018
 * Time: 22:16
 */

class Templates
{

    /**
     * Templates constructor.
     */
    public function __construct()
    {
    }

    public function generateTraining($nick_user, $training)
    {
        $categories_html = "";
        $edit_training_btn_html = "";
        $delete_training_btn_html = "";

        if ($nick_user == "admin")
        {
            $edit_training_btn_html = "
                <span><a href=\"edit_training.php?id_training={$training->id_training}\" class=\"btn btn-sm btn-primary pull-right hidden-xs\" role=\"button\">
                    <span class=\"glyphicon glyphicon-edit\"></span> Upraviť</a>
                </span>
                <span><a href=\"edit_training.php?id_training={$training->id_training}\" class=\"btn btn-sm btn-primary btn-circle pull-right hidden-lg hidden-md hidden-sm\" role=\"button\">
                    <span class=\"glyphicon glyphicon-edit\"></span></a>
                </span>
            ";

            $delete_training_btn_html = "
                <span><button class=\"btn btn-sm btn-warning pull-right hidden-xs delete_training_btn\" value=\"{$training->id_training}\">
                    <span class=\"glyphicon glyphicon-remove-sign\"></span> Vymazať</button>
                </span>
                <span><button class=\"btn btn-sm btn-warning btn-circle pull-right hidden-lg hidden-md hidden-sm delete_training_btn\" 
                                value=\"{$training->id_training}\">
                    <span class=\"glyphicon glyphicon-remove-sign\"></span></button>
                </span>
            ";
        }

        if ($training->categories == NULL)
        {
            $categories_html .= "
                <li><a href=\"#\">Žiadna</a></li>
            ";
        }
        else
        {
            foreach ($training->categories as $category)
            {
                $categories_html .= "
                <li><a href=\"#\">{$category->title}</a></li>
            ";
            }
        }

        $acceptsClass = "";
        if($training->accept == NULL)
        {
            $acceptsClass = "neutralTraining";
        }
        else if ($training->accept)
        {
            $acceptsClass = "acceptedTraining";
        }
        else
        {
            $acceptsClass = "declinedTraining";
        }

        $day = $this->generateDaySvk($training->date_time);
        $date = $this->generateDate($training->date_time);
        $time = $this->generateTime($training->date_time);
        $duration = $this->generateDuration($training->duration);

        $html = "
        <div class=\"thumbnail {$acceptsClass}\">
            <div class=\"caption\">
                <span class=\"training_text\">{$training->location}</span>
                {$delete_training_btn_html}
                {$edit_training_btn_html}
                <ul class=\"list-group\">
                    <li class=\"list-group-item\">Deň:
                        <span>  {$day} </span>
                        <span> {$date}</span>
                    </li>
                    <li class=\"list-group-item\">Čas:
                        <span> {$time} </span>
                    </li>
                    <li class=\"list-group-item\">Trvanie:
                        <span> {$duration}h</span>
                    </li>
                    <li class=\"list-group-item dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\"
                           aria-haspopup=\"true\" aria-expanded=\"false\">Kategórie <span class=\"caret\"></span></a>
                        <ul class=\"dropdown-menu\">
                            {$categories_html}
                        </ul>
                    </li>
                    <li class=\"list-group-item\">
                        <a href=\"training_players_view.php?id_training={$training->id_training}\">Nahlasení<span class=\"badge pull-right\">{$training->num_of_accepts}</span></a>
                    </li>

                </ul>
                <span>
                    <button value=\"{$training->id_training}\" class=\"btn btn-success acceptBtn\">
                        <span class=\"glyphicon glyphicon-ok-sign\"></span> Prídem
                    </button>
                </span>
                <span>
                    <button value=\"{$training->id_training}\" class=\"btn btn-warning declineBtn\">
                        <span class=\"glyphicon glyphicon-remove-sign\"></span> Neprídem
                    </button>
                </span>
            </div>
        </div>
        ";
        return $html;
    }

    public function generateCategoriesCheckboxes($categories)
    {
        $html = "";
        if (is_array($categories))
        {
            foreach($categories as $category)
            {
                $html .= "
                    <p>
                        <input id=\"chb{$category->id_category}\" type=\"checkbox\"  name=\"category[]\" value=\"{$category->id_category}\">
                        <label for=\"chb{$category->id_category}\"> {$category->title}</label>
                    </p>";
            }
        }
        else
        {
            $html .= "
                    <p>
                        <input id=\"chb{$categories->id_category}\" type=\"checkbox\"  name=\"category[]\" value=\"{$categories->id_category}\">
                        <label for=\"chb{$categories->id_category}\"> {$categories->title}</label>
                    </p>";
        }

        return $html;
    }

    public function generateTrainingHead($training)
    {
        $html = "<td colspan=\"5\">";
        $day = $this->generateDaySvk($training->date_time);
        $time = $this->generateTime($training->date_time);
        $html .= "{$training->location} ({$day } {$time})";
        $html .= "</td>";
        return $html;
    }

    public function generateRowUserOnTraining($player)
    {
        $html = "<tr>
                    <td>{$player->surname} {$player->name}</td>
                    <td>{$player->nick}</td>";
        if ($player->accepts == NULL)
        {
            $html .= "<td></td>
                      <td></td>
                      <td><span class='glyphicon glyphicon-question-sign center-block text-center'></span></td>
                     ";
        }
        else if ($player->accepts == 1)
        {
            $html .= "<td><span class='glyphicon glyphicon-ok-circle center-block text-center'></span></td>
                      <td></td>
                      <td></td>
                     ";
        }
        else if ($player->accepts == 0)
        {
            $html .= "<td></td>
                      <td><span class='glyphicon glyphicon-remove-circle center-block text-center'></span></td>
                      <td></td>
                     ";
        }
        $html .= "</tr>";

        return $html;
    }

    public function generateAccountSettingsForUser($user, $all_categories)
    {
        $checkboxes = $this->generateUserCategoriesCheckboxes($user, $all_categories);
        $html = "
            <div class=\"container\">
                <div class=\"page-header\">
                    <h1>Správa účtu pre {$user->nick}</h1>
                </div>
                <div class=\"thumbnail\">
                    <form id=\"my_account_form\" method=\"post\">
                        <div class=\"form-group\">
                            <label for=\"ch_firstname\">Meno</label>
                            <input type=\"text\" class=\"form-control\" name=\"ch_firstname\" id=\"ch_firstname\" value=\"{$user->name}\">
                        </div>
                        <div class=\"form-group\">
                            <label for=\"ch_surname\">Priezvisko</label>
                            <input type=\"text\" class=\"form-control\" name=\"ch_surname\" id=\"ch_surname\" value=\"$user->surname\">
                        </div>
                        <div class=\"form-group\">
                            <label for=\"ch_email\">Email</label>
                            <input type=\"email\" class=\"form-control\" name=\"ch_email\" id=\"ch_email\" value=\"{$user->email}\">
                        </div>
                        <div class=\"form-group\">
                            <label for=\"ch_nick\">Nick</label>
                            <input type=\"text\" class=\"form-control\" name=\"ch_nick\" id=\"ch_nick\" value=\"{$user->nick}\">
                        </div>
        
                        <label>Kategórie, ktoré sleduješ</label>
                        <div class=\"thumbnail\">
                            <div id=\"categories\">
                                {$checkboxes}
                            </div>
                        </div>
                        <button type=\"submit\" class=\"btn btn-primary btn-lg\" name=\"save_account_settings_btn\" id=\"save_account_settings_btn\">Ulož</button>
                        <a href=\"change_password.php\" class=\"btn btn-default btn-lg\" role=\"button\">Zmeniť heslo</a>
                    </form>
                </div>
            </div>
        ";
        return $html;
    }

    public function generateCategoriesPage($id_user, $categories)
    {
        $html = "<div class='container'>
                    <div class=\"row\">";
        foreach ($categories as $category)
        {
            $html .= "
                <div class=\"col-lg-4 col-md-4 col-sm-6 col-xs-12\">
                    <h4><a class='categiores_collapse' href=\"#{$category->id_category}\" data-toggle=\"collapse\">{$category->title}</a></h4>
                    <div id=\"{$category->id_category}\" class=\"collapse\">
                        {$this->generateCategoryTable($category, $id_user)}
                    </div>
                </div>
            ";
        }
        $html .= "
                    </div>
                </div>
        ";
        return $html;
    }

    private function generateCategoryTable($category, $id_user)
    {
        $html = "
            <table class=\"table table-bordered table-striped table-hover training_players_table\">
                <thead>
                    <tr>
                        <th class=\"text-center\">Meno</th>
                        <th class=\"text-center\">Nick</th>
                    </tr>
                </thead>
                <tbody>
        ";
        foreach($category->users as $user)
        {
            $highlight = "";
            if ($user->id_user == $id_user)
            {
                $highlight = "class = \"highlight\"";
            }

            $html .= "
                    <tr {$highlight}>
                        <td>{$user->surname} {$user->name}</td>
                        <td>{$user->nick}</td>
                    </tr>";
            ;
        }
        $html .= "
                </tbody>
            </table>
        ";
        return $html;
    }

    private function generateUserCategoriesCheckboxes($user, $all_categories)
    {
        $html = "";
        $isChecked = "";
        foreach($all_categories as $category)
        {
            foreach ($user->categories as $users_category_id)
            {
                if ($users_category_id == $category->id_category)
                {
                    $isChecked = "checked";
                    break;
                }
                else
                {
                    $isChecked = "";
                }
            }
            $html .= "
                    <p>
                        <input id=\"chb{$category->id_category}\" type=\"checkbox\"  name=\"category[]\" value=\"{$category->id_category}\" {$isChecked}>
                        <label for=\"chb{$category->id_category}\"> {$category->title}</label>
                    </p>";
        }
        return $html;
    }

    private function generateDaySvk($date_time)
    {
        $dayEng = date("D", strtotime($date_time));
        $daySvk = "";
        switch ($dayEng)
        {
            case "Mon":
                $daySvk = "Pondelok";
                break;
            case "Tue":
                $daySvk = "Utorok";
                break;
            case "Wed":
                $daySvk = "Streda";
                break;
            case "Thu":
                $daySvk = "Štvrtok";
                break;
            case "Fri":
                $daySvk = "Piatok";
                break;
            case "Sat":
                $daySvk = "Sobota";
                break;
            case "Sun":
                $daySvk = "Nedeľa";
                break;
            default:
                $daySvk = "Nastala chyba, ak chceš zistiť aký je to deň pozri do kalendára :)";
                break;
        }
        return $daySvk;
    }

    private function generateDate($date_time)
    {
        return date("j.n.Y", strtotime($date_time));
    }

    private function generateTime($date_time)
    {
        return date("H:i", strtotime($date_time));
    }

    private function generateDuration($duration)
    {
        return date("H:i", strtotime($duration));
    }
}