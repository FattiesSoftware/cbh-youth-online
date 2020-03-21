<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// Include GitHub API config file
require_once 'gitConfig.php';

// Include and initialize user class
require_once 'User.class.php';
$user = new User();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	$PROP = 'none';
	$OUT = 'none';
} else {
	$PROP = 'block';
	$IN = 'none';
	$OUT = 'block';
}
if(isset($accessToken)){
		$none = 'none';
$PROP = 'block';
	$IN = 'none';
	$OUT = 'block';
}
?>


<!DOCTYPE html>
<html>
  <!-- Trang web được lập trình bởi Dương Tùng Anh - C4K60 Chuyên Hà Nam -->
<!-- Mọi thông tin chi tiết xin liên hệ https://facebook.com/tunnaduong/ -->
	<!DOCTYPE html>
<html dir='ltr' xmlns='http://www.w3.org/1999/xhtml' xmlns:b='http://www.google.com/2005/gml/b' xmlns:data='http://www.google.com/2005/gml/data' xmlns:expr='http://www.google.com/2005/gml/expr'>
<head>
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
</head>
<script>
//<![CDATA[
(function($){
	$.fn.chocolate = function(args) {
		// Default Options
		var options = $.extend({
			interval 	: 3000,
			speed 		: 1000
		}, args);
		return this.each(function() {
			
			var original = $(this);
			// Create element
			$div = $(document.createElement('div'));
			$div.css({
				position 	: 'absolute',
				zIndex 		: 0,
				overflow 	: 'hidden',
			});
			original.prepend($div);
		    $div.css(copybackground());
		    $div.css('background-image', 'url(' + args.images[0] + ')');
			
			// This element background none
			original.css('background', 'none');
		    
		    // Clone bg element
		    $div2 = $div.clone();
		    $div.after($div2);
			
			// Set postion
			$div.css(copyPosition());
			$div2.css(copyPosition());
			// Resize window
			$(window).resize(function() {
				$div.css(copyPosition());
				$div2.css(copyPosition());
			});
			// Copy background style
			function copybackground() {
				var backgroundProperties = [
		        	'Attachment', 'Color', 'Repeat',
		        	'Position', 'Size', 'Clip', 'Origin'
		    		];
			    var prop,
			    	copyStyle 			= {},
			    	i 					= 0;
			    for (; i < backgroundProperties.length; i++) {
			    	prop = 'background' + backgroundProperties[i];
			    	copyStyle[prop] = original.css(prop);
			    }
			    return copyStyle;
			}
			// Copy position style
		    function copyPosition() {
		    	var corners 	= ['Top', 'Right', 'Bottom', 'Left'];
			    var i 			= 0,
			    	position 	= original.position(),
			    	copyStyle 	= {
			    		top 	: position.top,
			    		left 	: position.left,
			    		width 	: original.innerWidth(),
			    		height 	: original.innerHeight()
			    	};
			    for (; i < corners.length; i++) {
		    		corner = corners[i];
		    		copyStyle['margin' + corner] = original.css('margin' + corner);
		    		copyStyle['border' + corner] = original.css('border' + corner);
		    	}
		    	return copyStyle;
		    }
		    var count 	= 0,
		    	current = 0;
			// Change background function
			var slide = function() {
				if (current == args.images.length - 1) current = 0;
				else current++;
				
				if (count == 0) {
					$div2.fadeOut(options.speed);
					$div.css('background-image', 'url(' + args.images[current] + ')').fadeIn(options.speed);
					count++;
				} else {
					$div.fadeOut(options.speed);
					$div2.css('background-image', 'url(' + args.images[current] + ')').fadeIn(options.speed);
					count = 0;
				}
			}		
			setInterval(function() {slide();}, options.interval);
		});
	}
})(jQuery);
//]]>
</script>
<script>
		$(function() {
			$('body').chocolate({
				images		: ['/bienhoa11.jpg', '/bienhoa22.jpg','/bienhoa33.jpg'],
				interval	: 4000,
				speed		: 2000,
			});
		});
	</script>
	<style id='page-skin-1' type='text/css'><!--
