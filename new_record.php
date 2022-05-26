<?php
$mas = [];
$info2 = [];
$pd = new PDO("mysql:host=193.124.177.57;dbname=db526480", "u526480umgh", "lZGtq9KXFkmmwr2tkzTr");
$sq = 'SELECT Kniga,Genre,Avtor,Data_izd, izdanie,Vid_knigi,Silka_na_knigi,Kniga.Silka_na_Kartinku
FROM Kniga_Avtor 
inner join Kniga_Genres  ON Kniga_Avtor.id_Knigi = Kniga_Genres.id_Knigi 
inner join Kniga  ON Kniga.id_knigi = Kniga_Avtor.id_Knigi
inner join Genres_Knigi ON Genres_Knigi.id_genres = Kniga_Genres.id_Genres
inner join Avtori ON Avtori.id_Avtor = Kniga_Avtor.id_Avtor
inner join users_knigi ON users_knigi.id_knigi = Kniga.id_knigi
inner join users ON users.id = users_knigi.users
Where(users = '.$arr['id'].') & (users_knigi.id_knigi = '.$id.')';
$w = $pd->query($sq);
$mas = $w->fetchAll(PDO::FETCH_ASSOC);
$s ='SELECT Kniga,Genre,Avtor,Data_izd, izdanie,Vid_knigi,Silka_na_knigi,Kniga.Silka_na_Kartinku,users_knigi_prochit.id
FROM Kniga_Avtor 
inner join Kniga_Genres  ON Kniga_Avtor.id_Knigi = Kniga_Genres.id_Knigi 
inner join Kniga  ON Kniga.id_knigi = Kniga_Avtor.id_Knigi
inner join Genres_Knigi ON Genres_Knigi.id_genres = Kniga_Genres.id_Genres
inner join Avtori ON Avtori.id_Avtor = Kniga_Avtor.id_Avtor
inner join users_knigi_prochit ON users_knigi_prochit.id_knigi = Kniga.id_knigi
inner join users ON users.id = users_knigi_prochit.id
Where(users_knigi_prochit.id = '.$arr['id'].') & (users_knigi_prochit.id_knigi = '.$id.')'; 
$l = $pdo->query($s); 
$info2 = $l->fetchAll(PDO::FETCH_ASSOC);
if($info2 == null){             
if($mas == null){
$pd = new PDO("mysql:host=193.124.177.57;dbname=db526480", "u526480umgh", "lZGtq9KXFkmmwr2tkzTr");
$sq = 'INSERT INTO users_knigi VALUES('.$arr['id'].','.$id.')';
$w = $pd->query($sq);
echo "Книга успешно добавлена";
}
else{
    echo "Эта книга уже есть в вашем списке!";
}
}
else{
    echo "Вы уже прочитали эту книгу!";
}
?>