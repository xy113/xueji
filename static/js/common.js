// JavaScript Document
Request = {
	QueryString : function(item){
		var svalue = location.search.match(new RegExp("[\?\&]" + item + "=([^\&]*)(\&?)","i"));
		return svalue ? svalue[1] : svalue;
	}
}
var cpaction = Request.QueryString("action");
var url = location.href.lastIndexOf("?") == -1 ? location.href.substring((location.href.lastIndexOf("/")) + 1) : location.href.substring((location.href.lastIndexOf("/")) + 1, location.href.lastIndexOf("?"));
purl = url+"?action="+cpaction;
url = url+"?action="+cpaction+"&inajax=1";
function $$(o){
	return document.getElementById(o);
}
function selectAll(inputname){
	var items = document.getElementsByName(inputname);
	for(var i=0; i<items.length;i++){
		if(items[i].disabled){
			continue;
		}else{
			items[i].checked = true;
		}
	}
}
function cancelAll(inputname){
	var items = document.getElementsByName(inputname);
	for(var i=0; i<items.length;i++){
		items[i].checked = false;
	}
}
function checkAll(input,inputname){
	if(input.checked){
		selectAll(inputname)
	}else{
		cancelAll(inputname)
	}
}
function Drop(checkbox,theForm){
	if(!confirm("您确定要删除吗？"))return false;
	var items = document.getElementsByName(checkbox);
	var values = new Array();
	for(var i=0;i<items.length;i++){
		if(items[i].checked)values.push(items[i].value);
	}
	if(values.length>0){
		theForm.submit();
	}else{
		alert("您还没有选择要删除的选项。");
	}
}
function GoPage(page,para){
	var curl = para ? url+"&"+para : url;
	$.get(curl+"&page="+page,function(result){
		$("#listframe").html(result);
	})
}
function LoadPage(para){
	var curl = para ? purl+"&"+para : purl;
	window.location = curl;
}
function DropAll(checkbox,querystr,waitid){
	var values = new Array();
	var Waitid = waitid ? waitid : "#listframe";
	var items = document.getElementsByName(checkbox);
	var curl  = url+"&do=drop";
	curl = querystr ? curl+"&"+querystr : curl;
	for(var i=0;i<items.length;i++){
		if(items[i].checked)values.push(items[i].value);
	}
	if(values.length>0){
		if(confirm("您确定要删除所选信息吗？")){
			$.get(curl+"&value="+values.join(','),function(result){
				$(Waitid).html(result)   
			})
		}
	}else{
		alert("您还没有选择任何选项。");
	}
}
//切换状态
function toggle(obj,querystring){
	var ajaxurl = querystring ? url+"&"+querystring : url;
	$.get(ajaxurl,function(response){
		//alert(result)
        obj.src = parseInt(response) > 0 ? 'static/images/yes.gif' : 'static/images/no.gif';
	});
}