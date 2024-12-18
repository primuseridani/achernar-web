namespace Ach {
	export async function init(): Promise<void> {
		let glyph = Ach.getOnlyElementIn(document, "glyph");

		let updateGlyph = (): void => {
			let isPortrait       = matchMedia("(orientation: portrait)").matches;
			let isReducedMotion = matchMedia("(prefers-reduced-motion)").matches;

			console.log("updating dynamic glyph");
			console.log(`note: configuration is { is_portrait: ${isPortrait}, isReducedMotion: ${isReducedMotion} }`);

			let newGlyphAddr: string;
			switch (true) {
			case isPortrait && isReducedMotion:
				newGlyphAddr = "/svg/glyph/achernarVertical.svg";
				break;

			case isPortrait && !isReducedMotion:
				newGlyphAddr = "/image/achernarVerticalAnimated.webp";
				break;

			case !isPortrait && !isReducedMotion:
				newGlyphAddr = "/image/achernarAnimated.webp";
				break;

			default:
				newGlyphAddr = "/svg/glyph/achernar.svg";
				break;
			}

			console.log(`note: new glyph is at "${newGlyphAddr}"`);
			glyph.setAttribute("style", `mask-image: url("${newGlyphAddr}");`);
		};

		updateGlyph();

		matchMedia("(orientation: portrait)").addEventListener( "change", updateGlyph);
		matchMedia("(prefers-reduced-motion)").addEventListener("change", updateGlyph);
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

Ach.init();
