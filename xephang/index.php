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

	<style type="text/css">
		.content {
    width: 1000px;
    margin: 0 auto;
}
	</style>
</head>
<body>
<div class="content">
<?php


require $_SERVER['DOCUMENT_ROOT'] . '/require/serverconnect.php';

	if ($conn->connect_error) {
			die("Kết nối thất bại " . $conn->connect_error);
		} 
		
	$sql = "SELECT SUM(diem) AS TotalPoint12Nga FROM baocao  WHERE class='12 Nga'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {    
			$muoihainga = $row["TotalPoint12Nga"];
    }
}

$sql2 = "SELECT SUM(diem) AS TotalPoint12Toan FROM baocao  WHERE class='12 Toán'";
	$result2 = $conn->query($sql2);
	if ($result2->num_rows > 0) {
		while($row2 = $result2->fetch_assoc()) {    
			$muoihaitoan = $row2["TotalPoint12Toan"];
    }
}

$sql3 = "SELECT SUM(diem) AS TotalPoint12Ly FROM baocao  WHERE class='12 Lý'";
	$result3 = $conn->query($sql3);
	if ($result3->num_rows > 0) {
		while($row3 = $result3->fetch_assoc()) {    
			$muoihaily = $row3["TotalPoint12Ly"];
    }
}
$sql4 = "SELECT SUM(diem) AS TotalPoint12hoa FROM baocao  WHERE class='12 Hoá'";
	$result4 = $conn->query($sql4);
	if ($result4->num_rows > 0) {
		while($row4 = $result4->fetch_assoc()) {    
			$muoihaihoa = $row4["TotalPoint12hoa"];
    }
}

$sql5 = "SELECT SUM(diem) AS TotalPoint12sinh FROM baocao  WHERE class='12 Sinh'";
	$result5 = $conn->query($sql5);
	if ($result5->num_rows > 0) {
		while($row5 = $result5->fetch_assoc()) {    
			$muoihaisinh = $row5["TotalPoint12sinh"];
    }
}

$sql6 = "SELECT SUM(diem) AS TotalPoint12tin FROM baocao  WHERE class='12 Tin'";
	$result6 = $conn->query($sql6);
	if ($result6->num_rows > 0) {
		while($row6 = $result6->fetch_assoc()) {    
			$muoihaitin = $row6["TotalPoint12tin"];
    }
}

$sql7 = "SELECT SUM(diem) AS TotalPoint12van FROM baocao  WHERE class='12 Văn'";
	$result7 = $conn->query($sql7);
	if ($result7->num_rows > 0) {
		while($row7 = $result7->fetch_assoc()) {    
			$muoihaivan = $row7["TotalPoint12van"];
    }
}

$sql8 = "SELECT SUM(diem) AS TotalPoint12sudia FROM baocao  WHERE class='12 Sử - Địa'";
	$result8 = $conn->query($sql8);
	if ($result8->num_rows > 0) {
		while($row8 = $result8->fetch_assoc()) {    
			$muoihaisudia = $row8["TotalPoint12sudia"];
    }
}

$sql9 = "SELECT SUM(diem) AS TotalPoint12anh FROM baocao  WHERE class='12 Anh'";
	$result9 = $conn->query($sql9);
	if ($result9->num_rows > 0) {
		while($row9 = $result9->fetch_assoc()) {    
			$muoihaianh = $row9["TotalPoint12anh"];
    }
}

$sql1 = "SELECT SUM(diem) AS TotalPoint11Nga FROM baocao  WHERE class='11 Nga'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0) {
		while($row1 = $result1->fetch_assoc()) {    
			$muoimotnga = $row1["TotalPoint11Nga"];
    }
}

$sql21 = "SELECT SUM(diem) AS TotalPoint11Toan FROM baocao  WHERE class='11 Toán'";
	$result21 = $conn->query($sql21);
	if ($result21->num_rows > 0) {
		while($row21 = $result21->fetch_assoc()) {    
			$muoimottoan = $row21["TotalPoint11Toan"];
    }
}

