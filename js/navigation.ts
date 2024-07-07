function toggleSideMenu() {
	let navBar   = document.getElementById("navBar");
	let sideMenu = document.getElementById("sideMenu");

	if (!navBar) {
		throw new Error("unable to find navigation bar");
	}

	if (!sideMenu) {
		throw new Error("unable to find side menu");
	}

	sideMenu.classList.toggle("visible");

	for (let link of navBar.getElementsByTagName("a")) {
		link.classList.toggle("hidden");
	}
}
