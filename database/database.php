<?php

 function dbconnection() {
    $user = 'jesper';
    $passwd = 'PHCGxFrEi5lA3PkX3bcpbaLARO6Qd18BVRYFAKUXBPI4kDFbJp';
    $host = 'localhost';
    $db = 'vistakantine';

    /**
     * PDO options / configuration details.
     * I'm going to set the error mode to "Exceptions".
     * I'm also going to turn off emulated prepared statements.
     */

    $pdoOptions = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    );
    
    /**
     * Connect to MySQL and instantiate the PDO object.
     */
    $pdo = new PDO(
        "mysql:host=" . $host . ";dbname=" . $db,
        $user,
        $passwd,
        $pdoOptions
    );


    return $pdo;
}