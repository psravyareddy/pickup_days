<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/pickupDays.php';

$database = new Database();
$db = $database->getConnection();

$pickup_days= new PickupDays($db);
#$pickup_days->zoneid=$_POST['zoneid'];
$pickup_days->product_name=$_GET['product_name'];
$final_res= $pickup_days->getzoneid();
#print_r(json_encode($final_res));
$user_arr=array(
    "status" => true,
    "item searched for " =>$final_res['item'],
    "recycle steps" => $final_res['steps']
    
);
echo json_encode($user_arr);
?>
