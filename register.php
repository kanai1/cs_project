<?php
	if(isset($_POST['name']) && 
		isset($_POST['id']) && 
		isset($_POST['password']) && 
		isset($_POST['confirm']) && 
		isset($_POST['phone']) && 
		isset($_POST['email'])
	)
	{
		echo "정상작동";
	}
?>
