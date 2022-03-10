window.requestAnimFrame = (function(callback) {
        return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
        function(callback) {
          window.setTimeout(callback, 1000 / 60);
        };
      })();	  
window.addEventListener('blur', function() { 
   cancelAnimationFrame(rainobj);
}, false);
window.addEventListener('focus', function() {
	ctx.clearRect(0, 0, 640, 480);
	if(localStorage.getItem("was")==="circle")
			circle(myCircle);
		else if(localStorage.getItem("was")==="rect")
			rectangle(150,100,350,300);
		else if(localStorage.getItem("was")==="square")	
			square(150,100,300,300);
}, false);
var hist = new Array("one","two","three","four");
var pushcount = 0;
var lock=0;
function gethistory()
{			
	if(pushcount > -1)
	{
		var val = localStorage.getItem(hist[pushcount]);
		if(pushcount == 0 && lock == 1)
			return;
		else
			pushcount --;
		return val;
	}
	
}
function addhistory()
{	
	pushcount++;
	var e = window.event;
    btn = e.target || e.srcElement;
	if(pushcount == 3)
		lock = 1;
	if(pushcount > 3)
	{
		pushcount = 3;
		for(var i = 0; i<= pushcount;i++)
		{
			localStorage.setItem(hist[i],localStorage.getItem(hist[i+1]));
			if(i == 3)
				localStorage.setItem(hist[i],btn.id);			
		}
	}
	else
		localStorage.setItem(hist[pushcount], btn.id);
}
var ctx;
var colors = ["red","orange","yellow","green","blue","purple"];
var rainobj;
var canvas;
	  function animateRain(rain,startTime,startAngle,stop,cycle)
	  {
        var time = (new Date()).getTime() - startTime;
        var linearSpeed = 5;
        var newX = parseInt(linearSpeed * time / 1000);	    
		if(newX == stop)
		{
			startAngle -= 0.05;
			rain.startAngle = startAngle;
			stop ++;
			if(newX == cycle)
				return;
		}
        rainbow(rain,rain.radius,colors[5],startAngle+0.10);
		if(startAngle > 0.90){
			rainbow(rain,55,colors[4],startAngle + 0.05);
			localStorage.setItem('blue',startAngle);
		}
		else
			rainbow(rain,55,colors[4],localStorage.getItem('blue') + 0.10);
		if(startAngle > 0.95)
		{
			rainbow(rain,70,colors[3],startAngle);
			localStorage.setItem('yellow',startAngle);
		}
		else
			rainbow(rain,70,colors[3],localStorage.getItem('yellow'));		
		if(startAngle > 1.05)
		{
			rainbow(rain,85,colors[2],startAngle - 0.1);
			localStorage.setItem('green',startAngle);
		}
		else
			rainbow(rain,85,colors[2],localStorage.getItem('green')-0.1);
		if(startAngle > 1.15){
			rainbow(rain,100,colors[1],startAngle - 0.2);
			localStorage.setItem('orange',startAngle);
		}
		else
			rainbow(rain,100,colors[1],localStorage.getItem('orange')-0.2);
		if(startAngle > 1.25)
		{
			rainbow(rain,115,colors[0],startAngle - 0.3);
			localStorage.setItem('red',startAngle);
		}
		else
			rainbow(rain,115,colors[0],localStorage.getItem('red')-0.3);		
			rainobj = requestAnimFrame(function() {
          animateRain(rain,startTime,startAngle,stop,cycle);
        });
	  }	 	  
	  var myRainbow = {
		  x : 300,
		  y : 330,
		  startAngle: 1.5,
		  endAngle: 2.0,
		  radius: 40,
		  color: colors[0]
	  };	  
	  myCircle = {
		  x:300,
		  y:250,
	  };	  
function rainbow(myRainbow,radius,color,startAngle)
	  {
		var startAngle = startAngle * Math.PI;
		var endAngle = myRainbow.endAngle * Math.PI;
		ctx.beginPath();     
		ctx.arc(myRainbow.x,myRainbow.y,radius,startAngle,endAngle,false);   
		ctx.strokeStyle = color;
		ctx.lineWidth = 15;		
		ctx.stroke();		
	 }
function circle(myCircle){
		canvas = document.getElementById("outerspace");    	
		ctx = canvas.getContext('2d');   
		ctx.fillStyle = "white";   
		ctx.beginPath();      
		ctx.arc(myCircle.x,myCircle.y,150,0,Math.PI*2,true);      
		ctx.closePath();
		ctx.strokeStyle = "#ff0000";
		ctx.lineWidth = 1;	   
		ctx.fill();
		ctx.stroke();
}
function rectangle(x,y,width,height) {   
		ctx.fillStyle = "white";   
		ctx.beginPath();
		ctx.strokeStyle = "#ff0000";
		ctx.lineWidth = 2;		
		ctx.strokeRect(x,y,width,height);	
		ctx.fillRect(x,y,width,height);  
		ctx.closePath();  
		ctx.fill();
		ctx.stroke();		
	}
function square(x,y,width,height) { 
		ctx.fillStyle = "white";   
		ctx.beginPath();
		ctx.strokeStyle = "#ff0000";
		ctx.lineWidth = 2;
		ctx.strokeRect(x,y,width,height);		  
		ctx.fillRect(x,y,width,height);     
		ctx.closePath();   
		ctx.fill();
		ctx.stroke();		
	}
