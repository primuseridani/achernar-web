function initImages() {
	let content = document.getElementById("content")!;

	let image_list  = Array.from(content.getElementsByTagName("x-image"));
	for (let image of image_list) {
		let file = image.getAttribute("data-file")!;
		console.log("initialising image that links to \"" + file + "\"");

		let source_url    = "/image/source/" + file + ".webp";
		let thumbnail_url = "/image/thumbnail/" + file + ".avif";

		let blur_element = document.createElement("img");
		blur_element.setAttribute("class", "blur");
		blur_element.setAttribute("src", thumbnail_url);

		image.appendChild(blur_element);

		let image_element = document.createElement("img");
		image_element.setAttribute("src", thumbnail_url);

		let hyperlink_element = document.createElement("a");
		hyperlink_element.setAttribute("href", source_url);
		hyperlink_element.setAttribute("rel", "noopener noreferrer");
		hyperlink_element.setAttribute("target", "_blank");
		hyperlink_element.appendChild(image_element);

		image.appendChild(hyperlink_element);
	}
}
