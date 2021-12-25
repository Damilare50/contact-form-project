<?php
    session_start();
    if (!isset($_SESSION["firstName"])) {
        $_SESSION["firstName"] = "";
        $_SESSION["lastName"] = "";
        $_SESSION["telephone"] = "";
        $_SESSION["address"] = "";
        $_SESSION["email"] = "";
        $_SESSION["birthdate"] = "";
    }

    if (isset($_SESSION['alert-type']) && isset($_SESSION['alert-msg'])) {
        echo "<div class='alert alert-" . $_SESSION['alert-type'] . "'>" . $_SESSION['alert-msg'] . "</div>";
        unset($_SESSION['alert-type']);
        unset($_SESSION['alert-msg']);
    }
?>

<?php require_once('./modules/head.php'); ?>
<body>
    
    <?php 
        require_once './modules/Contact.php';
        $contact = new Contact();
    ?>




    <?php
        require_once './modules/form.php';
    ?>

    <script src="./js/script.js"></script>
</body>
</html>