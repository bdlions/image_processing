function Triangle(context)
{
	var canvasContext = context;
	var centerX ;
	var centerY;
	var hands = 120;
	var cropImage ;
	var height;
	
	Triangle.prototype.draw = function()
	{
		centerX = canvasContext.canvas.width / 2 ;
		centerY = canvasContext.canvas.height / 2 ;
		height = Math.floor(Math.sqrt(3 * hands * hands / 4));
		
		//saving default image
		var canvasImage = canvasContext.getImageData(0, 0, canvasContext.canvas.width, canvasContext.canvas.height);
		
		//draw triangle
		this.drawTriangle();
		
		//set transparency 100% so that only triangle portion will be visible
		Common.setTransparency(canvasContext, "255");
		
		//now we can see only triangle portion is visible and other part is invisible
		//so we can crop the image
		cropImage = canvasContext.getImageData(centerX - hands / 2, centerY - height / 2, hands, height);
		
		//set transparency nothing so that we can draw the image again
		Common.setTransparency(canvasContext, "0");
		//draw the saved image
		canvasContext.putImageData( canvasImage , 0, 0);
		//draw the triangle
		this.drawTriangle();
		//set some transparency so that the triangle portion is 100% visible and other part is partially visible
		Common.setTransparency(canvasContext, "0.5");
	}
	
	Triangle.prototype.drawTriangle = function()
	{
		canvasContext.beginPath();
		canvasContext.moveTo(centerX, centerY - height / 2);
		canvasContext.lineTo(centerX - hands / 2, centerY + height / 2);
		canvasContext.lineTo(centerX + hands / 2, centerY + height / 2);
		canvasContext.lineTo(centerX, centerY - height / 2);
		context.strokeStyle = "#000000";
		canvasContext.lineWidth = 2;
		canvasContext.closePath();
		context.stroke();
		
	}
	
	Triangle.prototype.setSize = function(h)
	{
		hands = h;
	}
	
	Triangle.prototype.getCroppedImage = function()
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