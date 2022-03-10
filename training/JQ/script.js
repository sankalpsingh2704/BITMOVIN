$(document).ready(function(){
	var timeot =[];
	var points = 0;
	var count = 0;
	var bsize = {height: 100, width: 100};
	var bposition = {left: 670, top: 470};
	var miss;
	var action;
	var bubble = ["bubble1","bubble2","bubble3","bubble4","bubble5"];
	(function(){
		$(".messg").text("Message: Press Play");
	})();
	function bubblesize(size,id){
		$(id).css({"height": size.height+"px","width":size.width+"px"});
	}
	function bubbleposition(position,id){
		$(id).css("margin-left",position.left+"px");
		$(id).css("margin-top",position.top+"px");
	}
	function getRandom(min, max) {
		return Math.floor(Math.random() * (max - min + 1)) + min;
	}
	function createbubble(bubbleId,num){
		var truth = true;
		$(bubbleId).removeClass("active").addClass("bubble");
		sizerandom(bubbleId);
		orig = positionrandom(bubbleId);
		showMissed();
		if(orig.left %2 == 0)
			truth = false;
		else
			truth = true;
		repeatOften(orig.left,orig.top,orig,truth,bubbleId,num);		
	}
	function clear()
	{
		for(var i=0;i< 5;i++)
			clearTimeout(timeot[i]);		
	}
	var bub = 0;
	var onlyonce = 0;
	var bubblestack = [];
	function autostart(){
		var timeout = 300;
			action = setInterval(function() {
			if(count >= 10)
			{				 				 
				for(var i=1;i<= 5;i++)
					$(".bubble"+i).addClass("active").removeClass("bubble");				 
				$(".miss").text("Missed: " + 10);
				$(".messg").text("Message: Game over !");
				clearInterval(action);
				clearInterval(miss);
				clear();
				$(".area").empty();
			}
			else{
					clear();
				createbubble("."+bubble[bub],bub);
				bub++;
				if(onlyonce != 0)
				{
					count++;
				}					
				if(bub == 5)
				{
					bub = 0;
					onlyonce = 1;					
				}
			 }
        },timeout);
	}
	function sizerandom(id)
	{
		var random = getRandom(70,130);
		bsize.height = random;
		bsize.width = random;
		bubblesize(bsize,id);
	}
	function positionrandom(id)
	{
		bposition.left = getRandom(10,450);
		bposition.top = getRandom(10,250);
		bubbleposition(bposition,id);
		return bposition;
	}
	function setcount(cnt)
	{
		if(cnt < 0)
			count = 0;
		else
			count --;
	}
	var z = 1;
	var x = 0;
	function repeatOften(x,y,original,less,bubbleId,num) 
	{
			if(x == original && less)
			{
				x --;
				y ++;
			}
			else if(x > original.left -25 && less)
			{
				x --;
				y ++;
			}
			else if(x == original.left -25 && less)
			{
				less = false;
				x++;
				y--;
			}
			else if(x < original.left + 25 && !less)
			{
				x++;
				y--;
			}
			else if(x == original.left + 25 && !less)
			{
				x --;
				y ++;
				less = true;
			}
			bposition.left = x;
			bposition.top = y;
			bubbleposition(bposition,bubbleId);
			timeot[num] = setTimeout(function(){
				repeatOften(x,y,original,less,bubbleId,num);
			},70);
	}
	$(".bubble1").click(function(){
		$(".bubble1").addClass("active").removeClass("bubble");
			points ++;
			setcount(count);
			clearTimeout(timeot[0]);
			$(".score").text("Score: " + points);			
	});
	$(".bubble2").click(function(){
			$(".bubble2").addClass("active").removeClass("bubble");
			points ++;
			setcount(count);
			clearTimeout(timeot[1]);
			$(".score").text("Score: " + points);
			
	});
	$(".bubble3").click(function(){
	    $(".bubble3").addClass("active").removeClass("bubble");
			points ++;
			setcount(count);
			clearTimeout(timeot[2]);
			$(".score").text("Score: " + points);			
	});
	$(".bubble4").click(function(){
		$(".bubble4").addClass("active").removeClass("bubble");
			points ++;
			setcount(count);
			clearTimeout(timeot[3]);
			$(".score").text("Score: " + points);
			
	});
	$(".bubble5").click(function(){
		$(".bubble5").addClass("active").removeClass("bubble");
			points ++;
			setcount(count);
			clearTimeout(timeot[4]);
			$(".score").text("Score: " + points);
			
	});
	var previous = 0;
	function showMissed()
	{
		var timeout = 200;
		miss = setInterval(function() {
			if(count <= previous)
			{
			  $(".miss").text("Missed: " + previous);
			}
			else {
				previous = count;
			 if(count!= 10)
				$(".miss").text("Missed: " + count);
			}
        },timeout);
		
	}	
	$(".play_btn").click(function(){
		autostart();
		$(".miss").text("Missed: " + 0);
		$(".messg").text("Message: Game Running");
	});
	$(".reset_btn").click(function(){
		location.reload();
	});
});