$sql3 = "SELECT SUM(diem) AS TotalPoint11Ly FROM baocao  WHERE class='11 Lý'";
	$result3 = $conn->query($sql3);
	if ($result3->num_rows > 0) {
		while($row3 = $result3->fetch_assoc()) {    
			$muoimotly = $row3["TotalPoint11Ly"];
    }
}
$sql4 = "SELECT SUM(diem) AS TotalPoint11hoa FROM baocao  WHERE class='11 Hoá'";
	$result4 = $conn->query($sql4);
	if ($result4->num_rows > 0) {
		while($row4 = $result4->fetch_assoc()) {    
			$muoimothoa = $row4["TotalPoint11hoa"];
    }
}

$sql5 = "SELECT SUM(diem) AS TotalPoint11sinh FROM baocao  WHERE class='11 Sinh'";
	$result5 = $conn->query($sql5);
	if ($result5->num_rows > 0) {
		while($row5 = $result5->fetch_assoc()) {    
			$muoimotsinh = $row5["TotalPoint11sinh"];
    }
}

$sql6 = "SELECT SUM(diem) AS TotalPoint11tin FROM baocao  WHERE class='11 Tin'";
	$result6 = $conn->query($sql6);
	if ($result6->num_rows > 0) {
		while($row6 = $result6->fetch_assoc()) {    
			$muoimottin = $row6["TotalPoint11tin"];
    }
}

$sql7 = "SELECT SUM(diem) AS TotalPoint11van FROM baocao  WHERE class='11 Văn'";
	$result7 = $conn->query($sql7);
	if ($result7->num_rows > 0) {
		while($row7 = $result7->fetch_assoc()) {    
			$muoimotvan = $row7["TotalPoint11van"];
    }
}

$sql8 = "SELECT SUM(diem) AS TotalPoint11sudia FROM baocao  WHERE class='11 Sử - Địa'";
	$result8 = $conn->query($sql8);
	if ($result8->num_rows > 0) {
		while($row8 = $result8->fetch_assoc()) {    
			$muoimotsudia = $row8["TotalPoint11sudia"];
    }
}

$sql9 = "SELECT SUM(diem) AS TotalPoint11anh FROM baocao  WHERE class='11 Anh'";
	$result9 = $conn->query($sql9);
	if ($result9->num_rows > 0) {
		while($row9 = $result9->fetch_assoc()) {    
			$muoimotanh = $row9["TotalPoint11anh"];
    }
}



$sql = "SELECT SUM(diem) AS TotalPoint10Nga FROM baocao  WHERE class='10 Nga'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {    
			$muoinga = $row["TotalPoint10Nga"];
    }
}

$sql2 = "SELECT SUM(diem) AS TotalPoint10Toan FROM baocao  WHERE class='10 Toán'";
	$result2 = $conn->query($sql2);
	if ($result2->num_rows > 0) {
		while($row2 = $result2->fetch_assoc()) {    
			$muoitoan = $row2["TotalPoint10Toan"];
    }
}

$sql3 = "SELECT SUM(diem) AS TotalPoint10Ly FROM baocao  WHERE class='10 Lý'";
	$result3 = $conn->query($sql3);
	if ($result3->num_rows > 0) {
		while($row3 = $result3->fetch_assoc()) {    
			$muoily = $row3["TotalPoint10Ly"];
    }
}
$sql4 = "SELECT SUM(diem) AS TotalPoint10hoa FROM baocao  WHERE class='10 Hoá'";
	$result4 = $conn->query($sql4);
	if ($result4->num_rows > 0) {
		while($row4 = $result4->fetch_assoc()) {    
			$muoihoa = $row4["TotalPoint10hoa"];
    }
}

$sql5 = "SELECT SUM(diem) AS TotalPoint10sinh FROM baocao  WHERE class='10 Sinh'";
	$result5 = $conn->query($sql5);
	if ($result5->num_rows > 0) {
		while($row5 = $result5->fetch_assoc()) {    
			$muoisinh = $row5["TotalPoint10sinh"];
    }
}

$sql6 = "SELECT SUM(diem) AS TotalPoint10tin FROM baocao  WHERE class='10 Tin'";
	$result6 = $conn->query($sql6);
	if ($result6->num_rows > 0) {
		while($row6 = $result6->fetch_assoc()) {    
			$muoitin = $row6["TotalPoint10tin"];
    }
}

