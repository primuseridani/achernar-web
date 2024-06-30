/// <reference path="setTheme.ts" />

function getTheme(): Theme {
	let theme = Theme.Dark;

	try {
		theme = JSON.parse(localStorage.getItem("theme")!);
	} catch (e: any) {
		console.log("invalid theme, using dark");
	}

	return theme;
}
