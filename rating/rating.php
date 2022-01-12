<?php 
function starRating($number){
	switch ($number) {
		case 1:
		echo '
		<i class="bi bi-star-fill star"></i>
		<i class="bi bi-star-fill"></i>
		<i class="bi bi-star-fill"></i>
		<i class="bi bi-star-fill"></i>
		<i class="bi bi-star-fill"></i>';
		break;
		case 2:
		echo '
		<i class="bi bi-star-fill star"></i>
		<i class="bi bi-star-fill star"></i>
		<i class="bi bi-star-fill"></i>
		<i class="bi bi-star-fill"></i>
		<i class="bi bi-star-fill"></i>';
		break;
		case 3:
		echo '
		<i class="bi bi-star-fill star"></i>
		<i class="bi bi-star-fill star"></i>
		<i class="bi bi-star-fill star"></i>
		<i class="bi bi-star-fill"></i>
		<i class="bi bi-star-fill"></i>';
		break;
		case 4:
		echo '
		<i class="bi bi-star-fill star"></i>
		<i class="bi bi-star-fill star"></i>
		<i class="bi bi-star-fill star"></i>
		<i class="bi bi-star-fill star"></i>
		<i class="bi bi-star-fill"></i>';
		break;
		case 5:
		echo '
		<i class="bi bi-star-fill star"></i>
		<i class="bi bi-star-fill star"></i>
		<i class="bi bi-star-fill star"></i>
		<i class="bi bi-star-fill star"></i>
		<i class="bi bi-star-fill star"></i>';
		break;
		default:
		echo '
		<i class="bi bi-star-fill star"></i>
		<i class="bi bi-star-fill"></i>
		<i class="bi bi-star-fill"></i>
		<i class="bi bi-star-fill"></i>
		<i class="bi bi-star-fill"></i>';
		break;
	}
}
?>