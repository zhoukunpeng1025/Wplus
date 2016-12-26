$(document).ready(function(){
	// 添加食材
	$("#addFood").click(function(){
		// 创建form-group节点
		var formGroup = $("<div class='form-group'>"+
							"<div class='col-sm-2'></div>"+
							"<div class='col-sm-5'>"+
								"<input type='text' class='form-control' name='foodname[]' placeholder='食材'>"+
							"</div>"+
							"<div class='col-sm-4'>"+
								"<input type='text' class='form-control' name='foodnum[]' placeholder='数量'>"+
							"</div>"+
							"<div class='addAndRemove remove'>"+
								"<span class='glyphicon glyphicon-remove'></span>"+
							"</div>"+
						"</div>");
		// 添加节点
		$(this).parent().after(formGroup); //注意after()没有返回值
	});

	// 添加步骤
	$("#addProcedure").click(function(){
		var formGroup = $("<div class='form-group'>"+
                            "<div class='col-sm-2'></div>"+
                            "<div class='col-sm-7'>"+
                                "<textarea name='step[]' id='' rows='7' class='form-control' placeholder='步骤'></textarea>"+
                            "</div>"+
                            "<div class='col-sm-2'>"+
                            	'<div class="control-group js_uploadBox">'+
                                    '<div class="btn-upload">'+
                                      '<a href=""><i class="icon-upload"></i><span class="js_uploadText">上传</span>图片</a>'+
                                      '<input class="js_upFile" type="file" name="img[]">'+
                                    '</div>'+
                                    '<div class="js_showBox"><img class="js_logoBox" src="../../../Public/back/img/add.png" width="100px" ></div>'+
                                '</div>'+
                            "</div>"+
                            "<div class='addAndRemove remove'>"+
                                "<span class='glyphicon glyphicon-remove'></span>"+
                            "</div>"+
                        "</div>");
		$(this).parent().after(formGroup);
	});

	// 添加闹钟
	$("#addClock").click(function(){
		var formGroup = $("<div class='form-group'>"+
                            "<div class='col-sm-2'></div>"+
                            "<div class='col-sm-5'>"+
                                "<input type='text' class='form-control' placeholder='第几步，请输入数字'' name='clocknum[]''>"+
                            "</div>"+
                            "<div class='col-sm-4'>"+
                                "<input type='text' class='form-control' name='clocktime[]' placeholder='时间'>"+
                            "</div>"+
                            "<div class='addAndRemove remove'>"+
                                "<span class='glyphicon glyphicon-remove'></span>"+
                            "</div>"+
                        "</div>");
		$(this).parent().after(formGroup);
	});

	// 删除
	$("body").on("click",".remove",function(){
		// console.log($(this).parent()[0]);
		$(this).parent().remove();
	});


});