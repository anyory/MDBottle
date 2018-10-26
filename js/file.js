function getTextResponse(theurl)
{
ajax=InitAjax();
ajax.open("GET", theurl, false); 
ajax.send(null); 
if (ajax.readyState == 4 && ajax.status == 200) {
　　var value = 'true';
}
else
{
value = 'false';
}
return value;
}

function InitAjax()
{
　var ajax=false; 
　try { 
　　ajax = new ActiveXObject("Msxml2.XMLHTTP"); 
　} catch (e) { 
　　try { 
　　　ajax = new ActiveXObject("Microsoft.XMLHTTP"); 
　　} catch (E) { 
　　　ajax = false; 
　　} 
　}
　if (!ajax && typeof XMLHttpRequest!='undefined') { 
　　ajax = new XMLHttpRequest(); 
　} 
　return ajax;
}