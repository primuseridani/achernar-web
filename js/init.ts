namespace Ach {
	export async function init() {
		Ach.loadTheme();

		Ach.initImages();
		Ach.initLinks();

		window.addEventListener("popstate", (_e) => {
			location.reload();
		});
	}

	export async function initImages() {
		let page = Ach.getOnlyElement(document, "page");

		let imageList = Array.from(page.getElementsByTagName("x-image"));

		for (let image of imageList) {
			let alt  = image.getAttribute("alt");
			let file = image.getAttribute("data-file");

			if (!alt) {
				alert("stupid superuser forgot to add image caption, please notify");
				alt = "";
			}

			if (!file) {
				throw new Error("file not set for image element");
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
			image_element.setAttribute("alt", alt);
			image_element.setAttribute("src", thumbnailUrl);

			hyperlinkElement.appendChild(image_element);

			image.appendChild(blurElement);
			image.appendChild(hyperlinkElement);
		}
	}

	export async function initLinks() {
		console.log("initialising links");

		let stats = {
			total:         0x0,
			overrideCount: 0x0,
			currentCount:  0x0,
		};

		for (let link of document.getElementsByTagName("a")) {
			++stats.total;

			let address = link.getAttribute("href");

			if (!address) {
				console.log("note: skipping override of empty link");
				continue;
			}

			let pageAnchor = Ach.parseInternalLink(address);

			if (!pageAnchor) {
				console.log(`note: skipping override of link to "${address}"`);
				continue;
			}

			console.log(`note: overriding link to "${address}"`);
			++stats.overrideCount;

			let command = `Ach.loadPage(${JSON.stringify(pageAnchor[0x0])}, ${JSON.stringify(pageAnchor[0x1])})`

			link.removeAttribute("href");
			link.setAttribute("data-page", pageAnchor[0x0]);
			link.setAttribute("onclick", command);

			if (pageAnchor[0x1]) {
				link.setAttribute("data-anchor", pageAnchor[0x1]);
			}
		}

		let currentPage = Ach.currentPage();

		for (let link of document.getElementsByTagName("a")) {
			let page   = link.getAttribute("data-page");
			let anchor = link.getAttribute("data-anchor");

			if (page == currentPage && !anchor) {
				++stats.currentCount;
				link.setAttribute("aria-current", "page");
			} else {
				link.setAttribute("aria-current", "false");
			}
		}

		console.log(`note: initialised (${stats.total}) links`);
		console.log(`note: of which (${stats.overrideCount}) overrides were done`);
		console.log(`note: and of which (${stats.currentCount}) were marked as current`);
	}
}
