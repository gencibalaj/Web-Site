<?php 
	 session_start();
    require("connectDB.php");
    if(!isUserLogedIn()){
        header("Location: login.php?r=chat.php");
    }

    $email = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : $_COOKIE['u_email'];  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles/chat.css">
	<script src="scripts/jquery.min.js"></script>
</head>
<body onload="getChat();">
	<div id="chat">
	
	</div>
	<div style="text-align: center;">
		<input type="text" id="send" name="" onkeypress="sendMessage(event,this);">
	</div>	

	<script type="text/javascript">
		var currentChatNr = 0;
		function sendMessage(e,input) {
			if(e.keyCode === 13){
				var message = input.value;
				input.value = "";
				$.post("sendChat.php",{message :message,email:"<?php echo $email; ?>"} ,function(){
					getChat();
					currentChatNr++;
				});
			}
		}

		function getChat(){
			$("#chat").load("getChat.php",function(){
				$("#chat").get(0).scrollTop = $("#chat").get(0).scrollHeight;
			});

		}

		function UpdateChat(){
			$.ajax({
				type: "GET",
				url: "ChatNr.txt",
				async: false,
				cache: false,
				success: function(result){
				var ChatNr = parseInt(result);
					if(ChatNr > currentChatNr){
						currentChatNr = ChatNr;
						getChat();
					}
				}
			});
		}	

		setInterval(UpdateChat, 1000);
	</script>
</body>
</html>