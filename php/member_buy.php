<?php
	if(isset($_GET['count']) && $_SESSION['user_id'])
	{
		$user_id = $_SESSION['user_id'];
		$count = $_GET['count'];

		if($count <= 0)
		{
			echo "<script>alert('0개 이상의 식권만 구매할 수 있습니다.');locaton.href='../member_buy.html';</script>";
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
					echo "<script>alert('{$count}개의 식권을 구매하였습니다.');locaton.href='../';</script>";
				}
				else
				{
					echo "<script>alert('식권 구매에 실패했습니다. 잠시후 다시 시도해주세요.');locaton.href='../member_buy.html';</script>";
				}
			}
			else
			{
				$sql_insert = "INSERT INTO member_ticket(code,count) VALUES('{$code}', $count)";
		
				if(mysqli_query($conn, $sql_insert))
				{
					echo "<script>alert('{$count}개의 식권을 구매하였습니다.');locaton.href='../';</script>";
				}
				else
				{
					echo "<script>alert('식권 구매에 실패했습니다. 잠시후 다시 시도해주세요.');locaton.href='../member_buy.html';</script>";
				}
			}

		}
		else
		{
			echo "<script>alert('잘못된 접근입니다.');locaton.href='../member_buy.html';</script>";
		}
	}
	else
	{
		echo "<script>alert('잘못된 접근입니다.');locaton.href='../member_buy.html';</script>";
	}
?>
