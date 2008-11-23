$(document).ready(function() {

		/*
		 *Find the add frame links in each node and hide them
		 */
		$('.frame-node').each(function(){
			var $node = $(this);
			var $anim = $node.find('.add-frame').hide();
			$node.hover(function() {
				$node.find(".add-frame").show();
				}, function(){
				$node.find(".add-frame").hide();
				});

			});

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
		 * Position & SI Tile
		 * Tool Tips on Hover
		 * using ClueTip plugin
		 */
		$('a.position-tile, a.si-tile').cluetip({
			splitTitle: '|',
			arrows: true
		});


		/*
		 *HIde the Forms and replace with divs
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
