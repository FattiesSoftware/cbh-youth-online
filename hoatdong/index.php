<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/require/githubConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/require/serverconnect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/require/github.user.class.php';

$user = new User();
// If the user is not logged in redirect to the login page...

if(isset($accessToken)){
	   // Get the user profile info from Github
    $gitUser = $gitClient->apiRequest($accessToken);

    if(!empty($gitUser)){
        // User profile data
        $gitUserData = array();
        $gitUserData['oauth_provider'] = 'github';
        $gitUserData['oauth_uid'] = !empty($gitUser->id)?$gitUser->id:'';
        $gitUserData['name'] = !empty($gitUser->name)?$gitUser->name:'';
        $gitUserData['username'] = !empty($gitUser->login)?$gitUser->login:'';
        $gitUserData['email'] = !empty($gitUser->email)?$gitUser->email:'';
        $gitUserData['location'] = !empty($gitUser->location)?$gitUser->location:'';
        $gitUserData['picture'] = !empty($gitUser->avatar_url)?$gitUser->avatar_url:'';
        $gitUserData['link'] = !empty($gitUser->html_url)?$gitUser->html_url:'';
        
        // Insert or update user data to the database
        $userData = $user->checkUser($gitUserData);
        
        // Put user data into the session
        $_SESSION['userData'] = $userData;
$OUT1 = 'none';

    }else{
		    $OUT1 = 'block';
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
    
	$none = 'none';
$PROP = 'block';
	$IN = 'none';
	$OUT = 'block';
	}elseif(isset($_GET['code'])){
    // Verify the state matches the stored state
    if(!$_GET['state'] || $_SESSION['state'] != $_GET['state']) {
        header("Location: ".$_SERVER['PHP_SELF']);
    }
    
    // Exchange the auth code for a token
    $accessToken = $gitClient->getAccessToken($_GET['state'], $_GET['code']);
  
    $_SESSION['access_token'] = $accessToken;
  
    header('Location: ./');
}else{
// Generate a random hash and store in the session for security
    $_SESSION['state'] = hash('sha256', microtime(TRUE) . rand() . $_SERVER['REMOTE_ADDR']);
    
    // Remove access token from the session
    unset($_SESSION['access_token']);
  
    // Get the URL to authorize
    $loginURL = $gitClient->getAuthorizeURL($_SESSION['state']);
    
    // Render Github login button
    $output2 = '<a type="button" href="'.htmlspecialchars($loginURL).'" class="col-1" style="color: rgb(51, 51, 51);"><i class="fab fa-2x fa-github"></i></a>';
$PROP = 'none';
	$OUT = 'none';
}



if (!isset($_SESSION['loggedin'])) {	


} else {

	$none = 'none';
$PROP = 'block';
	$IN = 'none';
	$OUT = 'block';
}

$sukien = 'active';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/style.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/navbar.php';
?>
<head>
<style>
.story {

	padding:10px 5px;
}
.story .story-item {
	height: 160px;
    border-radius: 15px;
    background: #3e7fff;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    color: white;
	position:relative;
	font-size:13px;	
}  
.story .story-item:before {
   content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: black;
    opacity: .2;
    border-radius: 15px;
	
  } 
.story .story-item span {
	position:absolute;bottom:0;
	padding:10px 5px; 
  font-family: sans-serif;
}
.story .owl-stage {
    right: 15px;
}

.rounded2 {
  background-image:url(/images/cbh.png);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;
  width:32px;
  height:32px;
  margin:5px;
  position:absolute;
  border-radius:50%;
 border:2px solid #3877e1;
}
.rounded3 {
  background-image:url(/images/91418261_617122312469777_1248862299381301248_n.png);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;
  width:32px;
  height:32px;
  margin:5px;
  position:absolute;
  border-radius:50%;
 border:2px solid #3877e1;
}
.rounded4 {
  background-image:url(/images/phatdeptrai.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;
  width:32px;
  height:32px;
  margin:5px;
  position:absolute;
  border-radius:50%;
 border:2px solid #3877e1;
}
.rounded5 {
  background-image:url(/images/ano.png);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;
  width:32px;
  height:32px;
  margin:5px;
  position:absolute;
  border-radius:50%;
 border:2px solid #3877e1;
}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
	<style type="text/css">
		.content {
    width: 600px;
    margin: 0 auto;
}
.vertical-center {
  margin: 0;
  position: absolute;
         top: 23%;
       right: 35.5%;

  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
.fa-arrow-right{
	 margin: 0;
  position: absolute;
top: 34.9%;
    right: 39.2%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

.wrap , .wrap2{
  max-width:600px;
  margin:auto;
  background:#fff; 
}
  .media{
    padding:1em;
  }
  .media-img, .media-desc{
    display:inline-block;
    vertical-align:top;
  }
  .media-img {
    margin:0 1em 0 0;
    width:30%;
    height:100px;
    background-color:#f0f0f0;
  }
  .media-desc{
    width:60%;
  }
  .media-desc .bar{
    margin:0 0 1em 0;
    height:20px;
    background-color:#f0f0f0;
  }

  .media-img, .media-desc .bar{
    -webkit-animation: gleam 2s ease-in-out infinite;
    background-image:-webkit-linear-gradient(left, #E9EAED, #f8f8f8, #E9EAED);
    background-size:600px auto;
  }

@-webkit-keyframes gleam{
  0% { background-position:0 0 }
  100% { background-position:600px 0 }
}
#mydiv, #post1, #post2, .wrap, #butto66{
box-shadow: 0px 0px 8px -1px rgba(0,0,0,0.75);
-webkit-box-shadow: 0px 0px 3px -1px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 8px -1px rgba(0,0,0,0.75);
border-radius: 7px;
}
}
#u_0_v {
  width: 500px;
  margin: 0 auto;
}

.lightui1{border-color:#bdbdbd;border-radius:2px;
padding: 20px;
background: #ffffff;}

.lightui1-shimmer {
  -webkit-animation-duration: 1s;
  -webkit-animation-fill-mode: forwards;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-name: placeHolderShimmer;
  -webkit-animation-timing-function: linear;
  background: #d8d8d8;
  background-image: linear-gradient(to right, #d8d8d8 0%, #bdbdbd 20%, #d8d8d8 40%, #d8d8d8 100%);
  background-repeat: no-repeat;
  background-size: 800px 104px;
  height: 104px;
  position: relative
}

.lightui1-shimmer div {
  background: #ffffff;
  height: 6px;
  left: 0;
  position: absolute;
  right: 0
}




._2iwo {
  height: 200px;
  padding: 12px
}


div._2iwr {
  height: 40px;
  left: 40px;
  right: auto;
  top: 0;
  width: 8px;
}

div._2iws {
  height: 8px;
  left: 48px;
  top: 0
}

div._2iwt {
  left: 136px;
  top: 8px
}

div._2iwu {
  height: 12px;
  left: 48px;
  top: 14px
}

div._2iwv {
  left: 100px;
  top: 26px
}

div._2iww {
  height: 10px;
  left: 48px;
  top: 32px
}

div._2iwx {
  height: 20px;
  top: 40px
}

div._2iwy {
  left: 410px;
  top: 60px
}

div._2iwz {
  height: 13px;
  top: 66px
}

div._2iw- {
  left: 440px;
  top: 79px
}

div._2iw_ {
  height: 13px;
  top: 85px
}

div._2ix0 {
  left: 178px;
  top: 98px
}

@-webkit-keyframes placeHolderShimmer {
  0% {
    background-position: -468px 0
  }
  100% {
    background-position: 468px 0
  }
}

@-webkit-keyframes prideShimmer {
  from {
    background-position: top left
  }
  to {
    background-position: top right
  }
}


.bgColor {
max-width: 440px;
height:150px;
background-color: #fff4be;
border-radius: 4px;
}
.bgColor label{
font-weight: bold;
color: #A0A0A0;
}
#targetLayer{
float:left;
width:150px;
height:150px;
text-align:center;
line-height:150px;
font-weight: bold;
color: #C0C0C0;
background-color: #F0E8E0;
border-bottom-left-radius: 4px;
border-top-left-radius: 4px;
}
#uploadFormLayer{
  float:left;
  padding: 20px;
}
.btnSubmit {
  background-color: #696969;
    padding: 5px 30px;
    border: #696969 1px solid;
    border-radius: 4px;
    color: #FFFFFF;
    margin-top: 10px;
}
.inputFile {
  padding: 5px;
  background-color: #FFFFFF;
  border:#F0E8E0 1px solid;
  border-radius: 4px;
}
.image-preview {  
width:150px;
height:150px;
border-bottom-left-radius: 4px;
border-top-left-radius: 4px;
}

.container{padding:20px;margin:20px 0;}

/* Radio group */
.segmented {
    display:flex;
    flex-flow:row wrap;
    box-sizing:border-box;
    font-family:"Helvetica Neue";
    font-size:90%;
    text-align:center;
}
.segmented label {
    display:block;
    flex:1;
    box-sizing:border-box;
    border:1px solid #167efb;
    border-right:none;
    color:#167efb;
    margin:0;
    padding:.4em;
    cursor: pointer;
    user-select:none;
    -webkit-user-select:none;
}
.segmented label.checked {
    background:#167efb;
    color:#fff;
}
.segmented.inverted label {
    border-color:#fff;
    color:#fff;
    background:none;
}
.segmented.inverted label.checked {
    background:#fff;
    color:inherit;
}
.segmented label:first-child {
    border-radius:.4em 0 0 .4em;
    border-right:0;
}
.segmented label:last-child {
    border-radius:0 .4em .4em 0;
    border-right:1px solid;
}
.segmented input[type="radio"] {
    appearance:none;
    -webkit-appearance:none;
    margin:0;
    position: absolute;
}

	</style>




<script>
setTimeout(myFunction, 2000);
function myFunction() {
	document.getElementById("loader").style.display = "none";
  document.getElementById("newsfeed").style.display = "block";
}
</script>
<body style="background-color: #f0f2f5;">
<div class="content">
	<center>
<div class="container" id="tuychonbangtin" style="
    margin-top: 0px;
    margin-bottom: 0px;
    padding-bottom: 10px;
">
  <div class="segmented">
    <label class="checked"><input type="radio" name="segmented" checked /> Tin tức Đoàn</label>
    <label><input type="radio" name="segmented" /> Bảng tin</label>
    <label><input type="radio" name="segmented" /> Theo dõi</label>
    <label><input type="radio" name="segmented" /> Mới nhất</label>
  </div>
</div>
	</center>
	<script type="text/javascript">
		$(document).ready(function(){
    $(".segmented label input[type=radio]").each(function(){
        $(this).on("change", function(){
            if($(this).is(":checked")){
               $(this).parent().siblings().each(function(){
                    $(this).removeClass("checked");
                });
                $(this).parent().addClass("checked");
            }
        });
    });
});
	</script>
<div class="story owl-carousel owl-theme" style="position: relative;">
<div class="story-item item" style="display:inline-block;width: 100px;background-image:url(/images/Untitled.png);"> 
 </div>
  <div class="story-item item" style="display:inline-block;width: 100px;background-image:url(https://4.img-dpreview.com/files/p/E~TS590x0~articles/3925134721/0266554465.jpeg);"> 
    <div class="rounded2"></div>
    <span>Đoàn trường THPT...<span></div>
  <div class="story-item item" style="display:inline-block;width: 100px;background-image:url(https://cdn.pixabay.com/photo/2015/06/19/17/58/sample-815141_960_720.jpg);" >  
    <div class="rounded3"></div>
    <span>Dương Tùng Anh<span></div>
  <div class="story-item item" style="display:inline-block;width: 100px;background-image:url(https://petapixel.com/assets/uploads/2012/02/sample1_mini.jpg);"> 
     <div class="rounded4"></div>
    <span>Hoàng Phát<span> 
	
	</div>
   <div class="story-item item" style="display:inline-block;width: 100px;background-image:url(/images/66697436_164358718059514_7054969003315298304_o.jpg);"> 
     <div class="rounded5"></div>
    <span>Cái gì vậy má?!<span> 
  
  </div>
<span ><i class="fas fa-arrow-circle-right" style="font-size: 40px;margin: 0;
  position: absolute;
  top: 41%;right: 5%;
  -ms-transform: translateY(-50%);
  -ms-transform: translateY(-50%);"></i><span>
</div>

<div id="mydiv" style="background-color: white;padding-top: 10px;padding-left:20px;padding-right: 20px;padding-bottom: 48px;">
  <div>
<img src="/images/dta.jpg" style="border-radius: 50%;width: 40px;display: inline-block;">

<div id="textbox" onclick="setTimeout(myFunction2, 2000);" data-toggle="modal" data-target="#myModal" style="display: inline-block;;width: 510px;margin-left: 5px;height: 41px;padding-top: 8px;border-radius: 20px;padding-left: 13px;transition: 0.3s;cursor: pointer;">Bạn đang nghĩ gì vậy, Tùng Anh?</div>
<style type="text/css">
  #textbox{
    background-color: #f0f2f5

   }
  #textbox:hover{

    background-color: #e6e6e6
   }
