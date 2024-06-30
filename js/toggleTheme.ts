/// <reference path="getTheme.ts" />
/// <reference path="setTheme.ts" />

function toggleTheme() {
	let theme = getTheme();

	if (theme == Theme.Light) {
		theme = Theme.Dark;
	} else if (Theme.Dark) {
		theme = Theme.Light;
	}

	setTheme(theme);
}
