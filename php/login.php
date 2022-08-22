<?php
	if(isset($_POST['id']) && isset($_POST['password']))
	{
		$id = $_POST['id'];
		$password = $_POST['password'];

		$conn = mysqli_connect('localhost', 'rudrleo', 'rudrleoWkd!2', 'CSproject');
		$sql = "SELECT * FROM user WHERE id = '{$id}' AND password = SHA2('{$password}', 256)";

		if($result = mysqli_fetch_array(mysqli_query($conn, $sql)))
		{
			session_start();

			$_SESSION['user_name'] = $result['name'];
			$_SESSION['user_id'] = $result['id'];

			echo "<script>alert('로그인에 성공했습니다.');location.href='/'</script>";
		}
		else
		{
			echo "<script>alert('로그인에 실패했습니다.');location.href='../signin.html'</script>";
		}
	}
	else
	{
		echo "<script>alert('잘못된 접근입니다.');location.href='signin.html'</script>";
	}
?>
