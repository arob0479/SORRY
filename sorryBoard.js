			/**
				Sorry.gameBoard module
				Draws game board using html5 canvas.

			*/

			
			Sorry.gameBoard = (function(){
					
				var canvas = document.getElementById("myCanvas");
                var context = canvas.getContext("2d");
				
				var topLeftCornerX = 0;
				var topLeftCornerY = 0;
				
				//block dimensions
				var width = canvas.width/16;
				var  height = canvas.height/16;
				
				/*
					@param topLeftCornerX {Integer} top left corner of rectangle x coordinate
					@param topLeftCornerY {Integer} top left corner of rectangle y coordinate
					@param color {String} Fill color or rectangle
				*/
				function drawRect(topLeftCornerX, topLeftCornerY, color)
				{
					context.beginPath();
					context.rect(topLeftCornerX, topLeftCornerY, width, height);
					context.fillStyle = color;
					context.fill();
					context.lineWidth = 2;
					context.strokeStyle = "black";
					context.stroke();
				}
				
				function drawGrid(){
	
				
					//left Side
					for(i=0; i<16; i++)
					{
						drawRect(topLeftCornerX, topLeftCornerY,"white");
						topLeftCornerY += width;
					}
				
					//move up one square
					topLeftCornerY -= height;
							
					//bottom  
					for(i=0; i<16; i++)
					{
						drawRect(topLeftCornerX, topLeftCornerY,"white");
						topLeftCornerX += width;
					}
				
					//move left one
					topLeftCornerX -= width;
				
					//right (upwards)  
					for(i=0; i<16; i++)
					{
						drawRect(topLeftCornerX, topLeftCornerY,"white");
						topLeftCornerY -= height;
					}
				
					//move down 
					topLeftCornerY += height
				
					//top (leftward)  
					for(i=0; i<15; i++)
					{
						drawRect(topLeftCornerX, topLeftCornerY,"white");
						topLeftCornerX -= width;
					}

				}
				
				/*
					Draws booster/slider object

					@param x {Integer} Start Coordinate X
					@param y {Integer} Start coordinate Y
					@param x2 {Integer} End Coordinate X
					@param y2 {Integer} End Coordinate Y
					@param color {String} Booster color
				*/
				function drawBooster(x,y,x2,y2,color)
					{
						//line
						context.moveTo(x,y); //2nd block in
						context.lineTo(x2,y2);
						context.lineWidth = 2;
						context.stroke();

						//circle
						centerX = x2;
						centerY = y2;
						radius = (height / 2) - (height / 4);

						context.beginPath();
					    context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
					    context.fillStyle = color;
					    context.fill();
					    context.lineWidth = 2;
					    context.strokeStyle = "black";
					    context.stroke();

						//triangle
						padding = radius;
						context.moveTo(x-width/4,y-padding); //start from top left
						context.lineTo(x,y);
						context.lineTo(x-width/4,y+padding);
						context.lineTo(x-width/4,y-padding);

						context.fillStyle = color;
						context.strokeStyle = "black";
						context.lineWidth = 2;

						context.fill();
						context.stroke();
						context.closePath();

					}
					
				
				
				/*
					All boosters large and small
					Draws 8 total (2 per color)
				*/
				function drawAllBoosters() 
				{
					//small booster values
					var x = (width) * 1.5; //start 1.5 squares in
					var y = (height) / 2; //start 0.5 squares down
					var x2 = (width) * 4.5; //end at 4.5 squares
					var y2 = y;
					
					//large boosters
					var x3 = width * 9.5; //start 9 squares in
					var x4 = x3 + (width*4); //5 squares long
					var y3 = height/2;
					var y4 = y3;
					
					
					//GREEN
				 	drawBooster(x,y,x2,y2,"green");//small
					
					drawBooster(x3,y3,x4,y4,"green");//large
					
					//red
					context.translate(canvas.width/2,canvas.height/2); //center
					context.rotate(Math.PI / 2);
					context.translate(-canvas.width/2,-canvas.height/2);//top-left
						

				 	drawBooster(x,y,x2,y2,"red");
					drawBooster(x3,y3,x4,y4,"red");//large
					
					//blue
					context.translate(canvas.width/2,canvas.height/2); //center
					context.rotate(Math.PI / 2);
					context.translate(-canvas.width/2,-canvas.height/2);//top-left


				 	drawBooster(x,y,x2,y2,"blue");
					drawBooster(x3,y3,x4,y4,"blue");//large
					
					//yellow
					context.translate(canvas.width/2,canvas.height/2); //center
					context.rotate(Math.PI / 2);
					context.translate(-canvas.width/2,-canvas.height/2);//top-left


				 	drawBooster(x,y,x2,y2,"yellow");
					drawBooster(x3,y3,x4,y4,"yellow");//large


					
					//normalize
					
					context.translate(canvas.width/2,canvas.height/2); //center
					context.rotate(Math.PI / 2);
					context.translate(-canvas.width/2,-canvas.height/2);//top-left
				}	
				

				/*
					Starting circles
				*/
				function drawStart(){
					//green circle
					centerX = width *4.5;
					centerY = height*1.7;
					radius = (height /1.5) ;

					context.beginPath();
				    context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
				    context.fillStyle = "green";
				    context.fill();
				    context.lineWidth = 2;
				    context.strokeStyle = "black";
				    context.stroke();
				
					//red circle
					centerX = width *14.3;
					centerY = height*4.5;
					radius = (height /1.5) ;

					context.beginPath();
				    context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
				    context.fillStyle = "red";
				    context.fill();
				    context.lineWidth = 2;
				    context.strokeStyle = "black";
				    context.stroke();
				
					//blue circle
					centerX = width *11.5;
					centerY = height*14.3;
					radius = (height /1.5) ;

					context.beginPath();
				    context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
				    context.fillStyle = "blue";
				    context.fill();
				    context.lineWidth = 2;
				    context.strokeStyle = "black";
				    context.stroke();
				
					//yellow circle
					centerX = width *1.7;
					centerY = height*11.5;
					radius = (height /1.5) ;

					context.beginPath();
				    context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
				    context.fillStyle = "yellow";
				    context.fill();
				    context.lineWidth = 2;
				    context.strokeStyle = "black";
				    context.stroke();
				}
				
				/*
					Finish zones
					1 per color, 4 total
				*/
				function drawFinish(){
					//5sq 1c
					//Green
					x = width * 2 ;//top left
					y =  height; 
					
					for(i=0; i<5; i++){
						drawRect(x,y,"green");
						y+=height;
					}
					
					//green circle
					centerX = width * 2.5;
					centerY = height*6.8;
					radius = (height ) ;

					context.beginPath();
				    context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
				    context.fillStyle = "green";
				    context.fill();
				    context.lineWidth = 2;
				    context.strokeStyle = "black";
				    context.stroke();
				
					//red
					x = width * 14 ;//top left
					y =  height * 2; 
					
					for(i=0; i<5; i++){
						drawRect(x,y,"red");
						x-=width;
					}
					
					//red circle
					centerX = width * 9.2;
					centerY = height*2.5;
					radius = (height ) ;

					context.beginPath();
				    context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
				    context.fillStyle = "red";
				    context.fill();
				    context.lineWidth = 2;
				    context.strokeStyle = "black";
				    context.stroke();
					
					
					
					//blue
					x = width * 13;//top left
					y =  height * 14; 
					
					for(i=0; i<5; i++){
						drawRect(x,y,"blue");
						y-=height;
					}
					
					//blue circle
					centerX = width * 13.5;
					centerY = height*9.2;
					radius = (height ) ;

					context.beginPath();
				    context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
				    context.fillStyle = "blue";
				    context.fill();
				    context.lineWidth = 2;
				    context.strokeStyle = "black";
				    context.stroke();
				
					//yellow
					x = width * 1 ;//top left
					y =  height*13; 
					
					for(i=0; i<5; i++){
						drawRect(x,y,"yellow");
						x+=width;
					}
					
					//yellow circle
					centerX = width * 6.8;
					centerY = height*13.5;
					radius = (height ) ;

					context.beginPath();
				    context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
				    context.fillStyle = "yellow";
				    context.fill();
				    context.lineWidth = 2;
				    context.strokeStyle = "black";
				    context.stroke();
					
				}
				
				
			
				return {
						drawBoard: function(){
							drawGrid();
							drawAllBoosters();
							drawStart();
							drawFinish();
						}
						
				}
				
				})();