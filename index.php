<?php
$rate = '<div id="title">Sample Title</div><div id="rate">
					<a href="#" id="thumbs-up"> Y </a> / <a href="#" id="thumbs-down"> N </a>
				</div>';
$linkToAlbum = '<a id="linkToAlbum" href="test.php"></a>'; //link to the album
?>
    <html>
    <head>
        <title>HomePage</title>
        <link rel="stylesheet" type="text/css" href="stylesheets\styles.css">
    </head>
    <body>
    <div id="wrapper">
        <header><h1>Hydrangea Photo Album</h1>

            <div>
                <form method="GET"><input type="text" name="username" placeholder="User Name"/></form>
            </div>
        </header>

        <main>
            <section class="albums" id="top-ranked">
                <div id="album">
                    <?php echo $rate . $linkToAlbum; ?></div>
                <div id="album">
                    <?php echo $rate . $linkToAlbum; ?></div>
                <div id="album">
                    <?php echo $rate . $linkToAlbum; ?></div>
            </section>

            <section class="albums" id="regular">
                <div id="addAlbum"><a href="#"><span>+</span></a></div>
                <div id="album"><?php echo $rate . $linkToAlbum; ?></div>
                <div id="album"><?php echo $rate . $linkToAlbum; ?></div>
                <div id="album"><?php echo $rate . $linkToAlbum; ?></div>
                <div id="album"><?php echo $rate . $linkToAlbum; ?></div>
                <div id="album"><?php echo $rate . $linkToAlbum; ?></div>
                <div id="album"><?php echo $rate . $linkToAlbum; ?></div>
                <div id="album"><?php echo $rate . $linkToAlbum; ?></div>
                <div id="album"><?php echo $rate . $linkToAlbum; ?></div>
                <div id="album"><?php echo $rate . $linkToAlbum; ?></div>
                <div id="album"><?php echo $rate . $linkToAlbum; ?></div>
                <div id="album"><?php echo $rate . $linkToAlbum; ?></div>
            </section>
        </main>

        <footer>
            &copy;Footer here
        </footer>
    </div>
    </body>
    </html>

<?php
$sessionid = session_id();
if ($sessionid == '') session_start();
if (!isset($_SESSION['username'])) {
    session_regenerate_id(true);
    if (isset($_GET["username"])) {
        echo "is not set";
        $_SESSION['username'] = $_GET["username"];
    }
}
$_SESSION['sessionid'] = session_id();
echo $_SESSION['username'];
?>