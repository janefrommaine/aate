'use strict';

/*
* Require the path module
*/
const path = require('path');

/*
 * Require the Fractal module
 */
const fractal = module.exports = require('@frctl/fractal').create();

/*
 * Give your project a title.
 */
fractal.set('project.title', 'AATE Component Library');

/*
 * Tell Fractal where to look for components.
 */
fractal.components.set('path', path.join(__dirname, 'component-library'));
fractal.components.set('label', 'Patterns')

/*
 * Tell Fractal where to look for documentation pages.
 */
fractal.docs.set('path', path.join(__dirname, 'docs'));

/*
 * Tell the Fractal web preview plugin where to look for static assets.
 */
//fractal.web.set('static.path', path.join(__dirname, 'assets'));
//fractal.web.set('static.path', path.join(__dirname, 'css'));
fractal.web.set('static.path', path.join(__dirname, ''));

/* 
 * Set the static HTML build destination
 */
fractal.web.set('builder.dest', path.join(__dirname, 'dist'));

/*
 * Tell Fractal what we would like our custom statuses to be
 */
fractal.components.set('statuses', {
    queue : {
        label: 'To Be Built',
        description: 'Component is slotted for development.',
        color: '#555'
    },
    dev: {
        label: 'In Development',
        description: 'Currently in development.',
        color: '#FF9233'
    },
    testing: {
        label: 'Ready For Testing',
        description: 'Ready for testing.',
        color: '#cccc00'
    },
    convert: {
        label: 'Ready For Conversion',
        description: 'Ready for PHP conversion.',
        color: '#3469ee'
    },
    ready: {
        label: 'Ready For Use',
        description: 'Ready for use.',
        color: '#29CC29'
    },
    updated: {
        label: 'HTML Code Updated',
        description: 'PHP code needs to be updated with new HTML code.',
        color: '#9034ee'
    }
});

/* 
 * Setting default status of components
 */
fractal.components.set('default.status', 'queue');

/* 
 * Default preview layout
 */
fractal.components.set('default.preview', '@preview');