<?php
require($_SERVER['DOCUMENT_ROOT'] . '/Seedra/config/db.php');

if(!empty($_GET)) {

    $sql = 'DELETE FROM pro WHERE id = ' . $_GET['id'];

         if (mysqli_query($conn, $sql)) {
             header("Location: /Seedra/admin/products.php");
         } else {
             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
        mysqli_close($conn);
}
?>

