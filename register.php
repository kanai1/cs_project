<?php
	if(isset($_POST['name']) && 
		isset($_POST['id']) && 
		isset($_POST['password']) && 
		isset($_POST['confirm']) && 
		isset($_POST['phone']) && 
		isset($_POST['email'])
	)
	{
		$name = $_POST['name'];
		$id = $_POST['id'];
		$pw = $_POST['password'];
		$confirm = $_POST['confirm'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];

		$conn = mysqli_connect('localhost', 'rudrleo', 'rudrleoWkd!2', 'CSproject');
		$check_overlap = "SELECT * from user WHERE id = '{$id}' OR phone = {$phone} OR email = '{$email}'";
		$sql = "INSERT INTO user(name,id,password,phone,email) VALUES('{$name}', '{$id}', SHA2('{$pw}', 256), $phone, '{$email}')";

		if(mysqli_query($conn, $check_overlap) == "")
		{
			// 이미 회원정보가 있는 아이디나 휴대전화, 이메일입니다.
			echo "already exist";
		}
		else if(strcmp($pw, $confirm))
		{
			// 비밀번호와 비밀번호 확인 불일치
			echo "password inconsistency";
		}
		else if(mysqli_query($conn, $sql))
		{
			// 계정생성 성공
			echo "success";
		}
		else
		{
			// 계정생성 실패
			echo "fail";
		}
	}
	else
	{
		// 잘못된 접근
	}
?>
