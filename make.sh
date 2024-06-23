#!/usr/bin/env sh

make_stylesheet() {
	input="css/${1}.scss"
	output="css/${1}.css"

	echo "making stylesheet at \"${output}\"..."
	sassc --style compressed "${input}" > "${output}"
}

make_script() {
	input="js/${1}.ts"
	output="js/${1}.js"

	echo "making script at \"${output}\"..."
	tsc --outFile "${output}" --target ES2022 "${input}"
}

make_stylesheet "main"

make_script "initImages"
