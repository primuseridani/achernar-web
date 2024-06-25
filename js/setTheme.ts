function setTheme(theme: string) {
	console.log("setting theme to `" + theme + "`");

	let body = document.getElementById("body")!;
	body.setAttribute("data-theme", theme);

	localStorage.setItem("theme", theme);
}
