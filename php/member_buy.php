<?php
	if(isset($_GET['count']) && $_SESSION['user_id'])
	{
		$user_id = $_SESSION['user_id'];
		$count = $_GET['count'];

		$conn = mysqli_connect('localhost', 'rudrleo', 'rudrleoWkd!2', 'CSproject');
		$sql_find = "SELECT * from member_ticket where id = '{$user_id}'";

		if($result = mysqli_fetch_array(mysqli_query($conn, $sql_find)))
		{
			$now_count = $result['count'] + $now_count;
			$sql_alter = "UPDATE member_ticket SET count=$now_count WHERE id='{$user_id}'";

			if(mysqli_query($conn, $sql_alter))
			{
				// 정상 구매
			}
			else
			{
				// 구매 실패
			}
		}
		else
		{
			$sql_insert = "INSERT INTO member_ticket(id,count) VALUES('{$user_id}', $count)";

			if(mysqli_query($conn, $sql_insert))
			{
				// 정상 구매
			}
			else
			{
				// 구매 실패
			}
		}
	}
	else
	{
		//잘못된 접근
	}
?>
