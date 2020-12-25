<?php 
	session_start();
	require("connectDB.php");
	

	if(!isAdminLogedIn()){
		header("Location: adminlogin.php");
		die();	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="scripts/jquery.min.js"></script>
	<style type="text/css">
		.selected {
			background-color: lightgreen;
		}
		#admin
		{
			text-align: center;
			font-size: 40px;
			font-family: Arial Black;
		}
		table
		{
			border-radius: 5px;
			background-color: lightyellow;
			
			box-shadow: 3px 3px lightgrey;
		}
		th
		{
			background-color: #F0E68C;
			border-radius: 2px;
			font-family: Arial 	;
			
		}
		td
		{
			font-family: Arial 	;
		}
		input
		{
			font-size: 20px;
			background-color: lightgrey;
			border-style: none;
			font-family: arial;
			border-radius: 2px;
		}

		button
		{	
			outline: none;
			box-shadow: 3px 3px lightgrey;
			opacity: 1;
			font-size:20px;
			border: none;
			border-radius: 2px;
			cursor: pointer;
		}
		#search
		{

            outline: none;
			box-shadow: 3px 3px lightgrey;
			opacity: 1;
			font-size:20px;
			border: none;
			border-radius: 2px;		}
	</style>



</head>
<body onload="showTable()">
<div id="admin">ADMIN</div>
<br />
<table align="center" cellspacing="10">
	
	<tr><td>
		<input type="text" placeholder="Search" id="serachinput" oninput="search()" name="accname"></td>
		<td><button id="delete">Delete</button></td>
		<td><button onclick="location.href = 'logout.php';">Logout</button></td>
		<td><button onclick="addContent();">Add Content</button></td>
		<td><button onclick="showInfo();">Info</button></td>
		<td><button onclick="ClearChat();">Clear Chat</button></td>
	</tr>
</table>

<br />
<div align="center" id="table"></div>
<script>
	var ids = [];	
	function showTable(q=''){
		$("#table").load("showTable.php?q="+q);
		$("#delete").html("Delete");
	}

	function selected(row){
		$(row).toggleClass('selected');
		var email = $(row).find("td:first-child").html();

		if(ids.includes(email)){
			var index = ids.indexOf(email);
			ids.splice(index, 1);
		}else{
			ids.push(email);
		}
		console.log(ids);
	}




	$("#delete").on("click", function(){
		idss = ids.join(" ");
		$.get("updateDb.php?c=delete&ids="+idss, function(data){
			showTable();
		});
	});

	
	function search(){
		var e = $("#serachinput").val();
		showTable(e);
	}

	function addContent(){
		$("#delete").html("Show Table");
		$("#table").load("addContent.php");
	}
	function showInfo(){
		$("#delete").html("Show Table");
		$("#table").load("info.php");
		//elti();
	}
	function ClearChat(){
		$("#delete").html("Show Table");
		$.get("clearChat.php");
		$("#table").html("Chat Cleard");

	}




</script>

</body>
</html>
