<?php
	include "common.php";
?>
<!DOCTYPE html>
	<head>
		<title>누리캐롯</title>

		<?
			include "head_common.php";

			include "jquery.php";
		?>

		<script>

		
			var on_load = false;

			// Internet Explorer 6-11
			var isIE = /*@cc_on!@*/false || !!document.documentMode;
			// Edge 20+
			var isEdge = !isIE && !!window.StyleMedia;

			$(window).ready(function(){

				
				//touch disabled
				$(document).bind('touchmove', function(e) {
					e.preventDefault();
				});

				
				if ( isIE || isEdge )
				{
					$(".ll").css({'stroke-dashoffset': 1000 });
				}

				if ( isIE )
				{
					//$(".ll").css({'opacity':'0'});
					$(".ll").hide();
				}

	
				//반복문 //모바일에서 로딩 안되는 버그 에러 방지
				playAlert = setInterval(function() {
					var loading_persent = $(".loding_progress").attr('data-progress-text');
					var loading_count = loading_persent.split("%");
				   if (  loading_count[0] >= 90 )
				   {
					   clearInterval(playAlert);
					   if (!$("body").hasClass("pace-done"))
						{

							if (!$("body").hasClass("pace-done"))
							{
								$(".loding_progress").attr('data-progress-text', "100%");
								$("body").addClass("pace-done");
							}
							//로딩시 로드클래스 추가
							setTimeout(function(){
								if (!$("body").hasClass("on_load"))
								{
									$("body").addClass("on_load");
								}
								$(document).unbind('touchmove');
								on_load = true;

								ani_dashoffset();


							},100);		
						}
				   }
				   
				}, 500);

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


					
					scrollImage($("body").find('.detect-inscroll'),toppx);
					scrollImage_up_img($("body").find('.detect-inscroll-up-img'),toppx);
					
					scrollHello($("body").find('.hello'),toppx);

					
					
					

					//main_title
					if( win_width >= 780 )
					{
						main_title("step_1", "main_title_box", toppx);
						
						scrollVisible($("body").find('.detect-inview'),toppx,60);
						scrollVisible_right($("body").find('.detect-right'),toppx,60);
						scrollVisible_left($("body").find('.detect-left'),toppx,60);


						scrollImage_up($("body").find('.detect-inscroll-up'),toppx);

						scrollVisible($("body").find('.detect-ani-box'),toppx,120);

					}else{
						scrollVisible($("body").find('.detect-inview'),toppx);

						scrollVisible($("body").find('.detect-inview'),toppx,10);
						scrollVisible_right($("body").find('.detect-right'),toppx,10);
						scrollVisible_left($("body").find('.detect-left'),toppx,10);

						scrollVisible($("body").find('.detect-ani-box'),toppx,70);
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

			function addLoad(){

				//로딩시 로드클래스 추가
				setTimeout(function(){

					if ($("body").hasClass("pace-done"))
					{
						if (!$("body").hasClass("on_load"))
						{
							$("body").addClass("on_load");
						}
						$(document).unbind('touchmove');
						on_load = true;
					}
				},500);



				//로딩시 스크롤 맨위로 이동
				$('html, body').animate({scrollTop: 0 }, 10);				


				//stroke-dashoffset
				
				setTimeout(function(){
					//ani_dashoffset();
				},3000);


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
				include "menu.php";
			?>

			<?
				include "loading_progress.php";
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

			<div class="hello_text">
				<span class="hello">
					<svg class="hello_svg" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 700 460">
							<g class="an">
								<circle class="circle ll" cx="70" cy="70" r="40"></circle>
								<line class="line ll" x1="154" y1="6" x2="154" y2="156"></line>
								<line class="line ll" x1="164" y1="66" x2="204" y2="66" style="animation-duration: 1s;"></line>

								<line class="line ll" x1="50.4" y1="146" x2="50.4" y2="210" style="animation-duration: 1s;"></line>
								<line class="line ll" x1="37" y1="200" x2="172" y2="200"></line>
							</g>

							<g class="nyung">
								<line class="line ll" x1="240" y1="14" x2="240" y2="119.5" style="animation-duration: 1s;"></line>
								<line class="line ll" x1="227" y1="106" x2="330" y2="106"></line>

								
								<line class="line ll ss" x1="306" y1="34" x2="350" y2="34" style="animation-duration: 1s;"></line>
								<line class="line ll ss" x1="306" y1="68" x2="350" y2="68" style="animation-duration: 2s;"></line>

								<line class="line ll" x1="360" y1="6" x2="360" y2="134"></line>
								<ellipse class="circle ll" cx="308" cy="178" rx="52" ry="30" style=""></ellipse>

							</g>

							<g class="ha">
								<line class="line ll ss" x1="30" y1="270" x2="106" y2="270"></line>
								<line class="line ll ss" x1="10" y1="302" x2="126" y2="302"></line>

								<line class="line ll" x1="154" y1="250" x2="154" y2="454"></line>
								<line class="line ll" x1="164" y1="338" x2="204" y2="338" style="animation-duration: 1s;"></line>
								<circle class="circle ll" cx="70" cy="370" r="36"></circle>
							</g>

							<g class="sae">
								<line class="line ll" x1="270" y1="266" x2="226" y2="410"></line>
								<line class="line ll" x1="250" y1="330" x2="282" y2="408"></line>

								<line class="line ll" x1="280" y1="328" x2="316" y2="328" style="animation-duration: 1s;"></line>
								<line class="line ll" x1="322" y1="254" x2="322" y2="448" style="animation-duration: 1.4s;"></line>
								<line class="line ll" x1="362" y1="250" x2="362" y2="454" style="animation-duration: 1.8s;"></line>
							</g>

							<g class="yo">
								<ellipse class="circle ll" cx="494" cy="320" rx="56" ry="40" style=""></ellipse>
								<line class="line ll" x1="454" y1="380" x2="454" y2="420" style="animation-duration: 1.8s;"></line>
								<line class="line ll" x1="530" y1="380" x2="530" y2="420" style="animation-duration: 1.6s;"></line>
								<line class="line ll" x1="404" y1="430" x2="580" y2="430"></line>
							</g>

							<g class="jum">
								<circle class="dot" cx="650" cy="420" r="36"></circle>
							</g>

						</svg>
				</span>
			</div>
				
			<div class="white_board"></div>

			<div class="content">

				

				<div class="step step_1">
						
						<div class="main_title_box">
							<div class="main_title">
								<div class="detect_title main_title_since_div">
									<div class="main_title_since detect-inview-2 detect-inview" style="transition-delay: 400ms;"><img src="images/logo_NuriCarrot_NR_short_200.png" height="10px"><span>&nbsp;Since 2019</span></div>
								</div>
								<div class="detect_title">
									<div class="main_title_bold detect-inview-2 detect-inview" style="transition-delay: 450ms; display:none;">Nuricarrot is all-rounder company</div>
								</div>
								<div class="detect_title">
									<div class="main_title_white detect-inview-2 detect-inview" style="transition-delay: 450ms;">The carrot is here,</div>
								</div>
								<div class="detect_title">
									<div class="main_title_white detect-inview-2 detect-inview" style="transition-delay: 500ms;">so the rabbit will come here.</div>
								</div>

							</div>
						</div>
						
					
				</div><!-- title -->


				<div class="step step_2">
					<div class="detect">
						<div class="inscroll_1 detect-inscroll step_2_back_img"></div>
					</div>
				</div>
				

				<div class="step step_3">
				
					<div class="padding">

						<ul class="right_ul">

							<li>
								<div class="sub_title">
									<div class="sub_title_logo detect">
										<div class="detect-inview">
											<img src="images/logo_2_512_short_orange_200.png" height="10px">
										</div>
									</div>

									<div class="detect"><div class="detect-right"><h1>EXPER</h1></div></div>
									<div class="detect"><div class="detect-right"><h1>TISE.</h1></div></div>
								</div>

								<div class="title_bottom">
									<div class="t_top">
										<div class="detect"><p class="detect-inview">About</p></div>
										<div class="detect"><p class="detect-inview">our professional</p></div>
										<div class="detect"><p class="detect-inview">technology<span style="color:#ff5b45;">.</span></p></div>
									</div>
									<div class="t_middle detect">
										<p class="detect-inview">NuriCarrot has a wide range of specialized supplies for business, and is a company with experts in various fields such as planners, developers, designers, and marketing.<br>We practice the highest level of satisfaction with quality and precise work processes.</p>
									</div>
									<div class="t_bottom detect">
										<div class="btn_t_bottom detect-inview" style="transition-delay: 200ms;" onclick="alert('준비 중 입니다.');">Our values</div>
									</div>
								</div>

							</li>

							<li>
								<div class="detect2">
									<div class="step_3_content detect-inscroll-up">
										<div class="detect">
											<div class="expertise detect-left">
												<div class="expertise_body">
													<div class="step_3_content_ul">
														<div class="step_3_content_li">
															<img src="images/logo_2_512_short_gray_200.png" height="8px">
															<div class="expertise_title">Photography</div>
															<div class="expertise_skill" style="margin-top:30px;">Product Photos</div>
															<div class="expertise_skill">Event photos</div>
															<div class="expertise_skill">Performance Photos</div>
															<div class="expertise_skill">Sketch video</div>
														</div>

														<div class="step_3_content_li"><img src="images/logo_2_512_short_gray_200.png" height="8px">
															<div class="expertise_title">Social Media</div>
															<div class="expertise_skill" style="margin-top:30px;">Social Media Strategy
															</div>
															<div class="expertise_skill">Community Management
															</div>
															<div class="expertise_skill">Bloggers & influencers
															</div>
															<div class="expertise_skill">Reporting, live events
															</div>
														</div>


														<div class="step_3_content_li" style="margin-top:20px;"><img src="images/logo_2_512_short_gray_200.png" height="8px">
															<div class="expertise_title">Design</div>
															<div class="expertise_skill" style="margin-top:30px;">Web design
															</div>
															<div class="expertise_skill">Art direction
															</div>
															<div class="expertise_skill">Logo & branding
															</div>
															<div class="expertise_skill">UI & UX
															</div>
														</div>



														<div class="step_3_content_li" style="margin-top:20px;"><img src="images/logo_2_512_short_gray_200.png" height="8px">
															<div class="expertise_title">Web Development</div>
															<div class="expertise_skill" style="margin-top:30px;">Front end</div>
															<div class="expertise_skill">Back end</div>
															<div class="expertise_skill">Interaction design</div>
															<div class="expertise_skill">Server management</div>
														</div>

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>

						</ul>

					</div>

				</div>

				<div class="step step_4">

					<div class="padding">

						<ul>
							<li>

								<div class="sub_title">
									<div class="sub_title_logo detect">
										<div class="detect-inview">
											<img src="images/logo_2_512_short_blue_200.png" height="16px">
										</div>
									</div>

									<div class="detect">
										<div class="detect-right"><h1>DIREC</h1></div>
									</div>
									<div class="detect">
										<div class="detect-right"><h1>TION.</h1></div>
									</div>
								</div>

								<div class="title_bottom">
									<div class="t_top">
										<div class="detect"><p class="detect-inview">We have</p></div>
										<div class="detect"><p class="detect-inview">endless adventure<span style="color:#48ABCC;">.</span></p></div>
									</div>
									<div class="t_middle detect">
										<p class="detect-inview">We will always try new things and study good technology development. And our challenge for top quality will continue.<br>We are not merely a factory product, One by one, we are aiming to produce artistic products.</p>
									</div>
									<div class="t_bottom detect">
										<div class="btn_t_bottom detect-inview" style="transition-delay: 200ms;" onclick="location.href='<?=$url_abs?>/artwork';">Art Work</div>
									</div>
								</div>

							</li>
							<li>
									<div class="sub_title" style="opacity:0;">
										<div class="sub_title_logo detect">
											<div class="detect-inview">
												<img src="images/logo_spi_pink.svg" height="16px">
											</div>
										</div>
									</div>
								
									<div class="up_img">
										<div class="detect">
											<div class="nuri_img detect2 detect-right">
												<div class="detect-inscroll-up-img dotori" style="background-image:url('images/4R9A5558_1.png');"></div>
											</div>
										</div>

										<div class="img_info">
											<div class="detect"><h1 class="detect-inview">Acorn tall measurement</h1></div>
											<div class="detect"><h2 class="detect-inview">2018 @ nuri</h2></div>
										</div>
									</div>
								
							</li>
						</ul>
						
					</div>

				</div><!-- step_4 -->



				<div class="step step_5">

					<div class="padding">

						<ul class="center_ul">

							<li>
								<div class="sub_title">
									<div class="sub_title_logo detect">
										<div class="detect-inview">
											<img src="images/logo_2_512_short_green_200.png" height="16px">
										</div>
									</div>

									<div class="detect"><div class="detect-right"><h1 style="color:#5ac6a6;">CON</h1></div></div>
									<div class="detect"><div class="detect-right"><h1 style="color:#5ac6a6;">TACT.</h1></div></div>
								</div>

								<div class="title_bottom">
									<div class="t_top">
										<div class="detect"><p class="detect-inview">You can be</p></div>
										<div class="detect"><p class="detect-inview">our best partner<span>.</span></p></div>
									</div>
									<div class="t_middle detect">
										<p class="detect-inview" style="line-height: 1.5em;">A. Anyang-si, Gyeonggi-do, Republic of Korea<br><a href="tel:010-9308-0936" style="color: #606060 !important;">T. 010.9308.0936</a></p>
									</div>
									<div class="t_bottom detect">
										<div class="btn_t_bottom detect-inview" style="transition-delay: 200ms;"><a href="tel:010-9308-0936">Contact us</a></div>
									</div>
								</div>

							</li>

							<li>

								<div class="ani_box detect-ani-box">

									<div class="animation-container">

										
										<!-- 아웃라인 그룹 -->
										<div class="outline-wrapper">
											<div class="outline outline-x outline-top"></div>
											<div class="outline outline-x outline-bottom"></div>
											<div class="outline outline-y outline-left"></div>
											<div class="outline outline-y outline-right"></div>

											

										</div>


									</div>

									<!--

									<div class="animation-container-2">
										<div class="main_text">
											<h1 class="top_center">DOO HEE</h1>
											<h1 class="center_center">MYAONG</h1>
											<h1 class="bottom_center">NYANG CAT</h1>
										</div>

									</div>

									-->

									<div class="animation-container-3 map11">
										<div class="main_img">
													
												<div id="map">
													
												 
												<!-- 지도타입 컨트롤 div 입니다 -->
												<div class="custom_typecontrol radius_border">
													<span id="btnRoadmap" class="selected_btn" onclick="setMapType('roadmap')">지도</span>
													<span id="btnSkyview" class="btn" onclick="setMapType('skyview')">스카이뷰</span>
												</div>
												<!-- 지도 확대, 축소 컨트롤 div 입니다 -->
												<div class="custom_zoomcontrol radius_border"> 
													<span onclick="zoomIn()"><img src="http://t1.daumcdn.net/localimg/localimages/07/mapapidoc/ico_plus.png" alt="확대"></span>  
													<span onclick="zoomOut()"><img src="http://t1.daumcdn.net/localimg/localimages/07/mapapidoc/ico_minus.png" alt="축소"></span>
												</div>
											</div>	

											<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=e45f7ee5dc6f4c8d8e9ee8b191b7953d"></script>

											 <style>

											.map_wrap {position:relative;overflow:hidden;width:100%;height:350px;}
											.radius_border{border:1px solid #919191;border-radius:5px;}     
											.custom_typecontrol {position:absolute;top:10px;right:10px;overflow:hidden;width:130px;height:30px;margin:0;padding:0;z-index:2;font-size:12px;font-family:'Malgun Gothic', '맑은 고딕', sans-serif;}
											.custom_typecontrol span {display:block;width:65px;height:30px;float:left;text-align:center;line-height:30px;cursor:pointer;}
											.custom_typecontrol .btn {background:#fff;background:linear-gradient(#fff,  #e6e6e6);}       
											.custom_typecontrol .btn:hover {background:#f5f5f5;background:linear-gradient(#f5f5f5,#e3e3e3);}
											.custom_typecontrol .btn:active {background:#e6e6e6;background:linear-gradient(#e6e6e6, #fff);}    
											.custom_typecontrol .selected_btn {color:#fff;background:#425470;background:linear-gradient(#425470, #5b6d8a);}
											.custom_typecontrol .selected_btn:hover {color:#fff;}   
											.custom_zoomcontrol {position:absolute;top:50px;right:10px;width:36px;height:80px;overflow:hidden;z-index:2;background-color:#f5f5f5;} 
											.custom_zoomcontrol span {display:block;width:36px;height:40px;text-align:center;cursor:pointer;}     
											.custom_zoomcontrol span img {width:15px;height:15px;padding:12px 0;border:none;}             
											.custom_zoomcontrol span:first-child{border-bottom:1px solid #bfbfbf;}       
											
											.marker_info{
												width:150px;
												box-sizing:border-box;
												padding:5px;
												font-family: "Nanum Gothic", sans-serif;
    											font-weight: 800;
												font-size:13px;
												font-weight:bold;
												color:#1d1d1d;
												text-align: center;
											}
											
											</style>

											<script>
												var latitude = 37.406142;
												var longitude = 126.958087;


												
												

													var container = document.getElementById('map');
													var options = {
														center: new daum.maps.LatLng(latitude, longitude),
														level: 10
													};

													var map = new daum.maps.Map(container, options);

													// 마커가 표시될 위치입니다 
													var markerPosition  = new daum.maps.LatLng(latitude, longitude); 

													// 마커를 생성합니다
													var marker = new daum.maps.Marker({
														position: markerPosition
													});

													// 마커가 지도 위에 표시되도록 설정합니다
													marker.setMap(map);

													var iwContent = '<div class="marker_info">NuriCarrot</div>', // 인포윈도우에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다
														iwPosition = new daum.maps.LatLng(latitude, longitude); //인포윈도우 표시 위치입니다

													// 인포윈도우를 생성합니다
													var infowindow = new daum.maps.InfoWindow({
														position : iwPosition, 
														content : iwContent
													});
													  
													// 마커 위에 인포윈도우를 표시합니다. 두번째 파라미터인 marker를 넣어주지 않으면 지도 위에 표시됩니다
													infowindow.open(map, marker);

													if($("html").hasClass("no-touch"))
													{
														setDraggable(true);
													}else{
														setDraggable(false);
													}

												


													// 버튼 클릭에 따라 지도 이동 기능을 막거나 풀고 싶은 경우에는 map.setDraggable 함수를 사용합니다
													function setDraggable(draggable) {
														// 마우스 드래그로 지도 이동 가능여부를 설정합니다
														map.setDraggable(draggable);    
													}
													
													

													// 지도타입 컨트롤의 지도 또는 스카이뷰 버튼을 클릭하면 호출되어 지도타입을 바꾸는 함수입니다
													function setMapType(maptype) { 
														var roadmapControl = document.getElementById('btnRoadmap');
														var skyviewControl = document.getElementById('btnSkyview'); 
														if (maptype === 'roadmap') {
															map.setMapTypeId(daum.maps.MapTypeId.ROADMAP);    
															roadmapControl.className = 'selected_btn';
															skyviewControl.className = 'btn';
														} else {
															map.setMapTypeId(daum.maps.MapTypeId.HYBRID);    
															skyviewControl.className = 'selected_btn';
															roadmapControl.className = 'btn';
														}
													}

													// 지도 확대, 축소 컨트롤에서 확대 버튼을 누르면 호출되어 지도를 확대하는 함수입니다
													function zoomIn() {
														map.setLevel(map.getLevel() - 1);
													}

													// 지도 확대, 축소 컨트롤에서 축소 버튼을 누르면 호출되어 지도를 확대하는 함수입니다
													function zoomOut() {
														map.setLevel(map.getLevel() + 1);
													}

												

											</script>
										</div>

									</div>

								</div><!-- ani_box -->
								
							</li>

						</ul>
						
					</div>

				</div><!-- step_5 -->


				<?
					include "footer.php";
				?>


			</div><!-- content -->

		</div><!-- all_wrap -->








	</body>
</html>
		