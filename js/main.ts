/// <reference path="theme.ts" />

namespace Ach {
	export async function init(): Promise<void> {
		Ach.loadTheme();

		let glyph = Ach.getOnlyElementIn(document, "glyph");
		let page  = glyph.getAttribute("alt");

		if (!page) {
			throw new Error('glyph does not specify page in "alt" attribute');
		}

		let portrait      = matchMedia("(orientation: portrait)");
		let reducedMotion = matchMedia("(prefers-reduced-motion)");

		let updateDynamicGlyph = (): void => {
			console.log("updating dynamic glyph");
			console.log(`note: configuration is { page: "${page}", portrait: ${portrait.matches}, reducedMotion: ${reducedMotion.matches} }`);

			let newGlyphAddr: string | undefined = undefined;
			switch (page) {
			case "achernar":
				switch (true) {
				case portrait.matches && reducedMotion.matches:
					newGlyphAddr = "/svg/glyph/achernarVertical.svg";
					break;

				case portrait.matches && !reducedMotion.matches:
					newGlyphAddr = "/image/achernarVerticalAnimated.webp";
					break;

				case !portrait.matches && reducedMotion.matches:
					newGlyphAddr = "/svg/glyph/achernar.svg";
					break;

				case !portrait.matches && !reducedMotion.matches:
					newGlyphAddr = "/image/achernarAnimated.webp";
					break;
				}

				break;

			default:
				break;
			}

			if (newGlyphAddr) {
				console.log(`note: new glyph is at "${newGlyphAddr}"`);

				glyph.setAttribute("src", newGlyphAddr);
			} else {
				console.log("note: no new glyph was found suitable");
			}
		};

		updateDynamicGlyph();

		portrait     .addEventListener("change", updateDynamicGlyph);
		reducedMotion.addEventListener("change", updateDynamicGlyph);
	}

	export function getFirstElementIn(dom: Document, tag: string): Element {
		let elements = dom.getElementsByTagName(tag);

		if (elements.length < 0x0) {
			throw new Error(`unable to find <${tag}> element`);
		}

		return elements[0x0];
	}

	export function getOnlyElementIn(dom: Document, id: string): Element {
		let element = dom.getElementById(id);

		if (!element) {
			throw new Error(`unable to find #${id} element`);
		}

		return element;
	}
}
