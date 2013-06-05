temple
======

A simple template theme for WordPress designed to be a solid starting point for theme developers!


## Features

- HTML5 doctype and syntax

- Bear minimum CSS

-- a basic responsive layout using percentage based max/min widths (from 1200px down to 600px)
--- you will need to add your own media queries and styles for mobile content

-- pure CSS driven cascading menu system
--- tested only to 3 levels deep (drop > side > side)
--- NOT tested across all browers (yet) >> see "TODO" section
--- currentrly uses some CSS3 styling (un-essential to function)

- Breadcrumb navigation links

- 2 custom sidebars (content-area and footer-area)

- Microformats applied to appropriate data (e.g. post meta-data, author data etc.)

- Pre-developed `functions.php` file using established name_prefixing and hook/action methodologies
-- designed for you to add to it as you see fit but there's enough to get you off to a good start


### Details

Temple is intended to be a minimialist but functional starting point for theme developmers
My aim is to help to avoid a lot of the repetitive 'basics' that are common to (almost) ALL themes!


#### TODO

- Test current functionality across all major/modern browsers (HTML5/CSS3 support only, no OLD IEs!!)
- Add CSS3 transitions to cascading menu
- Develop general layout templates (e.g. `category.php`, `tag.php`, `author.php` etc.)
- Enhance features for custom sidebars


#### History

v1.0	- Initial release --
		Just the "bare minimum" template with only the main `index.php` file for layout,
		a header and footer, a couple of custom sidebars, purely functional CSS and an established `functions.php` file.



Copyright © 2013 Christopher Leaper
Licensed under the terms of the [GNU General Public License (GPLv3)][1]

	[1]: http://www.gnu.org/licenses/gpl-3.0.html