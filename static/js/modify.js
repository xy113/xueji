// JavaScript Document
function changeClass(){
	if($("#studentid").val()){
		$.get('index.php?action=checkmodify&do=changeclass&studentid='+$("#studentid").val()+"&classid="+$("#classid").val(),function(result){
			alert(result);	
		});
	}else{
		alert("������Ҫת��ѧ����ѧ�š�");
	}
}
function StudentInput(){
	if($("#studentid").val()){
		$.get('index.php?action=checkmodify&do=input&studentid='+$("#studentid").val(),function(result){
			alert(result);	
		});
	}else{
		alert("������Ҫת��ѧ����ѧ�š�");
	}
}
function StudentOutput(){
	if($("#studentid").val()){
		$.get('index.php?action=checkmodify&do=output&studentid='+$("#studentid").val(),function(result){
			alert(result);	
		});
	}else{
		alert("������Ҫת��ѧ����ѧ�š�");
	}
}
function StudentLeave(){
	if($("#studentid").val()){
		$.get('index.php?action=checkmodify&do=leave&studentid='+$("#studentid").val(),function(result){
			alert(result);	
		});
	}else{
		alert("������Ҫ��ѧѧ����ѧ�š�");
	}
}
function StudentReturn(){
	if($("#studentid").val()){
		$.get('index.php?action=checkmodify&do=return&studentid='+$("#studentid").val(),function(result){
			alert(result);	
		});
	}else{
		alert("������Ҫ��ѧѧ����ѧ�š�");
	}
}
function StudentRepeat(){
	if($("#studentid").val()){
		$.get('index.php?action=checkmodify&do=repeat&studentid='+$("#studentid").val(),function(result){
			alert(result);	
		});
	}else{
		alert("������Ҫ��ѧѧ����ѧ�š�");
	}
}
function StudentQuit(){
	if($("#studentid").val()){
		$.get('index.php?action=checkmodify&do=quit&studentid='+$("#studentid").val(),function(result){
			alert(result);	
		});
	}else{
		alert("������Ҫ��ѧѧ����ѧ�š�");
	}
}