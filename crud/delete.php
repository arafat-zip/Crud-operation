<?php
include 'connect.php';
if ( !empty($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM `crudoperation` WHERE id= $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $result_shifting = "UPDATE `crudoperation` SET `id` = `id` - 1 WHERE `id` > $id";
        $result = mysqli_query($conn, $result_shifting);
        if ($result) {
            header('location:crud/display.php');
        }
    } 
}