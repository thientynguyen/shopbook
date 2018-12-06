<?php
$loai=LoaiDB::getLoai();
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
<script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
  <script src="../js/jquery-3.3.1.slim.min.js" type="text/javascript" charset="utf-8" async defer></script>
  <script src="../js/popper.min.js" type="text/javascript" charset="utf-8" async defer></script>
  <link rel="stylesheet" type="text/css" href="../stylesheets/bootstrap.min.css"> 
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
    <!-- <label for="" class=".text-white float-right pr-4 mr-4"><?php echo $name; ?></label> -->
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
  <div>
    <a href="?action=add_book" title="" class="btn btn-primary" role="button">add book</a>
  <div>
    <center><h1>list book </h1></center>
  </div>
  </div>
  <div class="row">
    <?php foreach ($list_books as $key => $value): ?>
       <div class="col-xs-12 col-sm-6 col-md-4">
      <div class="form-group">
        <img src="image/imgbook/<?php echo $value->getAnh(); ?>" alt="<?php echo $value->getTenSach(); ?>" class="imgbook">
      <label for="" class="d-flex ml-4"><?php echo $value->getTenSach(); ?></label>
      <label for="" class="d-flex ml-4">tac gia: <?php echo $value->getTacGia(); ?></label>
       <label for="" class="d-flex ml-4">Giá: <?php echo $value->getGia(); ?></label>
      <div>
         <a class="btn btn-outline-success" href="?action=edit_book&id=<?php echo $value->getMaSach(); ?>" role="button">EDIT</a>
        <a class="btn btn-outline-danger" href="?action=delete&id=<?php echo $value->getMaSach(); ?>" role="button">Delete</a>
      </div>
      </div>
    </div>
    <?php endforeach ?>
  </div>
</div>
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