<?php include('../include/header.inc.php');?>

    <div class="home_banner">
        <img draggable=false src="../css/images/banner.png" alt="banner">
    </div>

    <div class="home_banner-row">
        <a href="./pages/menu.php">
            <div class="home_banner-column">
                <img src="../css/images/column1.png" alt="column1">
                    <div class="home_banner-columntext"><p>MENU</p></div>
            </div>
        </a>    
        <a href="./pages/over_ons.php">
            <div class="home_banner-column">
                <img src="../css/images/column2.png" alt="column2">
                    <div class="home_banner-columntext">
                        <?php print "<p>" . ($currentLanguage == "en" ? "ABOUT US" : "OVER ONS") . "</p>" ?>
                    </div>   
            </div>
        </a>
        <a href="./pages/contact.php">     
            <div class="home_banner-column">
                <img src="../css/images/column3.png" alt="column3">
                    <div class="home_banner-columntext"><p>CONTACT</p></div>
            </div>
        </a>
        <a href="https://vistacollege.nl" target="_blank">
            <div class="home_banner-column">
                <img src="../css/images/column4.png" alt="column4">
                    <div class="home_banner-columntext"><p>SCHOOL</p></div>
            </div>
        </a>
    </div>

    <div class="home_gallery-text">


    <?php
        echo '<h1>' . FLYERS . '</h1>';
        echo '<h2>' . FLYERS_DESCRIPTION . '</h2>';
        //print "<h1>" . ($currentLanguage == "en" ? "Our flyers" : "Onze flyers") . "</h1>";
        // print "<h2>" . ($currentLanguage == "en" ? "Check out our flyers below!" : "Bekijk hieronder onze flyers!") . "</h2>";
    ?>
    </div>

    <div class="home_gallery js-flickity" data-flickity-options='{ "freeScroll": false, "wrapAround": true, "autoPlay": 2500, "pageDots": false  }'>
        <div class="home_gallery-cell">
            <img src='../css/images/flyer1.png' alt='flyer1'>
        </div>
        <div class="home_gallery-cell">
            <img src='../css/images/flyer2.png' alt='flyer2'>
        </div>
        <div class="home_gallery-cell">
            <img src='../css/images/flyer3.png' alt='flyer3'>
        </div>
        <div class="home_gallery-cell">
            <img src='../css/images/flyer4.png' alt='flyer4'>
        </div>
    </div>
    
<?php  include('../include/footer.inc.php'); ?>
