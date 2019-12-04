<?php

include_once "config.php";

$edit = $_POST['edit-user'];
$id = $_POST['id'];
$name = $_POST['name'];
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

if (isset($edit)) {

    if (empty($name) && strlen($name)>=4) {
        array_push($errors, "Name must have min 4 letters");
    }
    if (empty($email)) {
        array_push($errors, "Please enter correct email");
    }
    if (empty($password) && strlen($password)>=8) {
        array_push($errors, "Enter password with at least 8 symbols");
    }
    if (count($errors) == 0) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "UPDATE users SET name=':name', email=':email', password=':password'
                WHERE id=$id";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        $stmt->execute();

        // vytvorit user_acount.php stranku pre nastavenie pouzivatela !!!
        header("Location: ./user_account.php");
    }
}
