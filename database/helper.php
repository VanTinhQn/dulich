<?php 
const local ='localhost';
const name ='root';
const password ='';
const database ='dulich';

$connect = mysqli_connect(local,name,password,database) or die('loi ket noi');
mysqli_set_charset($connect,'utf8');

function executeResult($sql){
	$connect = mysqli_connect(local,name,password,database) or die('loi ket noi');
	mysqli_set_charset($connect,'utf8');
	$result=mysqli_query($connect,$sql);
	$data =array();
	while ($row = mysqli_fetch_array($result,1)) {
		$data[] = $row;
	}
	mysqli_close($connect);	
	return $data;
}
function execute($sql) {
	$connect = mysqli_connect(local,name,password,database) or die('loi ket noi');
	mysqli_set_charset($connect,'utf8');
	mysqli_query($connect, $sql);
	mysqli_close($connect);
}
function executeSingleResult($sql) {
	$connect = mysqli_connect(local,name,password,database) or die('loi ket noi');
	mysqli_set_charset($connect,'utf8');
	$result = mysqli_query($connect, $sql);
	$row    = mysqli_fetch_array($result, 1);
	mysqli_close($connect);
	return $row;
}

function updateStarPlace($id){
	$sql = 'SELECT COUNT(CommentID) as number,RatingStar FROM comment WHERE PlaceID = '.$id.' GROUP by RatingStar';
	$resultUpdatePlace = executeResult($sql);
	$totalRate = 0;
	$totalStar = 0;
	foreach ($resultUpdatePlace as $key => $valueUpdatePlace) {
		$totalRate += $valueUpdatePlace['number'];
		$totalStar += $valueUpdatePlace['number'] * $valueUpdatePlace['RatingStar'];
	}
	$average = $totalStar / $totalRate;
	$sql = 'UPDATE place SET Rating = '.$average.'  WHERE PlaceID ='.$id ;
	execute($sql);
}

function updateStarHotel($id){
	$sql = 'SELECT COUNT(CommentID) as number,RatingStar FROM commenthotel WHERE HotelID = '.$id.' GROUP by RatingStar';
	$resultUpdateHotel = executeResult($sql);
	$totalRate = 0;
	$totalStar = 0;
	foreach ($resultUpdateHotel as $key => $valueUpdateHotel) {
		$totalRate += $valueUpdateHotel['number'];
		$totalStar += $valueUpdateHotel['number'] * $valueUpdateHotel['RatingStar'];
	}
	$average = $totalStar / $totalRate;
	$sql = 'UPDATE hotel SET Rating = '.$average.'  WHERE HotelID ='.$id ;
	execute($sql);
}
?>