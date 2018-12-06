<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>add user</title>
	<script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="../js/jquery-3.3.1.slim.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="../js/popper.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<link rel="stylesheet" type="text/css" href="../stylesheets/bootstrap.min.css">	
	<style type="text/css" media="screen">
		body{
			width: 50%;
			margin: 0 auto;
			padding: 30px;
		}
		h2{
			padding-top: 100px;
		}
		input{
			padding: 10px;
			margin: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="border border-success" style="padding: 30px;">
			<h1 class="text-center"> ADD BOOK</h1>

	<form  class="" action="" method="POST" accept-charset="utf-8" role="form" enctype="multipart/form-data">
		<div class=" form-group">
			
			<input type="text" name="maSach" class="form-control" id="" placeholder="Mã Sách">
			<input type="text" name="tenSach" class="form-control" id="" placeholder="Tên Sách">
			<input type="number" name="gia" class="form-control" id="" placeholder="Giá">
			<input type="text" name="tacgia" class="form-control" id="" placeholder="Tác Giả">
			<input type="file" name="image" class="form-control" id="" placeholder="img">
			<select name="maLoai" class="form-control" required="">
				<?php 
				foreach ($loai as $key => $value):?>
					<option value="<?php echo $value->getMaLoai(); ?>">
						<?php echo $value->getTenLoai(); ?>
					</option>}
					
					<?php 	endforeach; ?>
			</select>
			<div class="form-group">
   			 <label for="tomTac">Tóm tắc</label>
    		<textarea class="form-control" name="tomTac" rows="3"></textarea>
  			</div>
		</div>
		<button  class="btn btn-success" type="submit" name="action" value="save_book">add new book</button>
	</form>
		</div>
	</div>
</body>
</html>