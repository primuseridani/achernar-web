<?php require "include/prelude.php" ?>

<?php
	$currentPage = readConfig("p");

	// Remember to sanitise unsafe values.

	$currentPage = match ($currentPage) {
		"achernar",
		"agbsum",
		"ax",
		"backspace",
		"benoit",
		"bowshock",
		"bzipper",
		"deltaWorld",
		"dux",
		"eas",
		"luma",
		"pollex",
		"u8c",
		=> $currentPage,

		default => "achernar",
	};
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Gabriel Bjørnager Jensen">
		<meta name="darkreader-lock">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php
			[$title, $description, $keywords] = match ($currentPage) {
				"achernar" => [
					"Achernar",
					"Achernar is a Danish indie studio developing video games and open-source software.",
					"achernar, fractals, game, open source, open-source, software, video game",
				],

				"agbsum" => [
					"agbsum | Achernar",
					"agbsum is a CLI utility for patching AGB images.",
					"achernar, advance, agb, agbsum, cli, console, embedded, game, patch, terminal",
				],

				"ax" => [
					"AX | Achernar",
					"AX is a C framework for developing AGB apps.",
					"achernar, advance, agb, arm, assembly, ax, c, c++, cpp, cxx, thumb",
				],

				"backspace" => [
					"Backspace | Achernar",
					"About the Backspace game engine.",
					"achernar, backspace, game engine, rust, udp, webgpu",
				],

				"benoit" => [
					"Benoit | Achernar",
					"Benoit is a Rust-written fractal renderer.",
					"achernar, benoit, burning ship, cli, console, fractal, julia, mandelbrot, rust, terminal, tricorn, webgpu",
				],

				"bowshock" => [
					"Bowshock | Achernar",
					"About Bowshock.",
					"achernar, bowshock, dangerous, frontier, game, rust, open world, sci-fi, science fiction, space, video game",
				],

				"bzipper" => [
					"bzipper | Achernar",
					"bzipper is a Rust crate for serialisation and deserialisation of binary streams.",
					"achernar, binary, bzipper, deserialise, deserialiser, deserialize, deserializer, octet, serialize, serializer, serialize, serializer, tcp, udp",
				],

				"deltaWorld" => [
					"Delta&middot;World | Achernar",
					"About Delta World.",
					"achernar, adventure, delta world, open world, rust, webgpu",
				],

				"dux" => [
					"Dux | Achernar",
					"Dux is a cross-platform widgeting library for developing GUI applications.",
					"achernar, dux, multimedia, rust, webgpu, widget",
				],

				"eas" => [
					"eAS | Achernar",
					"eAS is an assembler for cross-compiling to Arm ISAs.",
					"achernar, agb, arm, as, asm, assembler, assembly, eas, embedded, risc, thumb",
				],

				"luma" => [
					"Luma | Achernar",
					"Luma is an emulator for the AGB line of devices.",
					"achernar, agb, arm, emulator, luma, rust, thumb",
				],

				"pollex" => [
					"Pollex | Achernar",
					"Pollex is a Rust crate for manipulating Arm ISA instructions.",
					"achernar, agb, arm, pollex, rust, thumb",
				],

				"u8c" => [
					"u8c | Achernar",
					"u8c is a library for handling Unicode sequences in C.",
					"achernar, u8c, unicode, utf, utf-16, utf-32, utf-8, utf16, utf32, utf8",
				],

				default => die(),
			};

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
				--backgroundColour: <?php echo pageColours($currentPage)[0x0] ?>;
				--textColour:       <?php echo pageColours($currentPage)[0x1] ?>;

				<?php
					$backgroundImage = match ($currentPage) {
						"benoit" => "/svg/benoitBackground.svg",
						"dux"    => "/image/duxBackground.webp",
						default  => null,
					};

					if (!is_null($backgroundImage)) {
						echo 'background-image: url("' . $backgroundImage . '");';
					}
				?>
			}
		</style>
	</head>

	<body>
		<header id="header">
			<div id="navBar">
				<?php
					function addNavBarLink($title, $page) {
						global $currentPage;

						$ariaCurrent = "false";
						if ($page == $currentPage) {
							$ariaCurrent = "page";
						}

						$id = match ($page) {
							"achernar" => "home",
							default    => "",
						};

						echo "<a aria-current=\"$ariaCurrent\" href=\"?p=$page\" id=\"$id\">$title</a>";
					}
				?>

				<section>
					<?php addNavBarLink("ACHERNAR", "achernar"); ?>
				</section>

				<section>
					<?php
						addNavBarLink("BENOIT",             "benoit");
						addNavBarLink("BOWSHOCK",           "bowshock");
						addNavBarLink("DELTA&middot;WORLD", "deltaWorld");
						addNavBarLink("eAS",                "eas");
					?>
				</section>

				<section>
					<a id="themeToggler" onclick="Ach.toggleTheme();">TOGGLE THEME</a>
				</section>
			</div>

			<?php
				$glyphAddr = "/svg/glyph/" . $currentPage . ".svg";

				echo "<img alt=\"$currentPage\" id=\"glyph\" src=\"$glyphAddr\" />";
			?>
		</header>

		<div id="page">
			<?php require "include/" . $currentPage . ".php" ?>
		</div>

		<footer id="footer">
			<div id="romanisation" title="&#1570;&#1582;&#1616;&#1585; &#1575;&#1614;&#1604;&#1618;&#1606;&#1614;&#1607;&#1614;&#1585;"></div>

			<p id="starDescription">ACHERNAR &mdash; Type B star; primary component of ALPHA ERIDANI; approx. (6) solar masses, (15) kilokelvin at surface; c. (140) light years from SOL III; no native lifeforms discovered, human life on terraformed ACHERNAR IV.</p>

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
			</div>
		</footer>
	</body>

	<script type="text/javascript">
		Ach.init();
	</script>
</html>
