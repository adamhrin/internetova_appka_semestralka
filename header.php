<!--COLLAPSIBLE NAVIGATION BARS-->
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="container">
    <!-- .navbar-fixed-top, or .navbar-fixed-bottom can be added to keep the nav bar fixed on the screen -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

                <!-- Button that toggles the navbar on and off on small screens -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">

                    <!-- Hides information from screen readers -->
                    <span class="sr-only"></span>

                    <!-- Draws 3 bars in navbar button when in small mode -->
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- You'll have to add padding in your image on the top and right of a few pixels (CSS Styling will break the navbar) -->
                <a class="pull-left" href="trainings.php"><img class="img-circle" id="grassLogoSm" src="images/grasshoppers_logo.jpg" alt="grasshoppers_logo"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a id="a_home" class="header_btn" href="index.php">Domov <span class="sr-only">(current)</span></a></li>
            <?php
                if (!isset($_SESSION['user']))
                {
                    ?>

                    <li><a id="a_about" class="header_btn" href="about.php">O nás</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" id="signup" data-toggle="modal" data-target="#signupModal"><span class="glyphicon glyphicon-user"></span> Registrovať sa</a></li>
                    <li><a href="#" id="login" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Prihlásiť sa</a></li>
                </ul>

            <?php
                }
                else
                {
                    ?>

                    <li class="dropdown">
                        <a id="a_dropdown" href="#" class="dropdown-toggle header_btn" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Akcie <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="trainings.php">Tréningy</a></li>
                            <li><a href="categories.php">Kategórie</a></li>
                        </ul>
                    </li>
                    <li><a id="a_my_account" class="header_btn" href="my_account.php">Môj účet</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Odhlásiť</a></li>
                </ul>

            <?php
                }
                    ?>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
<br>
<br>

<!--LOGIN FORM-->
<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Prihlásenie</h4>
            </div>
            <div class="modal-body">
                <label for="nick_login">Nick</label>
                <input type="text" name="nick_login" id="nick_login" class="form-control" required="required">
                <br>
                <label for="password_login">Heslo</label>
                <input type="password" name="password_login" id="password_login" class="form-control" required="required">
                <br>
                <button type="button" name="login_button"  id="login_button" class="btn btn-warning">Prihlásiť</button>
            </div>
        </div>
    </div>
</div>


<!--SIGNUP FORM-->
<div id="signupModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registrácia</h4>
            </div>
            <div class="modal-body">
                <label for="firstname">Meno</label>
                <input type="text" name="firstname" id="firstname" class="form-control">
                <br>
                <label for="surname">Priezvisko</label>
                <input type="text" name="surname" id="surname" class="form-control">
                <br>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
                <br>
                <label for="nick_signup">Nick</label>
                <input type="text" name="nick_signup" id="nick_signup" class="form-control" required>
                <br>
                <label for="password_signup">Heslo</label>
                <input type="password" name="password_signup" id="password_signup" class="form-control" required>
                <br>
                <button type="button" name="signup_button" id="signup_button" class="btn btn-warning">Registrovať</button>
            </div>
        </div>
    </div>
</div>