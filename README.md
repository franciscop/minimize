Combine and minimize
========
Combine different files and minimize the result. Works with CSS and javascript.

Usage
=====
You will need this php code:

if (file_exists('minimize.php')) =
  {
  include 'minimize.php';
  $Minimize = new Minimize();
  $Minimize->folder('/path/to/the/folder/','.css','/path/to/the/resulting/file/style.css');
  }
else
  echo 'The file was not found, please make sure it's in this folder';


Then, in your html, include the style.css resulting file in the header as normal
<link rel="stylesheet" href="http://example.org/style.css" type="text/css" media="screen">

Known bugs
=======
Comments SHOULD be in this format: /* Comment */. It doesn't work with comments like this: # comment or this: // comment
