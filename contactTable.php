<?php 

session_start();
if (isset($_SESSION['alert-type']) && isset($_SESSION['alert-msg'])) {
    echo "<div class='alert alert-" . $_SESSION['alert-type'] . "'>" . $_SESSION['alert-msg'] . "</div>";
    unset($_SESSION['alert-type']);
    unset($_SESSION['alert-msg']);
}

?>

<?php require_once('./modules/head.php'); ?>
<body>
<header class="p-5"><h2>Contacts</h2></header>
<div class="row justify-content-center p-5">
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Home Address</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php  
            $dir = './contacts/';

            $a = scandir($dir,1);
            array_pop($a);
            array_pop($a);

            if (!empty($a)) {
                foreach ($a as $contact) {
                    $contactDir = $dir . $contact;
                    $contactArr = json_decode(file_get_contents($contactDir), true);
                    echo "<tr>";
                    echo "<td>" . $contactArr["firstName"] . "</td>";
                    echo "<td>" . $contactArr["lastName"] . "</td>";
                    echo "<td>" . $contactArr["email"] . "</td>";
                    echo "<td>" . $contactArr["telephone"] . "</td>";
                    echo "<td>" . $contactArr["address"] . "</td>";
                    echo "<td>" . $contactArr["gender"] . "</td>";
                    echo "<td>" . $contactArr["birthdate"] . "</td>";
                    echo "<td>
                        <a href='./modules/editContact.php?edit=" . $contact . "' class='btn btn-warning'>Edit</a>
                        <a href='./modules/deleteContact.php?delete=" . $contact . "' class='btn btn-danger'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td class='font-weight-bold'>No Contact available!</td></tr>";
            }
        ?>
    </table>

</div>

<a class='p-5' href="index.php" target="_self">Save new contact?..</a>
</body>