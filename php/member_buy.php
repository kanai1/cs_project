<?php
	if(isset($_GET['count']) && $_SESSION['user_id'])
	{
		$user_id = $_SESSION['user_id'];
		$count = $_GET['count'];

		if($count <= 0)
		{
			// 잘못된 식권 개수
		}

		$conn = mysqli_connect('localhost', 'rudrleo', 'rudrleoWkd!2', 'CSproject');
		$sql_find = "SELECT ticket_code from user where id = '{$user_id}'";

		if($result = mysqli_fetch_array(mysqli_query($conn, $sql_find)))
		{
			$code = $result['ticket_code'];
			$sql_find_ticket = "SELECT * FROM member_ticket WHERE code='{$code}'";

			if($result_ticket_code = mysqli_fetch_array(mysqli_query($conn, $sql_find_ticket)))
			{
				$now_count = $result_ticket_code['count'] + $count;
				$sql_alter = "UPDATE member_ticket SET count={$now_count} WHERE code='{$code}'";

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
				$sql_insert = "INSERT INTO member_ticket(code,count) VALUES('{$code}', $count)";
		
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
			// 잘못된 접근
		}
	}
	else
	{
		//잘못된 접근
	}
?>
