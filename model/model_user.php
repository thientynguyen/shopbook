<?php 

class User
{
	private $id,$user,$pass;
	function __construct($user,$pass)
	{
		$this->user=$user;
		$this->pass=$pass;
	}
	public function getId(){
		return $this->id;
	}
	public function getUser(){
		return $this->user;
	}
	public function getPass(){
		return $this->pass;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function setUser($user){
		$$this->user=$user;
	}
	public function setPass($pass){
		$this->pass=$pass;
	}
}

/**
 * 
 */
class userDB
{
	public static function getusers(){
		$db=Database::getDB();
		$query ='SELECT * FROM  user';
		try {
			$statement =$db->prepare($query);
			$statement->execute();
			$rows=$statement->fetchAll();
			$statement->closeCursor();
			foreach ($rows as $key => $value) {
				$u= new User($value['name'],$value['pass']);
				$u->setId($value['id']);
				$result[]=$u;
			}
			return $result;
		} catch (Exception $e) {
			$err_message=$e->getMessage();
			echo "Error database: $err_message";
			exit();
		}
	}
	public static function check_user($list_user,$user,$pass){
	$result=false;
	foreach ($list_user as $key => $value) {
		if($user==$value->getUser() && $pass==$value->getPass()){
			$result=true;
			break;
		}
	}
	return $result;

}
}
 ?>