<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/style.css">
  <title>Главная страница</title>
</head>
<body>
  <?php
require_once 'header.php';
?>
  <div class="container">
    <div class="users_list">



    <h3>Список пользователей:</h3>

    <?php

    require_once 'functions.php';
    /* Подключение к серверу MySQL */
    $link = connect();
    /* Посылаем запрос серверу */
    $query = 'SELECT * FROM users';
    if ($result = mysqli_query($link, $query)) {

      /* Выборка результатов запроса */

      echo '<table border="1"> <tr id="title"><td>id</td><td>Имя</td><td>Возраст</td><td>E-mail</td><td></td></tr>';
      while( $row = mysqli_fetch_assoc($result) ){
        echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['age']."</td><td>".$row['email']."</td><td><a href='index.php?id=".$row['id']."'>Удалить</a></td></tr> ";
      }
      echo "</table>";

      /* Освобождаем используемую память */
      mysqli_free_result($result);
    }
    ?>

  </div>
  <div class="users_form">


    <form class="default_form" action="" method="post">
      <h3>Добавление пользователя:</h3>
        <label for="name">Имя</label>
        <input type="text" name="name" ><br>
        <label for="age">Возраст</label>
        <input type="text" name="age" ><br>
        <label for="email">E-mail</label>
        <input type="text" name="email" >
      <button type="submit" name="button_add">Добавить пользователя</button>
      </form>
      <?php
      // Получаем данные из форм
      $name = $_POST['name'];
      $age = $_POST['age'];
      $email = $_POST['email'];
      $del_id = $_POST['del_id'];
      //если нажата кнопка добавить
      if(isset($_POST['button_add'])){
        if($_POST['name'] != ''){
          /* Добавляем данные из формы в базу данных */
          $query_insert = "INSERT INTO users (name, age, email) VALUES ('$name', '$age', '$email')";
          if (mysqli_query($link, $query_insert)) {
            echo "Пользователь добавлен<br><br>";
          } else {
            echo "Error: " . mysqli_error($link);
          }
        }
      }
      ?>


    <form class="default_form" action="find.php" method="post">
      <h3>Поиск пользователя:</h3>
        <label for="name">Имя</label>
        <input type="text" name="name" ><br>

      <button type="submit" name="button_find">Поиск пользователя</button>
    </form>
  <?php
      //если нажата кнопка поиск
        //перенесено на отдельную страницу
      //если нажата кнопка удалить
      if(isset($_GET['id'])){
          $del_id = $_GET['id'];
          $query_del = "DELETE FROM users WHERE id = '$del_id'";
          mysqli_query($link, $query_del);
      }
      /* Закрываем соединение */
      mysqli_close($link);
      ?>
        </div>
    </div>
  </body>
  </html>