$sql7 = "SELECT SUM(diem) AS TotalPoint10van FROM baocao  WHERE class='10 Văn'";
	$result7 = $conn->query($sql7);
	if ($result7->num_rows > 0) {
		while($row7 = $result7->fetch_assoc()) {    
			$muoivan = $row7["TotalPoint10van"];
    }
}

$sql8 = "SELECT SUM(diem) AS TotalPoint10sudia FROM baocao  WHERE class='10 Sử - Địa'";
	$result8 = $conn->query($sql8);
	if ($result8->num_rows > 0) {
		while($row8 = $result8->fetch_assoc()) {    
			$muoisudia = $row8["TotalPoint10sudia"];
    }
}

$sql9 = "SELECT SUM(diem) AS TotalPoint10anh FROM baocao  WHERE class='10 Anh'";
	$result9 = $conn->query($sql9);
	if ($result9->num_rows > 0) {
		while($row9 = $result9->fetch_assoc()) {    
			$muoianh = $row9["TotalPoint10anh"];
    }
}


if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoihaitoan WHERE class_id = 2970")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoihainga WHERE class_id = 3251")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoihaily WHERE class_id = 9771")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoihaihoa WHERE class_id = 0776")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoihaisinh WHERE class_id = 2166")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoihaitin WHERE class_id = 8501")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoihaivan WHERE class_id = 4246")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoihaisudia WHERE class_id = 9360")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoihaianh WHERE class_id = 4064")) {
	$stmt->execute();
}


if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoimottoan WHERE lop = '11 Toán'")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoimotnga WHERE lop = '11 Nga'")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoimotly WHERE lop = '11 Lý'")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoimothoa WHERE lop = '11 Hoá'")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoimotsinh WHERE lop = '11 Sinh'")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoimottin WHERE lop = '11 Tin'")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoimotvan WHERE lop = '11 Văn'")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoimotsudia WHERE lop = '11 Sử - Địa'")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoimotanh WHERE lop = '11 Anh'")) {
	$stmt->execute();
}




if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoitoan WHERE lop = '10 Toán'")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoinga WHERE lop = '10 Nga'")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoily WHERE lop = '10 Lý'")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoihoa WHERE lop = '10 Hoá'")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoisinh WHERE lop = '10 Sinh'")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoitin WHERE lop = '10 Tin'")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoivan WHERE lop = '10 Văn'")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoisudia WHERE lop = '10 Sử - Địa'")) {
	$stmt->execute();
}
if ($stmt = $conn->prepare("UPDATE xephang SET diem=$muoianh WHERE lop = '10 Anh'")) {
	$stmt->execute();
}


echo "<style>
#cc1, #cc2, #cc3{
display: inline-block;margin-right: 30px;
}
@media screen and (max-width: 768px){
#cc1, #cc2, #cc3{
display: block;
}
#cc4, #cc5, #cc6{
	width:196px;
	}
}
</style>
<div id='cc1'><table class='table table-striped table-hover table-responsive'>
<thead>
<tr>
<th>Xếp thứ</th>
<th id='cc4'>Lớp</th>
<th>Điểm trừ</th>
</tr>
</thead>
    <tbody>
      <tr>";
$sql = "SELECT class_id, diem, lop FROM `xephang` WHERE khoi=12 ORDER BY `diem` ASC ";
$result = $conn->query($sql);
echo "<br><h3 style='margin-left: 15px;'>Khối 12</h3>";
if( !$result ){
  echo 'SQL Query Failed';
}else{

  $rank = 0;
  $last_score = false;
  $rows = 0;

  while( $row = $result->fetch_assoc() ){
    $rows++;
    if( $last_score!= $row['diem'] ){
      $last_score = $row['diem'];
      $rank++;
    }
    if ($rank == 1){
    	echo "<tr class='table-warning'><td><i class='fas fa-trophy'></i> <strong>#".$rank."</strong></td><td>".$row['lop']."</td><td>".$row['diem']."</td></tr>";
    }
    if ($rank == 2){
    	echo "<tr class='table-success'><td><strong>#".$rank."</strong></td><td>".$row['lop']."</td><td>".$row['diem']."</td></tr>";
    }
    if ($rank == 3){
    	echo "<tr class='table-primary'><td><strong>#".$rank."</strong></td><td>".$row['lop']."</td><td>".$row['diem']."</td></tr>";
    }
     elseif($rank != 1 & $rank != 2 & $rank != 3){
    	echo "<tr><td>#".$rank."</td><td>".$row['lop']."</td><td>".$row['diem']."</td>
    </tr>";
    }
    
  }
}
echo "</tbody>
  </table>
  </div>";

