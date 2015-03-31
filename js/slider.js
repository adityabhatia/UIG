var script = document.createElement('script');
script.src = 'js/jquery.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);
var stopPosition=0;


function open_panel()
{
$("#header").css("display","inline");
$("#slider").css("width","518px");
$("#slider").css("right","-360px");
slideIt();
var a=document.getElementById("sidebarnew");
a.setAttribute("id","sidebar1");
a.setAttribute("onclick","close_panel()");
}

function slideIt()
{	
	
	var slidingDiv = document.getElementById("slider");
	stopPosition = 0;
	
	if (parseInt(slidingDiv.style.right) < stopPosition )
	{
		slidingDiv.style.right = parseInt(slidingDiv.style.right) + 2 + "px";
		setTimeout(slideIt, 1);	
	}
}
	
function close_panel(){
slideIn();
a=document.getElementById("sidebar1");
a.setAttribute("id","sidebarnew");
a.setAttribute("onclick","open_panel()");


}

function slideIn()
{
	
	var slidingDiv = document.getElementById("slider");
	stopPosition = -360;
	
	if (parseInt(slidingDiv.style.right) > stopPosition && parseInt(slidingDiv.style.right)!=1)
	{
		slidingDiv.style.right = parseInt(slidingDiv.style.right) - 2 + "px";
		setTimeout(slideIn, 1);	
	}
	

	if (parseInt(slidingDiv.style.right) == stopPosition )
	{
		slidingDiv.style.right = "1px";
		$("#header").css("display","none");
		$("#slider").css("width","158px");		
	}
}