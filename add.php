<?php
$bantime = 30;
if (!(isset($_SESSION['ban']) && (($_SESSION['ban'] + $bantime) > time()))) {
    if ((isset($_POST["txt"])) && (isset($_POST["nik"]))) {
        if (($_POST["txt"] != "") && ($_POST["nik"] != "")) {
            if (!filter($_POST["txt"])) {
                $result = mysqli_query(
                    $link,
                    "INSERT INTO `guestbook` VALUES ('$_POST[txt]', '$_POST[nik]');"
                );
            } else {

                echo "<h1>Найдено нецензурное выражение</h1><br>";

                file_put_contents(
                    $logfile,
                    time() . " " . $_SERVER['REMOTE_ADDR'] . " " . $_POST["txt"] . "\n",
                    FILE_APPEND | LOCK_EX
                );

                $_SESSION['ban'] = time();
            }
        } else {
            echo "<h1>Текст сообщения или подпись не заданы</h1><br>";
        }
    }
} else {
    $lefttime =  $_SESSION['ban'] + $bantime - time();
    echo "<h1>Вы забанены! Осталось $lefttime секунд</h1><br>";
}