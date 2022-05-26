<?php require_once "connect.php";?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Админка</title>
<link rel="stylesheet" href="index.css" media="screen">
</head>

<body>
<h1>Админ Панель</h1>
<p class="cent">Зарегистрированные аккаунты</p>

<form method="post">
    <input type="text" name="find" value="">
    <input type="submit" name="search" value="Поиск">
</form>
<br><br>
<?php 
if(isset($_POST['search'])){
  $search=trim($_POST['find']);
    $query = "SELECT * FROM `users` WHERE username LIKE '%$search%' ORDER by id DESC";
    $result = $mysqli->query($query);
    echo '<table class="one" border="1" cellpadding="4">';
    echo '<tr><th width="20px">ID</th><th width="160px">E-mail</th><th width="120px">Имя</th><th width="150px">IP адрес</th><th width="150px">Дата регистрации</th></tr>';
    while($row = $result->fetch_array()){
        echo '<tr><td><a href="?id=',$row['id'],'">',$row['id'],'</a></td><td>',$row['username'],'</td><td>',$row['names'],'</td><td>',$row['ips'],'</td><td>',$row['vremya'],'</td></tr>';
    }
    exit();
}

if(!empty($_GET['id'])){  
    $query="SELECT * FROM `users` WHERE id='$_GET[id]'";
    $result = $mysqli->query($query);
    $row = $result->fetch_array();
}

if(isset($_POST['edit'])){
    $query="UPDATE `users` SET username='$_POST[username]',names='$_POST[names]',ips='$_POST[ips]',vremya='$_POST[vremya]',password='$_POST[password]',salt='$_POST[salt]' WHERE id='$_POST[id]'";
    $result = $mysqli->query($query);
    unset($row);
}

if(isset($_POST['delete'])){
    $query="DELETE FROM `users` WHERE id='$_POST[id]'";
    $result = $mysqli->query($query);
    unset($row);
}

if(!empty($_GET['id'])){
    if(  (isset($_POST['edit']))  ||  (isset($_POST['delete']))  ){
        echo '';
    }else{
        echo '
            <form method="post"><table border="0">
            <tr><td>id: ' .$row['id']. '</td><td></td></tr>
            <tr><td><span>E-mail:</span><br /><input type="text" size="40" name="username" value="'.$row['username'].'"></td></tr>
            <tr><td><span>Имя пользователя:</span><br /><input type="text" size="40" name="names" value="'.$row['names'].'"></td></tr>
            <tr><td><span>IP адрес:</span><br /><input type="text" size="40" name="ips" value="'.$row['ips'].'"></td></tr>
            <tr><td><span>Дата регистрации:</span><br /><input type="text" size="40" name="vremya" value="'.$row['vremya'].'"></td></tr>
            <tr><td><span>Пароль:</span><br /><input type="text" size="40" name="password" value="'.$row['password'].'"></td></tr>
            <tr><td><span>Соль ( дополнение к паролю ):</span><br /><input type="text" size="40" name="salt" value="'.$row['salt'].'"></td></tr>
            <input type="hidden" name="id" value="'.$_GET['id'].'">
            <tr><td>';
        echo ' <input type="submit" name="edit" value="Сохранить">';
        echo ' <input type="submit" name="delete" value="Удалить">';
  
    }
}else{}

echo '</td></tr></table></form>';
?>


</body>
</html>