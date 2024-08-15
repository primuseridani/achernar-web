<?php
	namespace ach;

	require "include/prelude.php";

	$current_page = read_config("p");

	// Remember to sanitise unsafe values.

	switch ($current_page) {
		case "achernar":
		case "agbsum":
		case "ax":
		case "backspace":
		case "benoit":
		case "bowshock":
		case "bzipper":
		case "deltaWorld":
		case "dux":
		case "eas":
		case "luma":
		case "pollex":
		case "u8c":
			break;

		case null:
			$current_page = "achernar";
			break;

		default:
			http_response_code(404);
			require "html/404.html";

			exit;
	};

	// Set up cache now.

	$cache_addr = "cache/" . $current_page . ".cache";
	maybe_use_cache($cache_addr);

	ob_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Gabriel Bjørnager Jensen">
		<meta name="darkreader-lock">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php
			[$title, $description, $keywords] = page_metadata($current_page);

			echo <<<HTML
				<meta name="description" content="$description">
				<meta name="keywords" content="$keywords">

				<title>$title</title>
			HTML;
		?>

		<link href="/favicon.ico" rel="icon" type="image/vnd.microsoft.icon">
		<link href="/apple-touch-icon.png" rel="apple-touch-icon" type="image/png">

		<link href="/css/normalise.css" rel="stylesheet" type="text/css">
		<link href="/css/font.css" rel="stylesheet" type="text/css">
		<link href="/css/main.css" rel="stylesheet" type="text/css">
		<noscript>
			<link href="/css/noScript.css" rel="stylesheet" type="text/css">
		</noscript>

		<script src="/js/main.js" type="text/javascript"></script>

		<style type="text/css">
			#header {
				--backgroundColour: <?php echo page_colours($current_page)[0x0] ?>;
				--textColour:       <?php echo page_colours($current_page)[0x1] ?>;

				<?php
					$background_image = match ($current_page) {
						"benoit" => "/svg/benoitBackground.svg",
						"dux"    => "/image/duxBackground.webp",
						default  => null,
					};

					if (!is_null($background_image)) {
						echo 'background-image: url("' . $background_image . '");';
					}
				?>
			}
		</style>
	</head>

	<body>
		<header id="header">
			<div id="navBar">
				<section>
					<?php add_nav_bar_link("ACHERNAR", "achernar"); ?>
				</section>

				<section>
					<?php
						add_nav_bar_link("BENOIT",             "benoit");
						add_nav_bar_link("BOWSHOCK",           "bowshock");
						add_nav_bar_link("DELTA&middot;WORLD", "deltaWorld");
						add_nav_bar_link("eAS",                "eas");
					?>
				</section>

				<section>
					<a id="themeToggler" onclick="Ach.toggleTheme();">TOGGLE THEME</a>
				</section>
			</div>

			<?php
				$glyphAddr = "/svg/glyph/" . $current_page . ".svg";

				echo "<img alt=\"$current_page\" id=\"glyph\" src=\"$glyphAddr\" />";
			?>
		</header>

		<div id="page">
			<?php require "include/" . $current_page . ".php" ?>
		</div>

		<footer id="footer">
			<div id="arabic" title="&#1570;&#1582;&#1616;&#1585; &#1575;&#1614;&#1604;&#1618;&#1606;&#1614;&#1607;&#1618;&#1585;&#1616;"></div>

			<p id="starDescription">&ldquo;ACHERNAR &mdash; type B star; primary component of ALPHA ERIDANI, i.e. ALPHA ERIDANI A; approx. (6) solar masses, (15) kilokelvin at surface; c. (3 668) light-seconds from sibling ALPHA ERIDANI B; no native lifeforms discovered on children, human life on terraformed ACHERNAR IV, a.k.a. CONVERSION.&rdquo;</p>

			<p>Communications can be done in English and Danish.</p>
			<br>
			<p>This webservice may be cloned from <a href="https://mandelbrot.dk/achernar/" rel="noopener noreferrer" target="_blank"><code>mandelbrot.dk</code></a>.</p>
			<br>
			<p id="cvrNumber">vat: DK44936429</p>
			<br>
			<div class="center" id="emailAddress" title="Obfuscated email address."></div>
			<br>
			<div id="socials">
				<a class="instagram" href="https://www.instagram.com/primuseridani/" title="Instagram: primuseridani"></a>
				<a class="linktree" href="https://linktr.ee/PrimusEridani/" title="Linktree: @PrimusEridani"></a>
				<a class="threads" href="https://www.threads.net/@primuseridani/" title="Threads: @primuseridani"></a>
				<a class="x" href="https://x.com/PrimusEridani/" title="X: @PrimusEridani"></a>
				<a class="youTube" href="https://youtube.com/@primuseridani/" title="YouTube: @PrimusEridani"></a>
			</div>
		</footer>
	</body>

	<script type="text/javascript">
		Ach.init();
	</script>
</html>

<?php
	$page_buffer = ob_get_contents();
	ob_end_clean();

	echo $page_buffer;
	dump_cache($cache_addr, $page_buffer);
?>
