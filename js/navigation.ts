namespace Ach {
	export async function loadPage(page_name: string, anchor?: string) {
		console.log(`loading page \`${page_name}\``);

		window.scrollTo({
			top:      0.0,
			left:     undefined,
			behavior: "smooth",
		});

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

		let body = Ach.getFirstElement(document, "body");

		let title = Ach.getFirstElement(document, "title");
		let page  = Ach.getOnlyElement(document, "page");

		let newTitle = Ach.getFirstElement(dom, "title");
		let newPage  = Ach.getOnlyElement(dom, "page");

		title.replaceWith(newTitle);
		body.setAttribute("data-page", page_name);
		page.replaceWith(newPage);

		initImages();
		initLinks();

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

	export function toggleSideMenu() {
		window.scrollTo({
			top:      0.0,
			left:     undefined,
			behavior: "smooth",
		});

		let sideMenu = Ach.getOnlyElement(document, "sideMenu");
		let navBar   = Ach.getOnlyElement(document, "navBar");
		let glyph    = Ach.getOnlyElement(document, "glyph");

		sideMenu.classList.toggle("visible");
		glyph.classList.toggle("hidden");

		for (let link of navBar.getElementsByTagName("a")) {
			link.classList.toggle("hidden");
		}
	}

	export function parseInternalLink(address: string): [string, string | undefined] | undefined {
		let regex = /\/html\/([A-Za-z0-9]+)\.html(?:#([A-Za-z0-9]+)){0,1}/;
		let regex_result = regex.exec(address);

		if (!regex_result) {
			return;
		}

		let page   = regex_result[0x1];
		let anchor = regex_result[0x2];

		if (!page) {
			return;
		}

		return [page, anchor];
	}
}
