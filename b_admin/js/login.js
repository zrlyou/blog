
$(function(){
	$("[name='username']").blur(function(){
		if ($(this).val()==""){
			alert("用户名不能为空");
			$(this).focus().select();
		}
	});
	$("[name='password']").blur(function(){
		if ($(this).val()==""){
			alert("密码不能为空!");
			$(this).focus().select();
		}
	});
});