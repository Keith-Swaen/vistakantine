<?php
include_once('./include/header.inc.php');

require_once ('../../database/database.php');
require_once ('../../database/actions.inc.php');

$pdo = dbconnection();

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <br />
    <h2 style="float: left;">Producten</h2>
    <a href="./edit.php?newProduct=1" style="float: right; border-radius: 0;" type="button" class="btn btn-primary">Product Toevoegen</a>
    <table class="table">
    <caption>Alle producten</caption>
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Naam</th>
        <th scope="col">Beschrijving</th>
        <th scope="col">Categorie</th>
        <th scope="col">Prijs</th>
        <th scope="col">Status</th>
        <th scope="col">Acties</th>
        </tr>
    </thead>
    <tbody>
    
<?php


function showProduct($product) {
    $productId = $product['id'];

    $productTitle = ($product['title_nl'] === $product['title_en'] ? $product['title_nl'] : ($product['title_nl'] . '<br />' . $product['title_en']));
    $productDescription = ($product['description_nl'] === $product['description_en'] ? $product['description_nl'] : ($product['description_nl'] . '<br />' . $product['description_en']));
    $productPrice =  number_format($product['price'], 2, ',', '');
    $productStatus = getStatus($product['status']);

    $category = getCategory($product);

    $value = <<<HTML
        <tr>
            <th scope="row">$productId</th>
            <td>$productTitle</td>
            <td>$productDescription</td>
            <td>$category</td>
            <td>&euro; $productPrice</td>
            <td>$productStatus</td>
            <td>
            <a href="./edit.php?editProduct=1&productId=$productId" class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><span data-feather="edit"></a>
            <a href="../../database/update.inc.php?productId=$productId&delete=true" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><span data-feather="trash-2"></a>
            </td>
        </tr>
    HTML;

    return $value;
}

$products = getAllProducts();
if ($products) {
    foreach ($products as $product) {
        echo showProduct($product);
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