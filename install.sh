#!/usr/bin/env sh

DESTINATION="${1}"

if [ -z "${DESTINATION}" ]
then
	echo missing destination directory...
fi

mkdir -p "${DESTINATION}"

cp "apple-touch-icon.png" "${DESTINATION}"
cp "favicon.ico" "${DESTINATION}"

cp -r "html" "${DESTINATION}"
cp -r "shtml" "${DESTINATION}"
cp -r "svg" "${DESTINATION}"
cp -r "ttf" "${DESTINATION}"
cp -r "webp" "${DESTINATION}"

mkdir -p "${DESTINATION}/css"
mkdir -p "${DESTINATION}/js"

cp "css/"*".css" "${DESTINATION}/css"
cp "js/"*".js" "${DESTINATION}/js"
