<?php 
    if (!empty($_COOKIE['sid'])) {session_id($_COOKIE['sid']);}
    session_start();
    require_once 'classes/Auth.class.php';
    require_once 'stayt.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Регистрация на сайте</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <li class="logo"><a href="index.html">
                            Читаем<span>Вместе</span></a></li>
                        <li class="logo__logo"><a href="index.html">
                            Электронная библиотека</a></li>
                    </ul>
                </div>
                <div class = "header__aut">
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
                    <a href=""> Регистрация </a>
                    <ul><li>Здраствуйте Читатель!</li></ul>
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
<!-- Для авторизованных -->
<?php if (Auth\User::isAuthorized()): ?>
<?php header('Refresh: 0; url=https://33knigi.csirk.ru');?>

<!-- Для НЕ авторизованных -->
<?php else: ?>
<div class="container">
    <div class="reg__inner">
    <form class="form-signinn ajax" method="post" action="ajax.php">
        <p class="ogl">Регистрация</p>
            <ul class="reg">
                <li><div class="main-error alert alert-error hide" style='position: relative; font-size: 20px; padding-left: 20px;'> </div></li>
                <li><input name="username" type="text" class="input-block-level" placeholder="Ваш E-mail" autofocus></li>
                <li><input name="names" type="text" class="input-block-level" placeholder="Ваше имя"></li>
                <li><input name="password1" type="password" class="input-block-level" placeholder="Пароль"></li>
                <li><input name="password2" type="password" class="input-block-level" placeholder="Повтор пароля"></li>
                <li><input type="hidden" name="act" value="register"></li>
                <li><input type="hidden" name="ips" value="<?php echo $_SERVER['REMOTE_ADDR'];?>"></li>
                <li><input type="hidden" name="vremya" value="<?php echo $vremya=date('d-m-Y');?>"></li>
                <li class="bottom"><input id="regsubmit" type="submit" value="Регистрация"></li>
            </ul>
    </form>
    </div>
</div>

<!-- Конец условия -->
<?php endif; ?>


</div></div>
<footer>
        <div class = "container">
            <div class="footer-distributed">
                <div class="footer-right">
                    <a href="https://vk.com/public213478821" style="background-image: url('/icons/VK-Icon_icon-icons.com_52860.png'); "></a>
                    <a href="https://github.com/DaniilKalabkin/WebSite" style="background-image: url('/icons/github_git_hub_logo_icon_132878.png');"></a>
                </div>
            <div class="footer-left">
                <p class="footer-links">
                    <a class="link-1" href="index.html">Главная страница</a>
                    <a href="index_info.html">Информация о сайте</a>
                    <a href="index_kontakt.html">Контакты</a>
                </p>
            <p>КИТП &copy; 2022</p>
                </div>
            </div>
        </div>
    </footer>

<script src="jquery-2.0.3.min.js"></script><script src="ajax-form.js"></script>
</body>
</html>