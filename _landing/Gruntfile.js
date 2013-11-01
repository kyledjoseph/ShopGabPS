module.exports = function(grunt) {

// Configuration goes here
grunt.initConfig({
    clean: {
        dist: ['dist']
    },
    jshint: { 
        files: ['js/main.js']
    },
    sass: {                                 // Task
        dist: {                             // Target
            files: {                        // Dictionary of files
                'dist/css/main.css' : 'scss/main.scss'     // 'destination': 'source'
            }
        }
    },
    concat: {
        options: {
            separator: "\n" //separates scripts
        },
        js: {
            src: ['js/*.js'],
            dest: 'dist/js/main.js' //where to output the script
        }
    },
    watch: {
        scripts: {
            files: ['js/*.js', 'scss/*.scss', 'html/*.html', 'img/*'],
            tasks: ['default'],
            options: {
                spawn: false,
                livereload: true,
            },
        },
    },
    copy: {
        html: {
            files: [
                {
                    expand: true,
                    flatten: true,
                    src: ['html/*.html'],
                    dest: 'dist/',
                    filter: 'isFile'
                } // includes files in path
            ]
        },
        fonts: {
            files: [
                {
                    expand: true,
                    flatten: true,
                    src: ['fonts/*'],
                    dest: 'dist/fonts/',
                    filter: 'isFile'
                } // includes files in path
            ]
        },
        images: {
            files: [
                {
                    expand: true,
                    flatten: true,
                    src: ['img/*'],
                    dest: 'dist/img/',
                    filter: 'isFile'
                } // includes files in path
            ]
        }
}
});

// Load plugins here
grunt.loadNpmTasks('grunt-contrib');

// Define your tasks here
grunt.registerTask('default', ['jshint', 'concat', 'sass', 'copy']);

};