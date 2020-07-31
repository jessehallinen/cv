<?php
require_once('functions.php');
require_once('db_functions/common_functions.php');
handleInfoMessage();
?>
<!DOCTYPE html>
<html lang="fi">
    <head>
        <?php
        // Override page variables here when using multiple pages
        $pageTitle = 'Keittokirja';
        $pageDescription = 'Keittokirja.';
        require_once('head.php');
        ?>
        <link rel="stylesheet" href="css/cookbook.css<?php echo '?v=' . filemtime('css/cookbook.css'); ?>">
    </head>
    <body class="bg-cookbook">
        <?php require_once('header.php'); ?>
        
        <div class="container-fluid main">
            <div id="new-recipe-bg"></div>
            <div class="row">
                <div id="new-recipe" class="col-md-6">
                    <div class="new-recipe-inner">
                        <button type="button" id="new-recipe-close" class="btn close" aria-label="Close"> 
                            <span aria-hidden="true">×</span> 
                        </button> 
                        <form action="db_functions/save_recipe.php?goto=<?php echo urlencode($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="recipe-id" name="recipe-id" value="">
                            <div class="form-group">
                                <img id="recipe-img-preview" src="" alt="" width="100">
                                <label for="recipe-img">Kuva (.jpg, alle 0,5Mt)</label>
                                <input type="file" id="recipe-img" name="recipe-img" class="form-control" accept="image/jpeg">
                            </div>
                            <div class="form-group">
                                <label for="recipe-name">Reseptin nimi</label>
                                <input type="text" name="recipe-name" class="form-control" id="recipe-name" placeholder="Reseptin nimi" maxlength="50" required>
                            </div>
                            <div class="form-group">
                                <label for="recipe-desc">Kuvaus</label>
                                <textarea class="form-control" id="recipe-desc" name="recipe-desc" placeholder="Lyhyt kuvaus" maxlength="100" required></textarea>
                            </div>
                            <div class="ingr-caption">
                                <p>Ainesosat</p>
                            </div>
                            <div id="ingr-list">
                            </div>                            
                            <button type="button" class="btn btn-default" id="add-ingredient">
                                Lisää uusi ainesosa
                                <span class="plus-sign">+</span>
                            </button>
                            <div class="form-group">
                                <label for="recipe-inst"></label>
                                <textarea class="form-control" id="recipe-inst" name="recipe-inst" placeholder="Valmistusohjeet" maxlength="5000" required></textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary submit-btn">Tallenna</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row caption-bar">
                <div class="col-12 text-cookbook">
                    <h1>Keittokirja</h1>
                    <p>Tämä sivu toimii esimerkkinä web-teknologiaosaamisestani. Sivu on tehty käyttäen seuraavia teknologioita: JavaScript, PHP, jQuery, MySQL, CSS(SASS), HTML. Kaikki lähdekoodit löytyvät githubista: </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <button type="button" id="add-new-recipe">Uusi resepti<span class="fa fa-plus"></span></button>
                </div>
            </div>
            <div id="recipes" class="d-flex justify-content-between">

            </div>
        </div>
        <?php require_once('javascript.php'); ?>
        <script>
            var measures = JSON.parse('<?php echo json_encode(getMeasures()); ?>');
            var recipes = JSON.parse('<?php echo json_encode(getRecipes()); ?>');
            var loggedIn = <?php echo isset($_SESSION['loggedin']) ? 'true' : 'false'; ?>
        </script>    
        <script src="cookbook.js<?php echo '?v=' . filemtime('cookbook.js'); ?>"></script>
        <?php require_once('footer.html') ?>
    </body>
</html>
