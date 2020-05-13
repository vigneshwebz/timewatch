<?php

include 'config.php';

$entrydet = "SELECT slot_id FROM time_entry_data where slot_id=".$_POST['slotid']." and entry_date='".$_POST['report']."'";
$resultdet = $conn->query($entrydet);

if ($resultdet->num_rows > 0) {

	$upsql = "UPDATE time_entry_data set work_detail='".$_POST['work']."',usage_detail='".$_POST['usage']."' where slot_id=".$_POST['slotid']." and entry_date='".$_POST['report']."'";
	if (mysqli_query($conn, $upsql)) {
		echo "added";
	} else {
		echo "failed";
	}

} else {

	$inssql = "INSERT INTO time_entry_data (entry_date, slot_id, slot_name, work_detail, usage_detail)
	VALUES ('".$_POST['report']."','".$_POST['slotid']."','".$_POST['slot']."','".$_POST['work']."','".$_POST['usage']."')";
	if (mysqli_query($conn, $inssql)) {
		echo "added";
	} else {
		echo "failed";
	}

}


?>