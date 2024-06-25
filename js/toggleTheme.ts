/// <reference path="setTheme.ts" />

function toggleTheme() {
	let theme = localStorage.getItem("theme");

	if (theme == "light") {
		theme = "dark";
	} else if (theme == "dark") {
		theme = "light";
	} else {
		console.log!("invalid theme `" + theme + "`");

		// Use default:
		theme = "dark";
	}

	setTheme(theme);
}
