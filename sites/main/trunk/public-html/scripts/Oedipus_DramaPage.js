/**
 * Oedipus_DramaPage.js
 *
 * @copyright SANH, 2008-12-12
 *
 * Using jQuery to hide and show divs,
 * and to ajax the tiles
 */

$(document).ready(function() {

		/**
		 * For the Frame tree,
		 * Find the add frame links in each node and hide them
		 */
		if ($('.frame-node').length) {
			$('.frame-node').each(function(){
				var $node = $(this);
				var $anim = $node.find('.add-frame').hide();
				$node.hover(function() {
					$node.find(".add-frame").show();
					}, function(){
					$node.find(".add-frame").hide();
					});

				});
		}

		/*
		 *Fade Out the Message Div,
		 *If it is clicked, reverse the fade
		 * On Hover On, reverse the fade
		 * On Hover Off, fade out again
		 */
		var $msg_div = $('#message');
		$msg_div.hide();
		$msg_div.fadeIn('slow');
		$msg_div.fadeOut(10000);
		$msg_div.click(function() {
				var $fade = $msg_div;
				if ($fade.is(':animated')){
				$fade.stop().fadeTo(3000, '1.0');
				} else {
				$fade.fadeIn(3000);
				}
				}
			      );
		$msg_div.hover(function() {
				var $fade = $msg_div;
				if ($fade.is(':animated')){
				$fade.stop().fadeTo(3000, '1.0');
				} else {
				$fade.fadeIn(3000);
				}
				}, function() {
				var $fade = $msg_div;
				if ($fade.is(':animated')){
				$fade.stop().fadeTo(3000,'0');
				} else {
				$fade.fadeOut(3000);
				}
				});

		/**
		 * Position & SI Tiles
		 * -------------------
		 * Tool Tips on Hover
		 * using ClueTip plugin
		 */
		if ($('a.position-tile, a.si-tile').length) {
			$('a.position-tile, a.si-tile').cluetip({
				splitTitle: '|',
				arrows: true
			});
		}
                /*
		 * Load Ajax tiles when clicking position tiles
		 * if frame is editable (if it has a href)
		 */
		if (
				($('a.position-tile, a.si-tile').length)
				&&
				($('a.position-tile, a.si-tile').attr('href') != '#') 
		) {
			set_ajax_on_click_for_tiles();
		}

		/**
		 * Hide the Forms and replace with divs
		 */
		if ($('.scene-form').length) {
			replace_form_with_content_from_element_value(
				'#name-form',
				'.scene-form',
				'#scene_name',
				'h3'
				);
		}
		if ($('.frame-form').length) {
			replace_form_with_content_from_element_value(
				'#name-form',
				'.frame-form',
				'#frame_name',
				'h3'
				);
		}
	
		if ($('.edit-scene-note').length) {
				replace_form_with_content_from_div(
					'#note-form', // String like '.notes'
					'.edit-scene-note',
					'.note-preview'
					);
				}
	
		if ($('.edit-frame-note').length) {
				replace_form_with_content_from_div(
					'#note-form', // String like '.notes'
					'.edit-frame-note',
					'.note-preview'
					);
				}

		if ($('.edit-character').length) {
			replace_form_with_content_from_element_value(
				'.edit-character',
				'.frame-form',
				'#character_name',
				'h3'
				);
		}

		if ($('.edit-option').length) {
			replace_form_with_content_from_element_value(
				'.edit-option',
				'.frame-form',
				'#option_name',
				'h3'
				);
		}

});

function 
replace_form_with_content_from_element_value(
		$parent_div_css, // String like '.notes'
		$form_css,
		$content_css,
		$replacement_tag // tag like h3
		)
{
	$($parent_div_css).each(function(){

			var $parent_div = $(this);
			var $form = $parent_div.find($form_css).hide();
			var $content = $parent_div.find($content_css).val();

			$form.before('<div class="replacement"><' + $replacement_tag  + '>' + $content + '</' + $replacement_tag + '></div>');
			var $replacement = $parent_div.find('div.replacement');
			$replacement.prepend('<p class="hover-edit-link">click to edit...</p>');
			$parent_div.find('p.hover-edit-link').hide();
			$replacement.hover(
				function(){
				$parent_div.find('p.hover-edit-link').show();
				},
				function(){
				$parent_div.find('p.hover-edit-link').hide();
				}
				);
			$replacement.click(function(){
				$replacement.hide();
				$parent_div.find('p.hover-edit-link').hide();
				$form.fadeIn();
				});
			});
}

