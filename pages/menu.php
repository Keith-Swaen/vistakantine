<?php include('../include/header.inc.php');

require_once ('../database/database.php');
require_once ('../database/actions.inc.php');

$pdo = dbconnection();

function getIndexSuffix() {
    $indexSuffix = 'nl';
    $currentLanguage = "nl";
    if (isset($_COOKIE['language'])) {
        $currentLanguage = $_COOKIE['language'];
    }
    
    if ($currentLanguage == 'en') {
        $indexSuffix = 'en';
    }
    return $indexSuffix;
}

function showProducts($category) {
    $products = getProductsByCategory($category);

    foreach($products as $product) {
        if ($product['status'] === 'DEACTIVATED')
            continue;

        $producttitle = $product['title_' . getIndexSuffix()];
        $productDescription = $product['description_' . getIndexSuffix()];
        $productPrice = number_format($product['price'], 2, ',', '');
        $status = ($product['status'] === 'OUT_OF_STOCK' ? '<span>Niet op voorraad</span>' : $productPrice);

        $value = <<<HTML
        <li>
            <div class="menu-item">
                <div class="menu-item-title">$producttitle </div>
                <div class="menu-item-dots"></div>
                <div class="menu-item-price">$status</div>
                <div class="menu-item-description">$productDescription</div>
            </div>
         </li>
        HTML;
        
        if (strlen($product['title_nl']) === 0 && getIndexSuffix() === "nl")
            continue;
        else
            print $value;
    }
}

?>

<div class="menu_title">
    <?php ;
    print "<h1>" . ($currentLanguage == "en" ? "Our menu" : "Ons menu") . "</h1>" ?>
    <?php print "<h2>" . ($currentLanguage == "en" ? "The product range of Vistakantine" : "Het assortiment van Vistakantine") . "</h2>" ?>
</div>

<div class="menu-section">

    <?php foreach (getAllCategories() as $category): ?>

    <!-- Only show categories with products -->
    <?php if(count(getProductsByCategory($category['id'])) > 0): ?>
    <div class="inner-menu">
        <div class="menu-title">
            <?php echo ("<h1> " . $category['title_' . getIndexSuffix()] . " </h1>") ?>
        </div>
        <div class="menu-holder">
            <?php   
                print showProducts($category['id']);
            ?>
        </div>
    </div>
    <?php endif; ?>

    <?php endforeach; ?>

</div>

<?php 

include_once('../include/footer.inc.php');

?>
