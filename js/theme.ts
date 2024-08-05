namespace Ach {
	export function toggleTheme(): void {
		let body = Ach.getFirstElementIn(document, "body");

		let theme = "light";
		if (body.classList.contains("light")) {
			theme = "dark";
		}

		console.log("setting theme to `" + theme + "`");

		body.classList.toggle("light");
		sessionStorage.setItem("theme", theme);
	}

	export function loadTheme(): void {
		let theme = sessionStorage.getItem("theme");

		if (!theme) {
			console.log("theme not set, using default");
			theme = defaultTheme();
		}

		switch (theme) {
		case "dark":
			// We already assume this theme in our stylesheets.
			break;

		case "light":
			let body = Ach.getFirstElementIn(document, "body");
			body.classList.add("light");

			break;

		default:
			console.log(`invalid theme \"${theme}\", using default`);
			//theme = DEFAULT_THEME; // Redundant now.

			break;
		}

		console.log(`note: theme is now \`${theme}\``);
	}

	function defaultTheme(): string {
		let hour = new Date().getHours();

		if (hour >= 0x6 && hour <= 0x12) {
			return "light";
		} else {
			return "dark";
		}
	}
}
