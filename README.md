## Layoutr

Layoutr is a html layout collection for developer to collect html layouts for future use.

## How to Use

- Download it and extract to your localhost folder
- call the URL in your browser http://localhost/layoutr/
- you can specify the html layout by calling it in the first URI segment, 
  etc http://localhost/layoutr/homepage1
- The default style is Twitter Bootstrap. You can make your own style
  by adding it in themes/ folder and then edit your index.php line 
  $tpl->assign('theme', 'bootstrap'); to your theme folder name
- this application use [rainTPL](http://www.raintpl.com/) for template engine. 
  You can use all raiTPL features in your theme
