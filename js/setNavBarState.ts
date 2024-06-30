enum NavBarState {
	Visible,
	Hidden,
}

function setNavBarState(state: NavBarState) {
	console.log("setting navigation bar to `" + NavBarState[state] + "`");

	let nav_bar   = document.getElementById("navBar")!;
	let hamburger = document.getElementById("hamburger")!

	nav_bar.setAttribute("data-state", NavBarState[state]);
	hamburger.setAttribute("data-navBarState", NavBarState[state]);
}
