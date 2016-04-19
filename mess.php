<?php

	$mysqli = new mysqli ("localhost","root","","Message");
	
	
	$data_arr = [];
	$query = $mysqli->query("SELECT * FROM message");
	$count = $query->num_rows;
	if($count > 0)
	{
		$data_arr["count"] = $count;
		$i = 0;
		while($row = $query->fetch_array(MYSQLI_ASSOC))
		{
			$data_arr[$i]["login"] = $row["Login"];
			$data_arr[$i]["email"] = $row["Email"];
			$data_arr[$i]["mess"] = htmlspecialchars_decode(stripslashes($row["Message"]));
			$i++;
		}
	}
	else
	{
		$data_arr["count"] = 0;
	}
	$data_arr = json_encode($data_arr);
	echo $data_arr;
?>