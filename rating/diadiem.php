<?php 
session_start();
require_once('../database/helper.php');
if (isset($_SESSION['user']) and isset($_POST['rating'])){
	$userID = $_SESSION['user']['AccountID'];
	$placeID = $_POST['placeId'];
	$rateStar = $_POST['rateStar'];
	$title = $_POST['title'];
	$date = $_POST['date'];
	$context = $_POST['context'];
	$comment = $_POST['comment'];

	$sql = 'INSERT INTO comment (Title, PlaceID, UserID, Context, TravelTime, Content, RatingStar) 
	VALUES("'.$title.'",'.$placeID.','.$userID.',"'.$context.'","'.$date.'","'.$comment.'",'.$rateStar.')';
	try {
		execute($sql);
		updateStarPlace($placeID);
		header('Location: ../chitietdiadiem.php?q='.$placeID);
	} catch (Exception $e) {
		echo "Đã có lỗi xảy ra! Vui lòng thử lại sau";
	}
}else echo "Lỗi";
?>
