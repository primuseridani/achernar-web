<?php
	function readConfig($key) {
		if (isset($_GET[$key])) {
			return htmlspecialchars($_GET[$key], ENT_SUBSTITUTE, "UTF-8");
		} else {
			return null;
		}
	}

	function pageColours($page) {
		return match ($page) {
			"achernar"   => ["#007B34", "#FFFFFF"],
			"agbsum"     => ["#4D4084", "#FFFFFF"],
			"ax"         => ["#4D4084", "#FFFFFF"],
			"backspace"  => ["#000000", "#FFFFFF"],
			"benoit"     => ["#BA0035", "#FFFFFF"],
			"bowshock"   => ["#B61833", "#FFEEE0"],
			"bzipper"    => ["#FFFFFF", "#B4202D"],
			"deltaWorld" => ["#000000", "#FFFFFF"],
			"dux"        => ["#131313", "#06FBB2"],
			"eas"        => ["#01CD93", "#00291B"],
			"luma"       => ["#4D4084", "#FFFFFF"],
			"pollex"     => ["#4D4084", "#FFFFFF"],
			"u8c"        => ["#444747", "#A9E13D"],
			default      => die(),
		};
	}

	function addHeading($title, $anchor) {
		$anchor = "anchor." . $anchor;

		echo "<h1 id=\"$anchor\"><a class=\"anchor\" href=\"#$anchor\" title=\"Anchor\"></a> $title</h1>";
	}

	function addImage($image, $alt) {
		$sourceAddr    = "/image/source/" . $image . ".webp";
		$thumbnailAddr = "/image/thumbnail/" . $image . ".avif";

		echo <<<HTML
			<div class="image">
				<img class="blur" src="$thumbnailAddr">
				<a href="$sourceAddr" rel="noopener noreferrer" target="_blank" title="Click to view image source.">
					<img alt="$alt" src="$thumbnailAddr">
				</a>
			</div>
		HTML;
	}
?>
