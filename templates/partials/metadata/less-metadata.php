<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

<title>Template &middot; Bootstrap</title>

<!-- Le styles -->
<link href="{$base_url}{$theme_path}css/styles/{$style}/bootstrap.css" rel="stylesheet">

{if condition="$layoutcss != null"}
<link href="{$base_url}{$theme_path}css/custom/layouts/{$layoutcss}.css" rel="stylesheet">
{/if}
{if condition="$headercss != null"}
<link href="{$base_url}{$theme_path}css/custom/headers/{$headercss}.css" rel="stylesheet">
{/if}
{if condition="$contentcss != null"}
<link href="{$base_url}{$theme_path}css/custom/contents/{$contentcss}.css" rel="stylesheet">
{/if}
{if condition="$footercss != null"}
<link href="{$base_url}{$theme_path}css/custom/footers/{$footercss}.css" rel="stylesheet">
{/if}

<link href="{$base_url}{$theme_path}css/font-awesome.css" rel="stylesheet">

<link href="{$base_url}{$theme_path}css/styles/{$style}/bootswatch.less" rel="stylesheet/less">

<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<script src="{$base_url}{$theme_path}js/jquery.js"></script>
<script src="{$base_url}{$theme_path}js/jquery.cookie.js"></script>
<script src="{$base_url}{$theme_path}js/less-1.5.0.min.js"></script>

