$(document).ready(function(){
	var timer = setInterval(function(){
		var signBtn = $(".signBtn");
		if ($("#mobile").val()!="" && $("#password").val()!="") {
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
	},500);
});