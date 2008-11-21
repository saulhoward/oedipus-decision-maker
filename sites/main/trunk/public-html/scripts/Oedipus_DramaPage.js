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
});

