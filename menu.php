
		<link rel="stylesheet" href="css/menu_style.css?<?=filemtime('css/menu_style.css')?>">
		
		<script>

			

			var menu_on = 1;
			

       		function menu_click()
       		{
       			if( menu_on == 1)
       			{
       				$("body").addClass("menu-open");
       				$(".status").text("상태 : ON");
       				menu_on = 2;

					//모바일에서 버그 방지
					$(".menu").css({'overflow-y':'auto'});
					$("body").css({'overflow-y':'hidden','overflow-x':'hidden'});
					setTimeout(function(){
						$("body").css({'overflow-y':'hidden','overflow-x':'hidden'});
						$(".menu").css({'overflow-y':'scroll'});
						menu_on = 2;
					},500);
					setTimeout(function(){
						$(".menu").css({'overflow-y':'auto'});
						//menu_on = 3;
					},600);
					
					
       			}else if(menu_on == 2){
       				$("body").removeClass("menu-open");
       				$(".status").text("상태 : OFF");
       				menu_on = 1;
					$("body").css({'overflow-y':'auto','overflow-x':'hidden'});
					//모바일에서 버그 방지
					setTimeout(function(){
						$(".menu").css({'overflow-y':'hidden'});
						menu_on = 1;
					},500);
       			}


       		}
		</script>

	<div class="top">
		<img src="images/logo_1.png" height="30px" onclick="location.href='<?=$url_abs?>';">
	</div>

	<div class="btn-menu" onclick="menu_click();">
	
			<div class="btn-menu_i">
			
				<div class="btn-menu_ii">
					<div class="btn-menu__line-1"></div>
					<div class="btn-menu__line-2"></div>
					<div class="btn-menu__line-3"></div>
				</div>
				
			</div>
			
		</div><!-- btn-menu -->

	
	
	<!-- <div class="status">상태 : OFF</div> -->

	<div class="white_menu"></div>
	<div class="menu">
			<div class="menu_content row">
				<div class="block" style="transition-delay: 400ms;"><h1 onclick="location.href='<?=$url_abs?>';"><span class="menu_btn2 active">HOME</span></h1></div>
				<div class="block" style="transition-delay: 450ms;"><h1  onclick="location.href='<?=$url_abs?>/artwork';" style=""><span class="menu_btn2">ART WORK</span></h1></div>
				<div class="block" style="transition-delay: 500ms;"><h1 style="pointer-events: none; opacity:0.5;"><span class="menu_btn2">BOARD</span></h1></div>
				<div class="block" style="transition-delay: 550ms;"><h1 style="pointer-events: none; opacity:0.5;" onclick="alert('준비중');"><span class="menu_btn2">PROJECT</span></h1></div>
				<div class="block" style="transition-delay: 600ms;"><h1 style="pointer-events: none; opacity:0.5;" onclick="alert('준비중');"><span class="menu_btn2">CONTACT</span></h1></div>
			</div>
	</div><!-- menu -->

