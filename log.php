<?php
	class User {
		
		private $ip;
		private $country;
		private $time;
		private static $count;

		function __construct(){
			$this->ip = $_SERVER['REMOTE_ADDR'];
			$this->info = json_decode(file_get_contents("https://ipinfo.io/{$this->ip}/json"));
			$this->country = (empty($info->country)) ? "Localhost" : $info->country;
			$this->time = date("d/m/Y G:i:s");
		}

		function WriteFile() {
			try
			{
				if(!file_exists("log.json")){
					throw new Exception("File don't existss");
					
				}
				$f = file_get_contents("log.json");
				$f = substr($f, 0, -1).",".$this->Tojson()."]";
				//echo $f;
				$logfile = fopen("log.json", "w");
				if(!$logfile){
					throw new Exception("File can't open");
				}
				fwrite($logfile,$f);
				fclose($logfile);
			} catch (Exception $e){
				echo $e->getMessage();
			}
		}	

		function Tojson(){
			return '{"ip":"'.$this->ip.'","country":"'.$this->country.'","time":"'.$this->time.'"}';
		}

		
	}

	$a = new User();
	$a->WriteFile();	
?>