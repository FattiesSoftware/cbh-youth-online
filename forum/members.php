<?php
	session_start();
	require('connect.php');
	if ($_SESSION['username']) {

?>

<html>
<head>
	<title>Trang chủ</title>
	<link rel="stylesheet"  href ="style.css" type="text/css">
</head>
<body>
	<center><h1> Thành viên </h1></center>
	<?php include("header.php"); 
		echo "<center>";
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "php_forum";
// tạo connection
		$conn = new mysqli($servername, $username, $password, $dbname);
// kiểm connection
		if ($conn->connect_error) {
			die("kết nối thất bại " . $conn->connect_error);
		} 
 
		$sql = "SELECT id, username FROM users";
		$result = $conn->query($sql);
 
		if ($result->num_rows > 0) {
		// output dữ liệu trên trang
		while($row = $result->fetch_assoc()) {
		$id=$row["id"];

		echo "<center><ul><tr>";
		echo "<td ><li><span>Thành viên   </span></li></td>";
		echo "<td style='text-align:center;'><li><a href='topic.php?id=$id'>".$row['username']."</a></li></td>";
		echo "</tr></center>";

    }
} else {
    echo "0 thành viên";
}
		echo "</center>";
	?>
</body>
</html>

<?php
	if(@$_GET['action']=="logout")
	{
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
	}else {
		echo " bạn cần đăng nhập ";
		header('location: login.php');
	}
?>