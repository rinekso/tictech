var xP, horzCount;
var yP, vertCount;
$(window).on('mousemove',function(event){
	var x = event.clientX;     // Get the horizontal coordinate
	var y = event.clientY;     // Get the vertical coordinate
	// $('.decoration.decoration-top .decoration-item.decor-1').css('transform','rotateZ(225deg) translateY('+ x/20 +'px)');		
	// $('.decoration.decoration-top .decoration-item.decor-2').css('transform','rotateZ(225deg) translateY('+ x/15 +'px)');		
	// $('.decoration.decoration-top .decoration-item.decor-3').css('transform','rotateZ(225deg) translateY('+ x/10 +'px)');		
	// $('.decoration.decoration-bottom .decoration-item.decor-4').css('transform','rotateZ(45deg) translateY('+ y/20 +'px)');		
	// $('.decoration.decoration-bottom .decoration-item.decor-5').css('transform','rotateZ(45deg) translateY('+ y/10 +'px)');		

	var width = $(window).width();
	x = Math.floor(x/30);
	y = Math.floor(y/30);
	gridSystem(x,y);
});
function getRandomInt(max) {
  return Math.floor(Math.random() * Math.floor(max));
}
function getRandomArbitrary(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}
function gridSystem(x,y){
	if(x != xP || y != yP){
		var oldgrid = horzCount*(yP)+xP;

		let rand1 = getRandomArbitrary(-1,1);
		let rand2 = getRandomArbitrary(-1,1);
		var grid = horzCount*(y+rand1)+(x+rand2);
		// var grid = horzCount*(y)+(x);
		// $(".grid .grid__item:eq("+oldgrid+")").removeClass("animated");
		$(".grid .grid__item:eq("+grid+")").addClass("animated");
		setTimeout(function(){ $(".grid .grid__item:eq("+grid+")").removeClass("animated"); }, 1000);
		// console.log(x+"/"+y);
		xP = x;
		yP = y;
	}else{
		// var grid = horzCount*(yP-1)+xP;
		// $(".grid .grid__item:eq("+grid+")").removeClass("animated");
	}
}

$(document).ready(function(event) {

const myVideo = document.getElementById('video');

// Not all browsers return promise from .play().
const playPromise = myVideo.play() || Promise.reject('');
playPromise.then(() => {
  // Video could be autoplayed, do nothing.
}).catch(err => {
  // Video couldn't be autoplayed because of autoplay policy. Mute it and play.
  myVideo.muted = true;
  myVideo.play();
});

  var $grid = $('.grid')
  var $gridItem = $('.grid__item')
  var gridItemHeight = $gridItem.height()
  var gridItemWidth = $gridItem.width()

  horzCount = Math.floor($grid.width() / gridItemWidth)
  vertCount = Math.floor($grid.height() / gridItemHeight)
  
  var totalGridItems = horzCount * vertCount
  for (var i = 0; i < totalGridItems; i++) {
    var $gridItemClone = $gridItem.clone();
    $grid.append($gridItemClone);
  }
	/*
	* Plugin intialization
	*/
	$('#pagepiling').pagepiling({
		menu: '#menu',
		// direction: 'none',
		anchors: ['page1', 'page2', 'page3', 'page4', 'page5'],
	    // sectionsColor: ['', '#ee005a', '#2C3E50', '#39C'],
	    navigation: {
	    	'position': 'right',
	   		'tooltips': ['HOME', 'OUR SERVICE', 'AR MIRROR', 'VR TRAINING', 'CONTACT']
	   	},
	    afterRender: function(){
	    	$('#pp-nav').addClass('custom');
	    },
	    afterLoad: function(anchorLink, index){
	    	if(index>1){
	    		$('#pp-nav').removeClass('custom');
	    	}else{
	    		$('#pp-nav').addClass('custom');
	    	}
	    },
	    onLeave: function(index,nextIndex,direction){
	    	// if(nextIndex>1){
		    // 	$("#section"+nextIndex).addClass('animated');
	    	// }
		    transitionOut("#section"+nextIndex,index,nextIndex);
		    // $("#section"+nextIndex+" .anim").addClass('animated');
	    }
	});

	function transitionOut(section,index,next){
		if(index > 2 && index < 5){
			setTimeout(function(){
				$("#section"+index+" .anim").removeClass("animated");
				$("#section"+index+" .anim").addClass("animated-out");
			},0);
		    setTimeout(function(){
			    $(".section").hide();
			    $("#section"+next).show();
				$("#section"+index+" .anim").removeClass("animated-out");
				$(section+" .anim").addClass("animated");
		    },1000);
		}else{
			$(".section").hide();
			$("#section"+next).fadeIn();
			$("#section"+next+" .anim").addClass("animated");
		}
	}

	/*
    * Internal use of the demo website
    */
    $('#showExamples').click(function(e){
		e.stopPropagation();
		e.preventDefault();
		$('#examplesList').toggle();
	});

	$('html').click(function(){
		$('#examplesList').hide();
	});

	$('.icon-menu').click(function(){
		var toggle = $(this).attr('data-toggle');
		if(toggle == 0){
			$('.pageLink').fadeIn();
			$(this).attr('data-toggle',1);
		}else{
			$(this).attr('data-toggle',0);
			$('.pageLink').fadeOut();

		}
	})
});
