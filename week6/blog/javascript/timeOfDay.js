var myVar = setInterval(function(){myTimer()});

function myTimer()
{
var d=new Date();
var t=d.toLocaleTimeString();
document.getElementById("time").innerHTML=t;
}