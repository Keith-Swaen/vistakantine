<?php 

session_start();
 
require_once '../database/database.php';
$pdo = dbconnection();

if(isset($_SESSION['user_id']) || isset($_SESSION['logged_in'])) {
    //User logged in
    header('Location: ./admin/products.php');
    exit;
}

//Login butten pressed
if(isset($_POST['login'])) {
    
    //Input field from user
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    //Get user from database
    $sql = 'SELECT id, username, password FROM users WHERE username = :username';
    $stmt = $pdo->prepare($sql);
    
    //Execute sql
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //User does not exists
    if($user === false) {
        $_SESSION['error'] = 'Incorrect username or password.';
    } else {
        //User found, check password
        $validPassword = password_verify($passwordAttempt, $user['password']);

        //Check if password is correct
        if($validPassword) {            
            //Provide the user with a login session.
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = time();
            
            //Redirect to our protected page, which we called home.php
            header('Location: ./admin/products.php');
            exit;
            
        } else {
            //$validPassword was FALSE. Passwords do not match.
            $_SESSION['error'] = 'Incorrect username or password.';
        }
    }
    
}
 
?>

<?php  include_once('../include/header.inc.php'); ?>

<div class="login__container">
    <div class="login__info">
        <h1>Vista Kantine</h1>
        <h2>Inloggen</h2>
    </div>
    <div class="login__form">
        <?php
            if(isset($_SESSION['error'])){
                $error = $_SESSION['error']; 
                echo "<span class='error'>" . $error . "</span>";
            }
        ?> 
        <form action="login.php" method="post">
            <input type="text" id="username" name="username" placeholder="Username"><br>
            <input type="password" id="password" name="password" placeholder="Password"><br>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</div>

<?php unset($_SESSION['error']); ?>

<?php  include_once('../include/footer.inc.php'); ?>