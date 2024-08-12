<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $email_subject = $_POST["email_subject"];
    $messager = $_POST["messager"];

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO contact_me (fullname, email, phone_number, email_subject, messager) VALUES ( ?, ?, ?, ?, ?);";

        $stmt = $pdo->prepare($query);

   
        

        $stmt->execute([$fullname, $email, $phone_number, $email_subject, $messager]);

        $pdo = null;
        $stmt = null;

        header("location: index.php");
        die();

    } catch (PDOException $e) {
        die('Query failed: ' . $e->getmessage());
    }
} else {
    header("Location: index.php");
}