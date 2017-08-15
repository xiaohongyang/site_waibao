
var param = {};
/**   
*    
* @Description 发送post请求 当有拦截器返回信息进行处理
* @param url 请求地址
* @param param 请求参数
* @param callBack 成功后回调方法
* @Author Yang Cheng
* @Date: 2012-2-17 18：00  
* @Version  1.0
*    
*/
/*$.shovePost = function (url, param, callBack) {
	url = url + "?shoveDate" + new Date().getTime();
	$.post(url, param, function (data) {
		if (data == "noLogin") {
			alert("\xe7\x99\xbb\xe5\xbd\x95\xe5\xb7\xb2\xe8\xbf\x87\xe6\x9c\x9f\xe8\xaf\xb7\xe9\x87\x8d\xe6\x96\xb0\xe7\x99\xbb\xe5\xbd\x95");
			return;
		}
		if (data == "pagejump") {
			window.location.href = "adminMessage.do";
			return;
		}
		callBack(data);
	});
};*/
$.shovePost = function(url, param, callBack) {
    param["shoveDate"] = new Date().getTime();
    $.ajax({
        type : 'POST',
        url : url,
        data : param,
        success : function(data) {
            
            if (data == "noLogin") {//未登录处理
                alert("登录已过期请重新登录");
                window.parent.location = "login.do";
                
                return;
            }
            
            callBack(data);
        },
        error : function(data) {
            //如请求错将错误信息输出到当前页面
            document.write(data.responseText);
            return;
        }
    });
    };
/**   
*    
* @Description 跳转页面方法
* @param i 跳转页数
* @Author Yang Cheng
* @Date: 2012-2-17 18：10
* @Version  1.0
*    
*/
function doJumpPage(i) {
	//if(i==""){
	//	alert("输入格式不正确12!");
	//	return;
	//}
	if (isNaN(i)) {
		alert("\xe8\xbe\x93\xe5\x85\xa5\xe6\xa0\xbc\xe5\xbc\x8f\xe4\xb8\x8d\xe6\xa3\xe7\xa1\xae!");
		return;
	}
	$("#pageNum").val(i);
	//param["pageBean.pageNum"]=i;
	//回调页面方法
	initListInfo(i);
}
function checkbox_All_Reverse(obj, itemName) {
	$("input[name=" + itemName + "]").attr("checked", obj.checked);
}

//表格隔行变色
function trEvenColor() {
	$("#tableTr tr:even").css("background-color", "#f9f9f9");
}
function setCookies(cookieName, value, days) {
	$.cookie(cookieName, value, {expires:days});
}
function getCookies(cookieName) {
	return $.cookie(cookieName);
}
function getFlexObject(movieName) {
	return document[movieName];
}
$(function () {
	trEvenColor();
});
function hideAndShow(str) {
	$(str).hide();
	$(str).show();
}
//去空格
function trim(str){
    return str.replace(/(^\s*)|(\s*$)/g,'');
}
//验证邮箱
function checkEmail(str){
    var re = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/
    if(re.test(str)){
        return true;
    }else{
        return false;
    }
}
//验证固定电话号码
function checkPhone(str){
    var re = /^0\d{2,3}-?\d{7,8}$/;
    if(re.test(str)){
        return true;
    }else{
        return false;
    }
}

//验证手机号码
function checkMoblie(str){
    var re = /^(1[3-9]{1}[0-9]{1})\d{8}$/;
    if(re.test(str)){
        return true;
    }else{
        return false;
    }
}

