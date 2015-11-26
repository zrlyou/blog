function checkIsNull(){
	var title   = document.getElementById('title').value;
	var content = document.getElementById('content').value;
	if (title== '' || content==''){
		alert('请确认信息是否完整!');
			return false;
	} else {
		return true;
	}
}

function checkVarIsNull(obj,str,id){
	if (obj.value == ''){
		document.getElementById(id).innerHTML = str;
		obj.focus();

	} else {
		document.getElementById(id).innerHTML = '';
	}
}

function checkPwd(obj){
	if (obj.value==''){
		document.getElementById("cp_error").innerHTML = "确认密码不能为空!";
		obj.focus();
	} else {
		var pwd = document.getElementById("newpwd");
		if (obj.value!=pwd.value){
			document.getElementById("cp_error").innerHTML = "两次输入的密码不一致!请重新输入";
			pwd.innerHTML = '';
			obj.innerHTML = '';
			obj.focus();
		} else {
			document.getElementById("cp_error").innerHTML = '';
		}
	}
}