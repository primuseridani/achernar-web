async function loadPage(page_name: string, anchor?: string) {
	console.log(`loading page \`${page_name}\``);

	let url = `/html/${page_name}.html`;
	console.log(`note: page is at "${url}"`);

	window.history.pushState(page_name, "", url);

	let response = await fetch(url);

	if (!response.ok) {
		throw new Error(`unable to load page: \"${response.status}\"`);
	}

	let markup = await response.text();

	let parser = new DOMParser();
	let dom = parser.parseFromString(markup, "text/html");

	let titles = document.getElementsByTagName("title");
	let bodies = document.getElementsByTagName("body");
	let page   = document.getElementById("page")!;

	if (titles.length < 0x1) {
		throw new Error("unable to find title");
	}

	if (bodies.length < 0x1) {
		throw new Error("unable to find body");
	}

	if (!page) {
		throw new Error("unable to find page element");
	}

	let newTitles = dom.getElementsByTagName("title");
	let newPage   = dom.getElementById("page");

	if (newTitles.length < 0x1) {
		throw new Error("unable to find new title");
	}

	if (!newPage) {
		throw new Error("unable to find new page element");
	}

	titles[0x0].replaceWith(newTitles[0x0]);
	bodies[0x0].setAttribute("data-page", page_name);
	page.replaceWith(newPage);

	initImages();

	if (anchor) {
		console.log(`going to anchor \`${anchor}\``);

		anchor = `anchor.${anchor}`;

		console.log(`note: anchor has id "${anchor}"`);

		let anchor_element = document.getElementById(anchor);

		if (!anchor_element) {
			throw new Error(`unable to find anchor "${anchor}"`);
		}

		anchor_element.scrollIntoView({
			behavior: "smooth",
		});
	}
}

function toggleSideMenu() {
	scrollToTop();

	let sideMenu = document.getElementById("sideMenu");
	let navBar   = document.getElementById("navBar");
	let glyph    = document.getElementById("glyph");

	if (!sideMenu) {
		throw new Error("unable to find sideMenu");
	}

	if (!navBar) {
		throw new Error("unable to find navigation bar");
	}

	if (!glyph) {
		throw new Error("unable to find glyph");
	}

	sideMenu.classList.toggle("visible");
	glyph.classList.toggle("hidden");

	for (let link of navBar.getElementsByTagName("a")) {
		link.classList.toggle("hidden");
	}
}

async function scrollToTop() {
	window.scroll({
		top:      0,
		left:     0,
		behavior: "smooth",
	});
}

function initImages() {
	let page = document.getElementById("page");

	if (!page) {
		throw new Error("unable to find page");
	}

	let imageList = Array.from(page.getElementsByTagName("x-image"));

	for (let image of imageList) {
		let file = image.getAttribute("data-file");

		if (!file) {
			throw new Error("file not set for image element")
		}

		console.log("initialising image that links to \"" + file + "\"");

		let sourceUrl    = "/image/source/" + file + ".webp";
		let thumbnailUrl = "/image/thumbnail/" + file + ".avif";

		let blurElement = document.createElement("img");
		blurElement.setAttribute("class", "blur");
		blurElement.setAttribute("src",   thumbnailUrl);

		let hyperlinkElement = document.createElement("a");
		hyperlinkElement.setAttribute("href",   sourceUrl);
		hyperlinkElement.setAttribute("rel",    "noopener noreferrer");
		hyperlinkElement.setAttribute("target", "_blank");

		let image_element = document.createElement("img");
		image_element.setAttribute("src", thumbnailUrl);

		hyperlinkElement.appendChild(image_element);

		image.appendChild(blurElement);
		image.appendChild(hyperlinkElement);
	}
}
