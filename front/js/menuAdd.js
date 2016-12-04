$(function(){
	// 添加食材
	$("#addFood").click(function(){
		// console.log($(this).parents("li")[0]);
		var add = $("<li>"+
	                    "<div class='item-content'>"+
	                      "<div class='item-inner'>"+
	                        "<div class='item-input row'>"+
	                          "<div class='col-50'><input type='text' placeholder='食材名'></div>"+
	                          "<div class='col-40'><input type='text' placeholder='用量'></div>"+
	                          "<div class='col-10 addAndRemove'><span class='fa fa-times'></span></div>"+
	                        "</div>"+
	                      "</div>"+
	                    "</div>"+
	                  "</li>");
		$(this).parents("li").after(add);
	});

	// 添加闹钟
	$("#addClock").click(function(){
		// console.log($(this).parents("li")[0]);
		var add = $("<li>"+
                    "<div class='item-content'>"+
                      "<div class='item-inner'>"+
                        "<div class='item-input row'>"+
                          "<select class='col-50'>"+
                            "<option value='1'>步骤1</option>"+
                            "<option value='2'>步骤2</option>"+
                            "<option value='3'>步骤3</option>"+
                            "<option value='4'>步骤4</option>"+
                          "</select>"+
                          "<div class='col-40'><input type='text' placeholder='时间'></div>"+
                          "<div class='col-10 addAndRemove'><span class='fa fa-times'></span></div>"+
                        "</div>"+
                      "</div>"+
                    "</div>"+
                  "</li>");
		$(this).parents("li").after(add);
	});

	// 删除
	$("body").on("click",".fa-times",function(){
		$(this).parents("li").remove();
	});
});