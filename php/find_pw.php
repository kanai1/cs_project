<?php
	function send_post($id)
	{
		$fields = [
			'id' => $id,
		];
		$postdata = http_build_query($fields);
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, 'reset_pw.php');
		curl_setopt($ch,CURLOPT_POST, true);
		curl_setopt($ch,CURLOPT_POSTFIELDS, $postdata);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		echo $result;
	}

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
				send_post($result['id']);
			}
			else
			{
				echo "<script>alert('없는 회원정보입니다.');location.href='/'</script>";
			}
		}
		else if(isset($_POST['phone']))
		{
			$phone = $_POST['phone'];
			$sql_find = "SELECT * FROM user WHERE id='{$id}' && name='{$name}' && phone={$phone}";

			if($result = mysqli_fetch_array(mysqli_query($conn, $sql_find)))
			{
				send_post($result['id']);
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
