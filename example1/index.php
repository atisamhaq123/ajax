<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
?>
<html>
<b><a href="logout.php">logout</a></b>
<p>the page to redirected to after login</p>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $("form").on("submit", function(event){
        event.preventDefault();
 
        var formValues= $(this).serialize()+"&postID=3";
        var actionUrl = $(this).attr("action");
 
        $.post(actionUrl, formValues, function(data){
            // Display the returned data in browser
            $("#result").html(data);
        });
    });
});
</script>

</head>
<body>
    <form action="orderForm.php">
        <p>
            <label>Name:</label>
            <input type="text" name="name">
        </p>
        <p>
            <label>Gender:</label>
            <label><input type="radio" value="male" name="gender"> Male</label>
            <label><input type="radio" value="female" name="gender"> Female</label>
        </p>
        <p>
            <label>Hobbies:</label>
            <label><input type="checkbox" value="music" name="hobbies[]"> Music</label>
            <label><input type="checkbox" value="sports" name="hobbies[]"> Sports</label>
            <label><input type="checkbox" value="dance" name="hobbies[]"> Dance</label>
        </p>
        <p>
            <label>Favorite Color:</label>
            <select name="color">
                <option>Red</option>
                <option>Green</option>
                <option>Blue</option>
            </select>
        </p>
        <p>
            <label>Comment:</label>
            <textarea name="comment"></textarea>
        </p>
        <input type="submit" value="submit">
    </form>
    <div id="result"></div>
</body>
</html>