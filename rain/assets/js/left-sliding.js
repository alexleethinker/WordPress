(function ($) {

	"use strict";

	
	$('#post-slider').carouFredSel({
		//direction	: 'up',
		items		: {
			visible		: 1,
			start		: 0
		},
		prev    : {
			button  : ".left-nav-posts .newer-posts",
			key     : "left"
		},
		next    : {
			button  : ".left-nav-posts .older-posts",
			key     : "right"
		},
		pagination  : ".left-nav-posts .posts-tab",
		auto		: false,
		responsive  : true
	});

}(jQuery));