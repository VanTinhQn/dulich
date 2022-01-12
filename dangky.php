<?php 
	require_once('./database/helper.php');
	if (isset($_POST['btnSingUp'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$re_password = $_POST['rpassword'];

	$sql_check = "select * from account where username ='".$username."'";
	$result_check = mysqli_query($connect,$sql_check);
	if (mysqli_num_rows($result_check)==0) {
		if ($password == $re_password) {
			$sql = "insert into account(Username,Password) values('".$username."','".$password."')";
			$result = execute($sql);
			echo '<script>
			alert("Đăng ký thành công");
			</script>';
		}else{
			echo '<script>
			alert("Mật khẩu nhập lại không chính xác!");
			</script>';
		}
	}else{
		echo '<script>
		alert("Tài khoản đã tồn tại");
		</script>';
	}
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
	<title>Đăng ký</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
				<div class="card border-0 shadow rounded-3 my-5">
					<div class="card-body p-4 p-sm-5">
						<h5 class="card-title text-center mb-5 fw-light fs-5">Sign up</h5>
						<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" name="username" id="floatingInput" placeholder="name@example.com" required>
								<label for="floatingInput">Username</label>
							</div>
							<div class="form-floating mb-3">
								<input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
								<label for="floatingPassword">Password</label>
							</div>
							<div class="form-floating mb-3">
								<input type="password" class="form-control" id="floatingRPassword" name="rpassword" placeholder="RPassword" required>
								<label for="floatingRPassword">Confirm password</label>
							</div>

							<div class="d-grid mb-3">
								<button class="btn btn-primary text-uppercase fw-bold" type="submit" name="btnSingUp" 
								style=" font-size: 0.9rem;
								letter-spacing: 0.05rem;
								padding: 0.75rem 1rem;">Sign up</button>
							</div>

							<div class="d-grid">
								<a class="btn btn-primary text-uppercase fw-bold"
								href="dangnhap.php" 
								style=" font-size: 0.9rem;
								letter-spacing: 0.05rem;
								padding: 0.75rem 1rem;">Login</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
