#!/usr/bin/env sh

render_icon() {
	input="${1}"
	width="${2}"
	output="${3}"

	printf "rendering icon at \"%s\" as %ipx by %ipx to \"%s\"\n" "${input}" ${width} ${width} "${output}"
	inkscape -w ${width} -h ${width} "${input}" -o "${output}"
}

directory="$(mktemp -d)"
printf "using temporary directory at \"%s\"\n" "${directory}"

make_favicon() {
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

	output="favicon.ico"

	printf "combining renders in \"%s\" to \"%s\"\n" "${directory}" "${output}"
	icotool -co "${output}" "${directory}/"*".png"

	render_icon "${input}" 180 "apple-touch-icon.png"
}

make_stylesheet() {
	input="css/${1}.scss"
	output="css/${1}.css"

	printf "making stylesheet at \"%s\"...\n" "${output}"
	sass --no-source-map --style=compressed "${input}" "${output}"
}

make_script() {
	input="js/${1}.ts"
	output="js/${1}.js"

	printf "making script at \"%s\"...\n" "${output}"
	tsc --outFile "${output}" --target ES2022 "${input}"
}

if [ "${1}" != "--skip-icons" ]
then
	render_icon "svg/logo/achernarIcon.svg" 180 "apple-touch-icon.png"

	make_favicon "svg/favicon.svg"
fi

make_stylesheet "font"
make_stylesheet "index"
make_stylesheet "notFound"

make_script "main"
