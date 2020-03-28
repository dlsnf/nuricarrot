<?php

	include "common.php";



session_start(); // 세션을 시작헌다.

$get_id = $_POST['id'];
$get_pw = $_POST['pw'];



if($get_id == 'admin')
{
	if($get_pw == 'spi!!!')
	{
		//echo "로그인 성공";

		
		$_SESSION['id'] = 'admin';

		?>
			<script>
				location.href="<?=$url?>";
			</script>
		<?php

	}else{
		session_destroy();

		?>
			<script>
				alert("PASSWORD가 틀립니다.");
				history.go(-1);
			</script>
		<?php
	}
}else{
	session_destroy();

	?>
		<script>
			alert("ID가 존재하지 않습니다.");
			history.go(-1);
		</script>
	<?php
}




?>