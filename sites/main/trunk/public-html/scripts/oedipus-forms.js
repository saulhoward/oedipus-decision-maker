/*
 * Forms Javascript
 * by SANH 2008-05-29
 */

// Load jQuery
//google.load("jquery", "1");

// on page load complete,
//google.setOnLoadCallback(function() {
//                $("textarea").height('8em');
//                $("textarea").focus(function() {
//                        $(this).height('16em');
//                        });
//                $("textarea").blur(function() {
//                        $(this).height('8em');
//                        });
//                });

$(document).ready (function() {
		/*
		 * Auto-expanding textarea for notes input
		 * uses jquery.autogrow.js plugin for autogrow()
		 * doesn't work if textarea is empty, so added .height()
		 * http://plugins.jquery.com/project/autogrow
		 */
		$("div.notes textarea").height('8em');
		$("div.notes textarea").css('min-height', '8em');
		$("div.notes textarea").css('max-height', '45em');
		$('div.notes textarea').autogrow();
		});

