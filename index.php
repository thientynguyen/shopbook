<?php
include_once('model/model_database.php');
include_once('model/model_loai.php');
include_once('model/model_book.php');
$loai=LoaiDB::getLoai();
$action = filter_input(INPUT_POST, 'action');
  if(empty($action)){
    $action = filter_input(INPUT_GET, 'action');
    if(empty($action)){
      $action = 'show';
    }
  }
  $book=BookDB::getBook();
  $pages= (int) ceil(count($book)/6);
  $st=filter_input(INPUT_GET,'st');
  if (empty($st)) {
    $st=0;
  }
  $num=6;
  switch ($action) {
    case 'show':
      $list_books=BookDB::get_book_by_num($st,$num);
      break;
    case 'show_by_loai':
          $maloai=filter_input(INPUT_GET,'maloai');
          $list_books=BookDB::get_book_by_loai_id($maloai);
      break;
    default:
      # code...
      break;
  }
 ?>
 <!DOCTYPE html>
<html>
<head>
  <title>book</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
  <script src="js/jquery-3.3.1.slim.min.js" type="text/javascript" charset="utf-8" async defer></script>
  <script src="js/popper.min.js" type="text/javascript" charset="utf-8" async defer></script>
  <link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.min.css"> 
  <style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;}
.w3-sidebar {
  z-index: 3;
  width: 250px;
  top: 43px;
  bottom: 0;
  height: inherit;
}
.imgbook{
  width: 200px;
  height: 300px;
}
</style>
</head>
<body>
  <div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-theme-l1">Logo</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">About</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Values</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">News</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white">Clients</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white">Partners</a>
     <a href="ctroller/ctr_book.php?action=login" title="" class="btn btn-secondary btn btn-secondary float-right pr-4 mr-4 " role="button">login</a>
  </div>
</div>
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
  <h4 class="w3-bar-item"><b>Menu</b></h4>
  <?php foreach ($loai as $key => $value): ?>
    <a class="w3-bar-item w3-button w3-hover-black" href="?action=show_by_loai&maloai=<?php echo $value->getMaLoai(); ?>"><?php echo $value->getTenLoai(); ?></a>
  <?php endforeach ?>
</nav>
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px; padding-top: 70px">
<div class="container">
  <div class="row">

     <?php foreach ($list_books as $key => $value): ?>
       <div class="col-xs-12 col-sm-6 col-md-4">
      <div class="form-group">
        <img src="ctroller/image/imgbook/<?php echo $value->getAnh(); ?>" alt="<?php echo $value->getTenSach(); ?>" class="imgbook">
      <label for="" class="d-flex ml-4"><?php echo $value->getTenSach(); ?></label>
      <label for="" class="d-flex ml-4">tac gia: <?php echo $value->getTacGia(); ?></label>
       <label for="" class="d-flex ml-4">Giá: <?php echo $value->getGia(); ?></label>

      </div>
    </div>
    <?php endforeach ?>
   <!--  <div class="col-xs-12 col-sm-6 col-md-4">
      <img src="https://picsum.photos/200/300" alt="">
      <label for="" class="d-flex ml-4">giá: 12000</label>
      <label for="" class="d-flex ml-4">nhà xuat bản:</label>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
      <img src="https://picsum.photos/200/300" alt="">
      <label for="" class="d-flex ml-4">giá: 12000</label>
      <label for="" class="d-flex ml-4">nhà xuat bản:</label>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
      <img src="https://picsum.photos/200/300" alt=""><br>
      <label for="">giá: 12000</label><br>
      <label for="">nhà xuat bản:</label>
    </div> -->
  </div>
</div>
<div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <?php for($i=0;$i<$pages;$i++):?>
      <?php $num=$i*6; ?>
      <a class="w3-button w3-hover-black" href="?st=<?php echo $num; ?>"><?php echo $i+1; ?></a>
      <?php endfor ?>
      <!-- <a class="w3-button w3-hover-black" href="#">3</a>
      <a class="w3-button w3-hover-black" href="#">4</a>
      <a class="w3-button w3-hover-black" href="#">5</a>
      <a class="w3-button w3-hover-black" href="#">»</a> -->
    </div>
  </div>

  <footer id="myFooter">
    <div class="w3-container w3-theme-l1">
      <p>Powered by <a href="https://www.facebook.com/nttthiencnttdn" target="_blank">thanh thien</a></p>
    </div>
  </footer>
</div>





<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>
</body>
</html>