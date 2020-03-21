<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<div class="input-group">
			<label>Tài khoản</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Mật khẩu</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" name="submit" value="Register" >Đăng nhập</button>
		</div>
		<p>
			Nếu bạn chưa có tài khoản, hãy <a href="register.php">đăng kí</a>
		</p>
	</form>
</body>
</html>
<?php 
header("Location: /baocao/index.php");
?>