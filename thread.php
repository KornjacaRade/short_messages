<?php include ("includes/home_header.php");?>



<?php


//print_r($_SESSION);

$user = new User($database); //$database is instance of Database class
$user->set_username($_SESSION['username']);
$user->set_friend($_GET['friend']);

$user->message_thread_for_user();

?>




<?php include ("includes/home_footer.php");?>





