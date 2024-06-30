/// <reference path="initImages.ts" />

async function loadPage(page: string) {
	console.log("loading page `" + page + "`")

	let url = `/html/${page}.html`;
	window.history.pushState("", "", url);

	let response = await fetch(url);

	if (!response.ok) {
		throw new Error(`unable to load page: \"${response.status}\"`);
	}

	let markup = await response.text();

	let parser = new DOMParser();
	let dom = parser.parseFromString(markup, "text/html");

	let title      = document.getElementById("title")!;
	let body       = document.getElementById("body")!;
	let content    = document.getElementById("content")!;

	let new_title      = dom.getElementById("title")!;
	let new_content    = dom.getElementById("content")!;

	title.replaceWith(new_title);
	body.setAttribute("data-page", page);
	content.replaceWith(new_content);

	initImages();
}
