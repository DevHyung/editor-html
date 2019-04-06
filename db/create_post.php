<?php
require_once("./dbconfig.php");
if (!isset($_SESSION)) {
    session_start();
}
$id = $_SESSION['id'];
$title = $_POST['title'];
$writer = $_SESSION['auth'];
$content = $_POST['content'];

$table_name = "post";
$sql = "
    INSERT INTO $table_name (
        id,
        title,
        writer,
        content,
        createDateTime,
        isVerify
    ) VALUES (
        '$id',
        '$title',
        '$writer',
        '$content',
        NOW(),
        'n'
    )";
if ($result = mysqli_query($db, $sql)) {
    echo "<script>alert('등록되었습니다. ');</script>";
    echo "<script>window.location.replace('../page/post_list.php');</script>";
} else {
    echo mysqli_error($db);
}
mysqli_free_result($result);
mysqli_close($db);
?>