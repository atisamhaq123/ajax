<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>


<div id="form-content">
     <form method="post" id="reg-form" autocomplete="off">
   
 <div class="form-group">
 <input type="text" class="form-control" name="txt_fname" id="lname" placeholder="First Name" required />
 </div>
    
 <div class="form-group">
 <input type="text" class="form-control" name="txt_lname" id="lname" placeholder="Last Name" required />
 </div>
    
 <div class="form-group">
 <input type="text" class="form-control" name="txt_email" id="lname" placeholder="Your Mail" required />
 </div>
    
 <div class="form-group">
 <input type="text" class="form-control" name="txt_contact" id="lname" placeholder="Contact No" required />
 </div>
    
 <hr />
    
 <div class="form-group">
 <button class="btn btn-primary">Submit</button>
 </div>

    </form>     
</div>
<style type="text/css">
*{margin:0;padding:0;}
#container
{
	margin:50px auto;
	padding:15px;
	border:solid #cdcdcd 1px;
	width:500px;
	height:320px;
	background:#f9f9f9;
}
table,td
{
	width:100%;
	border-collapse:collapse;
	padding:10px;
}
input
{
	width:100%;
	height:35px;
	text-align:center;
	border:solid #cddcdc 2px;
	font-family:Verdana, Geneva, sans-serif;
	border-radius:3px;
}
button
{
	text-align:center;
	width:50%;
	height:35px;
	border:0;
	font-family:Verdana, Geneva, sans-serif;
	border-radius:3px;
	background:#00a2d1;
	color:#fff;
	font-weight:bolder;
	font-size:18px;
}
hr
{
	border:solid #cecece 1px;
}
#header
{
	width:100%;
	height:50px;
	background:#00a2d1;
	text-align:center;
}
#header label
{
	font-family:Verdana, Geneva, sans-serif;
	font-size:35px;
	color:#f9f9f9;
}
a{
	color:#00a2d1;
	text-decoration:none;
}
</style>
<script>
   $('#reg-form').submit(function(e){
  
    e.preventDefault(); // Prevent Default Submission

    $.ajax({
    url: 'test.php',
    type: 'POST',
    data: $(this).serialize()+"&liked=1", // it will serialize the form data
    dataType: 'html'
    })
    .done(function(data){
    $('#form-content').fadeOut('slow', function(){
    $('#form-content').fadeIn('slow').html(data);
    });
    })
    .fail(function(){
    alert('Ajax Submit Failed ...'); 
    });
    });
</script>