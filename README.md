Welcome to Mxious
=================
[![Build Status](https://travis-ci.org/Alphasquare/Mxious-src.svg?branch=development)](https://travis-ci.org/Alphasquare/Mxious-src)  [![Code Climate](https://codeclimate.com/github/Alphasquare/Mxious-src/badges/gpa.svg)](https://codeclimate.com/github/Alphasquare/Mxious-src)

Mxious is a social music discovery engine.

Installing
==========
To install an instance of Mxious, via Terminal, do

    cd project-path`
Then,

    composer install
 
It will automatically find, download, and update dependencies. 
Before contributing
====================
Before contributing, please read the Contributing standards found in
https://github.com/Alphasquare/Mxious/wiki/Code-Quality-&-Formatting-Guide.
We don't accept any pull requests/commits that do not comply with these standards. 
Failure to comply with these standards multiple times may cause:

	1. Rejection of your pull request
	2. Reverts of commits
	3. Thermonuclear war
	4. Removal of Contributors team
	5. Rejection of repository permissions.

Please try to comply. 


Build status
===============
Not a single line of code is here yet so no builds yet.

Conflicts
===============
Currently there is an ongoing conflict with any Auth class installed from PEAR. Most XAMPP installations come with this by default, therefore causing exceptions. Please remove this library, in the Linux case the path to the file is /opt/lampp/lib/php/Auth.php. Using root privileges delete the whole file, preferably erase it's contents.


Social
===============
Check out the website `alphasquare.us` for social discussion of Mxious.

Warning
===============

Things in the ``development`` branch are extremely unstable. Not for production. Please use files from ``master`` branch instead.

Setup
===============

To set it up, just download the source and place it anywhere, preferably the root.
Then, you can develop and extend it. 

Extend
===============
The wiki will expand on this. 

Documentation
===============

Documentation will come when enough code has been implemented to come up with a sizable amount of documentation.
