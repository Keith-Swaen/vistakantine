<?php 


if (file_exists('../../database/database.php')) {
    require_once ('../../database/database.php');
} else {
    require_once ('../database/database.php');
}


$pdo = dbconnection();

function getAllCategories() {
    global $pdo;
    
    $getCategories = $pdo->prepare('SELECT * FROM tb_categories ORDER BY id ASC');
    $getCategories->execute();
    $categories = $getCategories->fetchAll();

    return $categories;
}

function getAllProducts() {
    global $pdo;
    
    $getProducts = $pdo->prepare('SELECT * FROM tb_menuitems ORDER BY id ASC');
    $getProducts->execute();
    $products = $getProducts->fetchAll();
    return $products;
}

function getProductsByCategory($category) {
    global $pdo;
    
    $getProducts = $pdo->prepare('SELECT * FROM `tb_menuitems` where category=' . ((int)$category));
    $getProducts->execute();
    return $getProducts->fetchAll();
}

function getCategoryById($id) {
    global $pdo;
    
    $getCategories = $pdo->prepare('SELECT * FROM `tb_categories` where id=' . $id);
    $getCategories->execute();
    $categories = $getCategories->fetchAll();
    if ($categories) {
        foreach ($categories as $category) {
            if ($category['id'] == $id) {
                return $category;
            }
        }
    }
    return null;
}

function getProduct($id) {
    global $pdo;
    
    $getProducts = $pdo->prepare('SELECT * FROM `tb_menuitems` where id=' . $id);
    $getProducts->execute();
    $products = $getProducts->fetchAll();
    if ($products) {
        foreach ($products as $product) {
            if ($product['id'] == $id) {
                return $product;
            }
        }
    }
    return null;
}

function checked() {
    echo 'checked';
}

function getStatus($status) {
    switch ($status) {
        case 'ACTIVATED':
            return '<span class="badge badge-pill badge-success">Geactiveerd</span>';
        default:
        case 'DEACTIVATED':
            return '<span class="badge badge-pill badge-danger">Uitgeschakeld</span>';
        case 'OUT_OF_STOCK':
            return '<span class="badge badge-pill badge-secondary">Niet op voorraad</span>';
    }
}

function getCategory($product) {
    global $pdo;

    $getCategories = $pdo->prepare('SELECT * FROM `tb_categories` where id=' . $product['category']);
    $getCategories->execute();
    $categories = $getCategories->fetchAll();

    //Return the first category with id of the product
    return $categories[0]['title_nl'];

}

?>