<html lang="en">
<head>
    <?php include('head.html'); ?>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">

    <title>Error</title>

    <style type="text/css">
        /*#error_image
        {
            display: block;
            margin: auto;
        }*/
       /* .col_md
        {
            color: white;
        }*/
        body{
            background-color: black;
        }
        
    </style>
</head>
<body>
	<div class="container" style="font-family: Jetbrains Mono; margin-top: 7%">

    	<div class="row">

    		<div class="col-sm" style="margin: auto;">
    		  <!-- <img id="error_image" src= "../img/error.webp" alt="error-image" height="200px" width="200px"> -->
              <video style="display: block; margin: auto; pointer-events: none;" width="200px" height="200px" autoplay><source src="vid.mp4" type="video/mp4"></video>
    		</div>

            <div class="col-md" style="color: white;" >
                <h1 style="margin-bottom: 20px; margin-top: 20px;" class="font-weight-bold text-*-left">Oops!</h1>
                <h2 id="error_code" class="text-danger font-weight-bold text-left">Error encountered.</h2>
                <h2 id="error_message" >That's all we know...</h2>
                <h3 style="margin-bottom: 20px;"><a href="mp/index.php">Return</a> to homepage.</h3>
            </div>

    	</div>

	</div>


    <script type="text/javascript">
    var error_code = 404;
    	if(error_code>399 && error_code<500){
    		document.getElementById("error_code").innerHTML = "Error "+ error_code;
    		document.getElementById("error_message").innerHTML = "Looks like the page went on vacation..."
    		document.getElementById("error_image").src = "../img/error_4.webp";
    	}
    	else if(error_code>499 && error_code<600){
    		document.getElementById("error_code").innerHTML = "Error "+ error_code;
    		document.getElementById("error_message").innerHTML = "Looks like one of the developer fell asleep...";
    		document.getElementById("error_image").src = "../img/error_5.webp"; 
    	}
    </script>
</body>
</html>