<?php
require_once('functions.php');
handleInfoMessage();
?>
<!DOCTYPE html>
<html lang="fi">
    <?php
    // Override page variables here when using multiple pages
    $pageTitle = 'CV';
    $pageDescription = 'CV - Jesse Hallinen.';
    require_once('head.php'); 
    ?>
    <body class="cv-body">
        <?php require_once('header.php') ?>

        <div class="container main">
            <div class="row">
                <div class="col-12">
                    <h1>CV - Jesse Hallinen</h1>
                </div>
            </div>
            <div class="row about justify-content-center align-items-center">
                <div class="col-lg-4 contact-info">
                    <p>Jesse Hallinen</p>
                    <p>23.12.1990</p>
                    <p>Tavaratie 5</p>
                    <p>42800 Haapamäki</p>
                    <p><a href="tel:0504123997">050 4123 997</a></p>
                    <p><a href = "mailto: hallinenjesse@gmail.com">hallinenjesse@gmail.com</a></p>
                </div>
                <div class="col-lg-8 about-text">
                    <h2>TIETOA MINUSTA</h2>
                    <p>Valmistuin ohjelmistotekniikan insinööriksi vuonna 2014 Jyväskylän ammattikorkeakoulusta.</p>
                    <p>Olin työharjoittelussa Jyväskyläläisellä Star Arcadella kolme kuukautta kehittämässä mobiilipelejä Lua-ohjelmointikielellä ja myöhemmin olin pari kuukautta harjoittelussa 
                    JAMKin omassa FreeNest-projektissa tekemässä testiautomaatiota (Robot framework, Selenium, python).</p>
                    Valmistumisen jälkeen perustin toiminimen Hoarfrost, jolla olen viime vuodet kehittänyt mobiili- ja tietokonepelejä C#-ohjelmointikielellä ja 
                    Unity-pelimoottorilla. Olen tehnyt aika lailla kaiken peleihin liittyvän itse, joten kokemusta on kertynyt myös mm. 3D-mallinnuksesta, 
                    piirtämisestä ja käyttöliittymien suunnittelusta. Nyt olen sitten alkanut taas etsimään uutta työtä.</p>
                    <p>Olen tehnyt myös useita harrastusprojekteja käyttäen teknologioita kuten JavaScript, PHP, MySQL, HTML, Python, Tensorflow, C++ ja Lua. Näistä 
                    esimerkkinä mainittakoon Travian-tyylisen selainpelin prototyyppi, joka oli tehty käyttäen MySQL-, PHP-, JavaScript-, HTML-, ja CSS-teknologioita.</p>
                    <p>Tämä nettisivu toimii myös esimerkkinä web-teknologiataidoistani. Se pyörii Raspberry Pille asennetulla Apache-serverillä.</p>
                    <p>Yläpalkissa on linkki portfolioon, josta web-teknologiakategoriasta löytyy Keittokirja, jonka tein osoittaakseni osaamistani.</p>
                </div>
            </div>    
            <div class="row">
                <h2 class="col-12">OSAAMINEN</h2>
                <div class="col-md-6">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Unity (Game Engine)</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">C#</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">Javascript</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">Python</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">Blender</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Photoshop / Krita / GIMP</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">HTML</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">PHP</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">MySQL</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">Lua</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">C++</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <h2>KOULUTUS</h2>
                    <strong>Jyväskylän ammattikorkeakoulu, 2014</strong>
                    <p>Insinööri, ohjelmistotekniikan koulutusohjelma</p>
                    <strong>Keuruun lukio, 2009</strong>
                    <p>Ylioppilas</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <h2>TYÖKOKEMUS</h2>
                    <strong>Yrittäjä, Hoarfrost, 06/2014 -</strong>
                    <p>iOS-, Android- ja PC-pelikehitys Unity-pelimoottorilla ja C#-ohjelmointikielellä.</p>
                    <strong>Harjoittelija, Star Arcade, 09/2013 – 11/2013</strong>
                    <p>Pelikehitys Lua-ohjelmointikielellä.</p>
                    <strong>Harjoittelija, Jyväskylän ammattikorkeakoulun FreeNest-projekti, 06/2013 - 07/2013</strong>
                    <p>Testiautomaatio , Robot framework, Selenium, Python.</p>
                </div>
            </div>
        </div>
        <?php require_once('javascript.php'); ?>
        <?php require_once('footer.html') ?>
    </body>
</html>
