$(function(){
	Timevalue();
	createCode();
	$("h3").siblings().children().hide();
	$("h3").children("img").attr("src","images/right.gif");
})
$(".register:eq(0)").click(function(){
	submitinfo();
})
function Timevalue(){
    var date1=new Date();
    var a=date1.getMonth()+1;
    var week=new Array("日","一","二","三","四","五","六");
    var b=week[date1.getDay()];
    var c=date1.getHours();
    var d=date1.getMinutes();
    var e=date1.getSeconds();
    document.getElementById("time").innerHTML=("&nbsp;现在是"+date1.getFullYear()+"年"+a+"月"+date1.getDate()+"日"+"星期"+b+c+"点"+d+"分"+e+"秒,请注意签到时间。");
    setTimeout("Timevalue()",1000);
}
$("h3").click(function(){
	if($(this).siblings().children().is(":visible")){
		$(this).siblings().children().hide();
		$(this).children("img").attr("src","images/right.gif")
	}
	else{
		$(this).siblings().children().show();
		$(this).children("img").attr("src","images/below.gif")
	}
})
var num=0;
function imagechange(){
	var image=document.getElementById("image");	
	if(num>7){
		num=-1;
	}
	else{
		image.src=arr[num];
	}
	num++;
}
$("#name").focus(function(){
	$("#nameCheck").html("");
	$("#name").css("borderColor","blue");
})	
function submitinfo(){
	if($("#name").val().length<2){
		$("#nameCheck").html("*用户名过短");
		$("#name").css("borderColor","red");
		return false;
	}
	if($("#password0").val()!=$("#password1").val()){
		$("#passwordCheck1").html("*密码不一致！");
		$("#password0").css("borderColor","red");
		return false;
	}
	var myreg1=/[a-zA-Z0-9]+@[a-zA-Z0-9\.]+(com|cn|org)$/gi;
	if(!myreg1.test($("#email").val())){
		$("#emailCheck").html("*不是有效的邮箱地址!");
		return false;
	}
	var myreg2=/[0-9]{11}/gi;
	if(!myreg2.test($("#phone").val())){
		$("#phoneCheck").html("不是有效的电话号码!");
		return false;
	}
	if($("#validate").val().length =0) {
        $("#validateCheck").html("验证码不能为空!");
        return false;
    }
    if($("#validate").val().toUpperCase()!=$("#checkCode").val()){
    	$("#validateCheck").html("*验证码输入错误!");	
    	return false;
    }
}
function createCode(){ 
    code = new Array();
    var codeLength = 4;
    var checkCode = document.getElementById("checkCode");
    checkCode.value = "";
    var selectChar = new Array(2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','J','K','L','M','N','P','Q','R','S','T','U','V','W','X','Y','Z');
    for(var i=0;i<codeLength;i++) {
        var charIndex = Math.floor(Math.random()*32);
        code +=selectChar[charIndex];
    }
    if(code.length != codeLength){
         createCode();
    }
    checkCode.value = code;
}

