<?php
require_once 'config.php';
/* Подключение к серверу MySQL */
function connect(){
$link = mysqli_connect(SERVER, USER, PASSWORD, DB_NAME);
if (!$link) {
  printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
  exit;
}
mysqli_set_charset($link, "utf8");
return $link;
};

 ?>
