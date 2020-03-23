<?php
	session_start();
	require('connect.php');
	include('server2.php');
// Include GitHub API config file
require_once 'gitConfig.php';

// Include and initialize user class
require_once 'User.class.php';
$user = new User();

if (!isset($_SESSION['loggedin'])) {

	$OUT = 'none';
	$NOTICE = 'block';
		$WELCOME = 'Bạn chưa đăng nhập! Hãy đăng nhập để tham gia thảo luận.';
	$PROP = 'none';
	$OUT = 'none';
	$width = '490px';
		if(isset($accessToken)){
	$PROP = 'block';
	$IN = 'none';
	$OUT = 'block';
	$NOTICE = 'none';
	$width = '131px';
	$WELCOME = '';
}
} else {
	$NOTICE = 'none';
		$WELCOME = '';
	$PROP = 'block';
	$IN = 'none';
	$OUT = 'block';
	$width = '131px';
}

?>
<html>
<head>
	<title>Bài viết - Diễn đàn</title>
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
	<link rel="stylesheet" type="text/css" href="style.css">
<!--===============================================================================================-->
<!-- Latest compiled JavaScript -->
<link href='https://www.blogger.com/static/v1/widgets/2549344219-widget_css_bundle.css' rel='stylesheet' type='text/css'/>
<meta charset='utf-8'/>
<meta content='width=device-width, initial-scale=1' name='viewport'/>
<meta content='text/html; charset=utf-8' http-equiv='Content-Type'/>
<meta content='width=device-width, initial-scale = 1.0, user-scalable = no' name='viewport'/>
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:600,700%7CDamion" rel="stylesheet" type="text/css">
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
<meta content='blogger' name='generator'/>
<link href='https://c4k60.blogspot.com/favicon.ico' rel='icon' type='image/x-icon'/>
<link href='http://doantruongthptchuyenbienhoa.online/' rel='canonical'/>
<meta content='https://doantruongthptchuyenbienhoa.online/' property='og:url'/>
<meta content='Đoàn trường THPT Chuyên Biên Hoà' property='og:title'/>
<meta content='Cổng thông tin điện tử Đoàn trường THPT Chuyên Biên Hoà Online' property='og:description'/>
<!--[if IE]> <script> (function() { var html5 = ("abbr,article,aside,audio,canvas,datalist,details," + "figure,footer,header,hgroup,mark,menu,meter,nav,output," + "progress,section,time,video").split(','); for (var i = 0; i < html5.length; i++) { document.createElement(html5[i]); } try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {} })(); </script> <![endif]-->
<!-- Latest compiled and minified CSS -->
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'/>
<!-- jQuery library -->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<!-- Latest compiled JavaScript -->
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<link crossorigin='anonymous' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css' integrity='sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/' rel='stylesheet'/>
<title>Đoàn trường - CBH</title>
<script src="https://global.oktacdn.com/okta-signin-widget/3.2.0/js/okta-sign-in.min.js" type="text/javascript"></script>

<link href="https://global.oktacdn.com/okta-signin-widget/3.2.0/css/okta-sign-in.min.css" type="text/css" rel="stylesheet"/>

<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<link crossorigin='anonymous' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css' integrity='sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/' rel='stylesheet'/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
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
	<nav class='navbar navbar-inverse '>
<div class='container-fluid'>
<div class='navbar-header'>
<img src="/cbh.png" style="width: 40px;height: 40px;margin-top: 5px;margin-right: 5px;" alt="">
<button class='navbar-toggle' data-target='#myNavbar' data-toggle='collapse' type='button'>
<span class='icon-bar'></span>
<span class='icon-bar'></span>
<span class='icon-bar'></span>
</button>
</div>
<div class='collapse navbar-collapse' id='myNavbar'>
<ul class='nav navbar-nav'>
<li class=''><a href='/'>Trang chủ</a></li>
<li class='active'><a href='/forum'>Diễn đàn</a></li>
<li class=''><a class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href='/tracuu'>Tra cứu</a><div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <a class="dropdown-item " style="
    margin-left: 10px;
