$(document).ready(function(){
	$("input").blur(function(){
		var signBtn = $(".signBtn");
		if ($("#mobile").val()!="") {
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