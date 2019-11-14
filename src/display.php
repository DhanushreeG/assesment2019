
<?php
include "data.php";
if(isset($_POST['id'])){
	$id = $_POST['id'];	
$data=array();

// print_r($_POST);
$query="SELECT * FROM events WHERE User_ID='$id'";
$result = mysqli_query($conn, $query);


while($row=mysqli_fetch_assoc($result)) {
	//$data[] = array( 'title'=$row['Eventname'],'start'=>$row['Startdate']);
$data[] = array('id' => $row['EventId'], 'title'=> $row['Eventname'],'start'=>$row['Startdate']);

	// // print_r($row);
	// foreach($row as $idx=>$value){
	// }
}
	
}		

// print_r($rows);
echo json_encode($data);
?>
