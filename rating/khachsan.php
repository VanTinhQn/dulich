<?php 
session_start();
require_once('../database/helper.php');
if (isset($_SESSION['user']) and isset($_POST['rating'])){
	$userID = $_SESSION['user']['AccountID'];
	$hotelID = $_POST['hotelId'];
	$rateStar = $_POST['rateStar'];
	$r_diadiem = $_POST['r_diadiem'];
	$r_sachse = $_POST['r_sachse'];
	$r_dichvu = $_POST['r_dichvu'];
	$r_giaca = $_POST['r_giaca'];
	$title = $_POST['title'];
	$date = $_POST['date'];
	$context = $_POST['context'];
	$comment = $_POST['comment'];

	$sql = 'INSERT INTO commenthotel (Title, HotelID, UserID, Context, TravelTime, Content, Rating_diadiem, Rating_sachse, Rating_dichvu, Rating_giaca, RatingStar) 
	VALUES("'.$title.'",'.$hotelID.','.$userID.',"'.$context.'","'.$date.'","'.$comment.'",'.$r_diadiem.','.$r_sachse.','.$r_dichvu.','.$r_giaca.','.$rateStar.')';
	try {
		execute($sql);
		updateStarHotel($hotelID);
		header('Location: ../chitietkhachsan.php?q='.$hotelID);
	} catch (Exception $e) {
		echo "Đã có lỗi xảy ra! Vui lòng thử lại sau";
	}
}else echo "Lỗi";
?>
