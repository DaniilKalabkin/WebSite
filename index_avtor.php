<?php
    if($_POST['submit'])
    $poisk =  $_POST['text'];  
    $pdo = new PDO("mysql:host=193.124.177.57;dbname=db526480", "u526480umgh", "lZGtq9KXFkmmwr2tkzTr");
    $info = [];
    $sql = 'SELECT * FROM Avtori
            Where(Avtor LIKE "%'.$poisk.'%")';
    $q = $pdo->query($sql);
    $info = $q->fetchAll(PDO::FETCH_ASSOC);
    //$info = array();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторы</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Caveat:wght@700&family=Lato:wght@400;700;900&family=Pacifico&family=Play&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__aut">
                    <ul>
                        <form action="" method="POST">
                            <input type="text" name="text">
                            <input type="submit" name="submit" value="Поиск" class = "Poisk">
                        </form>
                    </ul>
                </div>
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
                        <li><a href="index_genres.php">Жанры</a>
                        </li>
                        <li><a href="index_avtor.php">Авторы</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <section class="Knigi">
        <div class="container">
            <div class="Avtor__inner">
            <?php foreach($info as $d): ?>
                <div class="Avtor">
                    <ul class="Avtor_li">
                      <li><img src="<?php echo $d['silka_na_kartinku']; ?>"  width="209" height="250" alt=""></li>
                      <li>ФИО:<?php echo $d['Avtor']; ?></li>
                      <li>Дата рождения:<?php echo $d['Data_Rochd']; ?></li>
                      <li class="Avtor__Link"><a href="<?php echo $d['Ssilka_na_viki']; ?>">Биография автора(Википедия)</a></li>
                    </ul>
                </div>  
            <?php endforeach; ?> 
            <span class = "Waring"><?php if($info == $info[0])
                          echo "Ничего не найдено!"  ; ?></span>  
            </div>
        </div>
    </section>
    <section class = "Wrap">
        <div class= "container">
            <div class= "wrapper" >
                <button class = "wrapper_button">Показать ещё</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/js/wrapper__Avtor.js"></script>
</html>