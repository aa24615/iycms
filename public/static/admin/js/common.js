var layer,form,upload;

layui.use(['form','layedit','upload'], function () {
	layer = layui.layer;
	form = layui.form;
});



$(document).ready(function() {
	//删除收藏
    $(".del").click(function() {
		var url = $(this).attr("href");
		var id = $(this).attr("data-id");
		
		layer.confirm('你确定要删除么?', {
		   btn: ['确定','取消'] //按钮
		}, function(){
			$.get(url, function(data) {
				if(data.code == 1) {
					$(id).fadeOut();
					layer.msg(data.msg, {icon: 1});
				}else{
					layer.msg(data.msg, {icon: 2});
				}
			});
		}, function(){
			layer.msg("您取消了删除!")
		});
        return false;
    });
   	//收展菜单
    $(".left > ul > li").click(function(event) {
    	$(this).toggleClass("hidden");
    	var id = $(this).attr("data-id");
    	$.get("/admin/menu/isan.html",{id:id});
    });
    //收展菜单 >解决冒泡事件
    $(".left > ul > li div a,.left > ul > li div").click(function(event) {
     	event.stopPropagation();
    })   
})
