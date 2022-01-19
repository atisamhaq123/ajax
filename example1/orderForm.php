<?php
session_start();
ob_start();
require ("db.php");
if( $_POST ){
  
    //$postid = $_POST['postID'];
   

   // $sqlUser="SELECT id from users where username='$username'";
   // $result=$mysqli->query($sqlUser);
    //while ($row = $result -> fetch_row()) {
      //  $userid=$row[0];
    //}}
    echo $_POST['postID'];
   
}
    ?>