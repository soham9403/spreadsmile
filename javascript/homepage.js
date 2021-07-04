var slideshowIndex = 0;
	function slideshow(direction)
	{
			
		var len = $('.imagebox').length;
		var prev=(slideshowIndex-1+len)%len;
		var next=(slideshowIndex+1)%len;

		if(direction=="next")
		{
			prev = slideshowIndex;
			slideshowIndex = next;
			next = (slideshowIndex+1)%len;
			$('.imagebox').css('opacity','0');
			$('.imagebox').eq(slideshowIndex).css('opacity','1').css('margin','0% 0% 0% 0%');
			$('.imagebox').eq(prev).css('opacity','1').css('margin','0% 0% 0% -100%');
			$('.imagebox').eq(next).css('margin','0% 0% 0% 100%');
		}
		else
		{
			next = slideshowIndex;
			slideshowIndex = prev;
			prev = (slideshowIndex-1+len)%len;
			$('.imagebox').css('opacity','0');
			$('.imagebox').eq(slideshowIndex).css('opacity','1').css('margin','0% 0% 0% 0%');
			$('.imagebox').eq(prev).css('margin','0% 0% 0% -100%');
			$('.imagebox').eq(next).css('opacity','1').css('margin','0% 0% 0% 100%');
		}
	}
	function autoslideshow()
	{
		slideshow("next");
	}
	slideshowfun = setInterval(autoslideshow,9999);