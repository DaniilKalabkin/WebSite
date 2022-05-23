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
                        <li class="logo"><a href="">
                            Читаем<span>Вместе</span></a></li>
                        <li class="logo__logo"><a href="">
                            Электронная библиотека</a></li>
                    </ul>
                </div>
                <div class="header__poisk"></div>
            </div>
        </div>
    </header>
    <section class="section__menu">
        <div class="container">
            <div class="section__inner">
                <nav class="section__nav">
                    <ul>
                        <li><a href="index.php">Главная страница</a></li>
                        <li ><a href="index_genres.php">Жанры </a>
                        <li><a href="index_avtor.php">Авторы</a></li>
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
                        <ul class="Bottom">
                            <li ><a href="<?php echo $d['Silka_na_knigi']; ?>">Читать</a></li>
                            <li ><a href="<?php echo $d['Silka_na_knigi']; ?>" download>Скачать</a></li>
                        </ul>
                </div>
                <?php 
                endforeach;
                ?>
                <span class = "Waring"><?php if($info == $info[0])
                          echo "Ничего не найдено!"  ; ?></span>
            </div>
        </div>
    </section>
    <footer>
    <div class = "container">
        <div class="footer-distributed">
            <div class="footer-right">
            <a href="https://vk.com/public213478821" style="background-image: url('/icons/VK-Icon_icon-icons.com_52860.png'); "></a>
            <a href="#" style="background-image: url('/icons/github_git_hub_logo_icon_132878.png');"></a>
            </div>
        <div class="footer-left">
            <p class="footer-links">
                <a class="link-1" href="index.php">Главная страница</a>
                <a href="index_info.html">Информация о сайте</a>
                <a href="index_kontakt.html">Контакты</a>
            </p>
        <p>КИТП &copy; 2022</p>
            </div>
        </div>
    </div>
</footer>
        </body>
</html>
