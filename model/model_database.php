<?php 
// $sdn = 'mysql:host=localhost;dbname=my_blog';
// $username='root';
// $password='';
// $options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");
// try {
//  	$db = new PDO($sdn,$username,$password,$options);
//  } catch (Exception $e) {
//  	$err_message=$e->getMessage();
// 		echo "Error database: $err_message";
// 		exit();
//  }
 /**
  * 
  */
 // class Database{
 // 	private static $dsn='mysql:host=localhost;dbname=book';
 // 	private static $username='root';
 // 	private static $password='';
 // 	private static $db;
 // 	private static $options= array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");
 	
 // 	public static function getDB(){
 // 	if(!isset(self::$db)){
 // 		try {
 // 			//biến static thì khi gọi nó cần gọi seft
 // 			self::$db= new PDO(self::$dsn,self::$username,self::$password,self::$options);
 // 		} catch (Exception $e) {
 // 			$err_message=$e->getMessage();
	// 		echo "Error database: $err_message";
	// 		exit();
 // 		}
 // 	}
 // 	return self::$db;
 // 	}
 // }
 $sdn = "mysql:unix_socket=/cloudsql/shopbook-224609:us-central1:shopbook;dbname=book;charset=utf8";
$username='root';
$password='';
// $port=null;
// $socket="/cloudsql/book-219815:us-central1:product";
//$options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");

try {
 	$db = new PDO($sdn,$username,$password);
 	//echo "connect success!";
	} catch (Exception $e) {
	 	$err_message=$e->getMessage();
			echo "Error database: $err_message";
			exit();
	}
 ?>