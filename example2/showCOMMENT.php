<?php
session_start();
ob_start();
require ("database.php");
if( $_POST ){
  
    $postid = $_POST['postID'];
  //  $sql="SELECT comment from commentpost where postid='$postid'";
   // $result=$mysqli->query($sql);
   
    
  //  $commentBundles='';
   // while ($row = $result -> fetch_row()) {
     //   $commentBundles=$commentBundles.($row[0])."|";
        //array_push($oommentArray,$comment);
    //}
    //echo '<script> document.getElementById("comment-'.$postid.'").append("'.$comment.'"); </script>';
    
    $sql="SELECT comment from commentpost where postid='$postid'";
    $result=$mysqli->query($sql);
   
   }
?>
<script> 
if ($('#output').attr("class")=='hidden'){
$('#comment-<?php echo $postid?>').append('<?php 
    while ($row = $result -> fetch_row()) {
        $comment=$row[0];
        echo "<tr><td>".$comment."</td></tr>";} ?>' );
}

else{
    $('#comment-<?php echo $postid?>').text('');
}
$('#output').toggleClass('shown hidden');


</script>

