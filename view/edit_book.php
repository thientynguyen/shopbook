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
	<h1 class="text-center"> Edit Book</h1>

	<form action="" method="POST" accept-charset="utf-8" role="form" enctype="multipart/form-data">
		<div class=" form-group">
			
			<input type="hidden" name="maSach" class="form-control" value="<?php echo $book->getMaSach(); ?>"placeholder="enter id" >
			<input type="text" name="tenSach" class="form-control" value="<?php echo $book->getTenSach(); ?>" placeholder="title">
			<input type="text" name="gia" class="form-control" value="<?php echo $book->getGia(); ?>" placeholder="gia">
			<input type="text" name="tacGia" class="form-control" value="<?php echo $book->getTacGia(); ?>" placeholder="tac gia">
			<textarea  class="form-control" rows="3" name="tomTac"><?php echo $book->getTomTac();?></textarea>
			<label for=""> Loại Sách</label>
			<select name="maLoai" class="form-control">
				<?php 
				foreach ($loai as $key => $value):?>
					<?php if ($key == $book->getMaLoai()): ?>
						<option value="<?php echo $value->getMaLoai(); ?>" selected="seleted">
						<?php echo $value->getTenLoai(); ?>
					</option>
					<?php else: ?>
						<option value="<?php echo $value->getMaLoai(); ?>" >
						<?php echo $value->getTenLoai(); ?>
					<?php endif ?>
					<?php 	endforeach; ?>
			</select>
			<input type="text" name="avata_old" class="form-control" value="<?php echo $book->getAnh(); ?>" placeholder="img">
			<input type="file" name="image_m" class="form-control" value="" placeholder="anh">

		</div>
		<button type="submit" name="action" value="update_book" class="btn btn-outline-success">save</button>
	</form>

</body>
</html>