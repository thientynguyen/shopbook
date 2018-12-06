<?php 
include('../model/model_database.php');
include('../model/model_book.php');
include('../model/model_loai.php');
include('../model/model_user.php');
 $action = filter_input(INPUT_POST, 'action');
	if(empty($action)){
		$action = filter_input(INPUT_GET, 'action');
		if(empty($action)){
			$action = 'show_book';
		}
	}

switch ($action) {
	 	case 'show_book':
	 		$list_books=BookDB::getBook();
			include('../view/list_book.php');
			break;
		case 'add_book':
			$loai=LoaiDB::getLoai();
			include('../view/add_book.php');
			break;
		case 'save_book':
				$maSach=filter_input(INPUT_POST,'maSach');
				$tenSach=filter_input(INPUT_POST,'tenSach');
				$gia=filter_input(INPUT_POST,'gia');
				$tacGia=filter_input(INPUT_POST,'tacgia');
				$tomTac=filter_input(INPUT_POST,'tomTac');
				$maLoai=filter_input(INPUT_POST,'maLoai');
				$image=filter_input(INPUT_POST,'image');
				//upload file image
				$tmp_name=$_FILES['image']['tmp_name'];
				//lay duong dan//THEM "/"
				$path=getcwd().DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR.'imgbook';//đường đẫn ảnh
				$name=$path.DIRECTORY_SEPARATOR.$_FILES['image']['name'];//tên thật của file đó
											//đường đẫn nguônd//$name=>đích
				$success=move_uploaded_file($tmp_name,$name);//chuyển ảnh từ file ảnh tới file image/avata=>  sao chép tới 
				if(!$success){
					echo"Erro upload file";
				}
				//end upload file
				$image=$_FILES['image']['name'];

				//echo $id;
				// $create_at=filter_input(INPUT_POST,'create_at');
				BookDB::add_book($maSach,$tenSach,$image,$gia,$tacGia,$tomTac,$maLoai);
				$list_books=BookDB::getBook();
				include('../view/list_book.php');
				break;	
			break;
		case 'edit_book':
				$id=filter_input(INPUT_GET,'id');
				$book=BookDB::get_book_by_id($id);
				$loai=LoaiDB::getLoai();
				include('../view/edit_book.php');
				break;
		case 'update_book':
				$maSach=filter_input(INPUT_POST,'maSach');
				$tenSach=filter_input(INPUT_POST,'tenSach');
				$gia=filter_input(INPUT_POST,'gia');
				$tacGia=filter_input(INPUT_POST,'tacGia');
				$tomTac=filter_input(INPUT_POST,'tomTac');
				$maLoai=filter_input(INPUT_POST, 'maLoai');
				$image=filter_input(INPUT_POST,'avata_old');
				//upload file image
				//image la moi
				$tmp_name=$_FILES['image_m']['tmp_name'];
				$path=getcwd().DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR.'imgbook';
				$name=$path.DIRECTORY_SEPARATOR.$_FILES['image_m']['name'];
				$success=move_uploaded_file($tmp_name,$name);
				//if image moi ko co thi success ko thanh cong
				// else thanh cong
				if($success){
					$image=$_FILES['image_m']['name'];
				}
				BookDB::update_book($maSach,$tenSach,$image,$gia,$tacGia,$tomTac,$maLoai);
				$list_books=BookDB::getBook();
				include('../view/list_book.php');
				break;
			case 'delete':
			$id=filter_input(INPUT_GET,'id');
			BookDB::delete_book($id);
			$list_books=BookDB::getBook();
				include('../view/list_book.php');
				break;
			case 'show_by_loai':
          $maloai=filter_input(INPUT_GET,'maloai');
          $list_books=BookDB::get_book_by_loai_id($maloai);
          include('../view/list_book.php');
      break;
      case 'login':
		include('../view/login.php');
			break;
      case 'checkuser':
			$username=filter_input(INPUT_POST,'username');
			$password=filter_input(INPUT_POST,'password');
			$list_user=userDB::getusers();
			if(userDB::check_user($list_user,$username,$password)){
				$list_books=BookDB::getBook();
				// $name=$username;
				include('../view/list_book.php');
			}else{
				echo $password;
				include('../view/login.php');
			}
			break;				
	 	default:
	 	
	 		break;
	 }	 ?>