<?php
	if(isset($_POST['']))
	{
		$ticket_number = $_POST[''];

		$conn = mysqli_connect('localhost', 'rudrleo', 'rudrleoWkd!2', 'CSproject');
		$sql_find = "SELECT * FROM nonmember_ticket WHERE ticket_number = '{$ticket_number}'";

		if(mysqli_query($conn, $sql_find))
		{
			$sql_delete = "DELETE FROM nonmember_ticket WHERE ticket_number='{$ticket_number}'";
			if(mysqli_query($conn, $sql_delete))
			{
				// 사용 성공
			}
			else
			{
				// 사용 실패
			}
		}
		else
		{
			// 잘못된 식권
		}
	}
	else
	{
		// 잘못된 접근
	}
?>
