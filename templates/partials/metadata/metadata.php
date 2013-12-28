    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Template &middot; Bootstrap</title>

    <!-- Le styles -->
    <link href="{{ theme_path }}bootstrap/css/styles/{{ style }}/bootstrap.css" rel="stylesheet">
    
    {{ if layoutcss }}
    <link href="{{ theme_path }}bootstrap/css/custom/layouts/{{ layoutcss }}.css" rel="stylesheet">
    {{ endif }}
    {{ if headercss != null }}
    <link href="{{ theme_path }}bootstrap/css/custom/headers/{{ headercss }}.css" rel="stylesheet">
    {{ endif }}
    {{ if contentcss != null }}
    <link href="{{ theme_path }}bootstrap/css/custom/contents/{{ contentcss }}.css" rel="stylesheet">
    {{ endif }}
    {{ if footercss != null }}
    <link href="{{ theme_path }}bootstrap/css/custom/footers/{{ footercss }}.css" rel="stylesheet">
    {{ endif }}

    <link href="{{ theme_path }}bootstrap/css/font-awesome.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{ theme_path }}bootstrap/js/jquery.js"></script>
    <script src="{{ theme_path }}bootstrap/js/jquery.cookie.js"></script>