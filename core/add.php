<?php

require_once 'functions.php';
$link = connect();
// Получаем данные из формы
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];

if($_POST['name'] != ''){
  /* Добавляем данные из формы в базу данных */
  $query_insert = "INSERT INTO users (name, age, email) VALUES ('$name', '$age', '$email')";
  if (!mysqli_query($link, $query_insert)) {
    echo "Error: " . mysqli_error($link);
  }
    // создаем cookie

}
setcookie("d22", "yes", time() + 5, "/");
//print_r($_COOKIE);
header('Location: /');
?>
