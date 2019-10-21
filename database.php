<?php 
   // using mysql_connect, we enter the following parameters 
    //server
    //user
    //pass
    //db name
    $db = mysqli_connect('localhost', 'root', 'root', 'reviewr');

    if(mysqli_connect_errno($db)){
        echo 'Database connection failed' . mysqli_connect_error();
    }else{
       //code here
    }

?>