</style>
<hr style="margin-top: 10px;margin-bottom: 8px;">
</div>
<div id="butto1" style="
    
    height: 40px;
    width: 270px;
    padding-top: 8px;
    position: absolute;
    float: left;
    border-radius: 7px;transition: 0.3s;
cursor: pointer;
">
<div style="width: auto;
  padding: 0 86px;
  height: 100%;
  float: left;
  text-align: left;
 color: #65676b;">
 
<i class="fas fa-images" style="color: #45bd62"></i> Ảnh/Video
  </div>
</div>
<div id="butto2" style="
     height: 40px;
    width: 270px;
    padding-top: 8px;
 border-radius: 7px;
    float: right;transition: 0.3s;cursor: pointer;
">
  <div  style="   width: auto;
  padding: 0 51px;
  height: 100%;
  float: right;
  text-align: left;
 color: #65676b">
<i class="fas fa-smile" style="color: #f7b928"></i></i> Cảm xúc/Hoạt động
</div>
  </div>
  <style type="text/css">
   #butto1:hover{
    background-color: #f0f2f5
   }
   #butto2:hover{
    background-color: #f0f2f5
   }

 </style>
</div>



<!-- The Modal -->
<div class="modal" id="myModal" >
  <div class="modal-dialog">
    <div class="modal-content" style="width: 600px;top: 200px;left: -10%;">

      <!-- Modal Header -->
      <div class="modal-header" style="
    padding-left: 240px;
