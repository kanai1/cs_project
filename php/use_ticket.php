<?php
	if(isset($_POST['ticket']))
	{
		$ticket_number = $_POST['ticket'];

		$conn = mysqli_connect('localhost', 'rudrleo', 'rudrleoWkd!2', 'CSproject');
		$sql_nonmember_find = "SELECT * FROM nonmember_ticket WHERE ticket_number='{$ticket_number}'";
		$sql_member_find = "SELECT * FROM member_ticket WHERE code='{$ticket_number}'";

		if(mysqli_fetch_array(mysqli_query($conn, $sql_nonmember_find)))
		{
			$sql_delete = "DELETE FROM nonmember_ticket WHERE ticket_number='{$ticket_number}'";
			if(mysqli_query($conn, $sql_delete))
			{
				// 사용 성공
				$sql_ticket_time = "INSERT INTO ticket_time(time, ticket_number) VALUES(now(), '{$ticket_number}')";
				mysqli_query($conn, $sql_ticket_time);
				echo "비회원 식권 사용 완료";
			}
			else
			{
				// 사용 실패
				echo "비회원 식권 사용 실패";
			}
		}
		else if($result = mysqli_fetch_array(mysqli_query($conn, $sql_memeber_find)))
		{
			$count = $result['count'];

			if($count <= 0)
			{
				// 식권 개수 부족
				echo "식권 개수 부족";
			}
			else
			{
				$now_count = $count - 1;
				$sql_update = "UPDATE member_ticket SET count={$now_count} WHERE code='{$ticket_number}'";

				if(mysqli_query($conn, $sql_update))
				{
					// 정상 사용
					$sql_ticket_time = "INSERT INTO ticket_time(time, ticket_number) VALUES(now(), '{$ticket_number}')";
					mysqli_query($conn, $sql_ticket_time);

					echo "회원 식권 사용 완료";
				}
				else
				{
					// 사용 실패
					echo "회원 식권 사용 실패";
				}
			}
		}
		else
		{
			// 잘못된 식권
			echo "잘못된 식권입니다.";
		}
	}
	else
	{
		// 잘못된 접근
		echo "잘못된 접근입니다.";
	}
?>