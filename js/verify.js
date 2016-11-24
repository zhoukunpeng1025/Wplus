$(document).ready(function(){
	var i = 60;
	var timer = setInterval(function(){
		var resend = $("#resend");
		i--;
		resend.text(i+"s后重新获取");
		if (i == 0) {
			clearInterval(timer);
			resend.text("重新获取验证码");
			resend.attr("disabled",false);
			resend.css({
				"background" : "#ea4027"
			});
		}
	},1000);

	$("input").blur(function(){
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

	// var timer2 = setInterval(function(){
	// 	var pin = $("#PIN");
	// 	// var jump = $("#jump");
		
	// 	if (pin.val().length == 4) {
	// 		console.log(pin.val());
	// 		clearInterval(timer2);
			
	// 	}
	// },500);
});