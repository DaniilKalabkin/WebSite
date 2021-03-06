<?php
ob_end_clean();
 $pdo = new PDO("mysql:host=193.124.177.57;dbname=db526480", "u526480umgh", "lZGtq9KXFkmmwr2tkzTr");
 $info = [];      
 $sql = 'SELECT Kniga,Genre,Avtor,Data_izd, izdanie,Vid_knigi,Silka_na_knigi,Kniga.Silka_na_Kartinku
 FROM Kniga_Avtor 
 inner join Kniga_Genres  ON Kniga_Avtor.id_Knigi = Kniga_Genres.id_Knigi 
 inner join Kniga  ON Kniga.id_knigi = Kniga_Avtor.id_Knigi
 inner join Genres_Knigi ON Genres_Knigi.id_genres = Kniga_Genres.id_Genres
 inner join Avtori ON Avtori.id_Avtor = Kniga_Avtor.id_Avtor
  Where(Genre LIKE "%'.$sortir.'%")';
 $q = $pdo->query($sql);
 $info = $q->fetchAll(PDO::FETCH_ASSOC); 
 if (!empty($_COOKIE['sid'])) {session_id($_COOKIE['sid']);}
    session_start();
    require_once 'classes/Auth.class.php';
    require_once 'stayt.php';
                        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $sortir; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Caveat:wght@700&family=Lato:wght@400;700;900&family=Pacifico&family=Play&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo">
                    <ul>
                        <li class="logo"><a href="index.html">
                            Читаем<span>Вместе</span></a></li>
                        <li class="logo__logo"><a href="index.html">
                            Электронная библиотека</a></li>
                    </ul>
                </div>
                <div class = "header__aut">
                <?php if (Auth\User::isAuthorized()): ?>
                    <p class="privet">Привет, <?php echo "<span class='name'>".$arr['names']."</span>!";?></p>
                    <form novalidate="novalidate" class="form-signin-2 ajax" method="post" action="ajax.php">
                        <input type="hidden" name="act" value="logout">
                        <input type="submit" class="vyxod" value="Выйти" />
                    </form>
                <?php else: ?>
                    <a href="" class = "header__autt"> Вход</a>
                    <form class="form-signin ajax" method="post" action="ajax.php">
                    <p class="ogl">Авторизация</p>
                    <div class="main-error alert alert-error hide"></div>
                    <span class="testex">Введите E-mail</span><br />
                    <input name="username" type="text" class="input-block-level"><br />
                    <span class="testex">Введите пароль</span><br />
                    <input name="password" type="password" class="input-block-level"><br />
                    <input type="checkbox" name="remember-me" style="display:none" checked>
                    <input type="hidden" name="act" value="login">
                    <input type="submit" class="button"  value="Войти">
                    </form>
                    <a href="registr.php"> Регистрация </a>
                    <ul><li>Здраствуйте Читатель!</li></ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <section class="section__menu">
        <div class="container">
            <div class="section__inner">
                <nav class="section__nav">
                    <ul>
                        <li><a href="index.html">Главная страница</a></li>
                        <li ><a href="index_genres.php">Жанры </a>
                        <li><a href="index_avtor.php">Авторы</a></li>
                        <?php if (Auth\User::isAuthorized()): ?>
                        <li><a href="users_kab.html">Личный кабинет</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <section class="Knigi">
        <div class="container">
            <div class="knigi__inner">
                <?php  foreach($info as $d): ?>
                <div class="kniga">
                    <ul class="knigaa">
                        <li> <img src="<?php echo $d['Silka_na_Kartinku']; ?>" width="209" height="337" alt=""> </li>
                        <li>Название книги:<?php echo $d['Kniga']; ?></li>
                        <li>Автор: <?php echo $d['Avtor']; ?></li>
                        <li>Жанры:<?php echo $d['Genre']; ?></li>
                        <li>Год издания:<?php echo $d['Data_izd']; ?></li>
                        <li>Издание:<?php echo $d['izdanie']; ?> </li>
                        <?php if (Auth\User::isAuthorized()): ?>
                        <li> <form action="" method="POST"><input  name="<?php $m++; $m++; echo $m; ?>" type="submit" value="Добавить книгу"/> </form></li>
                        <?php endif; ?>
                        <ul class="Bottom">
                            <li ><a href="<?php echo $d['Silka_na_knigi']; ?>">Читать</a></li>
                            <li ><a href="<?php echo $d['Silka_na_knigi']; ?>" download>Скачать</a></li>
                        </ul>
                        <?php 
                            if (isset($POST[$m]))  
                                {
                                        $id = $d['id_knigi'];
                                        include  "new_record.php";
                        };?>
                </div>
                <?php 
                endforeach;
                ?>
                <span class = "Waring"><?php if($info == $info[0])
                          echo "Ничего не найдено!"  ; ?></span>
            </div>
        </div>
    </section>
        </body>
</html>
