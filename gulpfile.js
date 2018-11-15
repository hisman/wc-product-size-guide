'use strict';

var slug = 'wc-product-size-guide',
	gulp = require('gulp'),
	del = require('del'),
	plugins = require('gulp-load-plugins')();

gulp.task('deploy', function(){
	return gulp.src(['**/*',
			'!{.git,.git/**}',
			'!{node_modules,node_modules/**}',
			'!{' + slug + ',' + slug + '/**}',
			'!{tests,tests/**}',
			'!{bin,bin/**}',
			'!.editorconfig',
			'!.gitattributes',
			'!.gitignore',
			'!.phpcs.xml.dist',
			'!.travis.yml',
			'!gulpfile.js',
			'!package-lock.json',
			'!package.json',
			'!phpunit.xml.dist',
			'!README.md',
			'!' + slug + '.zip'])
			.pipe(gulp.dest(slug));
});

gulp.task('archive', ['deploy'], function(){
	return gulp.src([slug + '/**/*'], { base: '.' })
		.pipe(plugins.zip(slug + '.zip'))
		.pipe(gulp.dest('.'));
});

gulp.task('package', ['archive'], function(){
	return del(slug);
});
