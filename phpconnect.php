<?php
    $servername = "localhost";
    $username = "db_schulprj_user";
    $password = "20fj%iQ7";
    $database = "DB_SchulPrj";

    try{
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        $error_log = fopen("/log.txt", "w") or die("Unable to open file!");
        $error = $e->getMessage();
        $error = "phpconnect.php: ".$error;
        fwrite($error_log, $error);
        fclose($error_log);
    }
?>
