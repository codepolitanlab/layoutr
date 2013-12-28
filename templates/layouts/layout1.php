<!DOCTYPE html>
<html lang="en">
<head>
	{{ partials.metadata file=metadata }}
</head>
<body class="{{ boxed }}">
	<header>
		{{ partials.headers file=header }}
	</header>
	{{ partials.contents file=content }}
	{{ partials.footers file=footer }}
	{{ partials file="jsassets" }}
</body>
</html>