">
        <h4 class="modal-title" style="text-align: center;">Tạo bài viết</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="
    height: 297px;
">
<div id="createpost" style="display: none;">
        <img src="/images/dta.jpg" style="border-radius: 50%;width: 40px;display: inline-block;position: absolute;margin-top: 5px;">
  <div style="display: inline-block;margin-left: 52px;">
  <p style="
    margin-bottom: 0px;
"><strong style="">Dương Tùng Anh</strong></p>
<div id="butto55" style="
    height: 21px;
    width: 83.11687px;
    padding-top: 2px;
    position: absolute;
    float: left;
    border-radius: 7px;
    transition: 0.3s;
    cursor: pointer;
    padding-left: 5px;background-color: #f1f1f1;
">
<div style="
  width: 78px;
  padding: 0 0;
  height: 100%;
  float: left;
  text-align: left;
  color: #65676b;
  ">

<p style="position: absolute;font-size: 12px;color:#9e9b9b">
  <i class="fas fa-globe-americas"></i> Công khai</p>
</div>
</div>

</div>

<form id="myform" action="index.php" method="POST" enctype=multipart/form-data>

  <input type="hidden" id="avatar" name="avatar" value="/images/dta.jpg">
  <input type="hidden" id="username" name="username" value="<?=$_SESSION['username']?>">
  <input type="hidden" id="name" name="name" value="<?=$_SESSION['name']?>">
