<?php
include_once('./include/header.inc.php');

require_once ('../../database/database.php');
require_once ('../../database/actions.inc.php');

$pdo = dbconnection();

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <br />
    <h2 style="float: left;">Categorieën</h2>
    <a href="./edit.php?newCategory=1" style="float: right; border-radius: 0;" type="button" class="btn btn-primary">Categorie Toevoegen</a>
    <table class="table">
    <caption>Alle categorieën</caption>
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Naam</th>
        <th scope="col">Naam (Engels)</th>
        <th scope="col">Aantal Producten</th>
        <th scope="col">Acties</th>
        </tr>
    </thead>
    <tbody>
    
<?php


function showCategory($category) {
    $categoryId = $category['id'];

    $productTitleNL = $category['title_nl'];
    $productTitleEN = $category['title_en'];

    $productsAmount = count(getProductsByCategory($categoryId));
    $value = <<<HTML
        <tr>
            <th scope="row">$categoryId</th>
            <td>$productTitleNL</td>
            <td>$productTitleEN</td>
            <td>$productsAmount</td>
            <td>
            <a href="./edit.php?editCategory=1&categoryId=$categoryId" class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><span data-feather="edit"></a>
            <a href="../../database/update.inc.php?categoryId=$categoryId&delete=true" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><span data-feather="trash-2"></a>
        </td>
        </tr>
    HTML;

    return $value;
}

$categories = getAllCategories();
if ($categories) {
    foreach ($categories as $category) {
        echo showCategory($category);
    }
}

?>

    </tbody>
    </table>
</main>



<script>
    feather.replace();
</script>

<?php
include_once('./include/footer.inc.php')
?>