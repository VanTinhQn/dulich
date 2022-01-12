<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-3">
	<div class="container">
		<a class="navbar-brand" href="index.php">Experience</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav mx-auto">
				<li class="nav-item active">
					<a class="nav-link" href="./">Trang chủ</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="diadiemdulich.php">Địa điểm du lịch</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="khachsan.php">Khách sạn</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Liên hệ</a>
				</li>
			</ul>
			<form class="d-flex me-2" action="timkiemdiadiem.php" method="get">
				<input class="form-control" placeholder="Search" name="s_diadiem">
				<!-- <button class="btn btn-outline-secondary" type="submit">Search</button> -->
			</form>

			<?php 
			if (isset($_SESSION['user'])) {
				?>

				<div class="navbar-nav">
					<div class="avatar-group">
						<img class = "avatar" src="<?php echo $_SESSION['user']['Avatar']?>" alt="avatar">
						<span class="text-white"><?php echo $_SESSION['user']['Username']; ?></span>
						<div class="info">
							<ul class="list-group">
								<li class="list-group-item"><a class="list-group-link" href="">Tài khoản</a></li>
								<li class="list-group-item"><a class="list-group-link" href="dangxuat.php">Đăng xuất</a></li>
							</ul>
							<div class="triangle"></div>
						</div>
					</div>
				</div>
				
			<?php }else{ ?>
				<div class="navbar-nav">
					<li class="nav-item"><a class="nav-link" href="dangnhap.php">Đăng nhập</a></li>
				</div>
			<?php } ?>
		</div>
	</div>
</nav>