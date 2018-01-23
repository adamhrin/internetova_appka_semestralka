<?php
//session_start();
if (!isset($_SESSION['user']))
{
    ?>
    <br>
    <br>
    <div class="container">
        <div id="theCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#theCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#theCarousel" data-slide-to="1"></li>
                <li data-target="#theCarousel" data-slide-to="2"></li>
                <li data-target="#theCarousel" data-slide-to="3"></li>
                <li data-target="#theCarousel" data-slide-to="4"></li>
                <li data-target="#theCarousel" data-slide-to="5"></li>
                <li data-target="#theCarousel" data-slide-to="6"></li>
                <li data-target="#theCarousel" data-slide-to="7"></li>
                <li data-target="#theCarousel" data-slide-to="8"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <div class="slide slide1"></div>
                    <div class="carousel-caption">
                    </div>
                </div>

                <div class="item">
                    <div class="slide slide2"></div>
                    <div class="carousel-caption">
                    </div>
                </div>

                <div class="item">
                    <div class="slide slide3"></div>
                    <div class="carousel-caption">
                    </div>
                </div>

                <div class="item">
                    <div class="slide slide4"></div>
                    <div class="carousel-caption">
                    </div>
                </div>

                <div class="item">
                    <div class="slide slide5"></div>
                    <div class="carousel-caption">
                    </div>
                </div>

                <div class="item">
                    <div class="slide slide6"></div>
                    <div class="carousel-caption">
                    </div>
                </div>

                <div class="item">
                    <div class="slide slide7"></div>
                    <div class="carousel-caption">
                    </div>
                </div>

                <div class="item">
                    <div class="slide slide8"></div>
                    <div class="carousel-caption">
                    </div>
                </div>

                <div class="item">
                    <div class="slide slide9"></div>
                    <div class="carousel-caption">
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
    <br>
    <?php
}
else
{
    ?>

<div class="container">
    <div class="page-header">
        <h1>Ahoj <?php echo $_SESSION['user']?></h1>
    </div>
</div>
<?php
}
?>