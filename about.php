<?php $pagename='ABOUT'; ?>



<!DOCTYPE html>
<html>
<head>
	<?php include 'components/head.html' ?>
	<title>About</title>

</head>
<body>
    <script type="text/javascript">
// var possibleEmoji = ['🍨','🐢','🍭','🎃','👻'];
var possibleEmoji = ['😴','🍔','☕','👨‍💻'];
document.body.addEventListener('click', function (event) {
  var randomNumber = Math.round(Math.random() * possibleEmoji.length);
  var span = document.createElement('span'); 
  span.textContent = possibleEmoji[randomNumber];
  span.className= 'emoji click-emoji';
  span.style.left = event.clientX + 'px';
  span.style.top = event.clientY + 'px'; 
  span.style.position = 'fixed';
  document.body.appendChild(span);                           
});
</script>
	<?php include 'components/header.php' ?>
	<div class="container-fluid" id="main-para">
        <div class="container" >
    	<h2><strong>About</strong></h2>
    	<p>This is a project based on content management system.</p>
        </div>
        <hr>
        <div class="container">
            <h4>Title:</h4>
            <p>Academic Publications Management System</p><br>

            <h4>Introduction:</h4>
            <p>This is a web-based Content Management System which manages publications, research papers, and projects by the college students, professors and alumni.</p><br>

            <h4>Platforms and Tools used:</h4>
            <p><b>Frontend: </b>HTML, CSS, Javascript and Bootstrap<br><b>Backend: </b>PHP v7.4 and <br><b>Database: </b>MySQL</p><br>

            <h4>References:</h4>
            <p>youtube.com<br>w3schools.com<br>php.net<br>flaticon.com</p>

        </div>
    </div>
    <?php include 'components/footer.html'  ?>



</body>
</html>