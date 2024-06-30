/// <reference path="setNavBarState.ts" />

function toggleNavBar() {
	let nav_bar = document.getElementById("navBar")!;

	let state = NavBarState[nav_bar?.getAttribute("data-state")!];

	if (state == NavBarState.Visible) {
		state = NavBarState.Hidden;
	} else if (state == NavBarState.Hidden) {
		state = NavBarState.Visible;
	};

	setNavBarState(state);
}