function cir(){	
	addhistory();
	cancelAnimationFrame(rainobj);
	var startTime = (new Date()).getTime();
	if(localStorage.getItem("was")==="square")
	{
		var startTime = (new Date()).getTime();
		squareToround(startTime,300,300,false,155);
	}
	else if(localStorage.getItem("was") === "rect")
	{
		var startTime = (new Date()).getTime();
		squareToround(startTime,350,300,false,155)
	}
	else
		circle(myCircle);
	localStorage.setItem("was","circle");
}
function rect(){	
	addhistory();
	cancelAnimationFrame(rainobj);
	if(localStorage.getItem("was")==="circle")
	{
		var startTime = (new Date()).getTime();
		squareToround(startTime,350,300,true,155);
	}
	else{
		var startTime = (new Date()).getTime();
		squareTorect(startTime,150,100,300,300,false,50);
	}	
	localStorage.setItem("was","rect");	
}
function squ(){	
	addhistory();
	cancelAnimationFrame(rainobj);
	if(localStorage.getItem("was")==="circle")
	{
		var startTime = (new Date()).getTime();
		squareToround(startTime,300,300,true,155);
	}
	else{
		var startTime = (new Date()).getTime();
		squareTorect(startTime,150,100,350,300,true,50);
	}
	localStorage.setItem("was","square");
}
function myhistory()
{
	var x = gethistory();
	var y = gethistory();
	var z = gethistory(); 
	var messg = "";
    if(typeof(x) != "undefined" && x !== "undefined")
		messg = messg + buttontype(x)+"\n";
	if(typeof(y) != "undefined" && y !== "undefined")
		messg = messg + buttontype(y) +"\n";	
	if(typeof(z) != "undefined" && z !== "undefined")
		messg = messg + buttontype(z);
	alert(messg);
}
function buttontype(x)
{
	if(x === "circle_btn")
		return "Circle";
	else if(x === "square_btn")
		return "Square";
	else if(x === "rectangle_btn")
		return "Rectangle";
	else if(x === "rainbow_btn")
		return "Rainbow";
}
function squareToround(startTime,width,height,reverse,stop){
	ctx.strokeStyle = "red";
    ctx.fillStyle = "white";
	ctx.lineWidth = 1;  
	var time = (new Date()).getTime() - startTime;
        var linearSpeed = 100;
        var newX = parseInt(linearSpeed * time / 1000);
		if(reverse)
		{
			var newY = 155 - newX;
			ctx.clearRect(0, 0, 640, 480);
			if(width == height)
				roundRect(ctx, 150, 100, width, height, newY,true);
			else
				roundRect(ctx, 150, 100, width, height, newY,true);
		}
		else{
			ctx.clearRect(0, 0, 640, 480);
			if(width == height)
				roundRect(ctx, 150, 100, width, height, newX,true);
			else
				roundRect(ctx, 150, 100, width, height, newX,true);			
		}
		if(newX > stop)
			{
				ctx.clearRect(0, 0, 640, 480);
				if(reverse)
				{
					if(width == height)
						square(150,100,300,300);					
					else	
						rectangle(150,100,350,300);
				}
				else
					circle(myCircle);
				return;
			}		
        requestAnimFrame(function() {
          squareToround(startTime,width,height,reverse,stop);
        });
}
function squareTorect(startTime,x,y,height,width,reverse,stop){
	ctx.strokeStyle = "red";
    ctx.fillStyle = "white";
	ctx.lineWidth = 1;
	var time = (new Date()).getTime() - startTime;
        var linearSpeed = 200;
        var newX = parseInt(linearSpeed * time / 1000);
		if(reverse)
		{
			ctx.clearRect(0, 0, 640, 480);
			width = width - 1;
			square(150,100,width,300);			
		}
		else{
			ctx.clearRect(0, 0, 640, 480);
			width = width + 1;
			rectangle(150,100,width,300);
		}
		if(newX > stop)
			{
				ctx.clearRect(0, 0, 640, 480);
				if(reverse)					
					square(150,100,300,300);				
				else
					rectangle(150,100,350,300);
				return;
			}
        requestAnimFrame(function() {
          squareTorect(startTime,x,y,height,width,reverse,stop);
        });
}
function roundRect(ctx, x, y, width, height, radius, stroke) {
	ctx.beginPath();
	ctx.moveTo(x + radius, y);
	ctx.lineTo(x + width - radius, y);
	ctx.quadraticCurveTo(x + width, y, x + width, y + radius);
	ctx.lineTo(x + width, y + height - radius);
	ctx.quadraticCurveTo(x + width, y + height, x + width - radius, y + height);
	ctx.lineTo(x + radius, y + height);
	ctx.quadraticCurveTo(x, y + height, x, y + height - radius);
	ctx.lineTo(x, y + radius);
	ctx.quadraticCurveTo(x, y, x + radius, y);
	ctx.closePath();
	ctx.fill();  
	ctx.stroke();
}
function rain()
{
	addhistory();
	cancelAnimationFrame(rainobj);
	if(localStorage.getItem("was") === "square")
	{
		ctx.clearRect(0, 0, 640, 480);
		square(150,100,300,300);
	}
	else if(localStorage.getItem("was") === "rect")
		rectangle(150,100,350,300);
	else
		circle(myCircle);
	var startTime = (new Date()).getTime();
	animateRain(myRainbow,startTime,1.9,0,20);
}
window.onload = function(){
	circle(myCircle);
	localStorage.setItem("one","circle_btn");
	localStorage.setItem("was","circle");
	var myarea = document.getElementById("outerspace");
	myarea.onclick = function(){
		if(localStorage.getItem("was")==="circle")
			alert('circle');
		else if(localStorage.getItem("was")==="rect")
			alert("rectangle");
		else if(localStorage.getItem("was")==="square")
			alert("square");
	}
}