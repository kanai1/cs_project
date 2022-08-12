<?php
	if(isset($_GET['']))
	{
		$user_id = $_GET[''];

		$conn = mysqli_connect('localhost', 'rudrleo', 'rudrleoWkd!2', 'CSproject');
		$sql_find = "SELECT * FROM member_ticket WHERE id='{$user_id}'";

		if($result = mysqli_fetch_array(mysqli_query($conn, $sql_find)))
		{
			if($result['count'] == 0)
			{
				// 식권개수 부족
			}
			else
			{
				$now_count = $result['count'] - 1;
				$sql_update = "UPDATE member_ticket SET count=$now_count WHERE id='{$user_id}'";

				if(mysqli_query($conn, $sql_update))
				{
					// 정상 처리
				}
				else
				{
					// 사용 실패
				}
			}
		}
		else
		{
			// 구입기록이 없음
		}
	}
	else
	{
		// 잘못된 접근
	}
?>