<div id="textbox2" onkeyup="success()" style="display: inline-block;width: 530px;height: 41px;border-radius: 20px;transition: 0.3s;margin-top: 28px;"><textarea class="commentar" id="postcontent" name="postcontent" placeholder="Bạn đang nghĩ gì?" style="outline: none;resize: none;overflow: auto;width: 567px;height: 160px;padding-top: 7px;background-color: white;padding-left: 0px;font-size: 25px;"></textarea>
</div>
<script type="text/javascript">
  function success() {
   if(document.getElementById("textbox2").value==="") { 
            document.getElementById('post_button').disabled = true; 
        } else { 
            document.getElementById('post_button').disabled = false;
        }
    }
</script>
<div id="butto66" style="
    height: 48px;
    width: 566px;
    padding-top: 2px;
    position: absolute;
    float: left;
    border-radius: 7px;
    transition: 0.3s;
    padding-left: 5px;
    display: block;
">
<p style="
    margin-top: 10px;
    margin-left: 13px;
    width: 135px;
    cursor: pointer;
    float: left;
">
Thêm vào bài viết
</p>
<i class="fas fa-ellipsis-h" style="float: right;margin-top: 15px;margin-right: 20px;cursor: pointer;"></i>
<i class="fas fa-smile" style="float: right;margin-top: 13px;margin-right: 20px;font-size: 20px;color: #f7b928;cursor: pointer;"></i>
<i class="fas fa-map-marker-alt" style="float: right;margin-top: 13px;margin-right: 20px;font-size: 20px;color: #f5533e;cursor: pointer;"></i>
<i class="fas fa-user-tag" style="float: right;margin-top: 13px;margin-right: 20px;font-size: 20px;color: #037bff;cursor: pointer;"></i>
<i class="fas fa-images" onclick="myfunction3()" style="float: right;margin-top: 13px;margin-right: 20px;font-size: 20px;color: #45bd62;cursor: pointer;"></i>
<i class="fas fa-circle" style="float: right;margin-top: 11px;margin-right: 47px;font-size: 24px;color: #2abba7;cursor: pointer;"><p style="position: absolute;font-size: 11px;color: white;margin-top: 6px;margin-left: 2px;">GIF</p></i>
</div>
<style type="text/css">
  .fa-circle:before {
    content: "\f111";
    position: absolute;
}
</style>
<script type="text/javascript">
  function myfunction3(){
    document.getElementById("butto66").style.display = "none";
    document.getElementById("custom-file").style.display = "block";
  }
   
</script>

  <div class="custom-file" id="custom-file" style="display: none;">


  <div class="custom-file">
    <input type="file" class="custom-file-input" name="userfile" id="customFile">
    <label class="custom-file-label" name="imagefilename" for="customFile">Choose file</label>
  </div>
  </div>
