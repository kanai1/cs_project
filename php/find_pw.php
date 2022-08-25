<?php
	function send_post($id)
	{
		$postarray = http_build_query(array('_id'=>$id));
		$opts = array('http'=>(array('method'=>'post', 'header' => 'Content-type: application/x-www-form-urlencoded', 'content'=>$postarray)));
		$context = stream_context_create($opts);
		$result = file_get_contents('reset_pw.php', false, $context);
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
