<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    if (isset($_POST['description'])) {
        $connect = new PDO("mysql:host=localhost;dbname=livecoding", "root", "");
        $stmt = $connect->prepare("insert into md(description) values(:description);");
        $stmt->execute(["description" =>$_POST['description']]);
        unset($_POST['description']);
    }
}
header('Location: index.php');