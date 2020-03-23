<?php

	session_start();
	require('connect.php');

?>
<html>
<head>
	<title>Trang chủ</title>
</head>
<body>
	<center><h1> Diễn đàn </h1></center>
	<?php include("header.php"); 
	$i=1;
	$baocao=array();
// tạo connection
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	$con = new mysqli($servername, $username, $password, $dbname);
// kiểm connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "SELECT id, lop, diem, FIND_IN_SET( diem, ( SELECT GROUP_CONCAT( diem ORDER BY diem ASC ) FROM xephang ) ) AS rank FROM xephang";
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {    
			$sql_u = "SELECT rank FROM xephang WHERE lop='11 Nga'";
	$result_u = $conn->query($sql_u);
	if ($result_u->num_rows_2 > 0) {
		while($row_u = $result->fetch_assoc()) {    
			$rank11nga = $row_u["rank"];
			}
		}
		$sql_u2 = "SELECT rank FROM xephang WHERE lop='12 Toán'";
	$result_u2 = $conn->query($sql_u2);
	if ($result_u2->num_rows_3 > 0) {
		while($row_u2 = $result->fetch_assoc()) {    
			$rank12toan = $row_u2["rank"];
			}
		}
    }
} else {
		echo "Không có dữ liệu!";
	}


$conn->close();
	?>
</body>
</html>
<?php



$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
			die("Kết nối thất bại " . $conn->connect_error);
		} 
	$sql = "SELECT SUM(diem) AS TotalPoint11Nga FROM baocao  WHERE class='11 Nga'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {    
			$muoimotnga = $row["TotalPoint11Nga"];
    }
} else {
		echo "Không có dữ liệu!";
	}
$sql2 = "SELECT SUM(diem) AS TotalPoint12Toan FROM baocao  WHERE class='12 Toán'";
	$result2 = $conn->query($sql2);

	if ($result2->num_rows > 0) {
		while($row2 = $result2->fetch_assoc()) {   
			$muoihaitoan = $row2["TotalPoint12Toan"]; 
    }
}
// 11 Nga
if ($stmt = $conn->prepare('SELECT id,  diem FROM xephang WHERE  lop = ? ')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_GET['lop']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Xếp hạng dành cho lớp '.$_GET['lop'].' đã tồn tại! Vui lòng chọn lớp khác';
	} else {
if (isset($_GET['lop'])){
	if ($_GET['lop'] == '11 Nga'){
		$diem = $muoimotnga;
	} elseif ($_GET['lop'] == '12 Toán'){
		$diem = $muoihaitoan;
	}
$lop = $_GET['lop'];
if ($stmt = $conn->prepare('INSERT INTO xephang (lop, diem) VALUES (?, ?)')) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$stmt->bind_param('ss', $lop, $diem);
	$stmt->execute();
	echo 'Đã thêm xếp hạng cho lớp '.$lop;
}
}
}
}
$sql = "SELECT * FROM xephang";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {    
			$lopgido = $row['lop'];
			$sql23 = "SELECT id, lop, diem, FIND_IN_SET( diem, ( SELECT GROUP_CONCAT( diem ORDER BY diem ASC ) FROM xephang ) ) AS rank FROM xephang";
	$result23 = $conn->query($sql23);
			echo 'Lớp '.$lopgido.' xếp thứ '.$row['rank'].' với '.$row['diem'].' điểm trừ.<br>';
    }
}

?>
