(function ($) {

  	var pageUrl = window.location.href,
  		hostName = window.location.hostname,
  		isPreviewHost = hostName.match(/pi-themes\.com/),
  		isBuild = pageUrl.match(/\/build/),
  		currentColor = (isPreviewHost || isBuild) ? pageUrl.match(/\/(blue|green|lime|brown|orange|red|purple)\//) ? pageUrl.match(/\/(blue|green|lime|brown|orange|red|purple)\//)[1] : 'base' : 'base',
  		currentBackground,
  		cls_active = 'pi-active',
  		cls_fixed = 'pi-fixed',
      cls_full = 'pi-full',
  		$w = $(window),
  		$b = $('body'),
  		$styles = $('link[rel=stylesheet]'),
  		$switchers_width,
  		$switchers_bg,
  		$switchers_scheme;

  	$switchers_width = $('.pi-settings-width li'),
  	$switchers_bg = $('.pi-settings-bg li'),
  	$switchers_scheme = $('.pi-settings-scheme li');

  	//region Settings
  	$('.pi-btn-settings').on('click', function() {
  		$(this).parent().toggleClass('pi-active');
  	});

  	$switchers_width.on('click', function() {
  		var $el = $(this),
  			$parent = $el.parent(),
  			isActive = $el.hasClass(cls_active);

  		if(!isActive){
  			$parent.find('li.' + cls_active).removeClass(cls_active);
  			$el.addClass(cls_active);
  			$b.toggleClass(cls_fixed);
        if($el.text() == 'Wide') {
          $b.addClass(cls_full);
        }
        else {
          $b.removeClass(cls_full); 
        }
  		}

  		if($b.hasClass(cls_fixed) && !currentBackground){
  			$switchers_bg.eq(0).click();
  		}

  		$w.resize();

  	});

  	$switchers_bg.on('click', function() {
  		var $el = $(this),
  			$parent = $el.parent(),
  			isActive = $el.hasClass(cls_active);

  		if(!isActive){

  			$parent.find('li.' + cls_active).removeClass(cls_active);
  			$el.addClass(cls_active);

  			var cl = $el.data('class');
  			$b.addClass(cl).removeClass(currentBackground);
  			currentBackground = cl;

  		}

  	});

  	$switchers_scheme.on('click', function() {
  		var $el = $(this),
  			$parent = $el.parent(),
  			isActive = $el.hasClass(cls_active);

  		if(!isActive){

  			$parent.find('li.' + cls_active).removeClass(cls_active);
  			$el.addClass(cls_active);

  			var cl = $el.data('color');

  			if(currentColor != cl){
  				currentColor = cl;

          $b.find('link.styling-class').remove();;
          var css = ['global', 'portfolio', 'social', 'typo', 'page-nav', 'boxes', 'comments', 'testimonials', 'accordion', 'counters', 'tabs', 'shadows', 'pricing-tables', 'tooltips', 'slider', 'animations'];
          for (i in css) {
            $b.append('<link rel="stylesheet" type="text/css" class = "styling-class" href="/sites/all/themes/aurum/css/' + cl + '/' + css[i] + '.css">');
          };

  			}
  		}

  	});


  	if(currentColor != 'base'){
  		$switchers_scheme.filter('[data-color=' + currentColor + ']').click();
  	}

  	//endregion

})(window.jQuery);
