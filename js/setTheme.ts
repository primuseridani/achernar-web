enum Theme {
	Light,
	Dark,
}

function setTheme(theme: Theme) {
	let is_valid_theme =
		theme == Theme.Light
		|| theme == Theme.Dark;

	if (!is_valid_theme) {
		console.log("invalid theme \"" + theme + "\"");

		// Use default:
		theme = Theme.Dark;
	}

	console.log("setting theme to `" + Theme[theme] + "`");

	let body = document.getElementById("body")!;
	body.setAttribute("data-theme", Theme[theme]);

	localStorage.setItem("theme", JSON.stringify(theme));
}
