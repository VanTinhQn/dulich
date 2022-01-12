<?php session_start(); 
require_once('./database/helper.php');
require_once('rating/rating.php');
if (isset($_GET['q'])) {
	$id = $_GET['q'];
	$sql = 'select hotel.*,Name from hotel inner join city on hotel.CityID = city.CityID where HotelID ='.$id ;
	$result = executeSingleResult($sql);
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
	<?php require_once('navbar.php'); ?>

	<div class="d-flex align-items-center justify-content-center banner" style="background-image: url('https://owa.bestprice.vn/images/articles/uploads/top-10-khach-san-can-tho-gan-trung-tam-dep-nhat-5e8a976a21ce6.jpg')">
		<div class="banner-text text-center text-white">
			<div class="container">
				<div class="row justify-content-center">
					<h3 class="fs-1 mb-3 fw-bold fst-italic" style="font-family: 'Nothing You Could Do', cursive;"><?php echo $result['Title']; ?></h3>
					<p class="w-50">Lorem ipsum dolor sit amet consectetur adipisicing, elit. Quia consectetur, quae ea eius nulla magnam veritatis, beatae odit doloribus? Labore!
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="main" style = "min-height: 70vh;">
		<div class="container">
			<div class="row">
				<div class="col">
					<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="timkiemdiadiem.php?s_diadiem=<?php echo $result['Name']; ?>"><?php echo $result['Name']; ?></a></li>
							<li class="breadcrumb-item active"><?php echo $result['Title']; ?></li>
						</ol>
					</nav>
				</div>
			</div>

			<div class="hotel-image mb-4">
				<div class="row">
					<img src="<?php echo $result['Image_url']; ?>" alt="image" class="img-fluid" style="max-height: 65vh;object-fit: cover;">
				</div>
			</div>

			<div class="row">
				<h3 class="mb-3">Thông tin khách sạn</h3>
				<p>Vị trí: <?php echo $result['Location']; ?></p>
				<p class="text-info fs-4">Giá cả: <?php echo number_format($result['Cost']); ?></p>
				<p><?php echo $result['Description']; ?></p>
			</div>
			<div class="row">
				<iframe src="<?php echo $result['Map']; ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
			<!-- Comment -->
			<hr>
			<div class="comment">
				<h3 class="mb-5">Đánh giá</h3>
				<div class="row">
					<div class="col-sm-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
						<?php 
						$sql = 'select Rating from hotel where HotelID ='.$id ;
						$resultOverviewRating = executeSingleResult($sql);
						$sqlTotal = 'SELECT COUNT(CommentID) as number FROM commenthotel WHERE HotelID = '.$id ;
						$resultTotalRating = executeSingleResult($sqlTotal);
						$sql1 = 'SELECT COUNT(CommentID) as number FROM commenthotel WHERE HotelID = '.$id.' and RatingStar = 1';
						$sql2 = 'SELECT COUNT(CommentID) as number FROM commenthotel WHERE HotelID = '.$id.' and RatingStar = 2';
						$sql3 = 'SELECT COUNT(CommentID) as number FROM commenthotel WHERE HotelID = '.$id.' and RatingStar = 3';
						$sql4 = 'SELECT COUNT(CommentID) as number FROM commenthotel WHERE HotelID = '.$id.' and RatingStar = 4';
						$sql5 = 'SELECT COUNT(CommentID) as number FROM commenthotel WHERE HotelID = '.$id.' and RatingStar = 5';
						$totalRating1 = executeSingleResult($sql1);
						$totalRating2 = executeSingleResult($sql2);
						$totalRating3 = executeSingleResult($sql3);
						$totalRating4 = executeSingleResult($sql4);
						$totalRating5 = executeSingleResult($sql5);
						if ($resultTotalRating['number'] != 0) {
							$percent1 = $totalRating1['number'] / $resultTotalRating['number'] * 100;
							$percent2 = $totalRating2['number'] / $resultTotalRating['number'] * 100;
							$percent3 = $totalRating3['number'] / $resultTotalRating['number'] * 100;
							$percent4 = $totalRating4['number'] / $resultTotalRating['number'] * 100;
							$percent5 = $totalRating5['number'] / $resultTotalRating['number'] * 100;
						}else{
							$percent1 = 0;
							$percent2 = 0;
							$percent3 = 0;
							$percent4 = 0;
							$percent5 = 0;
						}
						?>
						<div class="rating-card">
							<div class="text-center m-b-30">
								<h4>Rating Overview</h4>
								<br>
								<h1 class="rating-number"><?php echo round($resultOverviewRating['Rating'],1); ?><small>/5</small></h1>
								<div class="rating-stars d-inline-block position-relative">
									<i class="bi bi-star-fill"></i>
								</div>
								<div class="text-muted"><?php echo $resultTotalRating['number'];?></div>
							</div>
							<div class="rating-divided">
								<div class="rating-progress">
									<span class="rating-grade px-2">5 <i class="bi bi-star-fill"></i></span>
									<div class="progress">
										<div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent5 ?>%"aria-valuenow="<?php echo $percent5 ?>" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<span class="rating-value"><?php echo $totalRating5['number']; ?></span>
								</div>
								<div class="rating-progress">
									<span class="rating-grade px-2">4 <i class="bi bi-star-fill"></i></span>
									<div class="progress">
										<div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent4 ?>%"aria-valuenow="<?php echo $percent4 ?>" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<span class="rating-value"><?php echo $totalRating4['number']; ?></span>
								</div>
								<div class="rating-progress">
									<span class="rating-grade px-2">3 <i class="bi bi-star-fill"></i></span>
									<div class="progress">
										<div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent3 ?>%"aria-valuenow="<?php echo $percent3 ?>" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<span class="rating-value"><?php echo $totalRating3['number']; ?></span>
								</div>
								<div class="rating-progress">
									<span class="rating-grade px-2">2 <i class="bi bi-star-fill"></i></span>
									<div class="progress">
										<div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent2 ?>%"aria-valuenow="<?php echo $percent2 ?>" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<span class="rating-value"><?php echo $totalRating2['number']; ?></span>
								</div>
								<div class="rating-progress">
									<span class="rating-grade px-2">1 <i class="bi bi-star-fill"></i></span>
									<div class="progress">
										<div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent1 ?>%"aria-valuenow="<?php echo $percent1 ?>" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<span class="rating-value"><?php echo $totalRating1['number']; ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-3 mb-3">
						<a href="danhgiakhachsan.php?id=<?php echo $id?>" class="btn btn-dark">
							Viết đánh giá
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89.471-1.178-1.178.471L5.93 9.363l.338.215a.5.5 0 0 1 .154.154l.215.338 7.494-7.494Z"/>
							</svg>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card" style="cursor: unset">
							<div class="card-body">
								<h4 class="card-title">Recent Comments</h4>
								<h6 class="card-subtitle">Latest Comments section by users</h6>
							</div>
							<?php 
							$sql = 'select commenthotel.*,Username,Avatar from commenthotel inner join account on UserID = AccountID where HotelID ='.$id.' order by CommentID DESC';
							$resultComment = executeResult($sql);
							if ($resultComment) {
								foreach ($resultComment as $key => $valueComment) {
									?>
									<div class="comment-widgets m-b-20">
										<div class="d-flex flex-row comment-row">
											<div class="p-2"><img src="<?php echo $valueComment['Avatar'] ?>" class="avatar" style="width: 50px; height: 50px"></div>
											<div class="comment-text w-100">
												<h5 class="mb-0"><?php echo $valueComment['Username'] ?></h5>
												<p class="mb-0 fst-italic"><?php echo $valueComment['Context'] ?></p>
												<?php starRating($valueComment['RatingStar']) ?>
												<div>
													<span>Địa điểm: <?php starRating($valueComment['Rating_diadiem']) ?></span>
												</div>
												<div>
													<span>Sự sạch sẽ: <?php starRating($valueComment['Rating_sachse']) ?></span>
												</div>
												<div>
													<span>Dịch vụ: <?php starRating($valueComment['Rating_dichvu']) ?></span>
												</div>
												<div>
													<span>Giá cả: <?php starRating($valueComment['Rating_giaca']) ?></span>
												</div>
												<div class="comment-footer">
													<span class="date"><?php echo date('d-m-Y', strtotime($valueComment['TravelTime'])) ?></span>
												</div>
												<b><?php echo $valueComment['Title'] ?></b>
												<p><?php echo $valueComment['Content'] ?></p>
											</div>
										</div>
									</div>
								<?php }}else{ ?>
									<p class="text-center">Chưa có đánh giá nào cho bài viết này</p>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<!-- End Comment -->
				<!-- More hotels -->
				<div class="more-hotels mb-5">
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<div class="text-center my-5">
								<h3>Các khách sạn gần đây</h3>
							</div>
						</div>
					</div>
					<div class="row">
						<?php 
						$sql_more = 'select * from hotel where CityID ='.$result['CityID'].' and HotelID not in ('.$result['HotelID'].') order by HotelID DESC limit 6';
						$result_more = executeResult($sql_more);
						foreach ($result_more as $key => $value) {

							?>
							<div class="col-lg-3 col-md-4">
								<a href="?q=<?php echo $value['HotelID'] ?>" class="text-dark text-decoration-none">
									<div class="card mb-4">
										<img src="<?php echo $value['Image_url'] ?>" class="card-img-top" alt="image" style="height: 15rem;">
										<div class="card-body">
											<p class="fs-5 card-link mb-0"><?php echo $value['Title'] ?></p>
											<?php starRating(round($value['Rating'])) ?>
											<p class="my-0">Địa điểm: <span><?php echo $result['Name']; ?></span></p>
											<p class="my-0">Giá cả: <span><?php echo number_format($value['Cost']); ?></span></p>
											<p class="card-text my-2 three-dot"><?php echo $value['Description'] ?></p>
										</div>
									</div>
								</a>
							</div>
						<?php } ?>
					</div>
				</div>
				<!-- End more hotels -->
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