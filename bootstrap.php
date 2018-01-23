<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <title>Semestralka</title>
<!-- bootstrap -->

    <!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Pacifico" >
    <link rel="stylesheet" type="text/css" href="css/style.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
    <script src="js/bootstrap.min.js"></script>

</head>

<body>

<!--COLLAPSIBLE NAVIGATION BARS-->
<div class="container">
    <!-- .navbar-fixed-top, or .navbar-fixed-bottom can be added to keep the nav bar fixed on the screen -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

                <!-- Button that toggles the navbar on and off on small screens -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

                    <!-- Hides information from screen readers -->
                    <span class="sr-only"></span>

                    <!-- Draws 3 bars in navbar button when in small mode -->
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- You'll have to add padding in your image on the top and right of a few pixels (CSS Styling will break the navbar) -->
                <a class="pull-left" href="#"><img class="img-circle" id="grassLogoSm" src="images/grasshoppers_logo.jpg"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">About</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contact Us <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Email</a></li>
                            <li><a href="#">Phone</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Set Appointment</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- navbar-left will move the search to the left -->
                <form method="post" class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
<br>
<br>


<!--PAGINATOR-->
<div class="container">
    <nav>
        <ul class="pagination">
            <li><a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>



<!--THUMBNAILS-->
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="thumbnail">
                <img id="grassLogoSm" src="images/grasshoppers_logo.jpg" alt="...">
                <div class="caption">
                    <h3>Hamburger</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p><a href="#" class="btn btn-primary" role="button">Add to Cart</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="thumbnail">
                <img id="grassLogoSm" src="images/grasshoppers_logo.jpg" alt="...">
                <div class="caption">
                    <h3>Polenta</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p><a href="#" class="btn btn-primary" role="button">Add to Cart</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="thumbnail">
                <img id="grassLogoSm" src="images/grasshoppers_logo.jpg" alt="...">
                <div class="caption">
                    <h3>Meatball Sub</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p><a href="#" class="btn btn-primary" role="button">Add to Cart</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="thumbnail">
                <img id="grassLogoSm" src="images/grasshoppers_logo.jpg" alt="...">
                <div class="caption">
                    <h3>Eggplant</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p><a href="#" class="btn btn-primary" role="button">Add to Cart</a></p>
                </div>
            </div>
        </div>
    </div>
</div>



