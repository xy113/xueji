// JavaScript Document
function changeClass(){
	if($("#studentid").val()){
		$.get('index.php?action=checkmodify&do=changeclass&studentid='+$("#studentid").val()+"&classid="+$("#classid").val(),function(result){
			alert(result);	
		});
	}else{
		alert("请输入要转班学生的学号。");
	}
}
function StudentInput(){
	if($("#studentid").val()){
		$.get('index.php?action=checkmodify&do=input&studentid='+$("#studentid").val(),function(result){
			alert(result);	
		});
	}else{
		alert("请输入要转入学生的学号。");
	}
}
function StudentOutput(){
	if($("#studentid").val()){
		$.get('index.php?action=checkmodify&do=output&studentid='+$("#studentid").val(),function(result){
			alert(result);	
		});
	}else{
		alert("请输入要转出学生的学号。");
	}
}
function StudentLeave(){
	if($("#studentid").val()){
		$.get('index.php?action=checkmodify&do=leave&studentid='+$("#studentid").val(),function(result){
			alert(result);	
		});
	}else{
		alert("请输入要休学学生的学号。");
	}
}
function StudentReturn(){
	if($("#studentid").val()){
		$.get('index.php?action=checkmodify&do=return&studentid='+$("#studentid").val(),function(result){
			alert(result);	
		});
	}else{
		alert("请输入要复学学生的学号。");
	}
}
function StudentRepeat(){
	if($("#studentid").val()){
		$.get('index.php?action=checkmodify&do=repeat&studentid='+$("#studentid").val(),function(result){
			alert(result);	
		});
	}else{
		alert("请输入要复学学生的学号。");
	}
}
function StudentQuit(){
	if($("#studentid").val()){
		$.get('index.php?action=checkmodify&do=quit&studentid='+$("#studentid").val(),function(result){
			alert(result);	
		});
	}else{
		alert("请输入要退学学生的学号。");
	}
}