<?php
	if(isset($_POST['password']) && isset($_POST['confirm']) && isset($_SESSION['pre_id']))
	{
		$password = $_POST['password'];
		$confirm = $_POST['confirm'];
		$id = $_SESSION['pre_id'];

		if($password != $confirm)
		{
			echo "<script>alert('비밀번호를 확인해주세요.');history.back();</script>";
		}
		else
		{
			$conn = mysqli_connect('localhost', 'rudrleo', 'rudrleoWkd!2', 'CSproject');
			$sql_find = "SELECT * FROM user WHERE id='{$id}'";

			if(mysqli_fetch_array(mysqli_query($conn, $sql_find)))
			{
				$sql_update = "UPDATE user SET password=SHA2('{$password}', 256) WHERE id='{$id}'";
				if(mysqli_query($conn, $sql_update))
				{
					session_start();
					session_unset();
					session_destroy();
					echo "<script>alert('비밀번호 초기화에 성공했습니다.');location.href='../';</script>";
				}
			}
			else
			{
				echo "<script>alert('잘못된 접근입니다.');location.href='../';</script>";
			}
		}
	}
	else
	{
		echo "<script>alert('잘못된 접근입니다.');history.back();</script>";
	}
?>
