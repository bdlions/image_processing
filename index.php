<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.blockUI.js" ></script>
		
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/square.js"></script>
		<script type="text/javascript" src="js/star.js"></script>
		<script type="text/javascript" src="js/triangle.js"></script>
		<script type="text/javascript" src="js/circle.js"></script>
		<script type="text/javascript" src="js/common.js"></script>
		<link rel="stylesheet" href="css/form.css" />
		<link rel="stylesheet" href="css/jquery-ui.css" />
		 <style type="text/css">
		body 
		{
			 font-family: Arial, Neverwinter, lexograph, qlassik, UnrealT, yoster, Verdana, sans-serif, appleberry_with_cyrillic, dandelion_in_the_spring, english_essay, JandaElegantHandwriting, One_Starry_Night, Sweetly_Broken, where_stars_shine_the_brightest;
			 font-size: medium;
			 color: black
		}
		@font-face 
		{
			 font-family: lexograph;
			 src: url("font/lexograph.eot") /* EOT file for IE */
		}
		@font-face {
			 font-family: lexograph;
			 src: url("font/lexograph.ttf") /* TTF file for CSS3 browsers */
		}
		
		@font-face 
		{
			 font-family: Neverwinter;
			 src: url("font/Neverwinter.eot") /* EOT file for IE */
		}
		@font-face {
			 font-family: Neverwinter;
			 src: url("font/Neverwinter.ttf") /* TTF file for CSS3 browsers */
		}
		
		@font-face 
		{
			 font-family: qlassik;
			 src: url("font/qlassik.eot") /* EOT file for IE */
		}
		@font-face {
			 font-family: qlassik;
			 src: url("font/qlassik.ttf") /* TTF file for CSS3 browsers */
		}
		
		@font-face 
		{
			 font-family: UnrealT;
			 src: url("font/UnrealT.eot") /* EOT file for IE */
		}
		@font-face {
			 font-family: UnrealT;
			 src: url("font/UnrealT.ttf") /* TTF file for CSS3 browsers */
		}
		
		@font-face 
		{
			 font-family: yoster;
			 src: url("font/yoster.eot") /* EOT file for IE */
		}
		@font-face {
			 font-family: yoster;
			 src: url("font/yoster.eot") /* TTF file for CSS3 browsers */
		}
		@font-face {
			 font-family: appleberry_with_cyrillic;
			 src: url("font/appleberry_with_cyrillic.eot") /* EOT file for CSS3 browsers */
		}
		@font-face {
			 font-family: appleberry_with_cyrillic;
			 src: url("font/appleberry_with_cyrillic.ttf") /* TTF file for CSS3 browsers */
		}
		@font-face {
			 font-family: dandelion_in_the_spring;
			 src: url("font/dandelion_in_the_spring.eot") /* EOT file for CSS3 browsers */
		}
		@font-face {
			 font-family: dandelion_in_the_spring;
			 src: url("font/dandelion_in_the_spring.ttf") /* TTF file for CSS3 browsers */
		}
		@font-face {
			 font-family: english_essay;
			 src: url("font/english_essay.eot") /* EOT file for CSS3 browsers */
		}
		@font-face {
			 font-family: english_essay;
			 src: url("font/english_essay.ttf") /* TTF file for CSS3 browsers */
		}
		@font-face {
			 font-family: JandaElegantHandwriting;
			 src: url("font/JandaElegantHandwriting.eot") /* EOT file for CSS3 browsers */
		}
		@font-face {
			 font-family: JandaElegantHandwriting;
			 src: url("font/JandaElegantHandwriting.ttf") /* TTF file for CSS3 browsers */
		}
		@font-face {
			 font-family: One_Starry_Night;
			 src: url("font/One_Starry_Night.eot") /* EOT file for CSS3 browsers */
		}
		@font-face {
			 font-family: One_Starry_Night;
			 src: url("font/One_Starry_Night.ttf") /* TTF file for CSS3 browsers */
		}
		@font-face {
			 font-family: Sweetly_Broken;
			 src: url("font/Sweetly_Broken.eot") /* EOT file for CSS3 browsers */
		}
		@font-face {
			 font-family: Sweetly_Broken;
			 src: url("font/Sweetly_Broken.ttf") /* TTF file for CSS3 browsers */
		}
		@font-face {
			 font-family: where_stars_shine_the_brightest;
			 src: url("font/where_stars_shine_the_brightest.eot") /* EOT file for CSS3 browsers */
		}
		@font-face {
			 font-family: where_stars_shine_the_brightest;
			 src: url("font/where_stars_shine_the_brightest.ttf") /* TTF file for CSS3 browsers */
		}
		
		
	</style>
	</head>
	<body>
		<script type="text/javascript">
			function checkFileValidation()
			{
				//alert(document.getElementById('file_browse').files[0].type+document.getElementById('file_browse').files[0].size);
				if(document.getElementById('file_browse').files[0])
				{
					if(document.getElementById('file_browse').files[0].type.indexOf("image/") >= 0)
					{
						if(parseInt(document.getElementById('file_browse').files[0].size) < 3*1024*1024)
						{
							$.blockUI({ message: "<h1>Uploading image file.<br/>Please wait...</h1>", 
							css:{'width':'300px','height':'100px'}
							}); 
							document.getElementById('formname').submit();
						}
						else
						{
							alert("You are not alowed to upload an image with size more than 3MB");
						}
					}
					else
					{
						alert("Uploaded file is not an image.");
					}
				}
			}
		</script>
		<?php 
		//print_r($_POST);
		if(isset($_POST['file_name']))
		{
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = 'uploaded_image/'.uniqid().$_FILES['file']['name'];
			$fileSize = $_FILES['file']['size'];
			move_uploaded_file($tempFile, $fileName);
			
		}
		
		?>
		<table align="center" style="width:850px;height:400px">
			<tr>
				<td colspan="3">
					<div id="divImageCanvas" style="border: 1px black solid; height: 400px; width: 600px; display: block; margin-left: auto; margin-right: auto;">
						<canvas id="imageCanvas"> 
							Sorry, your browser doesn't support HTML5.
						</canvas>
					</div> 
				</td>
				<td style="width:150px;" valign='bottom'>
					<table>
						<tr>
							<td >
								<form id="formname" name="formname"  method="post" enctype="multipart/form-data">
									<div id='file_browse_wrapper'>
										<input type="hidden" name="file_name" id="file_name"/>
										<input type='file' name="file" id='file_browse' onchange="checkFileValidation()"/>
									</div>
								</form>
							</td>
						</tr>
						<tr>
							<td>
								<img src="images/save.jpg" onclick="saveCroppedImage()"></img> 
							</td>
						</tr>
							
					</table>
				</td>
			</tr>
			<tr align="center">
				<td>
					<img src="images/clockwiserotate.jpg" onclick="clockWiseRotateImage()"></img> 
					<img src="images/anticlockwise.jpg" onclick="antiClockWiseRotateImage()"></img> 
				</td>
				<td>
					<img src="images/zoomin.jpg" onclick="zoomInImage()"></img> 
					<img src="images/zoomout.jpg" onclick="zoomOutImage()"></img>
				</td>
				<td>
					<table>
						<tr>
							<td align = "center">
								<img src="images/small_square.jpg" onclick="setSelection('small_square')"></img>
							</td>
							<td align = "center">
								<img src="images/small_triangle.jpg" onclick="setSelection('small_triangle')"></img> 
							</td>
							<td align = "center">
								<img src="images/small_circle.jpg" onclick="setSelection('small_circle')"></img> 
							</td>
							<td align = "center">
								<img src="images/small_star.jpg" onclick="setSelection('small_star')"></img> 
							</td>
						</tr>
						<tr>
							<td align = "center">
								<img src="images/big_square.jpg" onclick="setSelection('big_square')"></img> 
							</td>
							<td align = "center">
								<img src="images/big_triangle.jpg" onclick="setSelection('big_triangle')"></img> 
							</td>
							<td align = "center">
								<img src="images/big_circle.jpg" onclick="setSelection('big_circle')"></img> 
							</td>
							<td align = "center">
								<img src="images/big_star.jpg" onclick="setSelection('big_star')"></img> 
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr style="color:blue;text-align:center">
				<td>Rotate</td>
				<td>Zoom</td>
				<td>Shapes</td>
			</tr>
			<tr style="color:blue;text-align:center">
			  <td><label>Write Comment</label>&nbsp;</td>
			  <td><label for="commentId"></label>
		      <input type="text" name="commentId" id="commentId" maxlength="20">
		      <input type="submit" name="previewId" id="previewId" value="Preview" onclick="changeFont()"></td>
			  <td><label for="fontId">Font</label>
			    <select name="fontId" id="fontId">
			      <option value="Arial">Arial</option>
			      <option value="Neverwinter">Neverwinter</option>
			      <option value="lexograph">lexograph</option>
			      <option value="qlassik">qlassik</option>
			      <option value="UnrealT">UnrealT</option>
				  <option value="yoster">yoster</option>
			      <option value="Verdana">Verdana</option>
			      <option value="sans-serif">sans-serif</option>
				  
				  <option value="appleberry_with_cyrillic">Appleberry</option>
				  <option value="dandelion_in_the_spring">Dandelion</option>
				  <option value="english_essay">Essay</option>
				  <option value="JandaElegantHandwriting">Elegant</option>
				  <option value="One_Starry_Night">Starry</option>
				  <option value="Sweetly_Broken">Sweetly</option>
				  <option value="where_stars_shine_the_brightest">Stars</option>
	            </select>
			    <label for="colorId">Color</label>
			    <select name="colorId" id="colorId">
			      <option value="Red">Red</option>
			      <option value="Green">Green</option>
			      <option value="Blue">Blue</option>
			      <option value="Black">Black</option>
				  <option value="Pink">Pink</option>
				  <option value="Yellow">Yellow</option>
				  <option value="Orange">Orange</option>
				  <option value="Brown">Brown</option>
				  <option value="Cyan">Cyan</option>
				  <option value="Gold">Gold</option>
				  
	            </select>
			    <label for="sizeId">Size</label>
			    <select name="sizeId" id="sizeId">
			      <option value="10">10pt</option>
			      <option value="11">11pt</option>
			      <option value="12">12pt</option>
			      <option value="13">13pt</option>
			      <option value="14">14pt</option>
				  <option value="15">15pt</option>
				  <option value="16">16pt</option>
			      <option value="17">17pt</option>
			      <option value="18">18pt</option>
			      <option value="19">19pt</option>
			      <option value="20">20pt</option>
				  <option value="21">21pt</option>
			      <option value="22">22pt</option>
			      <option value="23">23pt</option>
			      <option value="24">24pt</option>
				  <option value="25">25pt</option>
				  <option value="26">26pt</option>
			      <option value="27">27pt</option>
			      <option value="28">28pt</option>
			      <option value="29">29pt</option>
			      <option value="30">30pt</option>
				  <option value="31">31pt</option>
			      <option value="32">32pt</option>
			      <option value="33">33pt</option>
			      <option value="34">34pt</option>
				  <option value="35">35pt</option>
				  <option value="36">36pt</option>
			      <option value="37">37pt</option>
			      <option value="38">38pt</option>
			      <option value="39">39pt</option>
			      <option value="40">40pt</option>
				  
				  
	            </select></td>
		  </tr>
			<tr style="color:blue;text-align:center">
				<td colspan="3">
					<canvas id="labelImageCanvas" > 
						Sorry, your browser doesn't support HTML5.
					</canvas>
				</td>
			</tr>
		</table>
		
		
		<div id="savedModalWindow">
			<table style='width:100%; align:center'>
				<tr>
					<td align='center'>
						<img id="image_src" src=''></img><br/>
						<img id="label_src" src=''></img><br/>
						<input id="image_src_url" style='font-size:10pt;width:500px' type='text' value=''><br/>
						<input id="label_src_url" style='font-size:10pt;width:500px' type='text' value=''>
						</input>
					</td>
				</tr>
			</table>
		</div>
		
		<canvas id="savedImage" style="visibility: hidden;" >
		</canvas>
		
		
		
		<script type="text/javascript">
			var selected_shape_type     = "small";
			var small_square_height     = 100;
			var small_triangle_hand     = 120;
			var small_circle_radius     = 50;
			var small_star_outer_radius = 50;
			
			var rotateValue = 0;
			var scaleSize = 1;
			
			var imageStartX = 0;
			var imageStartY = 0;
			
			var dragStartX = 0;
			var dragStartY = 0;
			var selectionObject = null;
			
			var imageCanvas = null;
				
			var canvasContext = null;
			var problemImage = null;
			
			var labelImageCanvas;
			var labelImageContext;
		
			
			function changeFont()
			{
				var font_name_combo = document.getElementById("fontId"); 
				var font_name = font_name_combo.options[font_name_combo.selectedIndex].text;
				
				var font_size_combo = document.getElementById("sizeId"); 
				var font_size = font_size_combo.options[font_size_combo.selectedIndex].text;
				
				var text_color_combo = document.getElementById("colorId"); 
				var text_color = text_color_combo.options[text_color_combo.selectedIndex].text;
				
				var comment_text = document.getElementById("commentId").value;
				labelImageContext.font = font_size+" "+font_name;
				labelImageContext.fillStyle = text_color;
				var measure = labelImageContext.measureText(comment_text);
				//alert("Font width: "+measure.width);
				//alert("Font height: "+measure.height);
				labelImageCanvas.width = measure.width;
				labelImageCanvas.height = 80;
				labelImageContext.clearRect(0,0,labelImageCanvas.width,labelImageCanvas.height);
				labelImageContext.fillStyle = "rgba(0,0,0,0)";
				labelImageContext.fillRect(0,0,labelImageCanvas.width,labelImageCanvas.height);
				
				labelImageContext.font = font_size+" "+font_name;
				labelImageContext.fillStyle = text_color;
				
				
				labelImageContext.fillText(comment_text, 0, 40);
			}
			
			//select a tool
			function setSelection(toolName)
			{
				if(toolName == "small_square")
				{
					//when selected tool is small square
					selectionObject = new Square(canvasContext);
					selectionObject.setSize(small_square_height);
					selected_shape_type = "small";
				}
				else if(toolName == "big_square")
				{
					//when selected tool is big square
					selectionObject = new Square(canvasContext);
					selectionObject.setSize(small_square_height * 2);
					selected_shape_type = "big";
					
				}
				else if(toolName == "small_triangle")
				{
					//when selected tool is small triangle
					selectionObject = new Triangle(canvasContext);
					selectionObject.setSize(small_triangle_hand);
					selected_shape_type = "small";
				}
				else if(toolName == "big_triangle")
				{
					//when selected tool is big triangle
					selectionObject = new Triangle(canvasContext);
					selectionObject.setSize(small_triangle_hand * 2);
					selected_shape_type = "big";
				}
				else if(toolName == "small_circle")
				{
					//when selected tool is small circle
					selectionObject = new Circle(canvasContext);
					selectionObject.setSize(small_circle_radius);
					selected_shape_type = "small";
				}
				else if(toolName == "big_circle")
				{
					//when selected tool is big circle
					selectionObject = new Circle(canvasContext);
					selectionObject.setSize(small_circle_radius * 2);
					selected_shape_type = "big";
				}
				else if(toolName == "small_star")
				{
					//when selected tool is small star
					selectionObject = new Star(canvasContext);
					selectionObject.setSize(small_star_outer_radius);
					selected_shape_type = "small";
				}
				else if(toolName == "big_star")
				{
					//when selected tool is big star
					selectionObject = new Star(canvasContext);
					selectionObject.setSize(small_star_outer_radius * 2);
					selected_shape_type = "big";
				}
				
			}
			
			//when a page is loading
			window.onload = function()
			{
				
				$( "#savedModalWindow" ).dialog({
					autoOpen: false,
					width:"auto",
					height:"auto",
					modal: true,
					buttons: {
						"Ok": function() {
							$( this ).dialog( "close" );
						}
					},
					close: function() {
						
					}
				});
				
				
				labelImageCanvas = document.getElementById("labelImageCanvas");
				labelImageContext = labelImageCanvas.getContext("2d");
			
				//get the image canvas instance
				imageCanvas = document.getElementById("imageCanvas");
				
				
				//the image that will be edited
				problemImage = new Image();
				
				//when browser support canvas element
				//otherwise we do not need to execute code
				if(imageCanvas.getContext)
				{
					//canvas context
					canvasContext = imageCanvas.getContext('2d');
					
					var divImageCanvas = document.getElementById("divImageCanvas");
					
					
					
					//set canvas height and width
					imageCanvas.width = 600 ;
					imageCanvas.height = 400 ;
					
					//set canvas height and width
					//imageCanvas.width = 700;
					//imageCanvas.height = 700;
					
					//by default selected object is square
					selectionObject = new Circle(canvasContext);
					problemImage.onload = function()
					{
						//set the image start position x and y pos
						imageStartX = imageCanvas.width/2 - problemImage.width / 2;
						imageStartY = imageCanvas.height/2 - problemImage.height / 2;
						
						//canvasdrawing function is called every 10 milli seconds
						setInterval ('canvasDrawing()', 10);
					};
					
					//set the image
					
					problemImage.src = '<?php if(isset($fileName)) echo $fileName ?>'+"?src=" + new Date().getTime();
					
					//mouse move event
					imageCanvas.onmousemove = mouseMoveEvent;
					//mouse down event
					imageCanvas.onmousedown = mouseDownEvent;
					//mouse up event
					imageCanvas.onmouseup = mouseUpEvent;
					
				}
				
			}
			
			
			function mouseMoveEvent(event)
			{
				if(dragStartX > 0)
				{
					//calculate the new image start positoin
					
					imageStartX -= dragStartX - event.pageX;
					imageStartY -= dragStartY - event.pageY;
					
					//calculate new drag posiont
					dragStartX = event.pageX;
					dragStartY = event.pageY;
					
				}
			}
			
			function mouseDownEvent(event)
			{
				//calulate drag postion when mous is pressed
				dragStartX = event.pageX;
				dragStartY = event.pageY;
			}
			
			function mouseUpEvent(event)
			{
				//when mouse is up then recalculate the drag pos
				dragStartX = 0;
				dragStartY = 0;
			}
			
			function canvasDrawing()
			{
				//clear the whole canvas
				canvasContext.clearRect(0,0, imageCanvas.width, imageCanvas.height);
				//get the default canvas
				canvasContext.save();
				canvasContext.translate(imageCanvas.width/2,imageCanvas.height/2);
				//rotate if needed
				canvasContext.rotate(rotateValue*(Math.PI/180));
				//scale if needed
				canvasContext.scale(scaleSize, scaleSize);
				canvasContext.translate(-imageCanvas.width/2,-imageCanvas.height/2);
				//drawing the images
				canvasContext.drawImage(problemImage, imageStartX, imageStartY, problemImage.width, problemImage.height);
				//canvasContext.translate(-50,-50);
				//restore the canvas
				canvasContext.restore();
				
				//draw the selection object
				selectionObject.draw();
			}
			
					
			function clockWiseRotateImage()
			{
				//increasing the rotate value
				rotateValue += 5;
			}
			
			function antiClockWiseRotateImage()
			{
				//decreasing the rotate value
				rotateValue -= 5;
			}
			
			function zoomInImage()
			{
				//increasing the scale size
				if(scaleSize > 30)
				{ 
					scaleSize = scaleSize;
				}
				else 
				{
					scaleSize += .1;
				}
			}
			function zoomOutImage()
			{
				//desreasing the scale size
				if(scaleSize < .15)
				{ 
					scaleSize = scaleSize;
				}
				else 
				{
					scaleSize -= .1;
				}
			}
			
			function saveCroppedImage()
			{
				$.blockUI({ message: "<h1>Processing image file.<br/>Please wait...</h1>", 
				css:{'width':'300px','height':'100px'}
				}); 
				//save the image in a default localtion
				var tempCanvas = document.getElementById("savedImage");
				var tempCanvasContext = tempCanvas.getContext('2d');
				var imageData = labelImageContext.getImageData(0,0, labelImageCanvas.width, labelImageCanvas.height);
				Common.saveImage(selectionObject.getCroppedImage(), tempCanvasContext, imageData, labelImageContext);
				
				//var imageData = labelImageContext.getImageData(xPos,yPos, width, height);
				//Common.saveImage(imageData, labelImageCanvas);
				//Common.saveCommentImage(imageData, labelImageCanvas);
				
				
				
				
			}
			

			
		</script>				
	</body>
</html>