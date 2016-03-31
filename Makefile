MW_INSTALL_PATH ?= ../..
MEDIAWIKI_LOAD_URL ?= http://localhost:8080/w/load.php

# mediawiki-vagrant default to hhvm rather than php5, which is mostly
# fine but really slow for commands like phplint
PHP=/usr/bin/php5

###
# Meta stuff
###

remotes:
	@scripts/remotecheck.sh

# code review/pull patches/etc from command line
gerrit: remotes
	@scripts/remotes/gerrit.py --project 'mediawiki/extensions/Echo' --gtscore -1 --ignorepattern 'WIP'

# interactively make sure en.json and qqq.json have all the
# same message keys
message: remotes
	@python scripts/remotes/message.py

# non-interactive version of message outputs result via exit code
messagecheck: remotes
	@python scripts/remotes/message.py check

###
# Lints
###
lint: jshint phplint checkless messagecheck

# Verify all php in the project has valid syntax
phplint:
	@find ./ -type f -iname '*.php' -print0 | xargs -0 -P 12 -L 1 ${PHP} -l

# Install nodejs dependencies for jshint
nodecheck:
	@which npm > /dev/null && npm install \
		|| (echo "You need to install Node.JS! See http://nodejs.org/" && false)

# Verify all javascript in the project has valid syntax and follows jshint rules
jshint: nodecheck
	@node_modules/.bin/jshint modules/ tests/qunit --config .jshintrc

# Verify all less files are compilable
checkless:
	@${PHP} ../../maintenance/checkLess.php

# Check compiled less files for duplicated rules
csscss: gems
	echo "Generating CSS file..."
	php scripts/generatecss.php ${MEDIAWIKI_LOAD_URL} /tmp/foo.css
	csscss -v /tmp/foo.css --num 2 --no-match-shorthand --ignore-properties=display,position,top,bottom,left,right

###
# Testing
###
test: phpunit

# Run the projects phpunit tests
phpunit:
	cd ${MW_INSTALL_PATH}/tests/phpunit && ${PHP} phpunit.php --configuration ${MW_INSTALL_PATH}/extensions/Echo/tests/echo.suite.xml --group=Echo

###
# Update this repository for csscss dependencies
###
gems:
	bundle install