function 
replace_form_with_content_from_div(
		$parent_div_css, // String like '.notes'
		$form_css,
		$content_div_css
		)
{
	$($parent_div_css).each(function(){

			var $parent_div = $(this);
			var $form = $parent_div.find($form_css).hide();
			var $content = $parent_div.find($content_div_css).html();
			$parent_div.find($content_div_css).hide();

			$form.before('<div class="replacement">' + $content + '</div>');
			var $replacement = $parent_div.find('div.replacement');
			$replacement.prepend('<p class="hover-edit-link">click to edit...</p>');
			$parent_div.find('p.hover-edit-link').hide();
			$replacement.hover(
				function(){
				$parent_div.find('p.hover-edit-link').show();
				},
				function(){
				$parent_div.find('p.hover-edit-link').hide();
				}
				);
			$replacement.click(function(){
				$replacement.hide();
				$parent_div.find('p.hover-edit-link').hide();
				$form.fadeIn();
				});
			});
}

/*
 *AJAX Tile Functions
 */
function 
	set_ajax_on_click_for_tiles()
{
	$('a.position-tile, a.si-tile').click(function () {
			$a = $(this);
			new_tile_and_doubt = load_new_tile($a);
			var $new_a =
			change_tile_a_to_new_tile_and_doubt(
				$a,
				new_tile_and_doubt
				);
			return false;
			});
}

function load_new_tile(
		$a // jQuery <a> obj
		)
{
	/*
	 *This returns just the tile data,
	 *eg. 1q or 0x or 0
	 */
	var $url = $a.attr('href');
	$new_url = $url.replace('Oedipus_EditFrameRedirectScript', 'Oedipus_FrameXMLPage');	
	var $ajax = $.ajax({ url: $new_url, cache: false, async: false });
	var new_tile_and_doubt;
	return $ajax.responseText;
}
function change_tile_a_to_new_tile_and_doubt(
		$a, // Jquery <a> html obj
		$tile_and_doubt // oedipus tile eg. 1x or 0 or 0?
		)
{
	/*
	 * First split up the tile and doubt
	 */
	var $tile = $tile_and_doubt.charAt(0);
	var $doubt = '';
	if ($tile_and_doubt.length > 1) {
		$doubt = $tile_and_doubt.charAt(1);
	}

	/*
	 * the get variable needs html entity
	 * and the css needs q where the doubt is ?
	 */
	var $doubt_url = $doubt;
	var $doubt_id = $doubt;
	if ($doubt  == '?') {
		$doubt_url = '%3F';
		$doubt_id = 'q';
	}

	/*
	 *Replace the css id
	 */
	var $old_id_length = $a.attr("id").length;
	var $new_id;
	if (
			($a.attr("id").slice(-1) != '1')
			&&
			($a.attr("id").slice(-1) != '0')
	   ) {

		$new_id = $a.attr("id").slice(0, $old_id_length - 2);

	} else {
		$new_id = $a.attr("id").slice(0, $old_id_length - 1);
	}
	$new_id = $new_id + $tile + $doubt_id;

	/*
	 *Regexen on the get variables, not very pretty
	 * "..._tile=1&..._doubt=%3F" assuming doubt is always last
	 */
	url = $a.attr('href');
	var $tile_re = new RegExp('tile=[0-9]', 'g');
	url = url.replace($tile_re, 'tile=' + $tile);	
	var $doubt_re = new RegExp('doubt=[%A-Za-z0-9]*', 'gi');
	url = url.replace($doubt_re, 'doubt=' + $doubt_url);	
	$a.attr({
id: $new_id,
href: url
});

/*
 *Finally, replace the inner html
 */
$a.html($tile_and_doubt);
return $a;
}



