<?php 
session_start();
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
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nothing+You+Could+Do&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<title>Travel</title>
</head>
<body>
	<?php require_once('navbar.php') ?>

	<!-- main -->
	<div class="main mt-100" style="min-height: 70vh">
		<?php if (isset($_SESSION['user'])) { ?>
		<div class="container">
			<div class="row">
				<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
					<div class="card border-0 shadow rounded-3 my-5">
						<div class="card-body p-4 p-sm-5">
							<h5 class="card-title text-center mb-2 fs-3">Đánh giá</h5>

							<form action="rating/diadiem.php" method="post">
								<div class="rating mb-3">
									<input type="hidden" name="placeId" value="<?php echo $_GET['id']; ?>">
									<div class="rating-star">
										<input type="radio" value="5" name="rateStar" id="rate-5" checked>
										<label for="rate-5" class="bi bi-star-fill fs-3"></label>
										<input type="radio" value="4" name="rateStar" id="rate-4">
										<label for="rate-4" class="bi bi-star-fill fs-3"></label>
										<input type="radio" value="3" name="rateStar" id="rate-3">
										<label for="rate-3" class="bi bi-star-fill fs-3"></label>
										<input type="radio" value="2" name="rateStar" id="rate-2">
										<label for="rate-2" class="bi bi-star-fill fs-3"></label>
										<input type="radio" value="1" name="rateStar" id="rate-1">
										<label for="rate-1" class="bi bi-star-fill fs-3"></label>
									</div>
								</div>
								
								<div class="mb-3">
									<label for="Inputtitle" class="form-label">Đặt tiêu đề cho đánh giá của bạn</label>
									<input type="text" class="form-control" name="title" id="Inputtitle" placeholder="Tóm tắt trải nghiệm của bạn" required>
								</div>
								<div class="mb-3">
									<label for="Inputdate" class="form-label">Bạn đi vào thời gian nào?</label>
									<input type="date" class="form-control" name="date" id="Inputdate" required>
								</div>
								<div class="mb-3">
									<label for="Inputselect" class="form-label">Bạn đi cùng ai?</label>
									<select class="form-select" name="context" id="Inputselect" required>
										<option value="Cặp đôi" selected>Cặp đôi</option>
										<option value="Gia đình trẻ nhỏ">Gia đình trẻ nhỏ</option>
										<option value="Gia đình thanh thiếu niên">Gia đình thanh thiếu niên</option>
										<option value="Bạn bè">Bạn bè</option>
										<option value="Doanh nghiệp">Doanh nghiệp</option>
										<option value="Một mình">Một mình</option>
									</select>
								</div>
								<div class="form-group mb-3">
									<label for="exampleFormControlTextarea1">Để lại đánh giá của bạn</label>
									<textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
								</div>
								<button type="submit"class="btn btn-primary" name="rating">Đánh giá</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php }else{ ?>
			<div class="container">
				<div class="row">
					<h3>Vui lòng đăng nhập để tiếp tục</h3>
					<a href="dangnhap.php">Đăng nhập</a>
				</div>
			</div>
		<?php } ?>
	</div>
	<!-- end main -->
	<!-- footer -->
	<footer class="py-5 bg-dark text-white">
		<div class="container">
			<div class="row">
				<div class="col-4">
					<h5>Thông tin liên lạc</h5>
					<ul class="nav flex-column">
						<li class="nav-item mb-2">Địa chỉ: Quy Nhơn, Bình Định </li>
						<li class="nav-item mb-2">Gmail liên lạc: <a href="" class="text-decoration-none">example@gmail.com</a> </li>
						<li class="nav-item mb-2">Số điện thoại: 0351234567 </li>
					</ul>
				</div>

				<div class="col-4">
					<h5>About</h5>
					<ul class="nav flex-column">
						<li class="nav-item mb-2">Địa chỉ: Quy Nhơn, Bình Định </li>
						<li class="nav-item mb-2">Gmail liên lạc: <a href="" class="text-decoration-none">example@gmail.com</a></li>
						<li class="nav-item mb-2">Số điện thoại: 0351234567 </li>
					</ul>
				</div>

				<div class="col-4">
					<h5>Follow Us</h5>
					<ul class="nav">
						<li class="nav-item mx-2"><a href="" class="text-white"><i class="bi bi-twitter"></i></a></li>
						<li class="nav-item mx-2"><a href=""class="text-white"><i class="bi bi-facebook"></i></a></li>
						<li class="nav-item mx-2"><a href=""class="text-white"><i class="bi bi-instagram"></i></a></li>
						<li class="nav-item mx-2"></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- end footer -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
	crossorigin="anonymous"></script>
</body>

</html>