/// <reference path="setTheme.ts" />

function toggleTheme() {
	let theme: Theme = JSON.parse(localStorage.getItem("theme")!);

	if (theme == Theme.Light) {
		theme = Theme.Dark;
	} else if (Theme.Dark) {
		theme = Theme.Light;
	}

	setTheme(theme);
}
