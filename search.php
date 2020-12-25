<?php 
	require("connectDB.php");
	$keyword = trim($_GET['k']);
	$res = "";

	searchBooks();	
	searchVideos();
	searchGadgets();

	function searchBooks(){
		global $conn, $keyword, $res;
		$query = "SELECT * FROM Books WHERE title LIKE '%".$keyword."%' OR author LIKE '%".$keyword."%';";
		$result = $conn->query($query);
		while ($row = $result->fetch_assoc()) {
			$link = '';

			if(isUserLogedIn()) { 
				$link = "files/Books/".$row['source'] ;
			}else{ 
				$link = "javascript:location.href=\"login.php\";";
			}
			$res .= "<li><a style='color:white;' href='".$link."'>".$row['title']."</li>";
		}
	}

	function searchVideos(){
		global $conn, $keyword, $res;
		$query = "SELECT * FROM Videos WHERE title LIKE '%".$keyword."%' OR author LIKE '%".$keyword."%';";
		$result = $conn->query($query);
		while ($row = $result->fetch_assoc()) {
			$link = '';

			if(isUserLogedIn()) { 
				$link = "files/Videos/".$row['source'] ;
			}else{ 
				$link = "javascript:location.href=\"login.php\";";
			}
			$res .= "<li><a  style='color:white;' href='".$link."'>".$row['title']."</li>";
		}
	}

	function searchGadgets(){
		global $conn, $keyword, $res;
		$query = "SELECT * FROM gadgets WHERE title LIKE '%".$keyword."%';";
		$result = $conn->query($query);
		while ($row = $result->fetch_assoc()) {
			$res .= "<li><a  style='color:white;'  href='".$row['link']."'>".$row['title']."</li>";
		}
	}

	echo $res;
?>