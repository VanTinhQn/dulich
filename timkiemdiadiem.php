<?php
session_start();
require_once('./database/helper.php');
require_once('./rating/rating.php');
if (isset($_GET['s_diadiem'])) {
	$txtTimKiem = $_GET['s_diadiem'];
	$sql = 'SELECT * FROM place INNER JOIN city ON place.CityID = city.CityID 
	WHERE Name LIKE "%'.$txtTimKiem.'%" or place.Title LIKE "%'.$txtTimKiem.'%"';
	$result = executeResult($sql);
	$sqlHotel = 'SELECT * FROM hotel INNER JOIN city ON hotel.CityID = city.CityID 
	WHERE Name LIKE "%'.$txtTimKiem.'%" or hotel.Title LIKE "%'.$txtTimKiem.'%"';
	$resultHotel = executeResult($sqlHotel);
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
	<title>Travel</title>
</head>
<body>
	<?php require_once('navbar.php');?>
	<?php if (empty($result) && empty($resultHotel)) {
		?>
		<div class="main d-flex align-items-center justify-content-center" style = "min-height: 70vh; margin-top: 10vh;">
			<p class="text-center text-dark fs-1">Không tìm thấy kết quả</p>
		</div>
	<?php }else{ ?>
		<!-- main -->
		<div class="main" style = "min-height: 70vh; margin-top: 10vh">
			<div class="container">
				<div class="row">
					<ul class="nav nav-tabs mb-5">
						<li class="nav-item">
							<span class="user-select-none nav-link link__nav active ">Địa điểm du lịch</span>
						</li>
						<li class="nav-item">
							<span class="user-select-none nav-link link__nav">Khách sạn</span>
						</li>
					</ul>
				</div>
				<div class="content__tab active">
					<div class="row">
						<?php 
						foreach ($result as $key => $value) {
							?>
							<div class="col-lg-4 col-md-6">
								<a href="chitietdiadiem.php?q=<?php echo $value['PlaceID'] ?>" class="text-decoration-none text-dark">
									<div class="card mb-4">
										<img src=" <?php echo $value['Image_url'] ?>" class="card-img-top" alt="image" style="height: 15rem">
										<div class="card-body">
											<p class="fs-5 card-link mb-0"><?php echo $value['Title'] ?></p>
											<?php starRating(round($value['Rating'])) ?>
											<p class="my-0">Địa điểm: <span><?php echo $value['Name']; ?></span></p>
											<p class="card-text my-2 three-dot"><?php echo $value['Description'] ?></p>
										</div>
									</div>
								</a>
							</div>
						<?php } ?>

					</div>
				</div>
				<div class="content__tab">
					<div class="row">
						<?php 
						foreach ($resultHotel as $key => $value) {
							?>
							<div class="col-lg-4 col-md-6">
								<a href="chitietkhachsan.php?q=<?php echo $value['HotelID'] ?>" class="text-decoration-none text-dark">
									<div class="card mb-4">
										<img src=" <?php echo $value['Image_url'] ?>" class="card-img-top" alt="image" style="height: 15rem">
										<div class="card-body">
											<p class="fs-5 card-link" ><?php echo $value['Title'] ?></p>
											<p class="my-0">Địa điểm: <span><?php echo $value['Name']; ?></span></p>
											<p class="card-text my-2 three-dot"><?php echo $value['Description'] ?></p>
										</div>
									</div>
								</a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
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
	<script type="text/javascript">
		const navLinks = document.querySelectorAll('.link__nav');
		const contentTabs = document.querySelectorAll('.content__tab');

		navLinks.forEach(function(navlink, index){
			navlink.onclick = function(){
				const contentTab = contentTabs[index];
				document.querySelector('.link__nav.active').classList.remove('active');
				document.querySelector('.content__tab.active').classList.remove('active');
				this.classList.add('active');
				contentTab.classList.add('active');
			}
		})
	</script>
</body>

</html>