<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();
}
?>

<!DOCTYPE html>
<html>
	<head>

  <!-- Trang web được lập trình bởi Dương Tùng Anh - C4K60 Chuyên Hà Nam -->
<!-- Mọi thông tin chi tiết xin liên hệ https://facebook.com/tunnaduong/ -->
	<!DOCTYPE html>
<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<!-- Latest compiled JavaScript -->
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<link crossorigin='anonymous' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css' integrity='sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/' rel='stylesheet'/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
	<style>
	.navtop {
	background-color: #2f3947;
	height: 60px;
	width: 100%;
	border: 0;
}
.navtop div {
	display: flex;
	margin: 0 auto;
	width: 1000px;
	height: 100%;
}
.navtop div h1, .navtop div a {
	display: inline-flex;
	align-items: center;
}
.navtop div h1 {
	flex: 1;
	font-size: 24px;
	padding: 0;
	margin: 0;
	color: #eaebed;
	font-weight: normal;
}
.navtop div a {
	padding: 0 20px;
	text-decoration: none;
	color: #c1c4c8;
	font-weight: bold;
}
.navtop div a i {
	padding: 2px 8px 0 0;
}
.navtop div a:hover {
	color: #eaebed;
}
body.loggedin {
	background-color: #f3f4f7;
}
.content {
	width: 1000px;
	margin: 0 auto;
}
.content h2 {
	margin: 0;
	padding: 25px 0;
	font-size: 22px;
	border-bottom: 1px solid #e0e0e3;
	color: #4a536e;
}
.content > p, .content > div {
	box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);
	margin: 25px 0;
	padding: 25px;
	background-color: #fff;
}
.content > p table td, .content > div table td {
	padding: 5px;
}
.content > p table td:first-child, .content > div table td:first-child {
	font-weight: bold;
	color: #4a536e;
	padding-right: 15px;
}
.content > div p {
	padding: 5px;
	margin: 0 0 10px 0;
}
	</style>
		<nav class="navtop">
			<div>
				<h1><a href="home.php">Đoàn trường THPT Chuyên Biên Hoà</a></h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Trang cá nhân</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
			</div>
		</nav>
		<div class="content">
			<h2>Hệ thống báo cáo dành cho xung kích</h2>
			<p>Chào mừng, <?=$_SESSION['name']?>!<br>
				<button style="float:right" type="button" class="btn btn-danger" onClick="window.location.reload();"><i class="fas fa-redo-alt"></i> Tải lại</button>
			<?php
			
