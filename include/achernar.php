<?php addHeading("The future is now", "about"); ?>

<section>
	<p><em>Achernar</em> is a European indie development studio based in the Capital Region of Denmark. &#127465;&#127472;</p>
	<br>
	<p>We aim to develop high-quality video games and software alike, and we believe that all technologies should be for humanity as a whole. We therefore publish all relevant source code for our products.</p>
	<br>
	<p class="note">See footer for contact information.</p>
</section>

<?php addHeading("Projects", "projects"); ?>

<section class="fullWidth">
	<p>The following is a list of our current and maintained projects.</p>
	<br>
	<p class="note">Scroll <a href="#anchor.vision">down</a> for more information about us.</p>
	<br>
	<div id="overview">
		<?php
			function addCard($page, $title) {
				[$backgroundColour, $textColour] = pageColours($page);
				$backgroundImage = pageBackgroundImage($page);
				$glyphAddr = pageGlyph($page);

				if (is_null($backgroundImage)) {
					$backgroundImage = "none";
				} else {
					$backgroundImage = "url('" . $backgroundImage . "')";
				}

				$cardStyle = "--backgroundColour: $backgroundColour; --textColour: $textColour; background-image: $backgroundImage";

				echo <<<HTML
					<a href="?p=$page" style="$cardStyle" title="$title">
						<img alt="$page" src="$glyphAddr">
					</a>
				HTML;
			}

			addCard("agbsum",     "agbsum");
			addCard("ax",         "AX");
			//addCard("backspace",  "Backspace");
			addCard("benoit",     "Benoit");
			addCard("bowshock",   "Bowshock");
			addCard("bzipper",    "Bzipper");
			//addCard("deltaWorld", "Delta&middot;World");
			addCard("dux",        "Dux");
			addCard("eas",        "eAS");
			addCard("luma",       "Luma");
			addCard("pollex",     "Pollex");
			addCard("u8c",        "u8c");
		?>
	</div>
</section>

<?php addHeading("Vision", "vision"); ?>

<section>
	<p>The goal of Achernar is to promote modern and robust software for everyone. In other words, our vision is to develop a human and clean industry and community for technology.</p>
	<br>
	<p>We believe in a society free of patents, and as such we release our scientific software in open-source form. For our games, we try to keep the base engine as open as possible whilst still keeping in mind that they yield our main income.</p>
</section>

<?php addHeading("Roadmap", "roadmap"); ?>

<section>
	<p>Currently, our roadmap is as follows:</p>
	<br>
	<ul>
		<li>
			<p>Complete the webservice before <strong>autumn, 2024</strong></p>
		</li>
		<li>
			<p>Release our first game by <strong>2024</strong>, as well as company merchandise in some form</p>
		</li>
		<li>
			<p>Release early-access for Bowshock (on Steam) by <strong>2025</strong></p>
		</li>
		<li>
			<p>Restructure to a normal sole proprietorship</p>
		</li>
	</ul>
	<br>
	<p>This roadmap is, however, also subject to change, altough we do strive to live up to it.</p>
</section>

<?php addHeading("Team", "team"); ?>

<section>
	<p>As Achernar is currently registered as a PMV (lesser sole proprietorship), Gabriel Bjørnager Jensen is currently our only member.</p>
</section>

<?php addHeading("Inception", "inception"); ?>

<section>
	<p><em>Achernar</em> was incorporated on the first july of 2024 by current sole proprietor Gabriel Bjørnager Jensen.</p>
	<br>
	<p>Our first domain &ndash; <code>achernar.dk</code> &ndash; was already registered in the winter of 2021, at that time being used for hosting on-line source code repositories. This was, however, quickly outsourced to <code><a href="https://mandelbrot.dk">mandelbrot.dk</a></code> after I had managed to secure that domain.</p>
	<br>
	<p><code>achernar.dk</code> was then, in the mean time, used for hosting a few look-up references. This mostly served as my own notes for school &ndash; mainly mathematics, physics, and chemistry &ndash; but quickly grew unorganised and unmaintained, although I did have plans to expand the encyclopedia.</p>
	<br>
	<p>The idea of a company had started in the spring of 2020. At that time it would've been named after the binary system Sheliak (Bayer: <code>&beta;&nbsp;Lyr&#230;</code>). But it was this idea that evolved into &ldquo;Achernar.&rdquo;</p>
	<br>
	<p>Shortly after being incorporated, we registered the domain <code>achernar.io</code>. At that time, we also set up mail services using our domain.</p>
</section>

<?php addHeading("Credits", "credits"); ?>

<section class="fullWidth">
	<p>Thanks to <strong>Nicolas Gallagher</strong> for the <a href="https://necolas.github.io/normalize.css/"><code>normalize.css</code></a> stylesheet. Additionally thanks to the following creators for the fonts which we use on our website:</p>
	<br>
	<ul>
		<li>
			<p>Carrois Apostrophe: <a href="https://fonts.google.com/specimen/Fira+Mono/"><span style="font-family: Fira Mono;">Fira Mono</span></a></p>
		</li>
		<li>
			<p>Roman Shamin & the &#8220;people&#8221; at Evil Martians &#128125;: <a href="https://fonts.google.com/specimen/Martian+Mono/"><span style="font-family: Martian Mono;">Martian Mono</span></a></p>
		</li>
		<li>
			<p>Sorkin Type: <a href="https://fonts.google.com/specimen/Merriweather/"><span style="font-family: Merriweather;">Merriweather</span></a></p>
		</li>
		<li>
			<p>Julieta Ulanovsky, Sol Matas, Juan Pablo del Peral, and Jacques Le Bailly: <a href="https://fonts.google.com/specimen/Montserrat/"><span style="font-family: Montserrat;">Montserrat</span></a></p>
		</li>
		<li>
			<p>Claus Eggers S&#248;rensen: <a href="https://fonts.google.com/specimen/Playfair+Display/"><span style="font-family: Playfair Display;">Playfair Display</span></a></p>
		</li>
		<li>
			<p>Matt McInerney, Pablo Impallari, and Rodrigo Fuenzalida: <a href="https://fonts.google.com/specimen/Raleway/"><span style="font-family: Raleway;">Raleway</span></a></p>
		</li>
	</ul>
</section>