" href="/loivipham">Các lỗi vi phạm</a><br>
          <a class="dropdown-item " style="
    margin-left: 10px;
" href="/thoikhoabieu">Thời khoá biểu</a><br>
          <a class="dropdown-item " style="
    margin-left: 10px;
" href="/hocsinh">Học sinh</a>
        </div></li>
<li class=''><a href='/topvipham'>Top vi phạm</a></li>
<li class=''><a href='/hoatdong'>Hoạt động/Sự kiện</a></li>
<li class=''><a href='/baocao'>Báo cáo</a></li>
<li class=''><a href='/lienhe'>Liên hệ</a></li>
</ul> 
<ul class='nav navbar-nav navbar-right flex-row justify-content-between ml-auto'>
<li id="profile" style="display:<?=$PROP?>">
<a href="profile.php"><i class="fas fa-user-circle"></i> Trang cá nhân</a></li>
<li class='' style="display:<?=$IN?>"><a href='/baocao'><i class="fas fa-sign-in-alt"></i> Đăng nhập</a></li>
<li class='' style="display:<?=$OUT?>"><a href='/logout.php'><i class="fas fa-sign-in-alt"></i> Đăng xuất</a></li>

</ul>

</div>
</div>
</nav>
<div class="content">
	<style>
@media only screen and (max-width: 790px) {
.content {
	width: auto;
	margin: 0 auto;
    padding-left: 25px;
    padding-right: 25px;

}
}
</style>
	<?php 
	if($_GET["id"]){
		
		$query = "SELECT * FROM topics WHERE topic_id='".$_GET['id']."'";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results)){
			while($row=mysqli_fetch_assoc($results)){
				$view=$row['view'];
				$query_u = "SELECT * FROM accounts WHERE username='".$row['topic_creator']."'";
				$results_u = mysqli_query($db, $query_u);
				if( $results ){
				while($row_u=mysqli_fetch_assoc($results_u)){
					$user_idc = $row_u['id'];					
				}
				} else {
				}
				echo "<h1>" .$row['topic_name']."</h1>";
				$class = '"fas fa-eye"';
				$class2 = '"far fa-calendar-alt"';
				$class3 = '"fas fa-user"';
				$style = '"
    padding-top: 5px;
    padding-bottom: 5px;
"';
				echo "<h5><i class=$class3></i> Bởi <a href='/profile.php?id=".$user_idc."'>".$row['topic_creator']."</a><br/><i class=$class2 style=$style></i> Vào ngày ".$row['date']."<br><i class=$class></i> Lượt xem: " .$view. "</h5>";
				echo "<hr>";
				echo $row['topic_content'];
				
				
				?>
	<!-- get like-->
	
	<div class="topics-wrapper" style="
    width: <?=$width?>;
">
   	<div class="topic">
	<p style="display:<?=$NOTICE?>">Đăng nhập để trả lời và bày tỏ cảm xúc đối với bài viết này</p>
      <div class="topic-info" style="display:<?=$OUT?>">
	    <!-- if user likes topic, style button differently -->
      	<i <?php if (userLiked($_GET['id'])): ?>
      		  class="fa fa-thumbs-up like-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-up like-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $_GET['id'] ?>"></i>
      	<span class="likes"><?php echo getLikes($_GET['id']); ?></span>
      	
      	&nbsp;&nbsp;&nbsp;&nbsp;

	    <!-- if user dislikes topic, style button differently -->
      	<i 
      	  <?php if (userDisliked($_GET['id'])): ?>
      		  class="fa fa-thumbs-down dislike-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-down dislike-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $_GET['id'] ?>"></i>
      	<span class="dislikes"><?php echo getDislikes($_GET['id']); ?></span>
      </div>
   	</div>
  </div>
  <script src="scripts.js"></script>
<?php
			
			}
		}else {
			echo "Không tồn tại bài viết này";
			
			
		 }
		
		/////////////////////////////////////////////////////
		
			include("view.php");
		
		
	}else{
		header("Location: index.php");
	}
	
	?>
	
	</center>
	

</body>
</html>

