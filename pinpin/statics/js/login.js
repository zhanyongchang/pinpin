var errfound = false;

function error(elem, text) {
    if (errfound) return;
    window.alert(text);
    elem.select();
    elem.focus();
    errfound = true;
}

function loginCheck(f) {
	//var userid = document.getElementById("userid").value;
    errfound = false;
    if (f.userid.value == "" || f.userid.value == "请输入用户名")
        error(f.userid, "请输入用户名!");
    if (f.pwd.value == "" || f.pwd.value == "请输入密码")
        error(f.pwd, "请输入密码!");
    if (f.validate.value == "" || f.validate.value == "请输入验证码")
        error(f.validate, "请输入验证码!");
    return !errfound;
}
