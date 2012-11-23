function Star(context)
{
	var canvasContext = context;
	
	var centerX ;
	var centerY ;
	var outerRadius = 50;
	var innerRadius = outerRadius / 2;
	var outerCirclePoints = [0, 1.3, 2.6, 3.9, 5.2];
	var innerCirclePoints = [0.6, 1.8, 3.3, 4.6, 5.6];
	var cropImage;
	
	Star.prototype.draw = function()
	{
		centerX = canvasContext.canvas.width / 2 ;
		centerY = canvasContext.canvas.height / 2;
		
		//saving default image
		var canvasImage = canvasContext.getImageData(0, 0, canvasContext.canvas.width, canvasContext.canvas.height);
		
		this.drawStar();

		//set transparency 100% so that only star portion will be visible
		Common.setTransparency(canvasContext, "255");
		
		//now we can see only star portion is visible and other part is invisible
		//so we can crop the image
		cropImage = canvasContext.getImageData(centerX - outerRadius, centerY - outerRadius, 2 * outerRadius, 2 * outerRadius);
		
		//set transparency nothing so that we can draw the image again
		Common.setTransparency(canvasContext, "0");
		//draw the saved image
		canvasContext.putImageData( canvasImage , 0, 0);
		
		this.drawStar();
		
		//set some transparency so that the star portion is 100% visible and other part is partially visible
		Common.setTransparency(canvasContext, "0.5");
		//canvasContext.putImageData( cropImage , 0, 0);
	}
	
	Star.prototype.drawStar = function()
	{
				
		var outerX, outerY, innerX, innerY;
		
		outerX = centerX + Math.sin(outerCirclePoints[0]) * outerRadius;
		outerY = centerY + Math.cos(outerCirclePoints[0]) * outerRadius;
		
		innerX = centerX + Math.sin(innerCirclePoints[0]) * innerRadius;
		innerY = centerY + Math.cos(innerCirclePoints[0]) * innerRadius;
		
		canvasContext.beginPath();
		
		canvasContext.moveTo(outerX, outerY);
		canvasContext.lineTo(innerX, innerY);
		
		outerX = centerX + Math.sin(outerCirclePoints[1]) * outerRadius;
		outerY = centerY + Math.cos(outerCirclePoints[1]) * outerRadius;
		
		canvasContext.lineTo(outerX, outerY);
		
		innerX = centerX + Math.sin(innerCirclePoints[1]) * innerRadius;
		innerY = centerY + Math.cos(innerCirclePoints[1]) * innerRadius;
		
		canvasContext.lineTo(innerX, innerY);
		
		outerX = centerX + Math.sin(outerCirclePoints[2]) * outerRadius;
		outerY = centerY + Math.cos(outerCirclePoints[2]) * outerRadius;
		
		canvasContext.lineTo(outerX, outerY);
		
		innerX = centerX + Math.sin(innerCirclePoints[2]) * innerRadius;
		innerY = centerY + Math.cos(innerCirclePoints[2]) * innerRadius;
		
		canvasContext.lineTo(innerX, innerY);
		
		outerX = centerX + Math.sin(outerCirclePoints[3]) * outerRadius;
		outerY = centerY + Math.cos(outerCirclePoints[3]) * outerRadius;
		
		canvasContext.lineTo(outerX, outerY);
		
		innerX = centerX + Math.sin(innerCirclePoints[3]) * innerRadius;
		innerY = centerY + Math.cos(innerCirclePoints[3]) * innerRadius;
		
		canvasContext.lineTo(innerX, innerY);
		
				
		outerX = centerX + Math.sin(outerCirclePoints[4]) * outerRadius;
		outerY = centerY + Math.cos(outerCirclePoints[4]) * outerRadius;
		
		canvasContext.lineTo(outerX, outerY);
		
		innerX = centerX + Math.sin(innerCirclePoints[4]) * innerRadius;
		innerY = centerY + Math.cos(innerCirclePoints[4]) * innerRadius;
		
		canvasContext.lineTo(innerX, innerY);
		
		outerX = centerX + Math.sin(outerCirclePoints[0]) * outerRadius;
		outerY = centerY + Math.cos(outerCirclePoints[0]) * outerRadius;
		
		canvasContext.lineTo(outerX, outerY);
		
		canvasContext.strokeStyle = "#000000";
		canvasContext.lineWidth = 2;
		canvasContext.closePath();
		context.stroke();
	}

	Star.prototype.setSize = function(h)
	{
		outerRadius = h;
		innerRadius = outerRadius / 2;
	}
	
	Star.prototype.getCroppedImage = function()
	{
		var pixel = cropImage.data;
    
		var r = 0, g = 1, b = 2,a = 3;
		for (var p = 0; p < pixel.length; p += 4)
		{
		  if (
			  pixel[ p + r ] == 255 &&
			  pixel[ p + g ] == 255 &&
			  pixel[ p + b ] == 255 &&
			  pixel[p + a ] == 255
			  ) // if white then change alpha to 0
			{
				pixel[p + a] = 0;
			}
		}
		return cropImage;
	}
}