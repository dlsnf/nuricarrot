<script>



			//main_title
			var main_title = function(elements_1, elements_2, toppx){
				var el_1 = $("."+elements_1); //step_1
				var el_2 = $("."+elements_2); //main_title
			
				var start_point = el_1.height() - win_height;
				var end_point = el_1.height();

				var bak_per_val = ( end_point - start_point ) /100;
				var toppx_start = toppx - start_point;
				var toppx_end = end_point - start_point;

				var bak_per =  ( toppx_start / bak_per_val ) / 2 ; // 0%~50%
				
				if(bak_per < 0)
				{
					//console.log("0");

					el_2.css({'transform': 'translate(0%, 0%)','-webkit-transform': 'translate(0%, 0%)'});

				}else if(bak_per > 50)
				{
					//console.log("50");

					el_2.css({'transform': 'translate(0%, -50%)','-webkit-transform': 'translate(0%, -50%)'});
					el_2.css({'display':'none'});
				}else if(bak_per >= 0)
				{
					//console.log("0-100");
					el_2.css({'display':'inherit'});
					el_2.css({'transform': 'translate(0%, -'+bak_per+'%)','-webkit-transform': 'translate(0%,  -'+bak_per+'%)'});

				}

				

				

			}

			//스크롤할때 이미지 따라다니기
			var scrollImage = function (elements, toppx) {



				elements.each(function () {
					
					
					var el = $(this);
					var el_height = el.height();

					var elOffset = el.offset().top + 0;
					var el_view = $(window).scrollTop() - elOffset; //0부터 높이까지
					var el_view_2  = (el_view / el_height) * 50;		

					

					if(el_view >= 0 && el_view <= el_height)
					{
											
						//console.log(el_view);
						el.css({'transform': 'translate(0%, '+el_view_2+'%) translate3d(0px, 0px, 0px)'});
						el.css({'-webkit-transform': 'translate(0%, '+el_view_2+'%) translate3d(0px, 0px, 0px)'});
					}else if (el_view > el_height){
						el.css({'transform': 'translate(0%, '+50+'%) matrix(1, 0, 0, 1, 0, 0)'});
						el.css({'-webkit-transform': 'translate(0%, '+50+'%) matrix(1, 0, 0, 1, 0, 0)'});
					}else if (el_view <= 0){
						el.css({'transform': 'translate(0%, '+0+'%) matrix(1, 0, 0, 1, 0, 0)'});
						el.css({'-webkit-transform': 'translate(0%, '+0+'%) matrix(1, 0, 0, 1, 0, 0)'});
					}
					
					
				});
			}

			//스크롤할때 이미지 따라다니기 up
			var scrollImage_up_img = function (elements, toppx) {



				elements.each(function () {
					
					var el = $(this);
					var el_height = el.height();

					var elOffset = el.offset().top + 0;
					var el_view = $(window).scrollTop() - elOffset + win_height; //0 부터 높이까지
					var el_view_2  = -(el_view / (win_height + el_height)) * 60;	

					//console.log(el_view_2);

					
					
					var el_view_start = $(window).scrollTop() - elOffset + win_height;
					var el_view_finish = $(window).scrollTop()- el_height;


					if (el_view_start >= 0 && elOffset > el_view_finish)
					{
						//console.log("on");
						el.css({'transform': 'translate(0%, '+el_view_2+'%) translate3d(0px, 0px, 0px)'});
						el.css({'-webkit-transform': 'translate(0%, '+el_view_2+'%) translate3d(0px, 0px, 0px)'});
					}else if(elOffset < el_view_finish){
						//console.log("down");
						el.css({'transform': 'translate(0%, -'+60+'%) matrix(1, 0, 0, 1, 0, 0)'});
						el.css({'-webkit-transform': 'translate(0%, -'+60+'%) matrix(1, 0, 0, 1, 0, 0)'});
					}else if(el_view_start <= 0){
						//console.log("up");
						el.css({'transform': 'translate(0%, '+0+'%) matrix(1, 0, 0, 1, 0, 0)'});
						el.css({'-webkit-transform': 'translate(0%, '+0+'%) matrix(1, 0, 0, 1, 0, 0)'});
					}

					
				});
			}

			//스크롤할때 글짜 따라다니기 up
			var scrollImage_up = function (elements, toppx) {



				elements.each(function () {
					
					var el = $(this);
					var el_height = el.height();

					var elOffset = el.offset().top + 0;
					var el_view = $(window).scrollTop() - elOffset + win_height; //0 부터 높이까지
					var el_view_2  = -(el_view / (win_height + el_height)) * 50;	

					//console.log(el_view_2);

					
					
					var el_view_start = $(window).scrollTop() - elOffset + win_height;
					var el_view_finish = $(window).scrollTop()- el_height;


					if (el_view_start >= 0 && elOffset > el_view_finish)
					{
						//console.log("on");
						el.css({'transform': 'translate(0%, '+el_view_2+'%) translate3d(0px, 0px, 0px)'});
						el.css({'-webkit-transform': 'translate(0%, '+el_view_2+'%) translate3d(0px, 0px, 0px)'});
					}else if(elOffset < el_view_finish){
						//console.log("down");
						el.css({'transform': 'translate(0%, -'+50+'%) matrix(1, 0, 0, 1, 0, 0)'});
						el.css({'-webkit-transform': 'translate(0%, -'+50+'%) matrix(1, 0, 0, 1, 0, 0)'});
					}else if(el_view_start <= 0){
						//console.log("up");
						el.css({'transform': 'translate(0%, '+0+'%) matrix(1, 0, 0, 1, 0, 0)'});
						el.css({'-webkit-transform': 'translate(0%, '+0+'%) matrix(1, 0, 0, 1, 0, 0)'});
					}

					
				});
			}


			//스크롤할때 나오는방법
			var scrollVisible = function (elements, toppx, bottom) {

				var toppxWh = toppx + win_height - bottom;
				var count = 0;

				elements.each(function () {
					
					var el = $(this);
					
					//이미 활성화 된것들은 무시
					if( el.hasClass('visible') )
					{
						
					}else{
						count += 50;
						var elOffset = el.offset().top;				
						if (elOffset < toppxWh) {
							setTimeout(function () {
								el.addClass('visible');
							}, count);
						}						

					}
					
				});
			}

			//스크롤할때 오른쪽으로 나오는방법
			var scrollVisible_right = function (elements, toppx, bottom) {

				var toppxWh = toppx + win_height - bottom;
				var count = 0;

				

				elements.each(function () {
					
					var el = $(this);
					
					//이미 활성화 된것들은 무시
					if( el.hasClass('visible') )
					{
						
					}else{
						count += 50;
						var elOffset = el.offset().top;				
						if (elOffset < toppxWh) {
							setTimeout(function () {
								el.addClass('visible');
							}, count);
						}						

					}

					
				});
			}

			//스크롤할때 왼쪽으로 나오는방법
			var scrollVisible_left = function (elements, toppx, bottom) {

				var toppxWh = toppx + win_height - bottom;
				var count = 0;

				elements.each(function () {
					
					var el = $(this);
					
					//이미 활성화 된것들은 무시
					if( el.hasClass('visible') )
					{
						
					}else{
						count += 50;
						var elOffset = el.offset().top;				
						if (elOffset < toppxWh) {
							setTimeout(function () {
								el.addClass('visible');
							}, count);
						}						

					}
					
				});
			}





			//스크롤할때 나오는방법
			var scrollHello = function (elements, toppx) {


				

				elements.each(function () {
					
					var el = $(this);
					
					if(toppx > 0)
					{
						//console.log("on");
						$("body").removeClass('down_hello');
						$("body").addClass('up_hello');
					}else{
						//console.log("off");
						$("body").addClass('down_hello');
						$("body").removeClass('up_hello');
					}						

				});
				
			}

			//화면 이동
			function scroll_move(px, speed){
				var toppx = px;
				if(!speed){
					$('html, body').animate({scrollTop: toppx-53 }, 1000, 'easeInOutExpo');
				}else{
					$('html, body').animate({scrollTop: toppx-53 }, speed, 'easeInOutExpo');
				}
				
			}

		</script>