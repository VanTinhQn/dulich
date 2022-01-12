<?php 
	session_start();
	require_once('./database/helper.php');
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "select * from account where Username = '".$username."' and Password = '".$password."'";
		$result = executeSingleResult($sql);
		if (is_null($result)) {
			echo '<script>
				alert("Sai tài khoản hoặc mật khẩu!");
				</script>';
		}else{
			$_SESSION['user']['AccountID']= $result['AccountID'];
			$_SESSION['user']['Username']= $result['Username'];
			$_SESSION['user']['Avatar']= $result['Avatar'];
			$_SESSION['user']['isAdmin']= $result['isAdmin'];

			if ($_SESSION['user']['isAdmin'] == 0) {
				header('Location: index.php');
				// header('Location:'.$_POST['destination'].'');		//chuyển về page trước đó
			}else{
				header('Location: admin');
			}
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
	<link rel="stylesheet" href="style.css">
	<title>Đăng nhập</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
				<div class="card border-0 shadow rounded-3 my-5">
					<div class="card-body p-4 p-sm-5">
						<h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>

						<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
							<input type="hidden" name="destination" value="<?php echo $_SERVER['HTTP_REFERER']; ?>"/>
							<div class="form-floating mb-3">
								<input type="text" class="form-control" name="username" id="floatingInput" placeholder="name@example.com" required>
								<label for="floatingInput">Username</label>
							</div>
							<div class="form-floating mb-3">
								<input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
								<label for="floatingPassword">Password</label>
							</div>

							<div class="form-check mb-3">
								<input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
								<label class="form-check-label" for="rememberPasswordCheck">
									Remember password
								</label>
							</div>
							<div class="form-floating mb-3">
								<p>Don't have account? <a href="dangky.php">Sign up</a></p>
							</div>
							<div class="d-grid mb-3">
								<button class="btn btn-primary text-uppercase fw-bold" type="submit" name="login" 
								style=" font-size: 0.9rem;
								letter-spacing: 0.05rem;
								padding: 0.75rem 1rem;">Login</button>
							</div>

							<div class="d-grid">
								<a class="btn btn-primary text-uppercase fw-bold"
								href="index.php" 
								style=" font-size: 0.9rem;
								letter-spacing: 0.05rem;
								padding: 0.75rem 1rem;">Trang chủ</a>

								<!-- <button class="btn btn-primary text-uppercase fw-bold"
								onclick="history.back()" 
								style=" font-size: 0.9rem;
								letter-spacing: 0.05rem;
								padding: 0.75rem 1rem;">Back</button> -->
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>


</html>
