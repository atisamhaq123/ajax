<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" href="style1.css">
<title>Timeline</title>
</head>
    <?php ob_start(); session_start();include 'database.php'?>

<body>
    <b><a href="logout.php">logout</a></b>
    <div style='text-align:center'><img style='width:8%;height:15%' src='https://www.freepnglogos.com/uploads/facebook-messenger-png/communication-facebook-media-messenger-network-social-1.png'></div>
 
    <div style="margin-top:1%;text-align: center">
    <form method="post" action="add_post.php">
How's u doing? <input style="width: 24%;height:6%" type="text" id='field1' name="str1" value=""><br/>
<input style="margin-top:1%;width: 10%;height:5%" type="submit" value="Tweet Now" name="Submit1"><br/><br/>


<table class="maintable"><tr><th>image</th><th>username </th><th> text</th><th>reactions</th></tr>
<?php
$sql = "SELECT posts.username,posts.text,users.image,posts.id FROM posts
LEFT JOIN users ON posts.username = users.username order by date DESC";
if ($result = $mysqli -> query($sql)) {
    while ($row = $result -> fetch_row()) {
        addInTable($row[2],$row[0],$row[1],$row[3]);}
    $result -> free_result();}
function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
function addInTable($z,$x,$y,$id){
    require ("database.php");
    $currentUser=$_SESSION["username"];
    $postLikedSql="SELECT EXISTS(SELECT * FROM likepost WHERE username='$currentUser' and postid='$id')";
    $result=$mysqli->query($postLikedSql);
    while ($row = $result -> fetch_row()) {
        $resultLiked=$row[0];}
    if ($resultLiked==1){$btnColor='rgb(144, 238, 144)';}else{$btnColor='rgb(242, 241, 239)';}
    echo "<tr><td><img src='profile_image/$z' style='width:50px;height:50px;border-radius: 70%'></td><td >".$x."</td><td><table><tr><div class='posts' id='$id' >".$y."</td></div></tr><tr><td><table id='comment-$id'></table></td></tr></table><td><form method='post' class='like-form' id='$id' autocomplete='off'><button id='$id-b' style='background-color:$btnColor' class='like'>Like</button></form></tr>";}
if(isset($_POST["Submit1"]) &&$_POST['str1']!='')
{
$text=$_POST["str1"];
if ($text!=null){
$user=$_SESSION['username'];
$str=generateRandomString();
$sql = "INSERT INTO posts(username,text,randomString)";
$sql .= " VALUES ('$user','$text','$str')";


if ($mysqli->query($sql) === TRUE) {
    //echo "New record created successfully";
    $sql2="Select id from posts where username='$user' and randomString='$str' and text='$text'";
    if ($result = $mysqli -> query($sql2)) {
        while ($row = $result -> fetch_row()) {
            $postid=$row[0];
            $sql3 = "INSERT INTO likescount(postid,counts)";
            $sql3 .= " VALUES ('$postid',0)";
            $mysqli->query($sql3);
            $sql4 = "INSERT INTO commentcounts(postid,counts)";
            $sql4 .= " VALUES ('$postid',0)";
            $mysqli->query($sql4);
       } $result -> free_result();}
    header('Location: redirect.php');}}}
?></table>
</form></div>


<form method="POST" action="" enctype="multipart/form-data"><input type="file" name="uploadfile" value="" /><div><button type="submit" name="upload">UPLOAD</button></div></form>

<?php 
if (isset($_POST['upload'])) {
  $nameOfFile = $_FILES["uploadfile"]["name"];
      $folder = "profile_image/".$nameOfFile;
      $email=$_SESSION['email'];
      $sql="UPDATE users SET image = '$nameOfFile' WHERE email = '$email'";
      //$sql = "INSERT INTO users(username,PASSWORDS,email,image)";
      //$sql .= " VALUES ('dataaa','daaata','dataaa','$nameOfFile')";    
      if ($mysqli->query($sql) === TRUE) {} 
  } 
  require ("like_post.php");    
?>    
</body>



<button onclick='myFunction()'>check</button>
<div id="output" class='hidden'></div>
<script>
   
   $(".posts").click(function (){$posid=$(this).attr("id");
    $.ajax({
    url: 'showCOMMENT.php',
    type: 'POST',
    data: "&postID="+$posid, // it will serialize the form data
    dataType: 'html'
    })
    .done(function(data){   
        //changing button color 
        $("#output").html(data);
    })
    .fail(function(){
    alert('Ajax Submit Failed ...'); 
    });


});
   
        
  

</script>
</html>