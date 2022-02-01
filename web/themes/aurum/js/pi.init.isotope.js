/* Aura version: 1.8.5 */

jQuery(function($){

	//region Isotope
	if($.fn.isotope) {

		var $w = $(window);

		$w.load(function () {
			var $isotops = $('.isotope');

			$isotops.each(function () {
				var $el = $(this),
					defaultFilter = $el.data('isotopeDefaultFilter') || 0,
					id = $el.attr('id'),
					mode = $el.data('isotopeMode') || 'fitRows',
					tmt;


				$el.isotope({
					filter: defaultFilter,
					itemSelector: '.isotope-item',
					layoutMode: mode,
					animationOptions: {
						duration: 400,
						queue: false
					}
				});


				$w.resize(function(){
					clearTimeout(tmt);
					tmt = setTimeout(function(){
						$el.isotope('layout');
					}, 150);
				});

				var $menu = $('[data-isotope-nav="' + id + '"]');

				if ($menu.length) {
					$menu.find('a').click(function (e) {
						var $link = $(this);
						if(!$link.hasClass('pi-active')){
							var selector = $link.attr('data-filter');
							$link.parents('ul').eq(0).find('.pi-active').removeClass('pi-active');
							$link.addClass('pi-active');
							$el.isotope({ filter: selector });
						}
						e.preventDefault();
					});
				}

				$w.resize();

			});

		});

	}
	//endregion

});