<?php
/*CREATE DATABASE 'info';
USE 'info';
CREATE TABLE 'guestbook'(
    'text' text,
    'name' varchar(50)
);
INSERT INTO 'guestbook' VALUES ('Привет', 'test');
INSERT INTO 'guestbook' VALUES ('Hi', 'Vasya');*/
$host='localhost';
$logname='root';
$password='1234';
$database='info1';
//Соединение с MySQL
$link=mysqli_connect($host, $logname, $password)
or die ("Не могу соединиться с MYSQL");
//Выбор БД
mysqli_select_db ($link,$database)
or die ("Не могу выбрать базу данных");

//Добавление новой записи
if ((isset($_POST["txt"]))&&(isset($_POST["nik"]))) {
    $sql="INSERT INTO `guestbook` VALUES".
    $sql.="('".$_POST["txt"]."', '".$_POST["nik"]."');";
    $result = mysqli_query($link,$sql);
}
    // Выборка всех записей из таблицы
    $result = mysqli_query($link,"SELECT text, name FROM guestbook");
    //Отрисовка данных из таблицы
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
echo "<i>".$row["text"]."</i> <b>".$row["name"]."</b><br>";
    }
    mysqli_free_result($result);
    //Закрытие соединения с MYSQL
    mysqli_close($link);
    ?>
    <form method="POST" action=""><textarea rows="4" name="txt" cols="20"></textarea><br>
    <input type="text" name="nik" size="20"><br>
    <input type="submit" value="Отправить" >
    <input type="reset" value="Сброс" >
    </form>
    <A href="<?php echo $_SERVER['PHP_SELF'];?>">Обновить</a>


