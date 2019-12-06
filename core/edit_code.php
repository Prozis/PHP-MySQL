<?php
require_once 'functions.php';
$link = connect();
// Получаем данные из форм
$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];


    /* Добавляем данные из формы в базу данных */
    $query = "UPDATE  users SET name = '$name', age = '$age', email= '$email' WHERE id= $id";
    if (!mysqli_query($link, $query)) {
      echo "Error: " . mysqli_error($link);
    }
header('Location: /');
?>
