<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/style.css">
  <title>Main</title>
</head>
<body>
  <div class="container">
    <div class="users_list">



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
      echo '<table border="1"> <tr id="title"><td>id</td><td>Имя</td><td>Возраст</td><td>E-mail</td><td></td></tr>';
      while( $row = mysqli_fetch_assoc($result) ){
        echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['age']."</td><td>".$row['email']."</td><td><a href=''>удалить</a></td></tr> ";
      }
      echo "</table>";

      /* Освобождаем используемую память */
      mysqli_free_result($result);
    }
    ?>
  </div>
  <div class="users_form">


    <form class="users_add" action="" method="post">
      <h3>Добавление пользователя:</h3>
        <label for="name">Имя</label>
        <input type="text" name="name" ><br>
        <label for="age">Возраст</label>
        <input type="text" name="age" ><br>
        <label for="email">E-mail</label>
        <input type="text" name="email" >
      <button type="submit" name="button_add">Добавить пользователя</button>

    </form>
    <form class="users_add" action="" method="post">
      <h3>Поиск пользователя:</h3>
        <label for="name">Имя</label>
        <input type="text" name="name" ><br>
        <label for="age">Возраст</label>
        <input type="text" name="age" ><br>
      <button type="submit" name="button_find">Поиск пользователя</button>
    </form>
    <?php
    if (!$link) {
      printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
      exit;
    }
    // Получаем данные из формы
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    //если нажата кнопка добавить
    if(isset($_POST['button_add'])){
      if($_POST['name'] != ''){
        /* Добавляем данные из формы в базу данных */
        $query_insert = "INSERT INTO users (name, age, email) VALUES ('$name', '$age', '$email')";
        if (mysqli_query($link, $query_insert)) {
          echo "Пользователь добавлен";
        } else {
          echo "Error: " . mysqli_error($link);
        }
      }
    } else if(isset($_POST['button_find'])){
      //если нажата кнопка поиск
        $query_find = "SELECT * FROM users WHERE name = '$name'";
        if ($result = mysqli_query($link, $query_find)) {

          /* ВЫводим результаты  поиска таблицей */
          echo '<h3>Результаты поиска:</h3>';
          echo '<table border="1"> <tr id="title"><td>id</td><td>Имя</td><td>Возраст</td><td>E-mail</td></tr>';
          while( $row = mysqli_fetch_assoc($result) ){

            echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['age']."</td><td>".$row['email']."</td></tr>";

          }
          echo "</table>";

          /* Освобождаем используемую память */
          mysqli_free_result($result);
        }
      }
      /* Закрываем соединение */
      mysqli_close($link);

      ?>
        </div>
    </div>
  </body>
  </html>