<?php
error_reporting(0);
if(!empty($_POST)) {
 $name = $_POST['name'];
 $email = $_POST['postcontent'];
 $time = date('Y-m-d H:i:s');
 $avatar = $_POST['avatar'];
 $image = "images/". $_FILES['userfile']['name']."";
 $username2 = $_POST['username'];
 if (!empty($_FILES['userfile']['name'])){
    $has_image = 'block';
 } else {
    $has_image = 'none';
 }
 require $_SERVER['DOCUMENT_ROOT'] . '/require/serverconnect.php';
  $errors=array();
      $allowed_e=array('png','jpg','jpeg');
      $file_name=$_FILES['userfile']['name'];
      $file_e=strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
      $file_s= $_FILES['userfile']['size'];
      $file_tmp=$_FILES['userfile']['tmp_name'];
      
    
      if($file_s>5097152){
        $errors[]='Chỉ có thể upload ảnh <5MB';
      }
      if(empty($errors)){
        move_uploaded_file($file_tmp,'images/'.$file_name);
       $sql = "INSERT INTO tintuc_posts (author, content, timeofpost, has_comment, avatar, has_image, image, username)
VALUES ('$name', '$email', '$time', 'no', '$avatar', '$has_image', ' $image', '$username2')";

if (mysqli_query($conn, $sql)) {
 echo "<script>console.log('Lệnh SQL thực thi thành công');";
} else {
 echo "Error: " . $sql . "" . mysqli_error($conn);
}
$con->close();  
        
        echo "console.log('Upload ảnh thành công');</script>";
      }else{
        foreach($errors as $error){
          echo $error,'<br/>';
        }
      }
} 
 
?>


<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>



</div>

