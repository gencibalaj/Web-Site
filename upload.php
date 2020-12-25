<?php 

	function upload($type){
		$targetfolder = "files/".$type."/";

		$targetfolder = $targetfolder . basename( $_FILES['ff']['name']) ;
		$file_type=$_FILES['ff']['type'];
		if ($file_type=="application/pdf" || $file_type=="video/mp4" ) {

			if(move_uploaded_file($_FILES['ff']['tmp_name'], $targetfolder)){
				echo "ALL DONE";
			} else {
				echo "Problem uploading file";
			}

		}
	}
?>