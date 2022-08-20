<?php
	if(isset($_SESSION['user_id']))
	{
		echo "<script>location.href='member_buy.html';</script>";
	}
	else
	{
		echo "<script>location.href='nonmember_buy.html';</script>";
	}
?>
