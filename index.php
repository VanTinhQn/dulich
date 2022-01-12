<?php session_start();
require_once('./database/helper.php');
require_once('./rating/rating.php');
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
	<?php require_once('navbar.php') ?>

	<header>

		<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active" style="background-image: url('https://youmatter.world/app/uploads/sites/2/2019/11/travel-world.jpg')">
					<div class="carousel-caption">
						<h5>First slide label</h5>
						<p>Some representative placeholder content for the first slide.</p>
					</div>
				</div>
				<div class="carousel-item" style="background-image: url('https://d13jio720g7qcs.cloudfront.net/images/guides/origin/5d229ac234b5f.png')">
					<div class="carousel-caption">
						<h5>Second slide label</h5>
						<p>Some representative placeholder content for the second slide.</p>
					</div>
				</div>
				<div class="carousel-item" style="background-image: url('https://www.ttrweekly.com/site/wp-content/uploads/2018/05/highlight-vietnam-1.jpg')">
					<div class="carousel-caption">
						<h5>Third slide label</h5>
						<p>Some representative placeholder content for the third slide.</p>
					</div>
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
	</header>
	<div class="main">
		<div class="container">
			<!-- place -->
			<div class="popular-place">
				<div class="row justify-content-center">
					<div class="col-lg-6">
						<div class="text-center my-5">
							<h3>Popular Place</h3>
							<p>Suffered alteration in some form, by injected humour or good day randomised booth anim 8-bit hella wolf moon beard words.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<?php 
					$sql = 'select place.*,Name from place INNER JOIN city on place.CityID = city.CityID where isPopular = 1 ORDER BY PlaceID DESC LIMIT 3';
					$result = executeResult($sql);
					foreach ($result as $key => $value) {
						?>
						<div class="col-lg-4 col-md-6">
							<a href="chitietdiadiem.php?q=<?php echo $value['PlaceID'] ?>" class="text-dark text-decoration-none">
								<div class="card mb-4">
									<img src=" <?php echo $value['Image_url'] ?>" class="card-img-top" alt="image" style="height: 15rem">
									<div class="card-body">
										<p class="fs-4 card-link mb-0"><?php echo $value['Title'] ?></p>
										<?php starRating(round($value['Rating'])) ?>
										<p class="my-0">Địa điểm: <span><?php echo $value['Name']; ?></span></p>
										<p class="card-text my-2 three-dot"><?php echo $value['Description'] ?></p>
									</div>
								</div>
							</a>
						</div>
					<?php } ?>
				</div>
				<div class="row justify-content-center mt-5">
					<div class="col-lg-2 col-md-3 text-center">
						<a class="btn btn-outline-info" href="diadiemdulich.php">Xem thêm</a>
					</div>
				</div>
			</div>
			<!-- end place -->

			<!-- hotel -->
			<div class="popular-hotel">
				<div class="row justify-content-center">
					<div class="col-lg-6">
						<div class="text-center my-5">
							<h3>Popular Hotel</h3>
							<p>Suffered alteration in some form, by injected humour or good day randomised booth anim 8-bit hella wolf moon beard words.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<?php 
					$sql = 'select hotel.*,Name from hotel INNER JOIN city on hotel.CityID = city.CityID where isPopular = 1 ORDER BY HotelID DESC LIMIT 3';
					$result = executeResult($sql);
					foreach ($result as $key => $value) {
						?>
						<div class="col-lg-4 col-md-6">
							<a href="chitietkhachsan.php?q=<?php echo $value['HotelID'] ?>" class="text-dark text-decoration-none">
								<div class="card mb-4">
									<img src=" <?php echo $value['Image_url'] ?>" class="card-img-top" alt="image" style="height: 15rem">
									<div class="card-body">
										<p class="fs-4 card-link mb-0"><?php echo $value['Title'] ?></p>
										<?php starRating(round($value['Rating'])) ?>
										<p class="my-0">Địa điểm: <span><?php echo $value['Name']; ?></span></p>
										<p class="card-text my-2 three-dot"><?php echo $value['Description'] ?></p>
									</div>
								</div>
							</a>
						</div>
					<?php } ?>
				</div>
				<div class="row justify-content-center mt-5">
					<div class="col-lg-2 col-md-3 text-center">
						<a class="btn btn-outline-info mb-3" href="khachsan.php">Xem thêm</a>
					</div>
				</div>
			</div>
			<!-- end hotel -->

			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="single-travel text-center my-5">
						<div>
							<img src="https://preview.colorlib.com/theme/travelo/img/svg_icon/1.svg" alt="image">
						</div>
						<h3 class="mt-4 mb-2">Comfortable Journey</h3>
						<p>A wonderful serenity has taken to the possession of my entire soul.</p>
					</div>
				</div>

				<div class="col-lg-4 col-md-6">
					<div class="single-travel text-center my-5">
						<div>
							<img src="https://preview.colorlib.com/theme/travelo/img/svg_icon/2.svg" alt="image">
						</div>
						<h3 class="mt-4 mb-2">Luxuries Hotel</h3>
						<p>A wonderful serenity has taken to the possession of my entire soul.</p>
					</div>
				</div>

				<div class="col-lg-4 col-md-6">
					<div class="single-travel text-center my-5">
						<div>
							<img src="https://preview.colorlib.com/theme/travelo/img/svg_icon/3.svg" alt="image">
						</div>
						<h3 class="mt-4 mb-2">Travel Guide</h3>
						<p>A wonderful serenity has taken to the possession of my entire soul.</p>
					</div>
				</div>

			</div>
		</div>
	</div>
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