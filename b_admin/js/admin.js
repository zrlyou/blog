//获取客户端的宽度和高度，并设置.left .right的高度
function getClientHeight(){
	$(".left").height($(window).height()-72);
	$(".right").height($(window).height()-72);
}
$(function(){
	getClientHeight();
	$(".menu_list").hide();				
	$(".a_list").click(function(){
		var len = $('.a_list').length;
		var index = $(".a_list").index(this);
		for(var i=0;i<len;i++){
			if(i == index){
				$('.menu_list').eq(i).slideToggle(300);
			} else{
				$('.menu_list').eq(i).slideUp(300);
			}
		}
	})
});