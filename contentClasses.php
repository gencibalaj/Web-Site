<?php
	require_once("connectDB.php");

	abstract class items {
		protected $img;
		protected $title;
		protected $source;

		public function __construct($img,$title,$source){
			$this->img = $img;
			$this->title = $title;
			$this->source = $source;
		}

		abstract public function saveToDb();
	}

	class Book extends items {
		private $pages;
		private $author;
		private $rating;
		private $description;


		public function __construct($img,$title,$source,$pages,$author,$rating,$description){
			parent::__construct($img,$title,$source);
			$this->pages = $pages;
			$this->author = $author;
			$this->rating = $rating;
			$this->description = $description;
		}

		public function __get($filed){
			if(property_exists($this, $filed)){
				return $this->$filed;
			}
		}

		public function __set($filed, $value){
			if(property_exists($this, $filed)){
				$this->$filed = $value;
			}
		}

		public function SaveToDb(){
			global $conn;
			echo $this->img;
			$query = sprintf("INSERT INTO Books (title,author,source,cover,description,pages,rating) VALUES ('%s','%s','%s','%s','%s',%d,%f);", $this->title,$this->author,$this->source,$this->img,$this->description,$this->pages,$this->rating);
			echo $query;
			mysqli_query($conn, $query);
		}

		function __destruct() {
        	print "Destroying";
    	}
	}

	class Video extends items {
		private $length;
		private $author;
		private $rating;
		private $description;
		private $cid;

		public function __construct($img,$title,$source,$length,$author,$rating,$description,$cid){
			parent::__construct($img,$title,$source);
			$this->length = $length;
			$this->author = $author;
			$this->rating = $rating;
			$this->description = $description;
			$this->cid = $cid;
		}

		public function __get($filed){
			if(property_exists($this, $filed)){
				return $this->$filed;
			}
		}

		public function __set($filed, $value){
			if(property_exists($this, $filed)){
				$this->$filed = $value;
			}
		}

		public function SaveToDb(){
			global $conn;
			$query = sprintf("INSERT INTO Videos (title,author,source,cover,description,length,rating,cid) VALUES ('%s','%s','%s','%s','%s',%s,%f,%d);", $this->title,$this->author,$this->source,$this->img,$this->description,$this->length,$this->rating,$this->cid);
			echo $query;
			mysqli_query($conn, $query);
		}
	}

	class Gadget extends items {


		public function __construct($img,$title,$source){
			parent::__construct($img,$title,$source);
		}

		public function __get($filed){
			if(property_exists($this, $filed)){
				return $this->$filed;
			}
		}

		public function __set($filed, $value){
			if(property_exists($this, $filed)){
				$this->$filed = $value;
			}
		}

		public function SaveToDb(){
			global $conn;
			$query = sprintf("INSERT INTO gadgets (title,link,img) VALUES ('%s','%s','%s');", $this->title,$this->source,$this->img);
			echo $query;
			mysqli_query($conn, $query);
		}
	}

?>