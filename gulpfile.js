'use strict';

var slug = 'wc-product-size-guide',
	gulp = require('gulp'),
	del = require('del'),
	plugins = require('gulp-load-plugins')();

var swallowError = function(error) {
	console.log(error.toString());
}

/* Packaging */
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
			'!assets/css/admin.less',
            '!assets/js/admin.js',
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

/* CSS */
gulp.task('css', function(){
	return gulp.src('assets/css/*.less')
		.pipe(plugins.less())
		.on('error', swallowError)
		.pipe(plugins.autoprefixer({ browsers: ['last 3 versions'] }))
		.pipe(plugins.cssnano())
		.pipe(gulp.dest('assets/css/'));
});

/* Scripts */
gulp.task('scripts', function(){
	return gulp.src(['assets/js/*.js', '!assets/js/*.min.js'])
		.pipe(plugins.uglify())
		.pipe(plugins.rename({ suffix: '.min' }))
		.pipe(gulp.dest('assets/js/'));
});

/* Default Task */
gulp.task('default', ['css', 'scripts']);

/* Watch Task */
gulp.task('watch', ['css', 'scripts'], function(){
    gulp.watch(['assets/css/*.less'], ['css']);
    gulp.watch(['assets/js/*.js', '!assets/js/*.min.js'], ['scripts']);
});
