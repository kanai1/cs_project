<?php
	if(isset($_POST['ticket']))
	{
		$ticket_number = $_POST['ticket'];

		$conn = mysqli_connect('localhost', 'rudrleo', 'rudrleoWkd!2', 'CSproject');
		$sql_find = "SELECT * FROM ticket_time WHERE ticket_number='{$ticket_number}'";

		if(mysqli_fetch_array(mysqli_query($conn, $sql_find)))
		{
			$sql_delete = "DELETE FROM ticket_time WHERE ticket_number='{$ticket_number}'";

			if(mysqli_query($conn, $sql_delete))
			{
				echo "<script>alert('퇴실이 완료되었습니다.');location.href='../main_out.php';</script>";
			}
			else
			{
				echo "<script>alert('잠시후 다시 이용해주세요.');location.href='../main_out.php';</script>";
			}
		}
		else
		{
			echo "<script>alert('사용기록이 없는 식권입니다.');location.href='../main_out.php';</script>";
		}
	}
?>
