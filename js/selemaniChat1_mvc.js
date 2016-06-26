$(document).ready(function(){
						   
	function getUserStatus()
	{
		var allSpans = document.getElementsByTagName("span");
		var allH6s = document.getElementsByTagName("h6");
		var allbs = document.getElementsByTagName("b");
        var num = allSpans.length;
		var num1 = allH6s.length;
		
		
		var innercount= 0;
		var use_um= $( ".use_num" ).val();
		var use_num_int = parseInt(use_um);
		var count = 1;
		
		 $( "b" ).each(function( index ) {
					
					if(use_num_int == count)
					{
						count = count+1;
					}
				    		//alert(count);   
					$.get("index.php?smiggle=chat/count_unread_messages/"+count, function(data, status){
					$( allbs[index] ).html(data);
					});
					count++;
			});
	
		
		
		$( "span" ).each(function( index ) {
			var h6ssContent = allH6s[index].innerHTML;
			$.get("index.php?smiggle=chat/Retrieve_user_status/"+h6ssContent, function(data, status){
				$( allSpans[index] ).html(data);
				//alert(index);
			});
			
		});

	}
    
	
	
	
	
	$( window ).unload(function() {
 			$.get("index.php?smiggle=index/logout", function(data, status){
				
				//alert(index);
			});
	});
	
	
	
	myFunction();
	function myFunction() {
		setInterval(function(){ 
		  var linkss = $(this).children(".directioner").text();
			  var regist1 = $(".register_link").val();
	
			  var plitsLink= regist1.split("=");
			  var indivLinks = plitsLink[1];
	
		  if(regist1 !== '')
		  { 
			  var mainLink = "index.php?smiggle="+indivLinks;
			  $.get(mainLink, function(data, status){
					 $(".box1").html(data);
			  });
		  }
		getUserStatus();
	   }, 3000);
	}
	
	
	$( "#dialog" ).dialog({
				autoOpen: false,
				width: 500,
							title: "Dialog Title",
							 position: {
              my: "left+10 top+50", at: "left top"
             },
							modal: false
				 });
	
	$( ".lese" ).click(function( event ) {
		$( "#dialog" ).dialog( "close" );
	 });
	  
	  
	$( "button" ).click(function( event ) {
		var sent_from = $(".sent_from").val();
		var sent_to =  $(".sent_to").val();
		var message =  $("#message").val();

		$.post("index.php?smiggle=chat/insert_chat",
		 {
			sent_by: sent_from,
			sent_to: sent_to,
			message: message
		  },
		 function(data,status){
			getmess();
		 });
		
		
	});

	function getmess(){
		var linkss = $( ".linked" ).val();
		$.get(linkss, function(data, status){
		$(".chatts").html(data);
		$("#message").val('')
		});
	}



	$("a").click(function(){
		var linkss = $(this).children(".directioner").text();
		var unread_num = $(this).children("b");
		var regist1 = $(".register_link").val(linkss);
		
		var plitsLink= linkss.split("=");
		var indivLinks = plitsLink[1];
		var regist = indivLinks.split("/");
        var param = regist[3];
		$.get("index.php?smiggle=chat/reset_unread_messages/"+param, function(data, status){
					//$( unread_num).html(data);
		});
		$.get(linkss, function(data, status){
		$(".chatts").html(data);
		});
		
	});	
	
});
