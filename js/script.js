jQuery(document).ready(function($) {
	jQuery('.caption-slide-up, .zoom-image-in-caption-twist, .zoom-out-twist, .zoom-caption-out-image-in, .zoom-out, .slide-left-to-right, .slide-right-to-left, .slide-top-to-bottom, .slide-bottom-to-top, image-turn-around, .zoom-and-pan, .move-image-right, .move-image-left, .move-image-top, .move-image-bottom').closest('.image-caption-box').css('overflow', 'hidden');
	jQuery('.flip-image-vertical, .flip-image-horizontal, .flip-image-vertical-back, .flip-image-horizontal-back, .page-turn-from-top, .page-turn-from-bottom, .page-turn-from-right, .page-turn-from-left').closest('.image-caption-box').css({
		'-webkit-perspective'		: '2500px',
		'perspective'				: '2500px',
		'-webkit-perspective-origin': '50% 50%',
		'perspective-origin': '50% 50%',
	});

	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools      : false,
		theme             : 'pp_woocommerce',
		horizontal_padding: 20,
		opacity           : 0.8,
		deeplinking       : false
	});

	$('.wcp-fgg-wrap').each(function(index, el) {
		$(this).mixItUp({
			selectors : {
				target: $(this).data('target'),
				filter: $(this).data('filter'),
				// sort: $(this).data('sort')
			}
		});
	});
	
    jQuery('.fancy-grid-gallery-wrap a').on('touchstart', function (e) {
        'use strict'; //satisfy code inspectors
        var link = $(this); //preselect the link
        if (link.hasClass('hover')) {
            return true;
        } else {
            link.addClass('hover');
            $('a.taphover').not(this).removeClass('hover');
            e.preventDefault();
            return false; //extra, and to make sure the function has consistent return points
        }
    });	
});