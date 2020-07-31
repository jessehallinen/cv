<?php
require_once('functions.php');
?>
<!DOCTYPE html>
<html lang="fi">
    <?php
    // Override page variables here when using multiple pages
    $pageTitle = 'Portfolio';
    $pageDescription = 'Portfolio - Jesse Hallinen.';
    require_once('head.php'); 
    ?>
    <body>
        <?php require_once('header.php') ?>

        <div class="container main">
            <div class="row">
                <div class="col-12">
                    <h1>PORTFOLIO</h1>
                    <h2>VALITSE KATEGORIA</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="thumbnail">
                        <a href="cookbook.php" class="">
                            <div class="caption">
                                <h4>WEB-TEKNOLOGIAT</h4>
                                <p>HTML, JavaScript, PHP, CSS, MySQL</p>
                            </div>
                            <img src="images/knife_on_table_thumbnail.jpg" alt="..." class="img-thumbnail rounded mx-auto d-block">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="thumbnail">
                        <a href="games.php" class="">
                            <div class="caption">
                                <h4 class="">PELIT</h4>
                                <p>C#, Unity, lyhyitä pelivideoita.</p>
                            </div>
                            <img src="images/keyboard_thumbnail.jpg" alt="..." class="img-thumbnail rounded mx-auto d-block">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('javascript.php'); ?>
        <?php require_once('footer.html') ?>
    </body>
</html>
