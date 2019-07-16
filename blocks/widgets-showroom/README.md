## Wordpress block

### [wordpress-name-id].admin.js
This file contains javascript code for UI on admin area to edit blocks interactively.

### [wordpress-name-id].php
Main block file to let know wordpress we have a new block for it and how to render it to html.
Should be "require_once" from `../../safervpn.php`

### [wordpress-name-id].vars.scss
SCSS variables for the CURRENT block only. Please use some unique prefix for SCSS variables.
Should be imported from `[wordpress-name-id].scss`

### [wordpress-name-id].scss
SCSS Styles for the block. Please use some unique prefix for BEM block to not conflict 
w/ other classes elsewhere 

### [wordpress-name-id].tpl.php
Template that renders html. Currently it's just php file, in future we may want to use
some template engine. Should be "require_once" from `[wordpress-name-id].php`