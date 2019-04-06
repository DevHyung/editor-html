<?php
require_once("./dbconfig.php");
if (!isset($_SESSION)) {
    session_start();
}
$title = $_POST['title'];
$content = $_POST['content'];
$idx = $_POST["idx"];

$table_name = "post";
$sql = "
    UPDATE `edit`.`post`
    SET
    `title` = '$title',
    `content` = '$content',
    `createDateTime` = NOW()
    WHERE `idx` = '$idx'
";
if ($result = mysqli_query($db, $sql)) {
    echo "<script>alert('등록되었습니다. ');</script>";
    //echo "<script>window.history.go(-2);</script>";
} else {
    echo mysqli_error($db);
}
mysqli_free_result($result);
mysqli_close($db);
?>