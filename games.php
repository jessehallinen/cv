
<?php
require_once('functions.php');
handleInfoMessage();
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    // Override page variables here when using multiple pages
    $pageTitle = 'Games';
    $pageDescription = 'Some short videos of games made with C# and Unity by Jesse Hallinen.';
    require_once('head.php'); 
    ?>
    <link rel="stylesheet" href="css/games.css<?php echo '?v=' . filemtime('css/games.css'); ?>">
    <body>
        <?php require_once('header.php') ?>
        <div class="container main">
            <div class="row caption-row">
                <div class="col-12">
                    <h1>GAMES</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/w7ELu5iCnuQ?rel=0" frameborder="0"
                            allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    <h3>Castles in War</h3>
                    <p>A strategy game where a player needs to conquer the enemy castles. The castles have multiple
                    different upgrade options and there are also gold mines which generate gold faster than castles.
                    The game is designed for mobile devices and was published in App Store and Google Play, but currently
                    it's unavailable.
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/GRoHxKsAD1I?rel=0" frameborder="0"
                            allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Spaceship flying in an asteroid belt</h3>
                    <p>A local multiplayer split-screen game with a procedurally generated asteroid belt and a spaceship flying through it dodging
                    asteroids.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Cqv5PHNuD3w?rel=0" frameborder="0"
                            allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    <h3>Stair Runner</h3>
                    <p>An endless runner type of game. It is designed for mobile devices and
                    was published in App Store and Google Play, but currently it's unavailable.
                    The point of the game is simply to tap the screen when a step turns green. The game has worldwide leaderboards
                    and you can share your result with your friends. Also it has multiple characters to unlock.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Ot8K9K-IOP8?rel=0" frameborder="0"
                            allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Rabbit vs Tortoise</h3>
                    <p>A game inspired by the classic tale called The Tortoise and the Hare. The player plays as the rabbit and tries to win the
                    tortoise in a running race. There are multiple procedurally generated levels and all kinds of obstacles the rabbit must
                    avoid.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/PmVFSI1zw-A?rel=0" frameborder="0"
                            allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    <h3>Dwarven Platoon</h3>
                    <p>A game where the group of dwarves must run as far as they can while avoiding deadly traps. The levels are procedurally generated.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/KPe8sBva4fg?rel=0" frameborder="0"
                            allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>King's Castle TD</h3>
                    <p>A tower defence game where the player needs to protect the king from the monsters. The twist here is that the player
                    can build walls to change the route the monsters can take. The towers can be build on top of the walls.
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/AVNazsZ8XvY?rel=0" frameborder="0"
                            allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    <h3>World Conquering Game</h3>
                    <p>A turn-based strategy game where the player needs to conquer the whole world. Kind of like Risk board game. The player can
                    choose any nation as a starting point. All countries are divided into smaller regions and each nation gets reinforcement units
                    at the start of their turn based on the number of regions the nation holds. Before battle the player positions his troops and then
                    in the actual battle the player has no control and the troops just charge against the enemy.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/DdKh3BSFZ1k?rel=0" frameborder="0"
                            allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Dwarven Express</h3>
                    <p>A game where a dwarven wagon tries to carry mail and passengers through monster infested wastelands. The player can use
                    different kind of turrets and weapons to fend off the attackers.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/eAg6L53OQ98?rel=0" frameborder="0"
                            allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    <h3>Floating islands</h3>
                    <p>The purpose of this project was to procedurally create a floating island.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/qES22Ru-b90?rel=0" frameborder="0"
                            allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Age of Empires II -style survival strategy game</h3>
                    <p>The goal was to make kind of like Age of empires II with survival elements and zombies. The maps were procedurally 
                    generated.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/3Z7LeRtgL0s?rel=0" frameborder="0"
                            allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    <h3>Anthill Wars</h3>
                    <p>A strategy game where the player needs to conquer enemy anthills. It is designed for mobile devices and
                    was published in App Store, but currently it's unavailable. Castles in War is built on top of this game.</p>
                </div>
            </div>
        </div>
        <?php require_once('javascript.php'); ?>
        <?php require_once('footer.html') ?>
    </body>
</html>