<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <title>Main</title>
  </head>
  <body>
    <div class="container">


    <h3>Список пользователей:</h3>
      <?php
      require_once 'config.php';
          /* Подключение к серверу MySQL */
      $link = mysqli_connect(SERVER, USER, PASSWORD, DB_NAME);

      if (!$link) {
         printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
         exit;
      }
mysqli_set_charset($link, "utf8");
      /* Посылаем запрос серверу */
      $query = 'SELECT * FROM users';
      if ($result = mysqli_query($link, $query)) {

          /* Выборка результатов запроса */
    
          echo '<table border="1"> <tr id="title"><td>id</td><td>Имя</td><td>Возраст</td><td>E-mail</td></tr>';
          while( $row = mysqli_fetch_assoc($result) ){

          echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['age']."</td><td>".$row['email']."</td></tr>";

          }
          echo "</table>";

          /* Освобождаем используемую память */
          mysqli_free_result($result);
      }

      /* Закрываем соединение */
    //  mysqli_close($link);
      //echo "<pre>".print_r($db_content)."</pre>";

      ?>

  <form class="base_add" action="index.php" method="get">
      <p>
        <label for="name">Имя</label>
        <input type="text" name="name" ><br>
        <label for="age">Возраст</label>
        <input type="text" name="age" ><br>
        <label for="email">E-mail</label>
        <input type="text" name="email" >
      </p>
      <button type="submit" name="button">Добавить пользователя</button>
      <a href="#"></a>
    </form>
    <?php

    if (!$link) {
      printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
      exit;
    }
    // Получаем данные из формы
    $name = $_GET['name'];
    $age = $_GET['age'];
    $email = $_GET['email'];
    /* Добавляем данные из формы в базу данных */
    $query_insert = "INSERT INTO users (name, age, email)
    VALUES ('$name', '$age', '$email')";
    if (mysqli_query($link, $query_insert)) {
      echo "Пользователь добавлен";
    } else {
      echo "Error: " . mysqli_error($link);
    }

    /* Закрываем соединение */
    mysqli_close($link);

    ?>



    <!-- <div class="my_sql">

<?php

    /* Подключение к серверу MySQL */
$link = mysqli_connect(SERVER, USER, PASSWORD, DB_NAME);

if (!$link) {
   printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
   exit;
}

/* Посылаем запрос серверу */
$query = 'SELECT * FROM goods';
if ($result = mysqli_query($link, $query)) {

    print("Вывод содержимого:<br>");

    /* Выборка результатов запроса */
    $db_content = array();
    while( $row = mysqli_fetch_assoc($result) ){
      $db_content[] = $row;

    }

    /* Освобождаем используемую память */
    mysqli_free_result($result);
}

/* Закрываем соединение */
mysqli_close($link);
echo print_r($db_content);

?>
  </div> -->

  </div>
  </body>
</html>
