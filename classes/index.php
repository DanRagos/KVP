<?php
include 'usersview.class.php';
include 'userscontr.class.php';
?>
<!DOCTYPE html>
<html>
<body>
    <?php
    $usersObj = new UsersView ();
    $usersObj->showUsers("David Daniel");
    $usersObj2 = new UsersContr();
    $usersObj2->createUser("Jane", "Doe", "jdo", 1, "Staff")
    ?>
</body>

</html>