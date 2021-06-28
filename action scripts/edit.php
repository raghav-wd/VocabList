<?php
    include_once "../includes/config.php";

    $word = $_POST['word'];
    $elaboration = $_POST['elaboration'];
    $category = (isset($_POST['category']))?$_POST['category']:"w";
    if($_POST['id'] == "")
    {
        $sql = "INSERT INTO data (`word`, `elaboration`, `category`) VALUES('$word', '$elaboration', '$category')";
    }
    else {
        $id = $_POST['id'];
        $sql = "UPDATE data SET word='$word', elaboration='$elaboration', category='$category' WHERE id='$id'";
    }

    mysqli_query($conn, $sql);
    header("Location: ../index.php");
?>