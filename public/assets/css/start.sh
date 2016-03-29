#!/bin/sh

# Change all instances of ‘your-project’ to whatever you have named your
# project’s stylesheet, `cd` to the directory in which this file lives and
# simply run `sh watch.sh`.

# No minification
#sass --watch your-project.scss:your-project.css --style expanded/compressed

sass --watch sass/site.scss:site.min.css --style compressed

exit 0