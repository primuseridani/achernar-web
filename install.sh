#!/usr/bin/env sh

DESTINATION="${1}"

if [ -z "${DESTINATION}" ]
then
	printf "missing destination directory...\n"
	printf "\n"
	printf "Usage:\n"
	printf "    install.sh <directory>\n"
	printf "\n"
	printf "Installs the server to the given directory.\n"

	exit 1
fi

mkdir -p "${DESTINATION}"

cp "apple-touch-icon.png" "${DESTINATION}"
cp "favicon.ico" "${DESTINATION}"

cp -r "font" "${DESTINATION}"
cp -r "html" "${DESTINATION}"
cp -r "image" "${DESTINATION}"
cp -r "include" "${DESTINATION}"
cp -r "svg" "${DESTINATION}"

mkdir -p "${DESTINATION}/css"
mkdir -p "${DESTINATION}/js"

cp "css/"*".css" "${DESTINATION}/css"
cp "js/"*".js" "${DESTINATION}/js"
