<?php 
session_start();
require_once('database/helper.php');
require_once('rating/rating.php');
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

	<div class="d-flex align-items-center justify-content-center banner" style="background-image: url('https://preview.colorlib.com/theme/travelo/img/banner/bradcam2.png.webp')">
		<div class="banner-text text-center text-white">
			<div class="container">
				<div class="row justify-content-center">
					<h3 class="fs-1 mb-3 fw-bold fst-italic" style="font-family: 'Nothing You Could Do', cursive;">Địa điểm du lịch</h3>
					<p class="w-50">Lorem ipsum dolor sit amet consectetur adipisicing, elit. Quia consectetur, quae ea eius nulla magnam veritatis, beatae odit doloribus? Labore!
					</p>
				</div>
			</div>
		</div>
	</div>
	<!-- main -->
	<div class="main" style = "min-height: 70vh;">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="text-center my-5">
						<h3>All Places</h3>
						<p>Suffered alteration in some form, by injected humour or good day randomised booth anim 8-bit hella wolf moon beard words.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
				$current_page = 1;
				if (isset($_GET['page'])) {
					$current_page = $_GET['page'];
				}
				$count = 6;
				$sql_total_page = 'select count(PlaceID) as number from place';
				$result_total_page = executeSingleResult($sql_total_page);
				$total_pages = ceil($result_total_page['number']/$count);
				$first_index = ($current_page -1)*$count;
				$sql = 'select * from place limit '.$first_index.','.$count ;
				$result = executeResult($sql);
				foreach ($result as $key => $value) {
					$sqlCity = 'select Name from city where CityID ='.$value['CityID'];
					$cityName = executeSingleResult($sqlCity);
					?>
					<div class="col-lg-4 col-md-6">
						<a href="chitietdiadiem.php?q=<?php echo($value['PlaceID']) ?>" class="text-dark text-decoration-none">
							<div class="card mb-4">
								<img src=" <?php echo($value['Image_url']) ?>" class="card-img-top" alt="image" style="height: 15rem">
								<div class="card-body">
									<p class="fs-5 card-link mb-0"><?php echo($value['Title']) ?></p>
									<?php starRating(round($value['Rating'])) ?>
									<p class="my-0">Địa điểm: <span><?php echo $cityName['Name']; ?></span></p>
									<p class="card-text my-2 three-dot"><?php echo($value['Description']) ?></p>
								</div>
							</div>
						</a>
					</div>
				<?php } ?>
			</div>

			<!-- pagination -->
			
			<nav>
				<ul class="pagination">
					<?php 
					if ($current_page > 1) {
						?>
						<li class="page-item">
							<a class="page-link" href="?page=<?php echo ($current_page - 1) ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
					<?php } ?>

					<?php 
					for($i = 1 ; $i <= $total_pages; $i++){
						if($current_page == $i){
						?>
						<li class="page-item active"><a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i; ?></a></li>
					<?php }else{ ?>
						<li class="page-item"><a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i; ?></a></li>
					<?php }} ?>
					
					<?php 
					if ($current_page < $total_pages) {
						?>
						<li class="page-item">
							<a class="page-link" href="?page=<?php echo ($current_page + 1) ?>" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					<?php } ?>
				</ul>
			</nav>
			
			<!-- end pagination -->
		</div>
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