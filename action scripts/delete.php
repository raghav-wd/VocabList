<?php
    include_once "../includes/config.php";

    if($_GET['id'] != "")
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM data WHERE id='$id'";
    }
    else {
        $sql = "UPDATE data SET word='$word', elaboration='$elaboration' WHERE id='$id'";
    }

    mysqli_query($conn, $sql);
    header("Location: ../index.php");
?>