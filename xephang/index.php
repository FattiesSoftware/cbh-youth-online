<?php

	session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/require/githubConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/require/serverconnect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/require/github.user.class.php';
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
$xephang = 'active';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';
require $_SERVER['DOCUMENT_ROOT'] . '/include/navbar.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/style.php';

?>
<html>
<head>
	<title>Trang chủ</title>
	<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
</head>
<body>
<?php
error_reporting(0);
$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
			die("Kết nối thất bại " . $conn->connect_error);
		} 
	$sql = "SELECT SUM(diem) AS TotalPoint12Nga FROM baocao  WHERE class='12 Nga'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {    
			$muoihainga = $row["TotalPoint12Nga"];
			if (strlen($muoihainga) < 2){
				$zero = 0;
				$muoihainga = $zero. "" .$muoihainga;
			}
    }
}

$sql2 = "SELECT SUM(diem) AS TotalPoint12Toan FROM baocao  WHERE class='12 Toán'";
	$result2 = $conn->query($sql2);

	if ($result2->num_rows > 0) {
		while($row2 = $result2->fetch_assoc()) {    
			$muoihaitoan = $row2["TotalPoint12Toan"];
			if (strlen($muoihaitoan) < 2){
				$zero = 0;
				$muoihaitoan = $zero. "" .$muoihaitoan;
			}
    }
}

if ($_GET['lop'] == '12 Toán'){
$toan12 = '2970';
if ($stmt = $conn->prepare('INSERT INTO xephang (class_id, diem) VALUES (?, ?)')) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$stmt->bind_param('ss', $toan12, $muoihaitoan);
	$stmt->execute();
	echo 'Đã thêm xếp hạng cho lớp 12 Toán<br>';
}
}

if ($_GET['lop'] == '12 Nga'){
$nga12 = '3251';
if ($stmt = $conn->prepare('INSERT INTO xephang (class_id, diem) VALUES (?, ?)')) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$stmt->bind_param('ss', $nga12, $muoihainga);
	$stmt->execute();
	echo 'Đã thêm xếp hạng cho lớp 12 Nga<br>';
}
}

if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoihaitoan WHERE class_id = 2970")) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$stmt->execute();

}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoihainga WHERE class_id = 3251")) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$stmt->execute();

}

$sql_u = "SELECT class_id, diem, @curRank := @curRank + 1 AS rank FROM xephang p, (SELECT @curRank := 0) r ORDER BY diem";
	$result_u = $conn->query($sql_u) or die($conn->error);
		while($row_u = $result_u->fetch_assoc()) { 
			$xephang = "<tr><td>Lớp ".$row_u['class_id']." xếp thứ ".$row_u['rank']." với ".$row_u['diem']." điểm trừ.<br></td></tr>";
			echo $xephang;
			}


	echo $muoihainga;
	echo $muoihaitoan;
?>
</body>
</html>
