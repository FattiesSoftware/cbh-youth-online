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
	$WELCOME = 'Bạn chưa đăng nhập! Hãy đăng nhập để tham gia thảo luận.';
	$PROP = 'none';
	$OUT = 'none';
} else {
	$WELCOME = '';
	$PROP = 'block';
	$IN = 'none';
	$OUT = 'block';
	$nam = $_SESSION['name'];
}
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
}
    }
if(isset($accessToken)){
	$PROP = 'block';
	$IN = 'none';
	$OUT = 'block';
	$nam = $userData['name'];
}
require "include/header.php";
?>


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

<?php
$diendan = 'active';
require "include/navbar.php";
?>


		<div class="content">
			<h2>Diễn đàn</h2>
			<p style="display:<?=$IN?>"><?=$WELCOME?></p>
			<p style="display:<?=$OUT?>">Chào mừng, <?=$nam?>!
			<br>
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

date_default_timezone_set('Asia/Ho_Chi_Minh');
$contents = 'Bây giờ là: ' . rebuild_date('H:i l, d/m/Y' ) . '<br />';
 echo $contents;
?>
	<?php include("header.php"); ?>
	<center>
		<a href="post.php" style="    float: right;"><button type="button" class="btn btn-success"><i class="fas fa-edit"></i> Đăng bài viết mới</button></a><br/><br/>
	<?php echo '<table class="table table-hover" id="myTable">';?>
	<thead class="thead-dark">
			<tr> 
					<td width="40px;"><span>ID</span> </td>
					<td width="400px;" style="text-align: left" > Tên bài viết </td>
					<td width="80px;" style="text-align: center" > Lượt xem </td>
					<td width="80px;" style="text-align: center" > Người viết </td>
					<td width="80px;" style="text-align: center" > Ngày viết </td>
			</tr>
	</thead>


	</center>
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
	</body>
</html>

<?php
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
			die("kết nối thất bại " . $conn->connect_error);
		} 
	$sql = "SELECT * FROM topics";
	$result = $conn->query($sql);
	if(!@$_GET['date']){
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$id=$row['topic_id'];
			echo "<tr>";
			echo "<td>".$row['topic_id']."</td>";
			echo "<td style='text-align:left;'><a href='topic.php?id=$id'>".$row['topic_name']."</a></td>";
			echo "<td style='text-align:center;'>".$row['view']."</td>";
			$query_u = "SELECT id FROM accounts WHERE username='".$row['topic_creator']."'";
			$results_u = mysqli_query($conn, $query_u);
			$i=0;
while($row_u = $results_u->fetch_assoc()) {
			if($i==0) $user_id=1000;
			$user_id = $row_u['id'];
			echo "<td style='text-align:center;'><a href='/profile.php?id=$user_id'>".$row['topic_creator']."</a></td>";
			$get_date=$row['date'];
			echo "<td style='text-align:center;'><a href='index.php?date=$get_date'>".$row['date']."</a></td>";
			echo "</tr>";
}
    }
}else {
		echo "Không có bài viết nào";
	}
}
	
	
	if(@$_GET['date']){
		
		$query_d = "SELECT * FROM topics WHERE date='".$_GET['date']."'";
		$results_d = mysqli_query($db, $query_d);
		
		while($row_d=mysqli_fetch_assoc($results_d)){
			
			echo "<tr>";
			echo "<td>".$row_d['topic_id']."</td>";
			$id=$row_d['topic_id'];
			echo "<td style='text-align:left;'><a href='topic.php?id=$id'>".$row_d['topic_name']."</a></td>";
			echo "<td  style='text-align:center;'>".$row_d['view']."</td>";
			$query_u = "SELECT * FROM users WHERE username='".$row_d['topic_creator']."'";
			$results_u = mysqli_query($db, $query_u);
			$i=0;
			while($row_u=mysqli_fetch_assoc($results_u)){
				$user_id=$row_u['id'];
				$i=$i+1;
			}
			if($i==0) $user_id=1000;
			echo "<td  style='text-align:center;'><a href='profile.php?id=$user_id'>".$row_d['topic_creator']."</a></td>";
			$get_date=$row_d['date'];
			echo "<td style='text-align:center;'><a href='index.php?date=$get_date'>".$row_d['date']."</a></td>";
			echo "</tr>";
			

		}
	}
echo "</table>";

?>
<script>
function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[0];
      y = rows[i + 1].getElementsByTagName("TD")[0];
      //check if the two rows should switch place:
      if (Number(y.innerHTML) > Number(x.innerHTML)) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
sortTable()
</script>
</p>
</div>
</body>
</center>
	<?php
	require "include/footer.php";
	?>
