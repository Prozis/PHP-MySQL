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
    require_once '/core/functions.php';
    /* Подключение к серверу MySQL */
    $link = connect();
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
         mysqli_close($link);
        ?>

  </body>
</html>
