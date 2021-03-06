<?php include ("includes/home_header.php");?>



<?php


//print_r($_SESSION);

$user = new User($database); //$database is instance of Database class
//$user->set_username($_SESSION['username']);

$result_array = $user->messages_for_current_user('SELECT id,recipient,msg_text,time,read_msg FROM msg WHERE sender = ? ORDER BY time DESC', $user->username);
?>


<table class='table table-bordered mt-5'>
    <thead>
    <tr>
        <th class="text-center align-middle">Recipient</th>
        <th class="text-center align-middle">Message</th>
        <th class="text-center align-middle">Time</th>
        <th class="text-center align-middle">Delivery Report</th>
    </tr>
    </thead>

    <?php

    foreach ($result_array as $msg){

        ?>
        <tbody>
        <tr>
            <td class="text-center align-middle"><strong><a href='thread_from_sent.php?friend=<?php echo $msg->recipient; ?>'><?php echo $msg->recipient; ?></a></strong></td>
            <td><a href="message_from_sent.php?id=<?php echo $msg->id;?>" class="text-success"><?php echo (strlen($msg->msg_text) > 15) ? substr($msg->msg_text, 0, 15) . '...' : $msg->msg_text; ?></a></td>
            <td class="text-center align-middle"><?php echo $msg->time; ?></td>
            <td class="text-center align-middle"><?php echo $msg->read_msg==1?"delivered":"waiting for delivery";  ?></td>
        </tr>
        </tbody>

        <?php
    }
    ?>

</table>

<?php include("includes/home_footer.php"); ?>