echo "<div id='cc2'>
<table class='table table-striped table-hover table-responsive'>
<thead>
<tr>
<th>Xếp thứ</th>
<th id='cc5'>Lớp</th>
<th>Điểm trừ</th>
</tr>
</thead>
    <tbody>
      <tr>";
$sql = "SELECT class_id, diem, lop FROM `xephang` WHERE khoi=11 ORDER BY `diem` ASC ";
$result = $conn->query($sql);
echo "<br><h3 style='margin-left: 15px;'>Khối 11</h3>";
if( !$result ){
  echo 'SQL Query Failed';
}else{

  $rank = 0;
  $last_score = false;
  $rows = 0;

  while( $row = $result->fetch_assoc() ){
    $rows++;
    if( $last_score!= $row['diem'] ){
      $last_score = $row['diem'];
      $rank++;
    }
    if ($rank == 1){
    	echo "<tr class='table-warning'><td><i class='fas fa-trophy'></i> <strong>#".$rank."</strong></td><td>".$row['lop']."</td><td>".$row['diem']."</td></tr>";
    }
    if ($rank == 2){
    	echo "<tr class='table-success'><td><strong>#".$rank."</strong></td><td>".$row['lop']."</td><td>".$row['diem']."</td></tr>";
    }
    if ($rank == 3){
    	echo "<tr class='table-primary'><td><strong>#".$rank."</strong></td><td>".$row['lop']."</td><td>".$row['diem']."</td></tr>";
    }
     elseif($rank != 1 & $rank != 2 & $rank != 3){
    	echo "<tr><td>#".$rank."</td><td>".$row['lop']."</td><td>".$row['diem']."</td>
    </tr>";
    }
    
  }
}
echo "</tbody>
  </table>
  </div>";

echo "<div id='cc3'>
<table class='table table-striped table-hover table-responsive'>
<thead>
<tr>
<th>Xếp thứ</th>
<th id='cc6'>Lớp</th>
<th>Điểm trừ</th>
</tr>
</thead>
    <tbody>
      <tr>";
$sql = "SELECT class_id, diem, lop FROM `xephang` WHERE khoi=10 ORDER BY `diem` ASC ";
$result = $conn->query($sql);
echo "<br><h3 style='margin-left: 15px;'>Khối 10</h3>";
if( !$result ){
  echo 'SQL Query Failed';
}else{

  $rank = 0;
  $last_score = false;
  $rows = 0;

  while( $row = $result->fetch_assoc() ){
    $rows++;
    if( $last_score!= $row['diem'] ){
      $last_score = $row['diem'];
      $rank++;
    }
    if ($rank == 1){
    	echo "<tr class='table-warning'><td><i class='fas fa-trophy'></i> <strong>#".$rank."</strong></td><td>".$row['lop']."</td><td>".$row['diem']."</td></tr>";
    }
    if ($rank == 2){
    	echo "<tr class='table-success'><td><strong>#".$rank."</strong></td><td>".$row['lop']."</td><td>".$row['diem']."</td></tr>";
    }
    if ($rank == 3){
    	echo "<tr class='table-primary'><td><strong>#".$rank."</strong></td><td>".$row['lop']."</td><td>".$row['diem']."</td></tr>";
    }
     elseif($rank != 1 & $rank != 2 & $rank != 3){
    	echo "<tr><td>#".$rank."</td><td>".$row['lop']."</td><td>".$row['diem']."</td>
    </tr>";
    }
    
  }
}
echo "</tbody>
  </table></div>";

?>
</div>
</body>
</html>
