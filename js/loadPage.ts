/// <reference path="initImages.ts" />

async function loadPage(name: string) {
	console.log("loading page `" + name + "`")

	let url = `/html/${name}.html`;
	window.history.pushState("", "", url);

	let response = await fetch(url);

	if (!response.ok) {
		throw new Error(`unable to load page: \"${response.status}\"`);
	}

	let markup = await response.text();

	let parser = new DOMParser();
	let dom = parser.parseFromString(markup, "text/html");

	let title = document.getElementById("title")!;
	let body  = document.getElementById("body")!;
	let page  = document.getElementById("page")!;

	let new_title = dom.getElementById("title")!;
	let new_page  = dom.getElementById("page")!;

	title.replaceWith(new_title);
	body.setAttribute("data-page", name);
	page.replaceWith(new_page);

	initImages();
}
