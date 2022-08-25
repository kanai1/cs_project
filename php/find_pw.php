<?php
	if(isset($_POST['id']) && isset($_POST['name']))
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$conn = mysqli_connect('localhost', 'rudrleo', 'rudrleoWkd!2', 'CSproject');

		if(isset($_POST['email']))
		{
			$email = $_POST['email'];
			$sql_find = "SELECT * FROM user WHERE id='{$id}' && name='{$name}' && email='{$email}'";

			if($result = mysqli_fetch_array(mysqli_query($conn, $sql_find)))
			{
				session_start();
				$_SESSION['pre_id'] = $id;
				echo "<script>location.href='reset_pw.php';</script>";
			}
			else
			{
				echo "<script>alert('없는 회원정보입니다.');location.href='/'</>";
			}
		}
		else if(isset($_POST['phone']))
		{
			$phone = $_POST['phone'];
			$sql_find = "SELECT * FROM user WHERE id='{$id}' && name='{$name}' && phone={$phone}";

			if($result = mysqli_fetch_array(mysqli_query($conn, $sql_find)))
			{
				session_start();
				$_SESSION['pre_id'] = $id;
				echo "<script>location.href='reset_pw.php';</script>";
			}
			else
			{
				echo "<script>alert('없는 회원정보입니다.');location.href='/'</script>";
			}
		}
		else
		{
			echo "<script>alert('잘못된 접근입니다.');location.href='/'</script>";
		}
	}
	else
	{
		echo "<script>alert('잘못된 접근입니다.');location.href='/'</script>";
	}
?>
