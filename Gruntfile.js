/* eslint-env node, es6 */
module.exports = function ( grunt ) {
	var conf = grunt.file.readJSON( 'extension.json' );

	grunt.loadNpmTasks( 'grunt-banana-checker' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-eslint' );
	grunt.loadNpmTasks( 'grunt-stylelint' );

	grunt.initConfig( {
		eslint: {
			options: {
				cache: true,
				fix: grunt.option( 'fix' )
			},
			all: [
				'**/*.{js,json}',
				'!{tests/externals,docs}/**',
				'!{vendor,node_modules}/**'
			]
		},
		// Lint – Styling
		stylelint: {
			options: {
				syntax: 'less'
			},
			all: [
				'modules/**/*.{css,less}'
			]
		},
		// eslint-disable-next-line es/no-object-assign, compat/compat
		banana: Object.assign( {
			options: { requireLowerCase: false }
		}, conf.MessagesDirs ),
		watch: {
			files: [
				'.{stylelintrc,eslintrc}.json',
				'<%= eslint.all %>',
				'<%= stylelint.all %>'
			],
			tasks: 'test'
		}
	} );

	grunt.registerTask( 'lint', [ 'eslint', 'stylelint', 'banana' ] );
	grunt.registerTask( 'test', 'lint' );
	grunt.registerTask( 'default', [ 'test' ] );
};
