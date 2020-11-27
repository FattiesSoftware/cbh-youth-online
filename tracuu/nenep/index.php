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
$tracuu = 'active';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';
require $_SERVER['DOCUMENT_ROOT'] . '/include/navbar.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/style.php';

?>
<html>
<head>
	<title>Tra cứu xếp hạng trong ngày</title>

	<style type="text/css">
		.content {
    width: 1116px;
    margin: 0 auto;
}
	</style>
	<style type="text/css">
		.bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: #e42626;
}
	</style>
</head>
<body>
<div class="content" style="
    padding-left: 15px;
">
	<br>
	<h3>Tra cứu nề nếp học sinh trong ngày dành cho giáo viên</h3>
	<form style="width: 400px" action="tracuu.php" method="GET" autocomplete="off">
	<div class="form-group">
                        <label>Tên lớp</label>
                        <select class="form-control" id="my-select" data-live-search="true" name="lop">
				  <optgroup label="Khối 12">
						<option>12 Toán</option>
						<option>12 Lý</option>
						<option>12 Hoá</option>
						<option>12 Sinh</option>
						<option>12 Tin</option>
						<option>12 Văn</option>
						<option>12 Sử - Địa</option>
						<option>12 Anh</option>
						<option>12 Nga</option>
				  </optgroup>
				  <optgroup label="Khối 11">
						<option>11 Toán</option>
						<option>11 Lý</option>
						<option>11 Hoá</option>
						<option>11 Sinh</option>
						<option>11 Tin</option>
						<option>11 Văn</option>
						<option>11 Sử - Địa</option>
						<option>11 Anh</option>
						<option>11 Nga</option>
				  </optgroup>
				  <optgroup label="Khối 10">
						<option>10 Toán</option>
						<option>10 Lý</option>
						<option>10 Hoá</option>
						<option>10 Sinh</option>
						<option>10 Tin</option>
						<option>10 Văn</option>
						<option>10 Sử - Địa</option>
						<option>10 Anh</option>
						<option>10 Nga</option>
				  </optgroup>

				  <optgroup label="THCS">
						<option>9A1</option>
						<option>9A2</option>
						<option>8A1</option>
						<option>8A2</option>
						<option>7A1</option>
						<option>7A2</option>
						<option>6A1</option>
						<option>6A2</option>
				  </optgroup>
				  </select>
                      </div>

<?php
error_reporting(0);
?>
<!-- Date Picker Input -->
            <div class="form-group mb-4">
            	<label for="reservationDate">Ngày</label>
                <div class="datepicker date input-group p-0 shadow-sm">
                    <input type="text" name="ngay" placeholder="Chọn ngày để tra cứu" class="form-control py-4 px-4" id="reservationDate" value="<?=$_GET['ngay']?>">
                    <div class="input-group-append"><span class="input-group-text px-4"><i class="fas fa-clock"></i></span></div>
                </div>
            </div><!-- DEnd ate Picker Input -->
<button type="submit" name="submitbutton" value="send" class="btn btn-primary">Xem</button>
	</form>

<script type="text/javascript">


	$(function () {

    // INITIALIZE DATEPICKER PLUGIN
    $('.datepicker').datepicker({
        clearBtn: true,
        format: "yyyy-mm-dd"
    });

});
</script>


<br>

      
<?php

require $_SERVER['DOCUMENT_ROOT'] . '/require/serverconnect.php';
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['submitbutton'])){
$date = $_GET['ngay'];
$lop = $_GET['lop'];

$sql = "SELECT date1, date2, xungkich, class, diem, absent, vesinh, dongphuc, tenloi, maloi FROM baocao WHERE class='$lop' AND date2='$date'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table class='table table-striped' id='table'>
	<thead>
      <tr>
        <th>Xung kích</th>
        <th>Lớp</th>
        <th>Ngày giờ</th>
        <th>Vắng</th>
        <th>Vệ sinh</th>
        <th>Đồng phục</th>
        <th>Lỗi vi phạm</th>
        <th>Điểm trừ</th>
      </tr>
    </thead>
    <tbody>";
  // output data of each row
  while($row = $result->fetch_assoc()) {

    echo "<tr><td>" . $row["xungkich"]. "</td><td>" . $row["class"]. "</td><td>" . $row["date1"]. "</td><td>" . $row["absent"]. "</td><td>" . $row["vesinh"]. "</td><td>" . $row["dongphuc"]. "</td><td>" . $row["maloi"].". ".$row["tenloi"]. "</td><td>".$row['diem']."</td></tr>";
  }
} else {
  echo "Không có kết quả!";
}
$conn->close();

}
?>
</table>
<p id="val"></p>
<script type="text/javascript">
 var table = document.getElementById("table"), sumVal = 0;
            
            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseInt(table.rows[i].cells[7].innerHTML);
            }
            
            document.getElementById("val").innerHTML = "Tổng điểm trừ = " + sumVal;
            console.log(sumVal);
</script>
</div>
</body>
</html>
