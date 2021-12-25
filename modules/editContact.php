<?php
session_start();


if (isset($_GET["edit"])) {
    $editContact = $_GET["edit"];
    $editContactDir = "../contacts/" . $editContact;
    if (file_exists($editContactDir)) {
        $editContactArr = json_decode(file_get_contents($editContactDir), true);
        $_SESSION["firstName"] = $editContactArr["firstName"];
        $_SESSION["lastName"] = $editContactArr["lastName"];
        $_SESSION["telephone"] = $editContactArr["telephone"];
        $_SESSION["address"] = $editContactArr["address"];
        $_SESSION["email"] = $editContactArr["email"];
        $_SESSION["birthdate"] = $editContactArr["birthdate"];
        header('Location: ../index.php');
    } else {
        echo "Contact does not exists!";
    }
} else {
    return false;
}



?>