<!--PROGRESS BAR-->
<!-- Provide progress feedback to users by changing the value of style for the progress-bar (Doesn't work on IE9 or below) progress-bar-striped is optional -->
<div class="container">
    <div class="progress">
        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
            <span class="sr-only">60% Complete</span>
        </div>
    </div>
</div>



<!--MEDIA OBJECTS-->
<div class="container">
    <div class="media">
        <div class="media-left media-top">
            <a href="#">
                <img class="media-object" id="grassLogoSm" src="images/grasshoppers_logo.jpg" alt="...">
            </a>
        </div>

        <div class="media-body">
            <h4 class="media-heading">My Veggie Meatball Sub was Awesome</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor...</p>
        </div>
    </div>
</div>


<!--MEDIA LIST-->
<div class="container">
    <h3>What did you Eat for Lunch?</h3>

    <div class="media"> <!-- class media , to create media element-->
        <a class="pull-left" href="#">
            <img class="media-object" src="thumb1.png" alt="...">
        </a>
        <div class="media-body">
            <h4 class="media-heading">A Ate a Veggie Burger</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor...</p>
        </div>
    </div>

    <div class="media"> <!-- class media , to create media element  -->
        <a class="pull-left" href="#">
            <img class="media-object" src="thumb4.jpg" alt="..."> <!-- media-object 2 -->
        </a>
        <div class="media-body">
            <h4 class="media-heading">Eggplant Parmesan</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor...</p>

            <!-- Nested Media : Was placed before the closing media-body div element -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="thumb3.png" alt="...">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">My Veggie Meatball Sub was Awesome</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor...</p>
                </div>
            </div>
        </div> <!-- media-body for Eggplant closes here -->
    </div>
</div>


<!--LIST GROUPS-->
<div class="container">
    <ul class="list-group">

        <!-- Disable elements -->
        <li class="list-group-item disabled">Verizon Email</li>
        <li class="list-group-item">

            <!-- You can add badges -->
            <span class="badge">123</span>Gmail</li>
        <li class="list-group-item">Sent</li>

        <!-- You can style elements like warning, success, info, danger-->
        <li class="list-group-item list-group-item-warning">Junk</li>
    </ul>

    <!-- Add lists of links -->
    <a href="#" class="list-group-item">Add Account</a>

    <!-- Add any html elements in list -->
    <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">Delete Account</h4>
        <p class="list-group-item-text">The account will be permanently deleted</p>
    </a>

    <!-- You can put buttons in the list -->
    <button type="button" class="list-group-item">Check for Mail</button>
</div>




<!--NAVIGATION (HORIZONTAL AND VERTICAL)-->
<div class="container">
    <ul class="list-inline">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Phone</a></li>
                <li><a href="#">Email</a></li>
                <li><a href="#">Schedule an Appointment</a></li>
            </ul>
        </li>
    </ul>

    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#">Home</a></li>
        <li class="active"><a href="#">About</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Phone</a></li>
                <li><a href="#">Email</a></li>
                <li><a href="#">Schedule an Appointment</a></li>
            </ul>
        </li>
    </ul>
    <br>
</div>



<!--MENUS-->
<div class="container">
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle btn-lg" type="button"
                id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="true">Favorite Hero
<!--Sipocka dole na buttone pre rozbalenie menu-->
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li class="dropdown-header">Marvel</li>
            <li><a href="#">Spiderman</a></li>
            <li><a href="#">Captain America</a></li>
            <li><a href="#">Iron Man</a></li>

            <li role="separator" class="divider"></li>

            <li class="dropdown-header">DC</li>
            <li class="disabled"><a href="#">Superman</a></li>
            <li><a href="#">Batman</a></li>
            <li><a href="#">Wonder Woman</a></li>
        </ul>
    </div>
    <br>
</div>


<!--INPUT GROUPS-->
<div class="container">
    <div class="input-group input-group-lg">
        <span class="input-group-addon">Your Name</span>
        <input type="text" class="form-control" placeholder="Full Name">
    </div><br>
    <div class="input-group input-group-sm">
        <input type="text" class="form-control" placeholder="Full Name">
        <span class="input-group-btn">
            <button class="btn btn-default">Enter</button>
        </span>
    </div>
    <br>
</div>


<!--INPUT BUTTON DROPDOWNS-->
<div class="container">
    <div class="row">
        <div class="input-group">
            <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">User ID
<span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Gmail</a></li>
                </ul>
            </div>
            <input type="text" class="form-control" aria-label="...">
        </div>
    </div>
    <br>
</div>

<!--RADIO BOXES CHECK BOXES-->
<div class="container">
    <div class="row">
        <div class="input-group">
            <span class="input-group-addon">
                <!--radio instead of checkbox if you want radio btn-->
                <input type="radio">
            </span>
            <input type="text" class="form-control">
        </div>
    </div>
    <br>
</div>


<!--TAB INTERFACES NAV-PILLS NAV-TABS-->
<div class="container">
    <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#superman">Superman</a></li>
        <li><a data-toggle="tab" href="#batman">Batman</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Flash
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a data-toggle="tab" href="#flash">The Flash</a></li>
                <li><a data-toggle="tab" href="#kidflash">Kid Flash</a></li>
            </ul>
        </li>
    </ul>

    <div class="tab-content">
        <div id="superman" class="tab-pane fade in active">
            <p>Superman is a fictional superhero appearing in American comic books published by DC Comics. </p>
        </div>
        <div id="batman" class="tab-pane fade">
            <p>Batman is a fictional superhero appearing in American comic books published by DC Comics. </p>
        </div>
        <div id="flash" class="tab-pane fade">
            <p>The Flash is a fictional superhero appearing in American comic books published by DC Comics. </p>
        </div>
        <div id="kidflash" class="tab-pane fade">
            <p>Kid Flash is a fictional superhero appearing in American comic books published by DC Comics. </p>
        </div>
    </div>

    </div>
</div>


<!--FIRST-->
<div class="container">
    <div class="page-header">
        <h1>Hello from Semestralka Bootstrap</h1>
    </div>

    <!--BUTTONS-->
    <div class="jumbotron">
        <p>ADAM HRIN</p>
        <p>
            <a href="#" class="btn btn-default btn-large"
               role="button">More Info</a>
            <button type="submit" class="btn btn-danger"
                    role="button">Button</button>
            <button type="submit" class="btn btn-primary" disabled="disabled"
                    role="button">Disabled</button>
            <button type="submit" class="btn btn-link"
                    role="button">Button</button>
            <input type="button" value="Info" class="btn btn-info">
            <div class="btn-group btn-group-lg" role="group">
                <button type="submit" class="btn btn-default"
                        role="button">Button 1</button>
                <button type="submit" class="btn btn-default"
                        role="button">Button 2</button>
                <button type="submit" class="btn btn-default"
                        role="button">Button 3</button>
            </div>
        </p>
    </div>


    <!--TEXTS-->
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <h4>Column 1</h4>
nieco viac ako len toto tu musi byt aby som odhalil chybu ale ovela viac nieco viac ako len toto tu musi byt aby som odhalil chybu ale ovela viac nieco viac ako len toto tu musi byt aby som odhalil chybu ale ovela viac Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <h4>Column 2</h4>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
        <div class="clearfix visible-sm"></div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <h4>Column 3</h4>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <h4>Column 4</h4>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
    </div>


    <!--COLLAPSED TEXTS-->
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
            <h4><a href="#col5Content" data-toggle="collapse">Column 5</a></h4>
            <div id="col5Content" class="collapse in">
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
            <h4><a href="#col6Content" data-toggle="collapse">Column 6</a></h4>
            <div id="col6Content" class="collapse">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <h4><a href="#col7Content" data-toggle="collapse">Column 7</a></h4>
            <div id="col7Content" class="collapse">
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </div>
        </div>
    </div>


    <!--WELLS SCREEN SIZE-->
    <div class="well hidden-sm hidden-md hidden-lg">
        <p>Screen &lt; 768px</p>
    </div>
    <div class="well hidden-md hidden-lg">
        <p>Screen &gt; 768px and &lt; 992px</p>
    </div>
    <div class="well hidden-lg">
        <p>Screen &gt; 992px and &lt; 1200px</p>
    </div>
    <div class="well">
        <p>Screen &gt; 1200px</p>
    </div>


    <!--TABLE-->
    <div class="row">

        <div class="col-md-6 col-md-offset-6">
            <!-- The table class adds nice spacing and the other classes add additional style -->
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <td colspan="4">Best Baseball Players</td>
                </tr>
                </thead>
                <tbody>
                <tr>

                    <!-- You can adjust the width of table columns as well -->
                    <th class="col-md-2"></th>

                    <!-- Use text alignment like text-center or text-right -->
                    <th class="text-center">Average</th>
                    <th class="text-center">RBIs</th>
                    <th class="text-center">Homeruns</th>
                </tr>
                <tr>
                    <td><a href="#">Hank Aaron*</a></td>
                    <td>.305</td>
                    <td>2297</td>
                    <td>755</td>
                </tr>
                <tr>
                    <td><a href="#">Babe Ruth*</a></td>
                    <td>.342</td>
                    <td>2214</td>
                    <td>714</td>
                </tr>
                <tr>
                    <td><a href="#">Barry Bonds</a></td>
                    <td>.298</td>
                    <td>1996</td>
                    <td>762</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--GRASS PAGE-->
<div class="container">
    <div class="jumbotron">
        <img id="grassLogo" class="img-circle" src="images/grasshoppers_logo.jpg"  alt="Grasshoppers Zilina Logo">
        <span id="websiteTitle">Grasshoppers</span>
        <p id="websiteSlogan">The best floorball club ever</p>
    </div>
</div>


<!--SLIDE SHOW-->
<div class="container">
    <div id="theCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#theCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#theCarousel" data-slide-to="1"></li>
            <li data-target="#theCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <div class="slide1"></div>
                <div class="carousel-caption">
                    <h1>Amazing Backgrounds</h1>
                    <p>Thousands of Backgroudns for Free</p>
                    <p><a href="#" class="btn btn-primary btn-sm">Get them now</a></p>
                </div>
            </div>

            <div class="item">
                <div class="slide2"></div>
                <div class="carousel-caption">
                    <h1>Thousands of Colors</h1>
                    <p>Every Color You Can Imagine</p>
                </div>
            </div>

            <div class="item">
                <div class="slide3"></div>
                <div class="carousel-caption">
                    <h1>Amazing Ilustrations</h1>
                    <p>And they are all free</p>
                </div>
            </div>
        </div>

        <a class="left carousel-control" href="#theCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>

        <a class="right carousel-control" href="#theCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>

<!--ICONS-->
<div class="container">
    <div class="jumbotron">
        <p>
            <span class="glyphicon glyphicon-film"></span>
            <a href="#" class="btn btn-primary btn-lg">Trash
                <span class="glyphicon glyphicon-trash"></span>
            </a>
            <button type="button" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Call me
            </button>
        </p>
    </div>
</div>

<!--WELLS DEEPER-->
<div class="container">
    <div class="well well-sm">
        <p>
            Pellentesque sed sem scelerisque, consectetur massa sed, egestas odio. Maecenas laoreet placerat lorem, sit amet lacinia quam mollis non. Praesent sem est, posuere vel venenatis vitae, congue ut velit. Suspendisse sed mauris sit amet lectus tristique dignissim. Cras tempus imperdiet aliquam. Etiam in sollicitudin elit, eu pulvinar nibh. Suspendisse potenti. Vivamus nec justo et tellus ullamcorper semper sed vel metus. Quisque aliquam mauris quis volutpat porta. Suspendisse auctor augue ac nisl laoreet, sit amet maximus diam bibendum.
        </p>
    </div>
    <p>
        Pellentesque sed sem scelerisque, consectetur massa sed, egestas odio. Maecenas laoreet placerat lorem, sit amet lacinia quam mollis non. Praesent sem est, posuere vel venenatis vitae, congue ut velit. Suspendisse sed mauris sit amet lectus tristique dignissim. Cras tempus imperdiet aliquam. Etiam in sollicitudin elit, eu pulvinar nibh. Suspendisse potenti. Vivamus nec justo et tellus ullamcorper semper sed vel metus. Quisque aliquam mauris quis volutpat porta. Suspendisse auctor augue ac nisl laoreet, sit amet maximus diam bibendum.
    </p>
</div>


<!--ROUND IMAGES-->
<div class="container">
    <!--classes: img-round img-circle img-thumbnail-->
    <img src="images/grasshoppers_logo.jpg" id="grassLogo" class="img-responsive img-rounded pull-left" alt="responsive image">
</div>


<!--CONTEXTUAL COLOURS-->
<p>
    <span class="text-muted">Quis nostrud</span>
    <span class="text-primary">exercitation ullamco</span>
    <span class="text-success">laboris nisi</span>
    <span class="bg-info">ut aliquip</span>
    <span class="bg-warning">ex ea commodo</span>
    <span class="bg-danger">consequat.</span>
</p>

</body>