<?php
	include "common.php";
	include "../admin/dbcon.php";


	$get_temp3 = explode(" ", $_GET['seq']);
	$get_seq = $get_temp3[0]; //공격방지



	$query="SELECT * FROM board WHERE seq=$get_seq"; // SQL 쿼리문

	$result=mysql_query($query, $conn); // 쿼리문을 실행 결과

	if( !$result ) {
		echo "Failed to list query view";
		$isSuccess = FALSE;
	}

	$boardList = array();

	while( $row = mysql_fetch_array($result) ) {
		$board['seq'] = $row['seq'];
		$board['name'] = $row['name'];	
		$board['title'] = strip_tags($row['title']);
		$board['body'] = nl2br(strip_tags($row['body']));
		$board['date_'] = $row['date_'];
		$board['view'] = $row['view'];

		array_push($boardList, $board);
	}



?>
<!DOCTYPE html>
	<head>
		<title>삼더하기일-BOARD-VIEW</title>

		<?
			include "head_common.php";

			include "jquery.php";
		?>

		<script>

			// Internet Explorer 6-11
			var isIE = /*@cc_on!@*/false || !!document.documentMode;
			// Edge 20+
			var isEdge = !isIE && !!window.StyleMedia;

			$(window).ready(function(){
				
				//touch disabled
				$(document).bind('touchmove', function(e) {
					e.preventDefault();
				});

				$("body").addClass('on_load');
				$(document).unbind('touchmove');
				on_load = true;

				
				if ( isIE || isEdge )
				{
					$(".ll").css({'stroke-dashoffset': 1000 });
				}

				if ( isIE )
				{
					//$(".ll").css({'opacity':'0'});
					$(".ll").hide();
				}

				$(".active").removeClass("active");

				$(".menu_btn2").eq(1).addClass("active");


			});

			$(window).load(function(){
				addLoad();
			});

			$(window).scroll(windowScroll);
			$(window).resize(winodwResize);

			function windowScroll()
			{
				if(on_load)
				{
					var toppx = $(this).scrollTop();
					

					
					if (toppx >= 1)
					{
						$("body").addClass("scroll");
					}else{
						$("body").removeClass("scroll");
					}

					//맨 아래 스크롤 확인
					if( (win_height + toppx ) >= ( $("body").height() - 100 ) )
					{
						if( $("body").hasClass('scroll_bottom') )
						{
							
						}else{
							$("body").addClass("scroll_bottom");
						}
					}else{
						if( $("body").hasClass('scroll_bottom') )
						{
							$("body").removeClass("scroll_bottom");
						}else{
							
						}
					}
					
				}


							
			}


			var win_height = $(window).height();
			var win_width = $(window).width();
			function winodwResize()
			{
				win_height = $(window).height();
				win_width = $(window).width();
			}

			
			var on_load = false;
			var addLoad = function () {
				/*
				//로딩시 로드클래스 추가
				setTimeout(function(){
					$("body").addClass('on_load');
					$(document).unbind('touchmove');
					on_load = true;

					setTimeout(function(){
						$(".detect-inview").addClass("visible");
						$(".detect-right").addClass("visible");
					},800);

				},500);
				*/

				

				//로딩시 스크롤 맨위로 이동
				//$('html, body').animate({scrollTop: 0 }, 10);				


				//stroke-dashoffset
				//ani_dashoffset();
			}

			function ani_dashoffset(){
				if ( isEdge )
				{
					setTimeout(function(){
						$(".ll").css({'stroke-dashoffset': 0 });
					},1000);
				}

				if ( isIE )
				{
					$(".ll").show();			
					$(".ll").css({'stroke-dashoffset': 1000 });


					var offset_set;
					var count = 0;
					var timer;

					

					setTimeout(function(){
						
						//$(".ll").css({'opacity':'1'});

						timer = setInterval(function()
						{
							//console.log(count);
							offset_set = 1000 - count;
							$(".ll").css({'stroke-dashoffset': offset_set });
							count+=10;

							if(offset_set <= 0)
							{
								clearInterval(timer);
							}

						}, 25);

					},1500);

					

					setTimeout(function(){
						
						
						console.log(count);

					},5000);
				}
			}

		</script>

	</head>
	<body class="bd">


		
		

		<div class="all_wrap">
			<?
				include "../menu.php";
			?>

			<?
				//include "loading_progress.php";
			?>

			<div class="scroll_down">
				<span class="hello-scrolldown">
					<i class="arrow">
						<svg xmlns="http://www.w3.org/2000/svg" width="12" height="18" viewBox="0 0 17 10"><path class="cls-1" d="M6.22,8.75,3.37,5.89H17V4.12H3.37L6.22,1.25,5,0,0,5l5,5Z"></path></svg>
					</i>
					<span class="txt">Scroll</span>

				</span>
			</div>



			<div class="fixed"></div><!-- fixed -->

			<div class="btn_top" onclick="scroll_move(0);">TOP</div><!-- btn_top -->

			


			

			<div class="step step_1">
				<div class="padding">

					<ul class="center_ul">

						<li>
							<div class="sub_title">
								<div class="sub_title_logo detect">
									<div class="">
										<img src="images/logo_spi_white.svg" height="16px">
									</div>
								</div>

								<div class="detect"><div class=""><h1 onclick="location.href='<?=$url_abs?>board/';" style="cursor:pointer;">BOARD-<br>VIEW.</h1></div></div>
							</div>

							

						</li>

						<li>
							<div class="board_view" style="transition-delay:500ms;">
								<table>
									
									<tbody>

										<?php
											//$count = 1;
											foreach($boardList as $board) {
											
										?>										
										<tr>
											<td class="v_title" style="    padding-bottom: 10px;"><?=$board['title']?></td>
										</tr>
										<tr>
											<td class="v_info" style="padding-top:0px; padding-bottom:20px;"><span class="v_date"><?=$board['date_']?></span><span class="v_view"><?=$board['view']?></span><span class="v_name"><?=$board['name']?></span></td>
										</tr>
										<tr>
											<td class="v_body"><?=$board['body']?></td>
										</tr>
										<?php
											}
										?>
									</tbody>
								</table>
							</div>
						</li>

						<li class="btn_li">
							<div class="btn_div">
								<h1 class="btn_back" onclick="history.go(-1);">BACK</h1>
							</div>
						</li>

					</ul>
				</div>
					
				
			</div><!-- step_1 -->


			<div class="step step_6 footer">
				<div class="padding" style="padding-top:0px;">
					<div class="content_center" style="display:table; position: relative;">
						<div class="footer_left">
							<img src="images/logo_2_512.png" width="66px"><br>
							<span>Optimized for Chrome and more than IE 11<br>
							Copyright © 2016 SPI All rights reserved.
							</span>
						</div>

						<div class="footer_right">
							<ul>
							
								<a href="https://www.facebook.com/sharer/sharer.php?u=http://samplusil.com" target="_blank"><li><div class="icon_fb"></div></li></a>

								<li id="katok_js" onclick="alert('준비중 입니다.');"><div class="icon_katok"></div></li>					
								

								<li onclick="alert('준비중 입니다.');"><div class="icon_band"></div></li>
								
							</ul>
						</div>
					</div>
				</div>
			</div><!-- step_6 -->



		</div><!-- all_wrap -->








	</body>
</html>
		