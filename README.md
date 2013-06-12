## Layoutr

Layoutr is a html layout collection for developer to collect html layouts for future use.

## How to Use

- Download it and extract to your localhost folder
- call the URL in your browser http://localhost/layoutr/
- you can specify the html layout by calling it in the first URI segment, 
  etc http://localhost/layoutr/layout1
- There are 3 default partial in layout: header, content, and footer .
  You can acccess it with query string like this http://localhost/layoutr/layout1/?h=header1&c=3col&f=footer2
- The default style is Twitter Bootstrap. You can make your own style
  by adding it in themes/ folder and then edit your index.php line 
  $tpl->assign('theme', 'bootstrap'); to your theme folder name
- this application use [rainTPL](http://www.raintpl.com/) for template engine. 
  You can use all raiTPL features in your theme

## Add new Layout

You can add new layout by making new html layout files in template/layouts/ folder.
For uniformity, named your layout by adding prefix 'layout' e.g. layout1.html, layout2-fluid.html

## Add new Partial

You can add partial layout for common use in template/partials/.
The default place for header is template/partials/headers/, contents is in template/partials/contents/ 
and footers is in template/partials/footers/. Besides those, you can make your own folder or place in template/partials/components/.
You can embed your partials in your main layout with tag {include="partials/[your-partial]"} e.g. {include="partials/headers/header1"}.

## Using Switcher

Switcher automatically detect layouts, headers, contents and footers from their folders and show them as a choices in switcher panel. You can add switcher in every layout by embedding {include="switcher"}. By default, switcher panel has been embedded in jsassets.html, so you only have to embed jsassets in your all layout.

## Add new style

This application uses Twitter Bootstrap CSS Framework, so you can directly add new bootstrap style by putting it in themes/bootstrap/css/styles/.