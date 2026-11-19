'use strict';

const { defineConfig, globalIgnores } = require( 'eslint/config' );
const wikimedia = require( 'eslint-config-wikimedia/flat' );

// Directories with their own config, which other configs don't apply to.
// These were directories with `"root": true` in .eslintrc.json.
const rootDirs = {
	modules: [ 'modules/**' ],
	tests: [ 'tests/qunit/**' ],
	selenium: [ 'tests/selenium/**' ],
};

// Shared by modules and tests (was modules/.eslintrc.json)
const modulesConfig = {
	languageOptions: {
		globals: {
			// From `env: { commonjs: true }`
			global: 'readonly',
		},
	},
	rules: {
		'max-len': 'off',
		'mediawiki/no-unlabeled-buttonwidget': 'warn',
		'compat/compat': 'warn',
	},
};

module.exports = defineConfig( [
	globalIgnores( [
		// Build
		'vendor/',
		'docs/',

		// Language files written automatically by TranslateWiki
		'**/i18n/**/*.json',
		'!**/i18n/**/en.json',
		'!**/i18n/**/qqq.json',
	] ),

	// Gruntfile.js, etc.
	{
		ignores: Object.values( rootDirs ).flat(),
		extends: [ wikimedia( 'server' ) ],
	},

	// Code which runs in MediaWiki
	{
		files: rootDirs.modules,
		extends: [ wikimedia( 'client', 'jquery', 'mediawiki' ), modulesConfig ],
	},

	// QUnit tests
	{
		files: rootDirs.tests,
		extends: [ wikimedia( 'client', 'jquery', 'mediawiki' ), modulesConfig, wikimedia( 'qunit' ) ],
		languageOptions: {
			// wikimedia/qunit resets this to 'script'
			sourceType: 'commonjs',
		},
		rules: {
			'no-jquery/no-class-state': 'off',
			'no-jquery/no-parse-html-literal': 'off',
			'no-jquery/no-global-selector': 'off',
			'no-jquery/no-sizzle': 'off',
			'qunit/no-loose-assertions': 'warn',
		},
	},

	{
		files: [ '**/*.js' ],
		ignores: rootDirs.selenium,
		rules: {
			'comma-dangle': [ 'error', 'always-multiline' ],
		},
	},

	// Selenium tests
	{
		files: rootDirs.selenium,
		extends: [ wikimedia( 'selenium' ) ],
		languageOptions: {
			ecmaVersion: 2022,
			sourceType: 'module',
		},
	},
] );
