<?php 

$cookie_name = "language";
$currentLanguage = "nl";
if (isset($_COOKIE[$cookie_name])) {
    $currentLanguage = $_COOKIE[$cookie_name];
}

if (isset($_GET['language'])) {
    $cookie_value = null;
    if ($_GET['language'] == "nl" || $_GET['language'] == "en") {
        $cookie_value = $_GET['language'];
    } 
    if (isset($cookie_value)) {
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    }

    if ($_GET['language'] == "nl" || $_GET['language'] == "en") {
        if ($_GET['language'] != $currentLanguage) {
            header("Refresh:0");
        }
    }
}
require_once ('../database/database.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link rel="stylesheet" href="style2.css">
    <!-- Scrollbar Custom CSS -->
   
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <title><?php include('../include/title.php') ?></title>
</head>

<body>
    <nav id="header">
        <div class="logo">
            <a href="../pages/home.php"><img src="../css/images/logo.png" alt="logo"></a>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../pages/home.php">Home</a>
            </li> 
            <li>
                <a href="../pages/menu.php">Menu</a>
            </li> 
            <li>
                <?php print "<a href='../pages/over_ons.php'>" . ($currentLanguage == "en" ? "About us" : "Over ons") . "</a>" ?>
            </li> 
            <li>
                <a href="../pages/contact.php">Contact</a>
            </li>
            <li>
                
            </li> 
        </ul>
        
        <a href="../pages/login.php"><label>Login</label></a>

        <div class="lang-menu">
            <?php echo '<div class="selected-lang ' . ($currentLanguage) . '"> </div>' ?>
                <ul>
                    <li>
                        <?php print "<a href='?language=nl' class='nl'>" . ($currentLanguage == "en" ? "Dutch" : "Nederlands") . "</a>" ?>
                    </li>
                    <li>
                        <?php print "<a href='?language=en' class='en'>" . ($currentLanguage == "en" ? "English" : "Engels") . "</a>" ?>
                    </li>
                </ul>
        </div>
    </nav>