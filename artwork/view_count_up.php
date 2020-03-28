<?
	//$get_temp = explode(" ", $_GET['sub']);
	//$get_sub = $get_temp[0]; //공격방지

	//$get_temp2 = explode(" ", $_GET['page']);
	//$get_page = $get_temp2[0]; //공격방지

	$get_temp3 = explode(" ", $_GET['seq']);
	$get_seq = $get_temp3[0]; //공격방지

	$get_temp4 = explode(" ", $_GET['view']);
	$get_view = $get_temp4[0]; //공격방지

	$get_view++;

	
include "../admin/dbcon.php";

//메모리사용 무한
ini_set('memory_limit', -1);

	$query = "UPDATE board SET view = $get_view WHERE seq = $get_seq"; // SQL 쿼리문

	$result=mysql_query($query, $conn); // 쿼리문을 실행 결과

	if( !$result ) {
		echo "Failed to list query view_count_up";
		$isSuccess = FALSE;
	}


	

?>
<script>
location.replace('view.php?seq=<?=$get_seq?>');
</script>