<script>
$('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });
function myFunction2() {
  document.getElementById("light").style.display = "none";
  document.getElementById("createpost").style.display = "block";
}
</script>
<div class="lightui1" id="light" style="
    padding-left: 0px;
    padding-right: 0px;
    padding-top: 0px;
">
      <div class="lightui1-shimmer">
        <div class="_2iwr"></div>
        <div class="_2iws"></div>
        <div class="_2iwt"></div>
        <div class="_2iwu"></div>
        <div class="_2iwv"></div>
        <div class="_2iww"></div>
        <div class="_2iwx"></div>
        <div class="_2iwy"></div>
        <div class="_2iwz"></div>
        <div class="_2iw-"></div>
        <div class="_2iw_"></div>
        <div class="_2ix0"></div>
      </div>
  </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer" style="border-top: 0 none;padding-top: 0px;">
        <button type="submit" id="post_button" name="post_button" class="btn btn-primary2 btn-primary" style="
    width: 626px;border-radius: 7px;
" disabled>Đăng bài viết</button>
</form>
      </div>

    </div>
  </div>
</div>






<div id="newsfeed" style="display: none;">


<div id="post2" style="background-color: white;padding-top: 10px;padding-left: 0px;padding-right: 0px;padding-bottom: 5px;margin-top: 20px;">
  <img src="/images/60namcbh.png" style="border-radius: 50%;width: 40px;display: inline-block;position: absolute;margin-left: 15px;">
  <div style="display: inline-block;margin-left: 65px;">
  <p style="
    margin-bottom: 0px;
"><strong style="">Đoàn trường THPT Chuyên Biên Hòa <i id='tunganh2' title='Tài khoản đã xác minh' style='color:#07f;font-size:14px;display:none;display:inline' class='fas fa-check-circle'></i></strong></p><p style="position: absolute;font-size: 12px;color:#9e9b9b">
  <a href="post.php?id=1015" style="color: #9e9b9b">Được tài trợ</a> · <i class="fas fa-globe-americas"></i></p>

</div>
 <i class="fas fa-ellipsis-h" style="float: right;margin-top: 7px;margin-right: 15px;cursor: pointer;"></i>
 <div id="post-content" style="
    margin-left: 15px;
    margin-right: 15px;
">
<p style="
    margin-top: 25px;
">THÔNG BÁO<br>
Lễ khánh thành Trường THPT Chuyên Biên Hòa - Hà Nam
</p>
</div>
<img src="/images/bienhoa11.jpg" style="width: 600px;margin-bottom: 0px;cursor: pointer;">
<div id="reaction">
<div id="butto2" style="
     height: 33px;
     width: 200px;
     padding-top: 5px;
     border-radius: 7px;
     float:left;
     transition: 0.3s;
     cursor: pointer;
     margin-top: 4px;
     margin-left: 0px;
">
  <div  style="
  width: auto;
  padding: 0 69px;
  height: 38px;
  text-align: left;
  color: #65676b;
  ">
<i class="far fa-thumbs-up"></i> Thích
</div>
</div>
<div id="butto2" style="
     height: 33px;
     width: 200px;
     padding-top: 5px;
     border-radius: 7px;
     float:left;
     transition: 0.3s;
     cursor: pointer;
     margin-top: 4px;
     margin-left: 0px;
">
  <div  style="
  width: 203px;
  padding: 0 58px;
  height: 38px;
  text-align: left;
  color: #65676b;
  ">
<i class="far fa-comment"></i> Bình luận
</div>
</div>
<div id="butto2" style="
     height: 33px;
     width: 200px;
     padding-top: 5px;
     border-radius: 7px;
     float:left;
     transition: 0.3s;
     cursor: pointer;
     margin-top: 4px;
     margin-left: 0px;
">
  <div  style="
  width: 200px;
  padding: 0 62px;
  height: 38px;
  text-align: left;
  color: #65676b;
  ">
<i class="far fa-share-square"></i> Chia sẻ
</div>
</div>
<hr style="
    margin-bottom: 38px;
    margin-top: 0px;
    margin-left: 15px;
    margin-right: 15px;
">
<hr style="
   margin-bottom: 10px;
   margin-top: 6px;
   margin-left: 15px;
   margin-right: 15px;
">
<img src="/images/dta.jpg" style="border-radius: 50%;width: 40px;float:left;margin-left: 20px;">

<div id="textbox2" style="display: inline-block;width: 530px;height: 41px;border-radius: 20px;transition: 0.3s;"><textarea class="commentar" placeholder="Viết một bình luận..." style="outline: none;resize: none;overflow: auto;border-radius: 24px;width: 445px;height: 40px;margin-left: 9px;padding-top: 7px;"></textarea>
<i class="fas fa-camera" style="float: right;margin-right: 15px;margin-top: 12px;cursor: pointer;"></i>
<i class="far fa-smile" style="float: right;margin-right: 15px;margin-top: 12px;cursor: pointer;"></i>
</div>
</div>
</div>



<?php
$sql = "SELECT id, author, content, timeofpost, image, has_image, avatar FROM tintuc_posts ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
 echo "<div id='post2' style='background-color: white;padding-top: 10px;padding-left: 0px;padding-right: 0px;padding-bottom: 5px;margin-top: 20px;'>
  <img src='".$row['avatar']."' style='border-radius: 50%;width: 40px;display: inline-block;position: absolute;margin-left: 15px;'>
  <div style='display: inline-block;margin-left: 65px;'>
  <p style='
    margin-bottom: 0px;
'><strong style=''>".$row['author']." <i id='tunganh2' title='Tài khoản đã xác minh' style='color:#07f;font-size:14px;display:none;display:inline' class='fas fa-check-circle'></i></strong></p><p style='position: absolute;font-size: 12px;color:#9e9b9b'>
  <a href='post.php?id=1015' style='color: #9e9b9b'>".$row['timeofpost']."</a> · <i class='fas fa-globe-americas'></i></p>

</div>
 <i class='fas fa-ellipsis-h' style='float: right;margin-top: 7px;margin-right: 15px;cursor: pointer;'></i>
 <div id='post-content' style='
    margin-left: 15px;
    margin-right: 15px;
'>

<p style='
    margin-top: 25px;
'>".$row['content']."
</p>
</div>
<img src='".$row['image']."' style='width: 600px;margin-bottom: 0px;cursor: pointer;display: ".$row['has_image']."'>
<div id='reaction'>
<div id='butto2' style='
     height: 33px;
     width: 200px;
     padding-top: 5px;
     border-radius: 7px;
     float:left;
     transition: 0.3s;
     cursor: pointer;
     margin-top: 4px;
     margin-left: 0px;
'>
  <div  style='
  width: auto;
  padding: 0 69px;
  height: 38px;
  text-align: left;
  color: #65676b;
  '>
<i class='far fa-thumbs-up'></i> Thích
</div>
</div>
<div id='butto2' style='
     height: 33px;
     width: 200px;
     padding-top: 5px;
     border-radius: 7px;
     float:left;
     transition: 0.3s;
     cursor: pointer;
     margin-top: 4px;
     margin-left: 0px;
'>
  <div  style='
  width: 203px;
  padding: 0 58px;
  height: 38px;
  text-align: left;
  color: #65676b;
  '>
<i class='far fa-comment'></i> Bình luận
</div>
</div>
<div id='butto2' style='
     height: 33px;
     width: 200px;
     padding-top: 5px;
     border-radius: 7px;
     float:left;
     transition: 0.3s;
     cursor: pointer;
     margin-top: 4px;
     margin-left: 0px;
'>
  <div  style='
  width: 200px;
  padding: 0 62px;
  height: 38px;
  text-align: left;
  color: #65676b;
  '>
<i class='far fa-share-square'></i> Chia sẻ
</div>
</div>
<hr style='
    margin-bottom: 38px;
    margin-top: 0px;
    margin-left: 15px;
    margin-right: 15px;
'>
<hr style='
   margin-bottom: 10px;
   margin-top: 6px;
   margin-left: 15px;
   margin-right: 15px;
'>
<img src='".$row['avatar']."' style='border-radius: 50%;width: 40px;float:left;margin-left: 20px;'>

<div id='textbox2' style='display: inline-block;width: 530px;height: 41px;border-radius: 20px;transition: 0.3s;'><textarea class='commentar' placeholder='Viết một bình luận...' style='outline: none;resize: none;overflow: auto;border-radius: 24px;width: 445px;height: 40px;margin-left: 9px;padding-top: 7px;'></textarea>
<i class='fas fa-camera' style='float: right;margin-right: 15px;margin-top: 12px;cursor: pointer;'></i>
<i class='far fa-smile' style='float: right;margin-right: 15px;margin-top: 12px;cursor: pointer;'></i>
</div>
</div>
</div>";
 }
}
?>




