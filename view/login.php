<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>form login</title>
	<link rel="stylesheet" href="">
	<script src="../js/jquery-3.3.1.slim.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="../js/popper.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<link rel="stylesheet" type="text/css" href="../stylesheets/bootstrap.min.css">
	<script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
			.icon {
		    padding: 10px;
		    background: dodgerblue;
		    color: white;
		    min-width: 50px;
		    text-align: center;
		}
		#video_background {
			position: absolute;
			bottom: 0px;
			right: 0px;
			min-width: 100%;
			min-height: 100%;
			width: auto;
			height: auto;
			z-index: -1000;
			overflow: hidden;
			}
			#div_top{
				margin-top:100px;
			}
			#form_input{
				background-color: none;
				border: none;
				width: 80%;
				margin: 0 auto;
				margin-bottom: 20px;
				padding-left: 30px;
			}
			label{
				color: white;
				padding-left: 50px;
			}
			form{
				margin: 0 auto;
				width: 40%;
				background-color: black;
				border-radius: 10px;
			}
			button{
				width: 40%;
				margin: 0 auto;
				margin-bottom: 20px;
				margin-top: 30PX;
				padding-left: 30px;
			}
	</style>
</head>
<body>
		<div id="div_top" class="form-group">
			<center> <h1>FORM ĐĂNG NHẬP</h1></center>
		</div>
		<div id=form_login>
			<form action="" method="POST" accept-charset="utf-8">
				<center><h2 style="color: yellow; padding:20px 0;">LOGIN NOW</h2></center>
				<!--  <i class="fa fa-user icon"></i> -->
				<input type="text" name="username" class="form-control" id='form_input'placeholder='User name'>
				<!-- <i class="fa fa-key icon"></i> -->
				<input type="password" name="password" class="form-control" id='form_input'
				placeholder='password'>
				<div class="checkbox">
				<label for="" >
					<input type="checkbox" name="remember" value="rememberme"> Remember me

				</label>
				<a href="" style="float: right; padding-right: 50px;">forgot password</a>
				</div>
				<input type="hidden" name="action" value="checkuser">
				<center><button type="submit" value="" class="btn btn-danger">LOGIN</button>
				<button type="reset" class="btn btn-primary">Cancel</button></center>
			</form>
			
		</div>
</body>
</html>