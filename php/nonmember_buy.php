<?php
	$conn = mysqli_connect('localhost', 'rudrleo', 'rudrleoWkd!2', 'CSproject');

	$ticket_number;

	do
	{
		$ticket_number = hash("sha256", uniqid());
		$overlap_check = "SELECT * FROM nonmember_ticket WHERE ticket_number = '{$ticket_number}'";
	}
	while (mysqli_fetch_array(mysqli_query($conn, $overlap_check)));

	$sql_insert = "INSERT INTO nonmembeR_ticket(ticket_number, created) VALUES('{$ticket_number}', now())";

	if(mysqli_query($conn, $sql_insert))
	{
		// 정상 구매
		echo $ticket_number;
	}
	else
	{
		// 구매 실패
		echo "구매에 실패하였습니다. 잠시후 다시 시도해주세요.";
	}
?>
