function initImages() {
	let content = document.getElementById("content")!;

	let image_count = 0x0;
	let image_list  = Array.from(content.getElementsByTagName("x-image"));
	for (let image of image_list) {
		let file = image.getAttribute("data-file")!;
		console.log("initialising image that links to \"" + file + "\"");

		let image_element = document.createElement("img");
		image_element.setAttribute("src", "/webp/thumbnail/" + file + ".webp");

		let hyperlink_element = document.createElement("a");
		hyperlink_element.setAttribute("href", "/webp/source/" + file + ".webp");
		hyperlink_element.appendChild(image_element);

		image.appendChild(hyperlink_element);

		++image_count;
	}

	console.log("initialised (" + image_count + ") image(s)");
}
