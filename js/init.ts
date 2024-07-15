/// <reference path="navigation.ts" />
/// <reference path="theme.ts" />

function init() {
	window.addEventListener("popstate", (_e) => {
		location.reload();
	});

	loadTheme();

	initImages();
}
