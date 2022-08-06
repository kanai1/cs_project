<?php
	if(isset($_POST['']) && isset($_POST['']))
	{
		$id = $_POST[''];
		$password = $_POST[''];

		$conn = mysqli_connect('localhost', 'rudrleo', 'rudrleoWkd!2', 'CSproject');
		$sql = "SELECT * FROM user WHERE id = '{$id}' AND password = SHA2('{$password}', 256)";

		if($result = mysqli_fetch_array(mysqli_query($conn, $sql)))
		{
			// 로그인 성공
		}
		else
		{
			// 로그인 실패
		}
	}
	else
	{
		//잘못된 접근
	}
?>