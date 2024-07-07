# achernar

This repository contains the source code for [Achernar's webservice](https://achernar.dk) at `https://achernar.dk`.

## Testing

Use the installation script at `install.sh` to install the server.

If using nginx, add the following server to your configuration (assuming installation at `/srv/achernar`):

```
server {
	listen      8080;
	server_name localhost;

	location = / {
		return 307 /html/achernar.html;
	}

	location = /apple-touch-icon.png {
		alias /srv/achernar/apple-touch-icon.png;
	}

	location = /favicon.ico {
		alias /srv/achernar/favicon.ico;
	}

	location /css {
		alias /srv/achernar/css;
	}

	location /font {
		alias /srv/achernar/font;
	}

	location /html {
		alias /srv/achernar/html;
		ssi   on;
	}

	location /image {
		alias /srv/achernar/image;
	}

	location /include {
		alias /srv/achernar/include;
	}

	location /js {
		alias /srv/achernar/js;
	}

	location /svg {
		alias /srv/achernar/svg;
	}
}
```
