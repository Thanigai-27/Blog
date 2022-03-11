<?php

include "config.php";

$visitor_ip=$_SERVER['REMOTE_ADDR'];
$postid = $_POST['postid'];
$type = $_POST['type'];

// Check entry within table
$query = "SELECT COUNT(*) AS cntpost FROM rating WHERE postid=".$postid." and userid=".$visitor_ip;
$result = mysqli_query($con,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntpost'];


if($count == 0){
    $insertquery = "INSERT INTO rating(ip_address,postid,type) values(".$visitor_ip.",".$postid.",".$type.")";
    mysqli_query($con,$insertquery);
}else {
    $updatequery = "UPDATE rating SET type=" . $type . " where ip_address=" . $visitor_ip . " and postid=" . $postid;
    mysqli_query($con,$updatequery);
}


// count numbers of like and unlike in post
$query = "SELECT COUNT(*) AS cntLike FROM rating WHERE type=1 and postid=".$postid;
$result = mysqli_query($con,$query);
$fetchlikes = mysqli_fetch_array($result);
$totalLikes = $fetchlikes['cntLike'];

$query = "SELECT COUNT(*) AS cntUnlike FROM rating WHERE type=0 and postid=".$postid;
$result = mysqli_query($con,$query);
$fetchunlikes = mysqli_fetch_array($result);
$totalUnlikes = $fetchunlikes['cntUnlike'];

// initalizing array
$return_arr = array("likes"=>$totalLikes,"unlikes"=>$totalUnlikes);

echo json_encode($return_arr);