<?php
session_start();

if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
    //User not logged in
    header('Location: ./login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Vista Kantine · Dashboard</title>

    <!-- Styling Imports -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="./css/dashboard.css" rel="stylesheet">
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="icon" href="../../css/images/favicon.ico" type="image/png">
  </head>

  <body>
  
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#"><img src="../../css/images/logo.png" height="35px" alt="logo"></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" href="../../database/update.inc.php?logout=true">Sign out</a>
          </li>
        </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="sidebar-sticky pt-3">
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Algemeen</span>
            </h6>

            <ul class="nav flex-column">
  
              <li class="nav-item">
                <a class="nav-link" href="./products.php">
                  <span data-feather="shopping-cart"></span> Producten
              </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./categories.php">
                  <span data-feather="list"></span> Categorieën
                </a>
              </li>
            </ul>

        
          </div>
        </nav>

      <script>
        feather.replace();
      </script>