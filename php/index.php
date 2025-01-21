<?php
	namespace ach;

	require("prelude.php");

	// Set up cache now.

	$cache_addr = "../cache/index.html";
	use_cache($cache_addr);

	ob_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">

		<meta name="author" content="Gabriel Bjørnager Jensen">
		<meta name="darkreader-lock">
		<meta name="description" content="Achernar is a European indie game studio.">
		<meta name="keywords" content="achernar, fractals, game, open source, open-source, software, source code, video game">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Achernar</title>

		<link href="/favicon.ico" rel="icon" type="image/vnd.mxicrosoft.icon">
		<link href="/apple-touch-icon.png" rel="apple-touch-icon" type="image/png">

		<link href="/css/index.css" rel="stylesheet" type="text/css">
		<link href="/css/font.css" rel="stylesheet" type="text/css">
		<noscript>
			<link href="/css/noScript.css" rel="stylesheet" type="text/css">
		</noscript>

		<script src="/js/main.js" type="text/javascript" async></script>
	</head>

	<body>
		<header>
			<img alt="Achernar" id="glyph" />

			<div id="scrollNote"></div>
		</header>

		<main>
			<section>
				<?php add_heading("the future is now", "the-future-is-now") ?>

				<p><em>achernar</em> is a european indie game development studio based in the capital region of denmark, formally founded in the year 2024.</p>
				<br>
				<p>we believe in code quality and that transparency is a requisite for this. our products are open-source where we believe it is critical and otherwise source-available for third-party code review.</p>
			</section>

			<section>
				<?php add_heading("reinventing the wheel", "reinventing-the-wheel") ?>

				<p>this site is currently under reconstruction. please be patient with the final result.</p>
			</section>

			<section>
				<?php add_heading("site credits", "side-credits") ?>

				<p>thanks to carrois apostrophe for the <a href="https://bboxtype.com/typefaces/FiraMono/"><em>fira mono</em></a> font family.</p>
			</section>

			<!-- <div id="arabic"></div> -->
		</main>

		<footer>
			<div id="socials">
				<?php
					add_social("bluesky",  "https://bsky.app/profile/achernar.io/",      "Bluesky",  "@achernar.io");
					add_social("gitHub",   "https://github.com/primuseridani/",          "GitHub",   "@primuseridani");
					add_social("gitLab",   "https://gitlab.com/primuseridani/",          "GitLab",   "primuseridani");
					add_social("linktree", "https://linktr.ee/PrimusEridani/",           "Linktree", "PrimusEridani");
					add_social("mastodon", "https://mastodon.social/@primuseridani/",    "Mastodon", "@primuseridani@mastodon.social");
					add_social("reddit",   "https://www.reddit.com/user/PrimusEridani/", "Reddit",   "u/PrimusEridani");
					add_social("youTube",  "https://youtube.com/@primuseridani/",        "YouTube",  "@primuseridani");
				?>
			</div>
		</footer>
	</body>
</html>

<?php
	$page_buffer = ob_get_contents();
	ob_end_clean();

	echo $page_buffer;
	dump_cache($cache_addr, $page_buffer);
?>
