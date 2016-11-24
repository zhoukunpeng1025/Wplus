$(document).ready(function(){
	$(".improve").blur(function(){
		var signBtn = $(".signBtn");
		if ($("#nick").val()!="" && $("#password").val()!="") {
			signBtn.attr("disabled",false);
			signBtn.css({
				"background" : "#ea4027"
			});
		}
		else{
			signBtn.attr("disabled","disabled");
			signBtn.css({
				"background" : "#ccc"
			});
		}
	});
});