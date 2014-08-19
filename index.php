<?php
$rate='<div id="title">Sample Title</div><div id="rate">
					<a href="#" id="thumbs-up"> Y </a> / <a href="#" id="thumbs-down"> N </a>
				</div>'?>
<html>
<head>
	<title>HomePage</title>
	<link rel="stylesheet" type="text/css" href="stylesheets\styles.css">
</head>
<body>
<div id="wrapper">
	<header><h1>Hydrangea Photo Album</h1>
		<div>User Name</div>
	</header>

	<main>
		<section class="albums" id="top-ranked">
			<div id="album">
                <?php echo $rate;?></div>
			<div id="album">
                <?php echo $rate;?></div>
			<div id="album">
                <?php echo $rate;?></div>
		</section>


		<section class="albums" id="regular">
			<div id="album"><?php echo $rate;?></div>
			<div id="album"><?php echo $rate;?></div>
			<div id="album"><?php echo $rate;?></div>
			<div id="album"><?php echo $rate;?></div>
			<div id="album"><?php echo $rate;?></div>
			<div id="album"><?php echo $rate;?></div>
			<div id="album"><?php echo $rate;?></div>
			<div id="album"><?php echo $rate;?></div>
			<div id="album"><?php echo $rate;?></div>
			<div id="album"><?php echo $rate;?></div>
			<div id="album"><?php echo $rate;?></div>
			<div id="album"><?php echo $rate;?></div>
		</section>
	</main>

	<footer>
		&copy;Footer here
	</footer>
</div>
</body>
</html>
