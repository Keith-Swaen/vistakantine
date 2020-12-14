<?php
include_once('./include/header.inc.php');

require_once ('../../database/database.php');
require_once ('../../database/actions.inc.php');

$pdo = dbconnection();

$itemId;
$item;

// https://kantine.nl/edit.php?editProduct=1&productId=2
// https://kantine.nl/edit.php?editCategory=1&categoryId=2
// https://kantine.nl/edit.php?newProduct=1
// https://kantine.nl/edit.php?newCategory=1

global $action;

if (isset($_GET['editProduct'])) {
    $action = "editProduct";
    if (isset($_GET['productId'])) {
        $itemId = (int)$_GET['productId'];
        $item = getProduct($itemId);
        if ($item == null) {
            header("Location: ./products.php");
        }
    } else {
        header("Location: ./products.php");
    }
} else if (isset($_GET['editCategory'])) {
    $action = "editCategory";
    if ($_GET['categoryId']) {
        $itemId = (int)$_GET['categoryId'];
        $item = getCategoryById($itemId);
    } else {
        header("Location: ./products.php");
    }
} else if (isset($_GET['newProduct'])) {
    $action = "newProduct";
    //TODO new product
} else if (isset($_GET['newCategory'])) {
    $action = "newCategory";
    //TODO new category
} else {
    header("Location: ./products.php");
}

function isChecked($status) {
    global $action, $item;
    $isChecked = false;
    if ($action === 'newProduct') {
        $isChecked = ($status === 'ACTIVATED');
    } else {
        $isChecked = ($item['status'] === $status);
    }
    return ($isChecked ? 'checked' : '');
}

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <br />

    <?php echo '<h2>' . (isset($item['title_en']) ? "Edit " . $item['title_nl'] : "Nieuw" . (($action == 'newProduct') ? ' Product' : 'e Categorie')) . '</h2>' ?>

    <div class="content">
        <form method="POST" <?php echo 'action="../../database/update.inc.php?' . (strpos($action, 'Product') ? 'productId' : 'categoryId') .'=' . (isset($item['id']) ? $item['id'] : '-1') .'"'?>>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Naam</label>
                <div class="form-group col-md-5">
                    <label>Nederlands</label>
                    <input type="text" class="form-control" name="title_nl" id="title_nl" placeholder="Nederlands" value="<?php echo (!isset($item['title_en']) ? "" : $item['title_nl'])?>">
                </div>
                <div class="form-group col-md-5">
                    <label>Engels</label>
                    <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Engels" value="<?php echo (!isset($item['title_en']) ? "" : $item['title_en'])?>">
                </div>
            </div>

            <!-- Only show input fields when editing a product -->
            <?php if ($action === 'editProduct' || $action === 'newProduct') : ?>
        
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Beschrijving</label>
                <div class="form-group col-md-5">
                    <label>Nederlands</label>
                    <input type="text" class="form-control" name="description_nl" id="description_nl" placeholder="Nederlands" value="<?php echo (!isset($item['description_nl']) ? "" : $item['description_nl'])?>">
                </div>
                <div class="form-group col-md-5">
                    <label>Engels</label>
                    <input type="text" class="form-control" name="description_en" id="description_en" placeholder="English" value="<?php echo (!isset($item['description_en']) ? "" : $item['description_en'])?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Prijs</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">&euro;</span>
                    </div>
                    <input type="number" name="price" min="0" step="any" class="form-control" id="price" placeholder="Prijs" value="<?php echo (!isset($item['price']) ? "" : $item['price'])?>" required>
                </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="ACTIVATED" value="ACTIVATED" <?php echo isChecked('ACTIVATED') ?>>
                        <label class="form-check-label" for="ACTIVATED">
                            Geactiveerd <span class="badge badge-pill badge-success">Geactiveerd</span>
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="DEACTIVATED" value="DEACTIVATED" <?php echo isChecked('DEACTIVATED') ?>>
                        <label class="form-check-label" for="DEACTIVATED">
                            Uitgeschakeld <span class="badge badge-pill badge-danger">Uitgeschakeld</span>
                        </label>
                        </div>
                        <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="status" id="OUT_OF_STOCK" value="OUT_OF_STOCK" <?php echo isChecked('OUT_OF_STOCK') ?>>
                        <label class="form-check-label" for="OUT_OF_STOCK">
                            Niet op voorraad <span class="badge badge-pill badge-secondary">Niet op voorraad</span> 
                        </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Categorie</label>
                <div class="col-sm-10">
                    <select class="form-control" name="category" id="category" v>
                    <?php 
                    $categories = getAllCategories();
                    foreach ($categories as $category) {
                        echo '<option name='. $category['id']. ' value="' . $category['id'] .'">' . $category['title_nl'] . '</option>';
                    }

                    ?>
                    </select>
                </div>
            </div>
            <?php endif; ?>

            <!-- Always show save button -->
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="Opslaan & Publiceren">
                    <a href="./products.php" class="btn btn-secondary">Annuleren</a>
                </div>
            </div>

        </form>
    </div>
</main>

<script>
    feather.replace();
</script>

<?php
include_once('./include/footer.inc.php')
?>