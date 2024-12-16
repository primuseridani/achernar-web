<?php
	function use_cache($addr, $lifetime = 0xE10) {
		if (file_exists($addr) && filemtime($addr) > time() - $lifetime) {
			echo file_get_contents($addr);

			exit;
		}
	}

	function dump_cache($addr, $buffer) {
		file_put_contents($addr, $buffer);
	}

	function add_heading($title, $anchor) {
		$anchor = "a." . $anchor;

		echo "<h1 id=\"$anchor\"><a href=\"#$anchor\">$title</a></h1>";
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

	function add_social($id, $url, $sitename, $username) {
		echo <<<HTML
			<a href="${url}" id="s.${id}" rel="noopener noreferrer" title="${sitename}: ${username}"></a>
		HTML;
	}
?>
