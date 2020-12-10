// scroll function
function scrl(element){
	$("html,body").animate({
		scrollTop: $("#" + element).offset().top
	},1000);
}
function arrowScrl() {
	$('html, body').animate({
		scrollTop: 0
	},1000);
}
$(window).scroll(function(){
    if($(this).scrollTop() >= 400){
        $('#arrow-scrl').css("display","block");
    }
    else{
        $('#arrow-scrl').css("display","none");
    }
}); 