<?php  
/**
  * 
  */
 class Loai 
 {
 	private $maLoai,$tenLoai;
 	function __construct($maLoai,$tenLoai)
 	{
 		$this->maLoai=$maLoai;
 		$this->tenLoai=$tenLoai;
 	}
 	public function getMaLoai(){
		return $this->maLoai;
	}
	public function getTenLoai(){
		return $this->tenLoai;
	}
	public function setMaloai($maLoai){
		$this->maLoai=$maLoai;
	}
	public function setTenLoai($tenLoai){
		$this->tenLoai=$tenLoai;
	}
 }
 /**
   * 
   */
  class LoaiDB
  {
  	public static function getLoai(){
 	$db=Database::getDB();
 	$query="SELECT * from loai";
 	try {
 		$statement= $db->prepare($query);
 		$statement->execute();
 		$rows=$statement->fetchAll();
 		$statement->closeCursor();
 		$result=array();
 		foreach ($rows as $key => $value) {
 			$l= new loai($value['maLoai'],$value['tenLoai']);
 			$result[]=$l;
 		}
 		return $result;
 	} catch (Exception $e) {
 		$err_message=$e->getMessage();
			echo "Error database: $err_message";
			exit();
 	}
 }
  	
  } ?>