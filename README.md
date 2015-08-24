# Joomla 3 Template
## Purpose
*Work in progress.* 

This template is supposed to be a clean starting point using HTML5 Boilerplate as a guide. Goals of this template is to incorporate Bootstrap v3 rather than using v2 and focus on accessibility as much possible.

The Joomla Head Renderer has been copied and crudely modified to avoid overwriting core files in order to output a `<head>` more inline with H5BP including:
* Changed "self closing" tag i.e. `/>` to `>`
* HTML5 charset tag
* Commented out `<base>`
* Removed JavaScript files from output in order to add scripts before closing `</body>` tag

## To Do
* Determine best way to add final output
* Add parameter options for template
    * Options for a maximum of 2 Google Font

## Projects included
* [Bootstrap v3](http://getbootstrap.com/)
* [HTML5 Boilerplate](https://html5boilerplate.com/)
