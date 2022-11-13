function like(nomeCanzone){
    document.getElementById("li").style.color = "fuchsia"
    document.getElementById("di").style.color = "grey"
    //Se clicco "like" non posso cliccarci di nuovo ma dislike è abilitato
    document.getElementById("li").style.pointerEvents="none";
	document.getElementById("li").style.cursor="default";
    //Abilito dislike
    document.getElementById("di").style.pointerEvents="auto";
	document.getElementById("di").style.cursor="pointer";
    
    $.ajax({
            url: "/php/updateLike.php",
            type: "POST",
            data: {songName: nomeCanzone, like: 1}, //this sends the user-id to php as a post variable, in php it can be accessed as $_POST['uid']
            success: function(data){
            	console.log(data);
            	$("#likeAlert").append("Now you like this song!");
                $('#likeAlert').removeAttr('hidden');
                $('#likeAlert').show();
                setTimeout(function() {
                	$('#likeAlert').fadeOut('fast');
                    document.getElementById("likeAlert").innerHTML="";
                }, 2000); // <-- time in millisecond
            }
        });
}
  
function dislike(idCanzone){
    document.getElementById("di").style.color = "fuchsia"
    document.getElementById("li").style.color = "grey" //se clicco su like, non potrò cliccare su dislike
    //Se clicco "dilike" non posso cliccarci di nuovo ma like è abilitato
    document.getElementById("di").style.pointerEvents="none";
	document.getElementById("di").style.cursor="default";
    //Abilito like
    document.getElementById("li").style.pointerEvents="auto";
	document.getElementById("li").style.cursor="pointer";
    
    $.ajax({
            url: "/php/updateLike.php",
            type: "POST",
            data: {songName: idCanzone, like: -1}, //this sends the user-id to php as a post variable, in php it can be accessed as $_POST['uid']
            success: function(data){
                $("#dislikeAlert").append("Oh no, you don't like this song");
                $('#dislikeAlert').removeAttr('hidden');
                $('#dislikeAlert').show();
                setTimeout(function() {
                	$('#dislikeAlert').fadeOut('fast');
                    document.getElementById("dislikeAlert").innerHTML="";
                }, 2000); // <-- time in millisecond
            }
        });
}