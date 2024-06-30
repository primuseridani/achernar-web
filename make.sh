#!/usr/bin/env sh

make_icon() {
	render_icon() {
		input="${1}"
		width="${2}"
		output="${3}"

		echo rendering icon at \"${input}\" as ${width}px by ${width}px to \"${output}\"
		inkscape -w ${width} -h ${width} "${input}" -o "${output}"
	}

	input="${1}"

	directory="$(mktemp -d)"

	render_icon "${input}" 16 "${directory}/16x16.png"
	render_icon "${input}" 24 "${directory}/24x24.png"
	render_icon "${input}" 32 "${directory}/32x32.png"
	render_icon "${input}" 48 "${directory}/48x48.png"
	render_icon "${input}" 64 "${directory}/64x64.png"
	render_icon "${input}" 96 "${directory}/96x96.png"
	render_icon "${input}" 128 "${directory}/128x128.png"
	render_icon "${input}" 192 "${directory}/192x192.png"
	render_icon "${input}" 256 "${directory}/256x256.png"

	echo combining renders in \"${directory}\" to \"${output}\"
	icotool -co "favicon.ico" "${directory}/"*".png"

	render_icon "${input}" 180 "apple-touch-icon.png"
}

make_stylesheet() {
	input="css/${1}.scss"
	output="css/${1}.css"

	echo making stylesheet at \"${output}\"...
	sass --no-source-map --style=compressed "${input}" "${output}"
}

make_script() {
	input="js/${1}.ts"
	output="js/${1}.js"

	echo making script at \"${output}\"...
	tsc --outFile "${output}" --target ES2022 "${input}"
}

#make_icon "svg/achernar-icon.svg"

make_stylesheet "main"
make_stylesheet "noScript"

make_script "getTheme"
make_script "initImages"
make_script "loadPage"
make_script "setNavBarState"
make_script "setTheme"
make_script "toggleNavBar"
make_script "toggleTheme"
