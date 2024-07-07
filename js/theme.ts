const DEFAULT_THEME = "dark";

function toggleTheme() {
	let bodies = document.getElementsByTagName("body");

	if (!bodies) {
		throw new Error("unable to find body");
	}

	let theme = "light";

	if (bodies[0x0].classList.contains("light")) {
		theme = "dark";
	}

	console.log("setting theme to `" + theme + "`");

	bodies[0x0].classList.toggle("light");
	localStorage.setItem("theme", theme);
}

function loadTheme() {
	let theme = localStorage.getItem("theme");

	if (!theme) {
		console.log("theme not set, using default");
		theme = DEFAULT_THEME;
	}

	switch (theme) {
	case "dark":
		// We assume this theme in our stylesheets.
		break;

	case "light":
		let bodies = document.getElementsByTagName("body");

		if (!bodies) {
			throw new Error("unable to find body");
		}

		bodies[0x0].classList.add("light");
		break;

	default:
		console.log(`invalid theme \"${theme}\", using default`);
		//theme = DEFAULT_THEME; // Redundant now.

		break;
	}
}
