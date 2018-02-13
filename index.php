<?php
	require("config/config.php");
	require("lib/db.php");
	$conn = db_init($config["host"], $config["duser"], $config["dpwd"], $config["dname"]);
	$result = mysqli_query($conn, "select * from topic");

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf=8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="http://localhost/style2.css?ver=2">
</head>
<body id = "body">
	<div class="container">
		<header>
			<h1><a id='test' href="http://localhost/index.php">Donggyu's Park</a></h1>
		</header>
		<div class="row">
			<nav class = "col-12 col-md-3">
				<ol class="list-group">
					<?php
						while ($row = mysqli_fetch_assoc($result)) {
							# code...
							echo '<li class="list-group-item list-group-item-action"><a href="http://localhost/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>';
						}
					 ?>
				</ol>
			</nav>

		<!--
			<div id="control">
				<a href="http://localhost/write.php">write</a>
			</div>
		-->


			<article class = "col-12 col-md-8">
				<div class = "main">
				<?php

					if (empty($_GET['id'])==false) {
						# code...
						$sql =  "select topic.id, title,description, name from topic left join user on topic.author = user.id where topic.id = ".$_GET['id'];
						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_assoc($result);
						echo '<h1>'.htmlspecialchars($row['title']).'</h2>'."\n";
						echo '<p>writer: '.htmlspecialchars($row['name']).'</p>';
						echo strip_tags($row['description'], '<a><h1><h2><h3><h4><h5><ul><ol><li>');
					}

				 ?>
			 </div>

				<div id="disqus_thread"></div>
				<script>

				/**
				*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
				*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
				/*
				var disqus_config = function () {
				this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
				this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
				};
				*/
				(function() { // DON'T EDIT BELOW THIS LINE
				var d = document, s = d.createElement('script');
				s.src = 'https://donggyus-park.disqus.com/embed.js';
				s.setAttribute('data-timestamp', +new Date());
				(d.head || d.body).appendChild(s);
				})();
				</script>


			</article>
		</div>
  </div>



	<script src="http://localhost/script.js">
	</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a7ee6814b401e45400cd65d/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
