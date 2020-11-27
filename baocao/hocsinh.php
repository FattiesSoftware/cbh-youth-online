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


$error2 = 1;
if (!isset($_SESSION['loggedin'])) {  
$error = '';


} else {
  $none = 'none';
$PROP = 'block';
  $IN = 'none';
  $OUT = 'block';
}

if ($error2==1) {
  if(isset($accessToken)){
  $error2 = $userData['oauth_uid'];
    $none = 'none';
$PROP = 'block';
  $IN = 'none';
  $OUT = 'block';
  }
}

if (isset($_SESSION['loggedin'])){
 if ($_SESSION['permission'] == 'xungkich') { // nếu id = 15
   // chuyển đến xung kích
   $nam = $_SESSION['name'];
   $none = $_SESSION['id'];

} elseif ($_SESSION['permission'] == 'admin') {
// chuyển đến xung kích
   $nam = $_SESSION['name'];
   $none = $_SESSION['id'];

}elseif ($_SESSION['oauth'] == 'github') {// nếu id = 1
  // chuyển đến xung kích
  $nam = $userData['name'];
} else {
   header('Location: error.php');
}
  
} else {
  header('Location: /login/index.php');
}

	



?>

<!DOCTYPE html>
<html>
<head>
  <?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/style.php';
$baocao = 'active';
?>
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('https://www.w3schools.com/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>
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
.content2 {
	width: 1000px;
	margin: 0 auto;
}
.content2 h2 {
	margin: 0;
	padding: 25px 0;
	font-size: 22px;
	border-bottom: 1px solid #e0e0e3;
	color: #4a536e;
}
.content2 > p {
	box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);
	margin: 25px 0;
	padding: 25px;
	background-color: #fff;
}

.content2 > p table td, .content2 > div table td {
	padding: 5px;
}
.content2 > p table td:first-child, .content > div table td:first-child {
	font-weight: bold;
	color: #4a536e;
	padding-right: 15px;
}
.content2 > div p {
	padding: 5px;
	margin: 0 0 10px 0;
}
@media only screen and (max-width: 790px) {
.content2 {
	width: auto;
	margin: 0 auto;
    padding-left: 25px;
    padding-right: 25px;

}
.navtop {
	width: 500px;
	margin: 0 auto;


}

}


	</style>
  <?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/navbar.php';
?>
		<div class="content2">
			<h2>Hệ thống báo cáo dành cho xung kích</h2>
			<p>Chào mừng, <?=$nam?>!<br>
				
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

date_default_timezone_set('Asia/Ho_Chi_Minh');
$contents = 'Bây giờ là: ' . rebuild_date('H:i l, d/m/Y' ) . '<br />';
 echo $contents;
?>

<style>

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
 .Center { 
            width:80px; 
            height:80px; 
            position: fixed; 
            top: 60%; 
            left: 55%; 
            margin-top: -100px; 
            margin-left: -100px; 
        } 
		.ml12 {
  font-weight: 200;
  font-size: 1.8em;
  text-transform: uppercase;
  letter-spacing: 0.5em;
}

.ml12 .letter {
  display: inline-block;
  line-height: 1em;
}
input[type=button] {padding:5px 15px; background:#ccc; border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; }

</style>
</head>
<body style="margin:0;">

<style type="text/css">
  .bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: #e42626;
}
</style>
<div class="card card-warning animate-bottom" id="main2" style="display:block">
    <h3 style="
    margin-left: 19px;
    margin-top: 15px;
">Báo cáo vi phạm học sinh</h3>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="confirm.php" method="GET">
                  <div class="form-group">
  <label for="usr"><i class="fas fa-user"></i> Họ và tên học sinh:</label>
  <input class="tag22 form-control" data-role="tagsinput" name="student_id" type="text" required>
</div>

                    
                      <!-- datearea -->
<div class="form-group">
<label><i class="fas fa-clock"></i> Thời gian báo cáo</label>
<input class="form-control" id="disabledInput" name="date" type="text" placeholder="<?=rebuild_date('H:i l, d/m/Y' )?>" disabled>
   </div>
            
              
				<div id="error_fileds">
                  <div class="form-group">
                    <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i> Lỗi vi phạm</label>
					<input type="text" name="mistake_id" class="form-control is-invalid inputError tagsinput" id="inputError" value="" data-role="tagsinput" required/>
				  </div>
				</div>


<script>
var mistake = [
<?php
$sql = "SELECT value, point, text FROM loivipham";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "{ 'value': ".$row['value'].", 'point': ".$row['point']." , 'text': '".$row['text']."' },";
  }
}
?>

];

var mistake = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  local: mistake
});
mistake.initialize();
$('.tagsinput').tagsinput({
	maxTags: 1,
itemValue: 'value',
  itemText: 'text',
  typeaheadjs: {
    name: 'mistake',
    displayKey: 'text',
    source: mistake.ttAdapter()
  }
});


</script>

<script>
var mistake = [
<?php
$sql = "SELECT student_id, name FROM hocsinh";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "{ 'value': '".$row['student_id']."', 'text': '".$row['name']."' },";
  }
}
?>
];
var mistake = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  local: mistake
});
mistake.initialize();
$('.tag22').tagsinput({
  maxTags: 1,
itemValue: 'value',
  itemText: 'text',
  typeaheadjs: {
    name: 'mistake',
    displayKey: 'text',
    source: mistake.ttAdapter()
  }
});

</script>
                  <div class="row">
                    <div class="col-sm-6" style="
    left: 18px;
">
                    </div>
                  </div>
                  </div>
				  <button type="submit" class="btn btn-info" name="form_type" value="student" style="
    margin-left: 21px;
    margin-bottom: 17px;
"><i class="fas fa-paper-plane"></i> Gửi báo cáo</button>
				</form>
                
				<button style="float:right;margin-right: 21px;" type="button" class="btn btn-danger" onClick="window.location.reload();"><i class="fas fa-redo-alt"></i> Tải lại</button>
			  </div>

<br>

	</body>
</html>