var SITE_URL = "/";
require.config({
	baseUrl: '/scripts',
    paths: {
        "jquery": "lib/jquery", 
        "bootstrap": "lib/bootstrap.min", 
		"bootstrapValidator": "lib/bootstrapValidator", 
		"formValidation": "lib/formValidation.min", 
		"aci":"lib/aci",
		"message":"lib/sco.message",
		"lyhucselect":"lib/jquery.lyhucselect",
		"jquery-ui": "lib/jquery-ui-1.10.0.custom.min", 
		"datetimepicker":"lib/jquery.datetimepicker",
		"zclip":"lib/jquery.zclip.min",
    },
    shim: {
        "jquery-ui": {
            exports: "$",
            deps: ['jquery']
        },
        "bootstrap": ['jquery'],
		"bootstrapValidator": ['jquery'],
		"aci": ['jquery'],
		"message": {
            exports: "$",
            deps: ['jquery']
        },
		"lyhucselect": {
            exports: "$",
            deps: ['jquery']
        },
		"datetimepicker": {
            exports: "$",
            deps: ['jquery-ui']
        },
		"zclip": {
            exports: "$",
            deps: ['jquery']
        }
    }

});