/*
-----------------------------------------------
Template Name  : Ego Cafe
Author         : NewBloggerThemes.com
Author URL     : http://newbloggerthemes.com/
Theme URL      : http://newbloggerthemes.com/ego-cafe-blogger-template/
Created Date   : Saturday, August 23, 2014
License        : This template is free for both personal and commercial use, But to satisfy the 'attribution' clause of the license, you are required to keep the footer links intact which provides due credit to its authors.For more information about this license, please use this link :http://creativecommons.org/licenses/by/3.0/
----------------------------------------------- */
wrappernbt{
position: relative;
width: 200px;
height: 200px;
}
contentabove{
color: #FFFFFF;
font-size: 26px;
font-weight: bold;
text-shadow: -1px -1px 1px #000, 1px 1px 1px #000;
position: relative;
z-index: 100;
}
mycarousel{
color: #999999;
position: absolute;
top: 0;
left: 0;
z-index: -100;
}
.btn-group button { margin: 0 7px; }
.modal-backdrop {
/* bug fix - no overlay */
display: none;
}
/* Variable definitions
====================
*/
/* Use this with templates/template-twocol.html */
.section, .widget {margin:0;padding:0;}
/* Reset */
body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,textarea,p,blockquote{margin:0;padding:0;}table{border-collapse:collapse;border-spacing:0;}fieldset,img{border:0;}address,caption,dfn,var{font-style:normal;font-weight:normal;}li{list-style:none;}caption,th{text-align:left;}h1,h2,h3,h4,h5,h6{font-size:100%;font-weight:normal;}
html,body{height:100%;
font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
}
html, body {
margin: 0;
padding: 0;
width: 100%;
height: 100%;
}
body{
margin:0;
padding:0;
text-align:left;
background-position: center center;
background-attachment: fixed;
background-repeat: repeat;
background-size: cover;
box-shadow:inset 0 0 100px rgba(0,0,0,0.5);
position:relative
}
.containerbg {
width: 800px;
padding: 27px;
background-color: rgba(0,0,0,.6);
border-radius: 10px;
position: absolute;
top: 70px;
left: 48%;
margin-left: -384px;
color: #fff;
padding-top: 24px;
margin-top: 125px;
}
.containerbg2 {
width: 800px;
padding: 27px;
background-color: rgba(0,0,0,.6);
border-radius: 10px;
position: absolute;
top: 70px;
left: 48%;
margin-left: -384px;
color: #fff;
padding-top: 24px;
margin-top: 0px;
}
#wrappernbt{position:relative;width:100%;margin:auto}
#headernbt{width:100%;padding:40px 0;margin:auto}
h1{font-family:'Damion',cursive;font-size:103px;text-align:center;color:#fff;}
h2{font-family:'Josefin Sans',sans-serif;font-size:30px;letter-spacing:4px;text-align:center;color:#fff;}
h2 strong.sep-onenbt{width:60px;height:1px;background:#fff;position:absolute;margin-left:-80px;margin-top:15px}
h2 strong.sep-twonbt{width:60px;height:1px;background:#fff;position:absolute;margin-left:15px;margin-top:15px}
#middlenbt{width:100%;padding:0px 0;margin:0px 0;text-align:center}
#middlenbt p{font-size:24px;color:#000;line-height:34px;padding:0 30%;text-align:center}
#middlenbt p span{color:#e63b4dtext-align:center}
#footernbt{width:100%;padding:130px 0;margin:130px 0;
margin-top: 25px;
margin-right: 0px;
margin-bottom: 25px;
margin-left: 0px;
padding-top: 245px;
padding-right: 0px;
padding-bottom: 20px;
padding-left: 0px;
}
@media screen and (max-width: 768px){
.containerbg {
text-align:left;
width: 400px;
padding: 15px;
top: 70px;
left: 96%;
margin-left: -384px;
margin-top: 0px;
}
.containerbg2 {
text-align:center;
width: 400px;
padding: 15px;
top: 70px;
left: 96%;
margin-left: -384px;
margin-top: 0px;
}
.container {

    margin-right: 3px;
    margin-left: 3px;

}
.sma {
padding-top: 7px;
    margin-top: 80px;
}
#headernbt{width:100%;padding:5px 0;margin:auto}
h1{font-size:53px;color:#fff;}
h2{font-size:15px;letter-spacing:2px;color:#fff;}
h2 strong.sep-onenbt{width:30px;margin-left:-40px;margin-top:7px}
h2 strong.sep-twonbt{width:30px;margin-left:10px;margin-top:7px}
#middlenbt{margin:50px 0 20px;width:100%;padding:5%;text-align:center}
#middlenbt p{font-size:10px;color:#000;line-height:24px;padding:0;text-align:center;}
#middlenbt p span{color:#e63b4d}
}
h2.date-header{margin:10px 0;display:none}
.main .widget{margin:0;padding:0}
#comments{padding:10px;margin-bottom:20px}
#comments h4{font-size:22px;margin-bottom:10px}
.deleted-comment{font-style:italic;color:gray}
#blog-pager-newer-link{float:left}
#blog-pager-older-link{float:right}
#blog-pager{text-align:center;padding:5px}
.feed-links{clear:both}
#navbar-iframe{height:0;visibility:hidden;display:none}
.separator a[style="margin-left: 1em; margin-right: 1em;"] {margin-left: auto!important;margin-right: auto!important;}
.themewidgetsec {display:none;}
.themewidgetsec .widget {display:none;}
.copyrightnbt {margin-top:10px;margin-bottom:10px;color:#fff;font-size:14px;text-align:center;}
.copyrightnbt a {color:#fff;text-decoration:none;}
.copyrightnbt a:hover {color:#eee;text-decoration:none;}
/* The Modal (background) */
.modal {
display: none; /* Hidden by default */
position: fixed; /* Stay in place */
z-index: 1; /* Sit on top */
left: 0;
top: 0;
width: 100%; /* Full width */
height: 100%; /* Full height */
overflow: auto; /* Enable scroll if needed */
background-color: rgb(0,0,0); /* Fallback color */
background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.h69, h69 {
font-size: 20px;
color: #333;
text-align: left;
font-weight: bold;
}
.h70, h70 {
font-size: 15px;
color: #333;
text-align: left;
.th, th, .td, td {
color: #333;
}
.h1, h1 {
color:#fff;
}
h3 {
    font-size: 140%;
    font-weight: normal;
}
--></style>
<center><div class='containerbg2' style="
    padding-top: 5px;
    padding-bottom: 15px;
">

<img src="/60namcbh.png" style="width: 100px;"/>
<h2><strong class='sep-onenbt'></strong>Cổng thông tin điện tử Đoàn trường<strong class='sep-twonbt'></strong></h2>
<h2>THPT Chuyên Biên Hoà</h2>

</div>
						
					  
</center>
<div class='containerbg sma' style="
    top: 150px;
">


<big><b><i class="fas fa-question-circle"></i> Đây là gì?</b></big>
<p>Chào mừng đến với cổng thông tin điện tử Đoàn trường Chuyên Biên Hoà!<br> Đây là nơi để tra cứu các thông tin, vấn đề liên quan đến Đoàn trường THPT Chuyên Biên Hoà.</p>
<br>
<big><b><i class="fas fa-bolt"></i> Bạn có thể làm được gì với website này?</b></big>
<p>- Tra cứu các lỗi vi phạm trong tuần của lớp
<br>- Tra cứu xếp hạng tháng
<br>- Biết được những sự kiện, hoạt động mới nhất của Đoàn trường THPT Chuyên Biên Hoà
<br>- Có thể đóng góp ý kiến, phản hồi của mình trực tiếp với xung kích hoặc thầy cô giáo
<br>Và nhiều hơn thế... Hãy tự mình khám phá nhé!
</p>
<br>
<div class="main-content">
    <div class="column">
        <p>&copy; Đoàn trường Chuyên Biên Hoà</p>
    </div>

    <div class="column">
        <p id="demo"></p>
    </div>

     <div class="column">
        <p> Designed and developed with <i class="fas fa-heart"></i> by <a href="https://facebook.com/tunnaduong/">Fatties Software</a></p>
    </div>
</div>
<style>
.column {    
    display: inline-block;
}
</style>
</div>
<script>

function myFunction() {
  var d = new Date();
  var n = d.getFullYear();
  document.getElementById("demo").innerHTML = n + ".";
}
myFunction()
</script>
<nav class='navbar navbar-inverse '>
<div class='container-fluid'>
<div class='navbar-header'>
<a class='navbar-brand' href='/'>Đoàn trường - CBH</a>
<button class='navbar-toggle' data-target='#myNavbar' data-toggle='collapse' type='button'>
<span class='icon-bar'></span>
<span class='icon-bar'></span>
<span class='icon-bar'></span>
</button>
</div>
<div class='collapse navbar-collapse' id='myNavbar'>
<ul class='nav navbar-nav'>
<li class='active'><a href='/'>Trang chủ</a></li>
<li class=''><a href='/forum'>Diễn đàn</a></li>
<li class=''><a class="nav-link dropdown-toggle" href="/tracuu" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tra cứu</a>
		  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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


<script src="//code.tidio.co/xk9nqvz3a3dzutblmspl6ct5spdbueji.js"> </script>
</body>
</html>
<footer class="footer">

		<hr>
        
        
      </footer>
      <!-- Bootstrap nhân JavaScript
    ================================================== -->
    <!-- Đặt ở cuối mã trang web để trang tải nhanh hơn -->
    <!-- IE10 viewport hack cho Surface/bug máy tính bàn Windows 8 -->
    <script src="https://v4-alpha.getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>