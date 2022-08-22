<?php
    session_start();
    include 'config.php';

    $vid = $_GET['id'];
    $selectImg = "SELECT Image FROM table_vegetable WHERE Vegetable_id = '$vid' ";
    $imagequery = mysqli_query($conn, $selectImg);

    $image = mysqli_fetch_assoc($imagequery);

    // print_r($image['Image']);

    $deleteQuery = "DELETE FROM table_vegetable WHERE Vegetable_id = '$vid' ";

    $operation = mysqli_query($conn, $deleteQuery);

    if($operation){
        unlink($image['Image']);
        $_SESSION['status'] = " Product Delete Successfully.";
        header("location:store.php");
    }   

?>