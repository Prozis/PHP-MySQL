<?php
require_once '/core/functions.php';
/* Подключение к серверу MySQL */
$link = connect();
/* Посылаем запрос серверу и создаем куки*/
$query = 'SELECT * FROM users WHERE id=3';
if ($result = mysqli_query($link, $query)) {
  $row = mysqli_fetch_assoc($result);
setcookie("row", json_encode($row), time() + 60); //Создаем куку
}
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <title></title>
  </head>
  <body>

    <?php
    require_once 'header.php';
    /* Посылаем запрос серверу */
    $query = 'SELECT * FROM users WHERE id=1';
    if ($result = mysqli_query($link, $query)) {
      while( $row = mysqli_fetch_assoc($result) ){
    echo "<pre>";
      echo var_dump($row);
      echo "</pre>";
      }
      /* Освобождаем используемую память */
      mysqli_free_result($result);
    }


       /* Посылаем запрос серверу */
       $query = 'SELECT * FROM users WHERE id=2';
       if ($result = mysqli_query($link, $query)) {
         while( $row = mysqli_fetch_assoc($result) ){
       echo "<pre>";
         echo var_dump($row);
         echo "</pre>";

         }
         /* Освобождаем используемую память */
         mysqli_free_result($result);
       }
    $from_cookie = json_decode($_COOKIE['row']);
print_r($from_cookie);

         mysqli_close($link);
        ?>

  </body>
</html>
