$(document).ready(function(){
	$(".but").click(function(){
		var data=$(this).attr('tem');
		//$(this).fadeOut('slow');
		//$(this).appendChild.html("Registration Successful!!");
		$(this).fadeOut('slow',function(){
			$(this).next().fadeIn('slow');
		});
		$.post('reg.php',{'eid' : data},
			function(result){
				$(this).fadeOut('slow');//,function(){
					//$this.html(result);
					//$this.fadeIn('slow');
				//});
			});
	});
});