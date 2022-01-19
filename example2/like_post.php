<script>
   $('.like-form').submit(function(e){
    $postid=$(this).attr('id');
    //get button color
    var bcolor = $('#'+$postid+'-b').css( "background-color" );
    if (bcolor=='rgb(242, 241, 239)'){$newColor='rgb(144, 238, 144)';$liked=1;}
    else{$newColor='rgb(242, 241, 239)';$liked=0;}
    
    e.preventDefault(); // Prevent Default Submission
    $.ajax({
    url: 'onlike.php',
    type: 'POST',
    data: $(this).serialize()+"&postID="+$postid+"&liked="+$liked, // it will serialize the form data
    dataType: 'html'
    })
    .done(function(data){   
        //changing button color 
        $('#'+$postid+'-b').css('background-color', $newColor); 
        $("#output").html(data);
    })
    .fail(function(){
    alert('Ajax Submit Failed ...'); 
    });
    });

</script>