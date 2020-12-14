<?php 

require_once ('./database.php');

$pdo = dbconnection();
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../../index.php");
    return;
} else {

    $id = (isset($_GET['categoryId']) ? $_GET['categoryId'] : $_GET['productId']);
    $isDelete = (isset($_GET['delete']));
    $table = (isset($_GET['categoryId']) ? 'tb_categories' : 'tb_menuitems');

    if ($id === "-1") {
        //item is new insert
        $titlenl = $_POST['title_nl'];
        $titleen = $_POST['title_en'];
        if ($table === "tb_categories") {
            $insert = $pdo->prepare("INSERT INTO " . $table ." (id, title_nl, title_en)
            VALUES (NULL, '" . $titlenl ."', '" . $titleen ."')");
            $insert->execute();
            header("Location: ../pages/admin/categories.php");
        } else if ($table === "tb_menuitems") {
            $description_nl = $_POST['description_nl'];
            $description_en = $_POST['description_en'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            $category = $_POST['category'];

            $insert = $pdo->prepare("INSERT INTO " . $table ." (id, title_nl, title_en, description_nl, description_en, price, status, category)
            VALUES (NULL, '" . (string)$titlenl ."', '" . (string)$titleen ."', '" .$description_nl ."', '" .$description_en ."', '" . ($price) ."', '" . $status ."', '" . ((int)$category) ."')");
            $insert->execute();
            header("Location: ../pages/admin/products.php");
        }
    } else if ($isDelete) {
        if ($table === "tb_categories") {
            $delete = $pdo->prepare("DELETE FROM tb_categories WHERE id = " . (int)$id);
            $delete->execute();

            $delete = $pdo->prepare("DELETE FROM tb_menuitems WHERE category = " . (int)$id);
            $delete->execute();

            echo 'deleted ' . $id;
            header("Location: ../pages/admin/categories.php");
        } else if ($table === "tb_menuitems") {
            $delete = $pdo->prepare("DELETE FROM tb_menuitems WHERE id = " . (int)$id);
            $delete->execute();
            header("Location: ../pages/admin/products.php");
        }
    } else {
        //item has been updated
        $titlenl = $_POST['title_nl'];
        $titleen = $_POST['title_en'];
    
        if ($table === "tb_categories") {
            $update = $pdo->prepare("UPDATE " . $table . " set title_nl = '$titlenl', title_en = '$titleen' WHERE id = " . $id);
            $update->execute();
            header("Location: ../pages/admin/categories.php");
        } else if ($table === "tb_menuitems") {
            $description_nl = $_POST['description_nl'];
            $description_en = $_POST['description_en'];
            $price = round($_POST['price'], 2);
            $status = $_POST['status'];
            $category = $_POST['category'];

            $update = $pdo->prepare("UPDATE " . $table ." set title_nl = '$titlenl', title_en = '$titleen', description_nl = '$description_nl', description_en = '$description_en', price = '$price', status = '$status', category = '$category' WHERE id = " . $id);
            $update->execute();
            header("Location: ../pages/admin/products.php");
        }

    }
}

?>