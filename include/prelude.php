<?php
	function maybe_use_cache($addr, $lifetime = 0xE10) {
		if (file_exists($addr) && filemtime($addr) > time() - $lifetime) {
			echo file_get_contents($addr);

			exit;
		}
	}

	function dump_cache($addr, $buffer) {
		file_put_contents($addr, $buffer);
	}

	function read_config($key) {
		if (isset($_GET[$key])) {
			return htmlspecialchars($_GET[$key], ENT_SUBSTITUTE, "UTF-8");
		} else {
			return null;
		}
	}

	function page_colours($page) {
		return match ($page) {
			"achernar"   => ["#007B34", "#FFFFFF"],
			"agbsum"     => ["#4D4084", "#FFFFFF"],
			"ax"         => ["#4D4084", "#FFFFFF"],
			"backspace"  => ["#000000", "#FFFFFF"],
			"benoit"     => ["#BA0035", "#FFFFFF"],
			"bowshock"   => ["#B61833", "#FFEEE0"],
			"bzipper"    => ["#526F03", "#FFFFFF"],
			"deltaWorld" => ["#000000", "#FFFFFF"],
			"dux"        => ["#131313", "#06FBB2"],
			"eas"        => ["#01CD93", "#00291B"],
			"luma"       => ["#4D4084", "#FFFFFF"],
			"pollex"     => ["#4D4084", "#FFFFFF"],
			"u8c"        => ["#444747", "#A9E13D"],
			default      => die(),
		};
	}

	function page_metadata($page) {
		return match ($page) {
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
	}

	function add_nav_bar_link($title, $page) {
		global $current_page;

		$aria_current = match ($page) {
			$current_page => "page",
			default       => "false",
		};

		$id = match ($page) {
			"achernar" => "home",
			default    => "",
		};

		echo "<a aria-current=\"$aria_current\" href=\"?p=$page\" id=\"$id\">$title</a>";
	}

	function add_heading($title, $anchor) {
		$anchor = "anchor." . $anchor;

		echo "<h1 id=\"$anchor\"><a class=\"anchor\" href=\"#$anchor\" title=\"Anchor\"></a> $title</h1>";
	}

	function add_image($image, $alt) {
		$source_addr    = "/image/source/" . $image . ".webp";
		$thumbnail_addr = "/image/thumbnail/" . $image . ".avif";

		echo <<<HTML
			<div class="image">
				<img class="blur" src="$thumbnail_addr">
				<a href="$source_addr" rel="noopener noreferrer" target="_blank" title="Click to view image source.">
					<img alt="$alt" src="$thumbnail_addr">
				</a>
			</div>
		HTML;
	}
?>
