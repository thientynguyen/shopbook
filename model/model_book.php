<?php 
/**
  * 
  */
 class Book 
 {
 	private $maSach,$tenSach,$anh,$gia,$tacGia,$tomTac,$maLoai;
 	function __construct($maSach,$tenSach,$anh,$gia,$tacGia,$tomTac,$maLoai)
 	{
 		$this->maSach=$maSach;
 		$this->tenSach=$tenSach;
 		$this->anh=$anh;
 		$this->gia=$gia;
 		$this->tacGia=$tacGia;
 		$this->tomTac=$tomTac;
 		$this->maLoai=$maLoai;
 	}
 	public function getMaSach(){
		return $this->maSach;
	}
	public function getTenSach(){
		return $this->tenSach;
	}
	public function getAnh(){
		return $this->anh;
	}
	public function getTacGia(){
		return $this->tacGia;
	}
	public function getTomTac(){
		return $this->tomTac;
	}
	public function getMaLoai(){
		return $this->maLoai;
	}
	public function getGia(){
		return $this->gia;
	}
	public function setMaSach($maSach){
		$this->maSach=$maSach;
	}
	public function setTenSach($tenSach){
		$$this->tenSach=$tenSach;
	}
	public function setAnh($anh){
		$this->anh=$anh;
	}
	public function setTacGia($tacGia){
		$this->tacGia=$tacGia;
	}
	public function setTomTac($tomTac){
		$this->tomTac=$tomTac;
	}
	public function setMaLoai($maLoai){
		$this->maLoai=$maLoai;
	}
	public function setGia($gia){
		$this->gia=$gia;
	}
 }
 /**
   * 
   */
  class BookDB
  {
  	public static function getBook(){
 	$db=Database::getDB();
 	$query="SELECT * from books";
 	try {
 		$statement= $db->prepare($query);
 		$statement->execute();
 		$rows=$statement->fetchAll();
 		$statement->closeCursor();
 		$result=array();
 		foreach ($rows as $key => $value) {
 			$b= new Book($value['maSach'],$value['tenSach'],$value['anh'],$value['gia'],$value['tacGia'],$value['tomTac'],$value['maLoai']);
 			$result[]=$b;
 		}
 		return $result;
 	} catch (Exception $e) {
 		$err_message=$e->getMessage();
			echo "Error database: $err_message";
			exit();
 	}
 }
 public static function get_book_by_id($maSach){
 	$db=Database::getDB();
 	$query="SELECT * FROM books 
 	where maSach=?";
 	try {
 		$statement=$db->prepare($query);
 		$statement->bindParam(1,$maSach);
 		$statement->execute();
 		$row=$statement->fetch();
 		$statement->closeCursor();
 		$result= new Book($row['maSach'],$row['tenSach'],$row['anh'],$row['gia'],$row['tacGia'],$row['tomTac'],$row['maLoai']);
 		return $result;

 	} catch (Exception $e) {
 		$err_message=$e->getMessage();
			echo "Error database: $err_message";
			exit();
 	}
 }
 public static function add_book($maSach,$tenSach,$anh,$gia,$tacGia,$tomTac,$maLoai){
 	$db=Database::getDB();
 	$query="INSERT INTO books (maSach,tenSach,anh,gia,tacGia,tomTac,maLoai) values (?,?,?,?,?,?,?)";
 	try {
 		$statement=$db->prepare($query);
 		$statement->bindParam(1,$maSach);
		$statement->bindParam(2,$tenSach);
		$statement->bindParam(3,$anh);
		$statement->bindParam(4,$gia);
		$statement->bindParam(5,$tacGia);
		$statement->bindParam(6,$tomTac);
		$statement->bindParam(7,$maLoai);
		// $statement->bindParam(9,$update_at);
		$statement->execute();
		$statement->closeCursor();

 	} catch (Exception $e) {
 		$err_message=$e->getMessage();
		echo "Error database: $err_message";
		exit();
 	}
 }
 public static function update_book($maSach,$tenSach,$anh,$gia,$tacGia,$tomTac,$maLoai){
 	$db=Database::getDB();
 	$query="UPDATE books 
			SET maSach=?,tenSach=?,anh=?,gia=?,tacGia=?,tomTac=?,maLoai=?
			where maSach=?";
	try {
		$statement=$db->prepare($query);
 		$statement->bindParam(1,$maSach);
		$statement->bindParam(2,$tenSach);
		$statement->bindParam(3,$anh);
		$statement->bindParam(4,$gia);
		$statement->bindParam(5,$tacGia);
		$statement->bindParam(6,$tomTac);
		$statement->bindParam(7,$maLoai);
		$statement->bindParam(8,$maSach);
		$statement->execute();
		$statement->closeCursor();
	} catch (Exception $e) {
		$err_message=$e->getMessage();
		echo "Error database: $err_message";
		exit();
	}
 }
 public static function delete_book($maSach){
	$db=Database::getDB();
	$query="DELETE FROM books 
			WHERE maSach=?";
			//where id=:id
			try {
				$statement=$db->prepare($query);

				//$statement->bindValue()
				$statement->bindParam(1,$maSach);
				$statement->execute();
				$statement->closeCursor();
			} catch (Exception $e) {
				$err_message=$e->getMessage();
		echo "Error database: $err_message";
		exit();
			}
	}
	public static function get_book_by_num($st,$num){
		$db=Database::getDB();
 	$query="SELECT * from books limit $st,$num";
 	try {
 		$statement= $db->prepare($query);
 		// $statement->bindValue(':st',$st);
 		// $statement->bindValue(':num',$num);
 		$statement->execute();
 		$rows=$statement->fetchAll();
 		$statement->closeCursor();
 		$result=array();
 		foreach ($rows as $key => $value) {
 			$b= new Book($value['maSach'],$value['tenSach'],$value['anh'],$value['gia'],$value['tacGia'],$value['tomTac'],$value['maLoai']);
 			$result[]=$b;
 		}
 		return $result;
 	} catch (Exception $e) {
 		$err_message=$e->getMessage();
			echo "Error database: $err_message";
			exit();
 	}
	}
	public static function get_book_by_loai_id($maLoai){
		$db=Database::getDB();
 	$query="SELECT * from books
 	where maLoai=:maLoai";
 	try {
 		$statement= $db->prepare($query);
 		$statement->bindValue(':maLoai',$maLoai);
 		$statement->execute();
 		$rows=$statement->fetchAll();
 		$statement->closeCursor();
 		$result=array();
 		foreach ($rows as $key => $value) {
 			$b= new Book($value['maSach'],$value['tenSach'],$value['anh'],$value['gia'],$value['tacGia'],$value['tomTac'],$value['maLoai']);
 			$result[]=$b;
 		}
 		return $result;
 	} catch (Exception $e) {
 		$err_message=$e->getMessage();
			echo "Error database: $err_message";
			exit();
 	}
	}
  } ?>