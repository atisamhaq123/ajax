<?php
session_start();
ob_start();
require ("database.php");
if( $_POST ){
  
    $postid = $_POST['postID'];
    $username=$_SESSION['username'];
    $liked=$_POST["liked"];

    $sqlUser="SELECT id from users where username='$username'";
    $result=$mysqli->query($sqlUser);
    while ($row = $result -> fetch_row()) {
        $userid=$row[0];

    //get previous likes from likescount to update likescount OF A post
    $getLikes="SELECT counts from likescount where postid='$postid'";
    $result=$mysqli->query($getLikes);

    $likes=0;// just defining a variable. DON;T TAKE IT SERIOUSLY
    while ($row = $result -> fetch_row()) {
        $likes=$row[0];}
    //liked==0 means dislike operation and liked==1 means like operation
    //keep remember when disliking , ensure already likes for post is not zero. Otherwise 0-1 will make it -1 
    //which is not good
    //during dislike you must delete row from likepost table which contains only likedpost by a specific user
    
    if ($liked==0){$likes=$likes-1;
        $disSql="DELETE FROM likepost WHERE userid='$userid' and postid = '$postid' ";
        $mysqli->query($disSql);
    }
    else{$likes=$likes+1;
    //insert into likepost who liked and which post likes
    $sql="INSERT INTO likepost (postid,userID,username) VALUES('$postid','$userid','$username')";
    $mysqli->query($sql);
    }
    //update likes 
    $sqlLikes="UPDATE likescount SET counts = $likes WHERE postid = '$postid'";
    $mysqli->query($sqlLikes);
   // echo $postid; 
    }}
    ?>