/// <reference path="init.ts" />
/// <reference path="navigation.ts" />
/// <reference path="theme.ts" />

namespace Ach {
	export function currentPage() {
		let body = Ach.getFirstElement(document, "body");
		let page = body.getAttribute("data-page");

		if (!page) {
			throw new Error("body does not specify page");
		}

		return page;
	}

	export function getFirstElement(dom: Document, tag: string): Element {
		let elements = dom.getElementsByTagName(tag);

		if (elements.length < 0x0) {
			throw new Error(`unable to find <${tag}> element`);
		}

		return elements[0x0];
	}

	export function getOnlyElement(dom: Document, id: string): Element {
		let element = dom.getElementById(id);

		if (!element) {
			throw new Error(`unable to find #${id} element`);
		}

		return element;
	}
}
