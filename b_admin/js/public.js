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