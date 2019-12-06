<?php
require_once 'functions.php';
/* Подключение к серверу MySQL */
$link = connect();
$del_id = $_GET['id'];
$query_del = "DELETE FROM users WHERE id = '$del_id'";
    mysqli_query($link, $query_del);
header('Location: /');
?>
