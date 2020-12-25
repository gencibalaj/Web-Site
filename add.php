<?php
	require("contentClasses.php");
	require("upload.php");

	$type = $_POST['type'];
	switch ($type) {
		case 'Book':
			addBook();
			break;
		case 'Gadgets':
			addGadgets();
			break;
		case 'Video':
			addVideo();
			break;	
		case 'Course':
			addCourse();
		default:
			break;
	}


	function addBook (){
		$title = $_POST['title'];
		$author = $_POST['author'];
		$rating = $_POST['rating'];
		$img = $_POST['img'];
		$description = $_POST['description'];
		$pages = $_POST['pages'];
		$source = $_FILES['ff']['name'];
		upload("Books");
		$book = new Book($img,$title,$source,$pages,$author,$rating,$description);
		$book->SaveToDb();
	}

	function addVideo (){
		$title = $_POST['Vtitle'];
		$author = $_POST['Vauthor'];
		$rating = $_POST['Vrating'];
		$img = $_POST['Vimg'];
		$description = $_POST['Vdescription'];
		$length = $_POST['Vlength'];
		$source = $_FILES['ff']['name'];
		$cid = $_POST["Vcourse"];
		upload("Videos");
		echo $_POST['img'];
		$video = new Video($img,$title,$source,$length,$author,$rating,$description,$cid);
		$video->SaveToDb();
	}

	function addGadgets (){
		$title = $_POST['Gtitle'];
		$img = $_POST['Gimg'];
		$source = $_POST['Glink'];
		$gadget = new Gadget($img,$title,$source);
		$gadget->SaveToDb();
	}

	function addCourse (){
		global $conn;
		$title = $_POST['Ctitle'];
		$prof = $_POST['Cprof'];
		$query = "INSERT INTO courses(ctitle,cProfesor) VALUES('$title','$prof')";
		mysqli_query($conn, $query);
	}
?>