<div id="post1" style="background-color: white;padding-top: 10px;padding-left: 0px;padding-right: 0px;padding-bottom: 5px;margin-top: 20px;">
  <img src="/images/dta.jpg" style="border-radius: 50%;width: 40px;display: inline-block;position: absolute;margin-left: 15px;">
  <div style="display: inline-block;margin-left: 65px;">
  <p style="
    margin-bottom: 0px;
"><strong style="">Dương Tùng Anh <i id='tunganh2' title='Tài khoản đã xác minh' style='color:#07f;font-size:14px;display:none;display:inline' class='fas fa-check-circle'></i></strong></p><p style="position: absolute;font-size: 12px;color:#9e9b9b">
  <a href="post.php?id=1015" style="color: #9e9b9b">5 phút trước</a> · <i class="fas fa-globe-americas"></i></p>

</div>
 <i class="fas fa-ellipsis-h" style="float: right;margin-top: 7px;margin-right: 15px;cursor: pointer;"></i>
 <div id="post-content" style="
    margin-left: 15px;
    margin-right: 15px;
">
<p style="
    margin-top: 25px;
">ABC Testing 123...</p>
</div>
<img src="/images/tunganh.jpg" style="width: 600px;margin-bottom: 0px;cursor: pointer;">
<div id="reaction">
<div id="butto2" style="
     height: 33px;
     width: 200px;
     padding-top: 5px;
     border-radius: 7px;
     float:left;
     transition: 0.3s;
     cursor: pointer;
     margin-top: 4px;
     margin-left: 0px;
">
  <div  style="
  width: auto;
  padding: 0 69px;
  height: 38px;
  text-align: left;
  color: #65676b;
  ">
<i class="far fa-thumbs-up"></i> Thích
</div>
</div>
<div id="butto2" style="
     height: 33px;
     width: 200px;
     padding-top: 5px;
     border-radius: 7px;
     float:left;
     transition: 0.3s;
     cursor: pointer;
     margin-top: 4px;
     margin-left: 0px;
">
  <div  style="
  width: 203px;
  padding: 0 58px;
  height: 38px;
  text-align: left;
  color: #65676b;
  ">
<i class="far fa-comment"></i> Bình luận
</div>
</div>
<div id="butto2" style="
     height: 33px;
     width: 200px;
     padding-top: 5px;
     border-radius: 7px;
     float:left;
     transition: 0.3s;
     cursor: pointer;
     margin-top: 4px;
     margin-left: 0px;
">
  <div  style="
  width: 200px;
  padding: 0 62px;
  height: 38px;
  text-align: left;
  color: #65676b;
  ">
<i class="far fa-share-square"></i> Chia sẻ
</div>
</div>
<hr style="
    margin-bottom: 38px;
    margin-top: 0px;
    margin-left: 15px;
    margin-right: 15px;
">
<hr style="
   margin-bottom: 10px;
   margin-top: 6px;
   margin-left: 15px;
   margin-right: 15px;
">
<img src="/images/dta.jpg" style="border-radius: 50%;width: 40px;float:left;margin-left: 20px;">

<div id="textbox2" style="display: inline-block;width: 530px;height: 41px;border-radius: 20px;transition: 0.3s;"><textarea class="commentar" placeholder="Viết một bình luận..." style="outline: none;resize: none;overflow: auto;border-radius: 24px;width: 445px;height: 40px;margin-left: 9px;padding-top: 7px;"></textarea>
<i class="fas fa-camera" style="float: right;margin-right: 15px;margin-top: 12px;cursor: pointer;"></i>
<i class="far fa-smile" style="float: right;margin-right: 15px;margin-top: 12px;cursor: pointer;"></i>
</div>
</div>
</div>

