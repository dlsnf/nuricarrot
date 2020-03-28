<?php
	include "common.php";
	//include "../admin/dbcon.php";




?>
<!DOCTYPE html>
	<head>
		<title>누리캐롯-아트워크</title>

		<?
			include "head_common.php";

			include "jquery.php";
		?>

		<script>


			$(window).ready(function(){
				
				//touch disabled
				/*
				$(document).bind('touchmove', function(e) {
					e.preventDefault();
				});
				*/

				$("body").addClass('on_load');
				//$(document).unbind('touchmove');
				on_load = true;


				$(".active").removeClass("active");

				$(".menu_btn2").eq(1).addClass("active");
				$(".block h1").eq(1).css({"opacity":"1.0","pointer-events": "initial"});


				$(".top").append("<span class='artwork_title' onclick='location.href=\"\";'>ART WORK</span>");





			});

			$(window).load(function(){
				gridlist();


				$(".artwork_title").css({'opacity':'1'});
			});


			function gridlist(){
				var $grid = $('.portfolio-list').isotope({
						itemSelector: '.isotope-item',
						layoutMode: 'masonry',
						filter: '*',
						hiddenStyle: {
							opacity: 0
						},
						visibleStyle: {
							opacity: 1
						},
						stagger: 30, //움직이는 속도
						isOriginLeft: ($('html').attr('dir') == 'rtl' ? false : true)
					});
				// bind filter button click
				$('.filter-button-group').on( 'click', 'button', function() {
				  var filterValue = $( this ).attr('data-filter');
				  $grid.isotope({ filter: filterValue });
				});

				setTimeout(function() {
						$grid.isotope('layout');
					}, 500);

				$(window).on('resize', function() {
					setTimeout(function() {
						$grid.isotope('layout');
					}, 500);
				});
			}

			$(window).scroll(windowScroll);
			$(window).resize(winodwResize);


			var load_img = false;
			function windowScroll()
			{
				if(on_load)
				{
					var toppx = $(this).scrollTop();
					
					if( !load_img )
					{
						if (toppx >= 100)
						{
							//alert("DD");

							if(!$("body").hasClass("img_load"))
							{
								$("body").addClass("img_load");
								load_img = true;
								var temp ="";

								for(var i = 20; i >= 1; i--)
								{
									var num = i;
									if(i < 10)
									{
										var temp2 = "<li class='isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival'><div class='image-gallery-item'><img src='images/nuri/image_0" + num + ".png' width='100%' class='img-responsive'></div></li>";
										temp = temp + temp2;
									}else{
										var temp2 = "<li class='isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival'><div class='image-gallery-item'><img src='images/nuri/image_" + num + ".png' width='100%' class='img-responsive'></div></li>";
										temp = temp + temp2;
									}
									
									
								}
								console.log(temp);

								// alert(temp);
								//$(".portfolio-list").append(temp);


								//모든 이미지 로딩 완료 후 호출되는 메소드
								// $( 'img' ).imagesLoaded( function() {
								// 	console.log("img_loaddddd");
								// 	setTimeout(function() {
								// 		console.log("ZZZ");
								// 		gridlist();
								// 	}, 3000);
								// });
							}
						}
					}
					
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

			<div class="scroll_down" style="display:none;">
				<span class="hello-scrolldown">
					<i class="arrow">
						<svg xmlns="http://www.w3.org/2000/svg" width="12" height="18" viewBox="0 0 17 10"><path class="cls-1" d="M6.22,8.75,3.37,5.89H17V4.12H3.37L6.22,1.25,5,0,0,5l5,5Z"></path></svg>
					</i>
					<span class="txt">Scroll</span>

				</span>
			</div>



			<div class="fixed"></div><!-- fixed -->

			<div class="btn_top" onclick="scroll_move(0);">TOP</div><!-- btn_top -->

			

			<div class="content">

				

				<div class="step step_1">
					<div class="padding">

						<ul class="portfolio-list" data-sort-id="portfolio" data-filter="*" style="margin-bottom:0px; pointer-events: none;">

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_75.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_74.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_73.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_72.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_71.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_70.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_69.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_68.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_67.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_66.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>


							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_65.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_64.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_63.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_62.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_61.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_60.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_59.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_58.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_57.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_56.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_55.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_54.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_53.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_52.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_51.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_50.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>

							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_49.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_48.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_47.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>                     
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_46.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_45.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_44.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_43.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_42.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_41.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_40.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_39.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_38.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_37.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_36.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_35.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_34.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_33.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_32.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_31.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_30.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_29.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_28.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_28_.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_27.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_26.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_25.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_24.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_23.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_22.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_21.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_20.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_19.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_18.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_17.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_16.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_15.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_14.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_13.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_12.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_11.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_10.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_09.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_08.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_07.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_06.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_05.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_04.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_03.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_02.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							<li class="isotope-item col-xs-12 col-sm-6 col-md-4 col-lg-3 festival">
								<div class="image-gallery-item">
										<img src="images/nuri/image_01.png" width="100%" class="img-responsive" alt="">
								</div>
							</li>
							

						</ul>


					</div>
						
					
				</div><!-- step_1 -->

<div class="step step_6 footer">
	<div class="padding" style="padding-top:0px;">
		<div class="content_center" style="display:table; position: relative;">
			<div class="footer_left">
				<img src="../images/logo_2_512.png" width="66px"><br>
				<span>Optimized for Chrome and more than IE 11<br>
				Copyright © 2019 NuriCarrot All rights reserved.
				</span>
			</div>

			<div class="footer_right">
				<ul>
					<a href="https://www.facebook.com/dlsnf/" target="_blank">
						<li class="icon_instar_li icon_fb"></li>
					</a>
					
					<a href="https://www.instagram.com/dlsnf/" target="_blank">
						<li class="icon_instar_li icon_instar"></li>
					</a>

					<a href="https://blog.naver.com/dlsnf" target="_blank">
						<li class="icon_naver_blog_li icon_naver_blog" style="margin-left: 0px;">
						</li>
					</a>

					<!-- <li id="katok_js" onclick="alert('준비중 입니다.');"><div class="icon_katok"></div></li>	 -->				
					

					<!-- <li onclick="alert('준비중 입니다.');"><div class="icon_band"></div></li> -->		
					
				</ul>
			</div>
		</div>
	</div>
</div><!-- step_6 -->


			</div><!-- content -->

		</div><!-- all_wrap -->








	</body>
</html>
		