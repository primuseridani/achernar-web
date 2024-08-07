<?php add_heading("Benoit", "about"); ?>

<section>
	<p><em>Benoit</em> is a Rust-written programme for visualising complex functions, e.g. <a href="https://en.wikipedia.org/wiki/Mandelbrot_set/"><em>the Mandelbrot Set</em></a> and similar fractals.</p>
	<br>
	<?php add_image("benoit_2024-04-06_11-35-23", "A render of a single Minibrot on a green background. The render is coloures so that it resembles lightning coming from the Minibrot.") ?>
	<br>
	<p>The project consists of the core <a href="https://crates.io/crates/benoit/"><code>benoit</code></a> crate, from which the front-ends <code>benoit-cli</code> and (in the future) <code>benoit-gui</code> derive.</p>
</section>

<?php add_heading("Features", "features"); ?>

<section>
	<p>The core library uses multi-threading for rendering the provided scenes. Internally, the <a href="https://crates.io/crates/rayon/">Rayon</a> crate is used for threadpooling and such, where each pixel on the canvas is a job in and of itself.</p>
	<br>
	<?php add_image("inverseJulia20231009200744", "An inverse Julia Set outside the Burning Ship fractal, resembling circles intertwined in a diamond shape with a dark red colour scheme.") ?>
	<br>
	<p>The <code><a href="#anchor.benoitCli">benoit-cli</a></code> front-end supports exporting to PNG. These images are saved with transparency and with sixteen bits per channel.</p>
</section>

<?php add_heading("benoit-cli", "benoitCli"); ?>

<section>
	<p>The <code>benoit-cli</code> executable can render and animate using <a href="https://en.wikipedia.org/wiki/TOML/">TOML</a> files right from the commandline.</p>
	<br>
	<?php add_image("benoit_2024-04-05_20-55-13", "A Julia Set centred on a point inside the Mandelbrot Set. The resulting image resembles creeping, black vines with rainbows around.") ?>
	<br>
	<p>The main use of <code>benoit-cli</code> is to render still images or animations of fractals, e.g. zoom-ins. An example configuration could look like the following:</p>
	<br>
	<p class="codeblock"># benoit.toml<br><br>[render]<br>count  = 24<br>width  = 1024<br>height = 1024<br><br>fractal = "mandelbrot"<br>inverse = false<br>julia   = false<br><br>[render.start]<br>frame = 0<br><br>max_iter_count = 0x100<br><br>centre = "0.0+1.0i"<br>seed   = "0.0+0.0i"<br>zoom   = "1.0"<br><br>colour_range = 64.0<br><br>[render.stop]<br>frame = 23<br><br>max_iter_count = 0x100<br><br>centre = "0.0+1.0i"<br>seed   = "0.0+0.0i"<br>zoom   = "1.0"<br><br>colour_range = 64.0<br><br>[final]<br>palette = "fire"<br><br>[output]<br>directory = "render/"</p>
	<br>
	<p>Just provide the path to the desired configuration:</p>
	<br>
	<p class="codeblock">$ benoit-cli "benoit.toml"</p>
</section>

<?php add_heading("benoit-gui", "benoitGui"); ?>

<section>
	<p>The <code>benoit-gui</code> executable, on the other hand, allows viewing fractals in realtime. Do note, however, that this front-end is currently unimplemented.</p>
	<br>
	<?php add_image("inverseJulia", "An inverse Julia Set just outside the Mandelbrot Set, with a surface resembling the bulb figures on the main cardioid's exterior.") ?>
	<br>
	<p>Until this front-end is implemented, please use version <a href="https://mandelbrot.dk/benoit/tag/?h=2.7.1"><code>2.7.1</code></a> of Benoit instead.</p>
</section>

<?php add_heading("Docs", "docs"); ?>

<section>
	<p>Documentation is written in source. Documentation for the main library is hosted on <a href="https://docs.rs/benoit/latest/benoit/"><code>docs.rs</code></a>.</p>
</section>