function rebuild_date( $format, $time = 0 )
{
    if ( ! $time ) $time = time();

	$lang = array();
	$lang['sun'] = 'CN';
	$lang['mon'] = 'T2';
	$lang['tue'] = 'T3';
	$lang['wed'] = 'T4';
	$lang['thu'] = 'T5';
	$lang['fri'] = 'T6';
	$lang['sat'] = 'T7';
	$lang['sunday'] = 'Chủ nhật';
	$lang['monday'] = 'Thứ hai';
	$lang['tuesday'] = 'Thứ ba';
	$lang['wednesday'] = 'Thứ tư';
	$lang['thursday'] = 'Thứ năm';
	$lang['friday'] = 'Thứ sáu';
	$lang['saturday'] = 'Thứ bảy';
	$lang['january'] = 'Tháng Một';
	$lang['february'] = 'Tháng Hai';
	$lang['march'] = 'Tháng Ba';
	$lang['april'] = 'Tháng Tư';
	$lang['may'] = 'Tháng Năm';
	$lang['june'] = 'Tháng Sáu';
	$lang['july'] = 'Tháng Bảy';
	$lang['august'] = 'Tháng Tám';
	$lang['september'] = 'Tháng Chín';
	$lang['october'] = 'Tháng Mười';
	$lang['november'] = 'Tháng M. một';
	$lang['december'] = 'Tháng M. hai';
	$lang['jan'] = 'T01';
	$lang['feb'] = 'T02';
	$lang['mar'] = 'T03';
	$lang['apr'] = 'T04';
	$lang['may2'] = 'T05';
	$lang['jun'] = 'T06';
	$lang['jul'] = 'T07';
	$lang['aug'] = 'T08';
	$lang['sep'] = 'T09';
	$lang['oct'] = 'T10';
	$lang['nov'] = 'T11';
	$lang['dec'] = 'T12';

    $format = str_replace( "r", "D, d M Y H:i:s O", $format );
    $format = str_replace( array( "D", "M" ), array( "[D]", "[M]" ), $format );
    $return = date( $format, $time );

    $replaces = array(
        '/\[Sun\](\W|$)/' => $lang['sun'] . "$1",
        '/\[Mon\](\W|$)/' => $lang['mon'] . "$1",
        '/\[Tue\](\W|$)/' => $lang['tue'] . "$1",
        '/\[Wed\](\W|$)/' => $lang['wed'] . "$1",
        '/\[Thu\](\W|$)/' => $lang['thu'] . "$1",
        '/\[Fri\](\W|$)/' => $lang['fri'] . "$1",
        '/\[Sat\](\W|$)/' => $lang['sat'] . "$1",
        '/\[Jan\](\W|$)/' => $lang['jan'] . "$1",
        '/\[Feb\](\W|$)/' => $lang['feb'] . "$1",
        '/\[Mar\](\W|$)/' => $lang['mar'] . "$1",
        '/\[Apr\](\W|$)/' => $lang['apr'] . "$1",
        '/\[May\](\W|$)/' => $lang['may2'] . "$1",
        '/\[Jun\](\W|$)/' => $lang['jun'] . "$1",
        '/\[Jul\](\W|$)/' => $lang['jul'] . "$1",
        '/\[Aug\](\W|$)/' => $lang['aug'] . "$1",
        '/\[Sep\](\W|$)/' => $lang['sep'] . "$1",
        '/\[Oct\](\W|$)/' => $lang['oct'] . "$1",
        '/\[Nov\](\W|$)/' => $lang['nov'] . "$1",
        '/\[Dec\](\W|$)/' => $lang['dec'] . "$1",
        '/Sunday(\W|$)/' => $lang['sunday'] . "$1",
        '/Monday(\W|$)/' => $lang['monday'] . "$1",
        '/Tuesday(\W|$)/' => $lang['tuesday'] . "$1",
        '/Wednesday(\W|$)/' => $lang['wednesday'] . "$1",
        '/Thursday(\W|$)/' => $lang['thursday'] . "$1",
        '/Friday(\W|$)/' => $lang['friday'] . "$1",
        '/Saturday(\W|$)/' => $lang['saturday'] . "$1",
        '/January(\W|$)/' => $lang['january'] . "$1",
        '/February(\W|$)/' => $lang['february'] . "$1",
        '/March(\W|$)/' => $lang['march'] . "$1",
        '/April(\W|$)/' => $lang['april'] . "$1",
        '/May(\W|$)/' => $lang['may'] . "$1",
        '/June(\W|$)/' => $lang['june'] . "$1",
        '/July(\W|$)/' => $lang['july'] . "$1",
        '/August(\W|$)/' => $lang['august'] . "$1",
        '/September(\W|$)/' => $lang['september'] . "$1",
        '/October(\W|$)/' => $lang['october'] . "$1",
        '/November(\W|$)/' => $lang['november'] . "$1",
        '/December(\W|$)/' => $lang['december'] . "$1" );

    return preg_replace( array_keys( $replaces ), array_values( $replaces ), $return );
}


$contents = 'Bây giờ là: ' . rebuild_date('H:i l, d/m/Y' ) . '<br />';
 echo $contents;
?>
    <h3>Báo cáo hằng ngày</h3>
<style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
}
</style>
</head>
<body onload="myFunction()" style="margin:0;">

