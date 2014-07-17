$(document).ready(function(){
	$("#cluname").hide();
	$("#evename").hide();
	$("#evedescription").hide();
	$("#everules").hide();
	$("#evedate").hide();	
	$("#evestart").hide();
	$("#eveend").hide();	
	$("#evevenue").hide();
	$("#eveprize").hide();
	$("#everegfee").hide();
	$("#evecname").hide();
	$("#evecemail").hide();
	$("#evecphone").hide();
	$("#dat").hide();
	$("#dat").load('/registration/run_update.php');
	$("#fo").submit(function(){
		$("#cluname").hide();
		$("#evename").hide();
		$("#evedescription").hide();
		$("#everules").hide();
		$("#evedate").hide();	
		$("#evestart").hide();
		$("#eveend").hide();	
		$("#evevenue").hide();
		$("#eveprize").hide();
		$("#everegfee").hide();
		$("#evecname").hide();
		$("#evecemail").hide();
		$("#evecphone").hide();
		event.preventDefault();
		var hit =1;
		if($(":input:eq(1)").val()=="")
		 {
			 $("#evename").html('Required');
			 $("#evename").show();
			 hit=2;
		 }
		 if($(":input:eq(12)").val()!="")
		 {
		 	if(!isValidEmailAddress($(":input:eq(12)").val()))
		 	{
		 		$("#evecemail").html('Invalid Email');
		 		$("#evecemail").show();
		 		hit=2;
		 	}
		 }
		 var cname=$(":input:eq(0)").val();
		 var ename=$(":input:eq(1)").val();
		 var edesc=$(":input:eq(2)").val();
		 var erules=$(":input:eq(3)").val();
		 var edate=$(":input:eq(4)").val();
		 var estime=$(":input:eq(5)").val();
		 var eetime=$(":input:eq(6)").val();
		 var evenue=$(":input:eq(7)").val();
		 var eprize=$(":input:eq(8)").val();
		 var eregfee=$(":input:eq(9)").val();
		 var ecname=$(":input:eq(10)").val();
		 var ecphone=$(":input:eq(11)").val();
		 var ecemail=$(":input:eq(12)").val();
		 var eid=$(":input:eq(13)").val();
		 if(hit==1)
		 {
		 	
		 	$("#heading1").fadeOut();
		 	$.post("/registration/run-update.php",{ 'club_name' : cname,
		 										'event_name' : ename,
		 										'event_description' : edesc,
		 										'event_rules' : erules,
		 										'event_date' : edate,
		 										'event_start' : estime,
		 										'event_end' : eetime,
		 										'event_venue' : evenue,
		 										'event_prize' : eprize,
		 										'event_regfee' : eregfee,
		 										'event_cname' : ecname,
		 										'event_cphone' : ecphone,
		 										'event_cemail' : ecemail,
		 										'event_id' :eid},
		 		function(result)
		 		{
		 			$("#fo").fadeOut('slow',function(){
		 				$("#dat").html(result);
		 				$("#lin").hide();
		 				$("#dat").fadeIn('slow');
		 			});
		 		});
		 }
	});
});
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}