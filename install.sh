#!/usr/bin/env sh

DESTINATION="${1}"

if [ -z "${DESTINATION}" ]
then
	echo missing destination directory...
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
