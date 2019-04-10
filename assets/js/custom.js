// luxy.init();

var windowHeight = $(window).height();
var numOfShow = $(".ss").length;
$(window).scroll(function(){
	let a = $(window).scrollTop();
	// console.log(a);
	// front banner
	if(a >= 0 && a < $(window).height() && $(window).width() > 1060){
		$(".front-banner").css("top","-"+(a*2)+"px");
	}else if($(window).width() < 1060){
		$(".front-mobile").css("margin-top","-"+(a/$(window).height()*400+100)+"%");
	}

	// content
	for (var i = 1; i <= 5; i++) {
		// console.log($(".box-parent-"+i).offset().top);
		if($(".box-parent-"+i).offset().top-(windowHeight/2) < a){
			$(".box-parent-"+i).addClass('active');
		}else{
			$(".box-parent-"+i).removeClass('active');
		}
	}
	if(a > 300 && $(window).width() > 1060){
		$("header .col-6").css("padding-left","100px");
	}else if($(window).width() > 1060){
		$("header .col-6").css("padding-left","0px");
	}
	if(a > 400 && $(window).width() > 1060){
		$("header").addClass("active");
		$(".logo").addClass("active");
		$(".logo a").css("transition-delay","0.5s");
		$(".logo .col-6").css("transition-delay","0s");
		$(".logo .back-litle").css("transition-delay","0s");
		$(".logo .back").css("transition-delay","0s");
	}else if($(window).width() > 1060){
		$("header").removeClass("active");
		$(".logo").removeClass("active");
		$(".logo .col-6").css("transition-delay","0.5s");
		$(".logo .back-litle").css("transition-delay","0.5s");
		$(".logo .back").css("transition-delay","0.5s");
		$(".logo a").css("transition-delay","0s");
	}
	if(500 < a && a < 1000){
		$(".anime-con .col-6").css('bottom',"-"+1100+"px");
		$(".anime-con .col-6:eq(0)").css('left',"-"+300+"px");
		$(".anime-con .col-6:eq(1)").css('right',"-"+300+"px");
		// $(".anime-con .col-6").css('bottom',"-"+(Math.sin(((a-500)/500*90)*Math.PI/180)*1100)+"px");
		// $(".anime-con .col-6:eq(0)").css('left',"-"+(Math.sin(((a-500)/500*90)*Math.PI/180)*300)+"px");
		// $(".anime-con .col-6:eq(1)").css('right',"-"+(Math.sin(((a-500)/500*90)*Math.PI/180)*300)+"px");
	}else if(a <= 500){
		$(".anime-con .col-6").css('bottom',"0px");
		$(".anime-con .col-6:eq(0)").css('left',"0px");
		$(".anime-con .col-6:eq(1)").css('right',"0px");
	}
	for (var i = 0; i < numOfShow; i++) {
		var elemen = $(".ss:eq("+i+")");
		var offset = elemen.attr('data-offset');
		if(offset == null || offset == ""){
			offset = 0;
		}else{
			offset = Number(offset);
		}
		if(elemen.offset().top < a+300+offset){
			elemen.css("visibility","visible");
			elemen.css("animation-name",elemen.attr("data-animate"));
			elemen.addClass("animated");
		}else{
			elemen.css("visibility","hidden");
			elemen.css("animation-name","none");
			elemen.removeClass("animated");
		}
	}
});

$(document).ready(function(event) {
	$(".btn-menu").click(function(){
		var target = $(this).attr('href');
		$('html, body').animate({ scrollTop : $(target).offset().top},'slow');
		return false;
	})
	for (var i = 0; i < $(".ss").length; i++) {
		$(".ss:eq("+i+")").css("visibility","hidden");
		$(".ss:eq("+i+")").css("animation-name","none");
	}
	$("header").click(function(){
		let toggle = $(this).attr('data-toggle');
		if(toggle == 1){
			$(this).attr('data-toggle',0);
			$(this).removeClass('active');
		}else{
			$(this).attr('data-toggle',1);
			$(this).addClass('active');
		}
	});
	
	// slider
	$('.slider').slick({
	  dots: true,
	  infinite: true,
	  speed: 500,
	  fade: true,
	  cssEase: 'linear'
	});
	$(".slick-arrow").click(function(){
		var elemen = $(".slick-slide .item-slide");
		elemen.css("visibility","hidden");
		elemen.css("animation-name","none");
		elemen.removeClass("animated");

		for (var i = 0; i < 4; i++) {
			var elemenAct = $(".slick-slide.slick-active .item-slide:eq("+i+")");
			elemenAct.css("visibility","visible");
			elemenAct.css("animation-name",elemenAct.attr("data-animate"));
			elemenAct.addClass("animated");
		}
	});
	// $(".slider").slick({
	// 	lazyLoad: 'ondemand', // ondemand progressive anticipated
	// 	infinite: true
	// });
	$('#viretraModal').on('hide.bs.modal', function(e){
		const video = document.querySelector("#videoViretra");

		video.pause();
		video.currentTime = 0;
	});
	$('#viretraModal').on('show.bs.modal', function(e){
		const video = document.querySelector("#videoViretra");

		video.play();
		video.currentTime = 0;
	});
});
function sendMail(){
	$.support.cors = true
	var dt = { 
			"personalizations": [{
				"to": [{
					"email": "agammail95@gmail.com"
				}]
			}],
			"from": {
				"email": "lanius.agni@gmail.com"
			},
			"subject": "Anda mendapat message melalui website Tictechstudio.com",
			"content": [{
				"type": "text/plain",
				"value": 'Nama : '+$("input[name='name']").val()+', '+
				  	'Email : '+$("input[name='email']").val()+', '+
				  	'Pesan : '+$("textarea[name='comment']").val()
			}]
		};
	$.ajax({
	    type: 'POST',
	    headers: {
			"Authorization" : "Bearer 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",
			"accept": "application/json",
		    "Content-Type": "application/json",
   	    },
		url : 'https://api.sendgrid.com/v3/mail/send',
		crossDomain : true,
		data : JSON.stringify(dt),
		success : function(){
			alert('Thanks for your message! :)')
		}
	})
}
function viretra(){
	// console.log('asd');
	$('#viretraModal').modal('show');
	return false;
}
