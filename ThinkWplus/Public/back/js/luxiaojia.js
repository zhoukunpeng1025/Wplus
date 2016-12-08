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
                            "<div class='col-sm-9'>"+
                                "<textarea name='text[]' id='' rows='3' class='form-control' placeholder='步骤'></textarea>"+
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
                                "<select class='form-control' name='step[]'>"+
                                    "<option>请选择</option>"+
                                    "<option value='1'>步骤1</option>"+
                                    "<option value='2'>步骤2</option>"+
                                    "<option value='3'>步骤3</option>"+
                                    "<option value='4'>步骤4</option>"+
                                "</select>"+
                            "</div>"+
                            "<div class='col-sm-4'>"+
                                "<input type='text' class='form-control' name='time[]' placeholder='时间'>"+
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