<div id="post1" style="background-color: white;padding-top: 10px;padding-left: 0px;padding-right: 0px;padding-bottom: 5px;margin-top: 20px;">
  <img src="/images/phatdeptrai.jpg" style="border-radius: 50%;width: 40px;display: inline-block;position: absolute;margin-left: 15px;">
  <div style="display: inline-block;margin-left: 65px;">
  <p style="
    margin-bottom: 0px;
"><strong style="">Hoàng Phát <i id='tunganh2' title='Tài khoản đã xác minh' style='color:#07f;font-size:14px;display:none;display:inline' class='fas fa-check-circle'></i></strong></p><p style="position: absolute;font-size: 12px;color:#9e9b9b">
  <a href="post.php?id=1015" style="color: #9e9b9b">7h</a> · <i class="fas fa-globe-americas"></i></p>

</div>
 <i class="fas fa-ellipsis-h" style="float: right;margin-top: 7px;margin-right: 15px;cursor: pointer;"></i>
 <div id="post-content" style="
    margin-left: 15px;
    margin-right: 15px;
">
<p style="
    margin-top: 25px;
">Xin chào các cháu đã quay trở lại kênh của bà tân vê lóc...</p>
</div>
<div id="reaction">
<div id="butto2" style="
     height: 33px;
     width: 200px;
     padding-top: 5px;
     border-radius: 7px;
     float:left;
     transition: 0.3s;
     cursor: pointer;
     margin-top: 4px;
     margin-left: 0px;
">
  <div  style="
  width: auto;
  padding: 0 69px;
  height: 38px;
  text-align: left;
  color: #65676b;
  ">
<i class="far fa-thumbs-up"></i> Thích
</div>
</div>
<div id="butto2" style="
     height: 33px;
     width: 200px;
     padding-top: 5px;
     border-radius: 7px;
     float:left;
     transition: 0.3s;
     cursor: pointer;
     margin-top: 4px;
     margin-left: 0px;
">
  <div  style="
  width: 203px;
  padding: 0 58px;
  height: 38px;
  text-align: left;
  color: #65676b;
  ">
<i class="far fa-comment"></i> Bình luận
</div>
</div>
<div id="butto2" style="
     height: 33px;
     width: 200px;
     padding-top: 5px;
     border-radius: 7px;
     float:left;
     transition: 0.3s;
     cursor: pointer;
     margin-top: 4px;
     margin-left: 0px;
">
  <div  style="
  width: 200px;
  padding: 0 62px;
  height: 38px;
  text-align: left;
  color: #65676b;
  ">
<i class="far fa-share-square"></i> Chia sẻ
</div>
</div>
<hr style="
    margin-bottom: 38px;
    margin-top: 0px;
    margin-left: 15px;
    margin-right: 15px;
">
<hr style="
   margin-bottom: 10px;
   margin-top: 6px;
   margin-left: 15px;
   margin-right: 15px;
">
<img src="/images/dta.jpg" style="border-radius: 50%;width: 40px;float:left;margin-left: 20px;">

<div id="textbox2" style="display: inline-block;width: 530px;height: 41px;border-radius: 20px;transition: 0.3s;"><textarea class="commentar" placeholder="Viết một bình luận..." style="outline: none;resize: none;overflow: auto;border-radius: 24px;width: 445px;height: 40px;margin-left: 9px;padding-top: 7px;"></textarea>
<i class="fas fa-camera" style="float: right;margin-right: 15px;margin-top: 12px;cursor: pointer;"></i>
<i class="far fa-smile" style="float: right;margin-right: 15px;margin-top: 12px;cursor: pointer;"></i>
</div>
</div>


</div>



<style type="text/css">
textarea{
  padding-top: 5px;
    padding-left: 15px;
    background-color: #f0f2f5;
    border-style: none;
}
</style>
<center>
  <br>
  <img src="/images/pingpong.png" style="
    height: 97px;
">
  <br><br>
<p style="color: grey">Có vẻ như không còn bài viết nào.</p></center>
</div>
</div>
</div>
<style type="text/css">
  .reaction {
  display: flex;
}
.reaction > div {
  flex: 1; /*grow*/
}
</style>
<br>

<div id="loader" style="display:block" class="wrap">
  
<div class="media">
  <div class="media-img"></div>
  <div class="media-desc">
    <div class="bar"></div>
    <div class="bar"></div>
  </div>
</div>
<div class="media">
  <div class="media-img"></div>
  <div class="media-desc">
    <div class="bar"></div>
    <div class="bar"></div>
  </div>
</div>
<div class="media">
  <div class="media-img"></div>
  <div class="media-desc">
    <div class="bar"></div>
    <div class="bar"></div>
  </div>
</div>


</div>
</div>
</body>
