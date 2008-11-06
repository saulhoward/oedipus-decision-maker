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
});