<div id="loader" style="color:red;"></div>

<div class="card card-warning">
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tên lớp</label>
                        <select class="form-control">
                          <option>9A1</option>
                          <option>9A2</option>
                          <option>9A3</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                    <i class="far fa-calendar-alt"></i>
                      <label> Ngày tháng năm</label>
                      <div class="form-group">
                      <div class="input-group">
                      
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        
                      </span>
                    </div>
                    <input type="text" class="form-control" value="25/11/2019">
                  </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Sĩ số</label>
                        <input type="text" class="form-control" value="35/35">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Vắng</label>
                        <input type="text" class="form-control" value="0">
                      </div>
                    </div>
                  </div>

                  <!-- input states -->
                  <div class="form-group">
                    <label class="col-form-label" for="inputError"> Vệ sinh</label>
                    <select class="form-control">
                          <option>Sạch</option>
                          <option>Bẩn</option>
                        </select>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputError"> Đồng phục</label>
                    <select class="form-control">
                          <option>Đủ</option>
                          <option>Thiếu</option>
                        </select>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i> Lỗi khác</label>
                    <input type="text" class="form-control is-invalid" id="inputError" placeholder="Nhập lỗi ...">
                  </div>

                  <div class="row">
                    <div class="col-sm-6" style="
    left: 18px;
">
                      <!-- radio -->
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1"checked>
                          <label class="form-check-label">Đi muộn (-1 điểm)</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1" >
                          <label class="form-check-label">Đi muộn (bỏ chạy) (-10 điểm)</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio">
                          <label class="form-check-label">Đi muộn sau 7 giờ (-15 điểm)</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                </form>
                <button type="button" class="btn btn-info" onclick="myFunc3()">Tiếp theo ></button>
              </div>
<script>
function myFunc() {
	if(document.getElementById('option1').checked) {
  //Male radio button is checked
  showPage2();
}else if(document.getElementById('option2').checked) {
  //Female radio button is checked
  showPage3();
}
}
function myFunc2() {
	if(document.getElementById('lop6').checked) {
  //Male radio button is checked
  showPageLop6();
}else if(document.getElementById('lop7').checked) {
  //Female radio button is checked
  showPageLop7();
}else if(document.getElementById('lop8').checked) {
  //Female radio button is checked
  showPageLop8();
}else if(document.getElementById('lop9').checked) {
  //Female radio button is checked
  showPageLop9();
}
}
function myFunc3() {
	if(document.getElementById('lop10').checked) {
  //Male radio button is checked
  showPageLop10();
}else if(document.getElementById('lop11').checked) {
  //Female radio button is checked
  showPageLop11();
}else if(document.getElementById('lop12').checked) {
  //Female radio button is checked
  showPageLop12();
}
}
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 1000);
}
function myFunction2() {
	document.getElementById("loader").style.display = "block";
  myVar = setTimeout(showPage2, 1000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
function showPage2() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "none";
  document.getElementById("myDiv2").style.display = "block";
}
function showPage3() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "none";
  document.getElementById("myDiv3").style.display = "block";
}
function showPageLop6() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv2").style.display = "none";
  document.getElementById("myDiv6").style.display = "block";
}
function showPageLop7() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv2").style.display = "none";
  document.getElementById("myDiv7").style.display = "block";
}
function showPageLop8() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv2").style.display = "none";
  document.getElementById("myDiv8").style.display = "block";
}
function showPageLop9() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv2").style.display = "none";
  document.getElementById("myDiv9").style.display = "block";
}
function showPageLop10() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv3").style.display = "none";
  document.getElementById("myDiv10").style.display = "block";
}
function showPageLop11() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv3").style.display = "none";
  document.getElementById("myDiv11").style.display = "block";
}
function showPageLop12() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv3").style.display = "none";
  document.getElementById("myDiv12").style.display = "block";
}
</script>

	</body>
</html>