module.exports = function(grunt) {


    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),


        concat: { 
		    dist: {
		        src: [
		            //'components/jquery/jquery-3.2.0.min.js',
		            'components/gsap/ScrollToPlugin.min.js',
		            'components/gsap/TweenMax.min.js',
		            'components/angular/angular.js',
		            'components/angular-sanitize/angular-sanitize.js',
		            'components/angular-route/angular-route.js',
		            'components/angular-ui-router/angular-ui-router.js',
		            //'components/angular-ui-router/statehelper.js',
		            'components/angular-touch/angular-touch.js',
		            'components/angular-carousel/angular-carousel.js',
                    'components/angular-resource/angular-resource.js',

                    'angular/**/*.js'
		        ],
		        dest: '../../assets/js/app.js'
		    }
		},
		uglify: {
		    build: {
		        src: '../../assets/js/app.js',
		        dest: '../../assets/js/app.min.js',
		    }
		},
		cssmin: {
		    options: {
		      mergeIntoShorthands: false,
		      roundingPrecision: -1
		    },
		    target: {
		      files: {
		        '../../assets/css/app.min.css': [
                    //'components/angular-carousel/angular-carousel.css',
			        '../css/style.css',
		        ]
		      }
		    }
		},
		watch: {

  			css: {
    			files: [
					'../css/style.css',
    			],
    			tasks: ['cssmin'],
				options: {
      				interrupt: true
    			}
			},
            js: {
                files: [
                    'angular/**/*.js',
                ],
                tasks: ['concat', 'uglify'],
                options: {
                    interrupt: true
                }
            }
		}
		
	

    });


    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-jshint');

    

    // задачи выполняемые, при команде «grunt» в терминале
    grunt.registerTask('default', ['concat', 'uglify','cssmin']);

};
