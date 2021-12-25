<?php 
session_start();

if (isset($_GET["delete"])) {
    $deleteContact = $_GET["delete"];
    $deleteContactDir = "../contacts/" . $deleteContact;
    if (file_exists($deleteContactDir)) {
        unlink($deleteContactDir);
        header('Location: ../contactTable.php');
        $_SESSION["alert-type"] = 'danger';
        $_SESSION["alert-msg"] = "Contact deleted successfully!";
    }
}





?>