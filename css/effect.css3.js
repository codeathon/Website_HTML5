(function($) {
	var compat={
		'css3:stack': false, // use default
		'css3:slide': false, // use default
		'default': {
			'requires': ['transform'],
			'alternative': 'horizontal'
		}
	};
	
	function supports(propName) {
		var elStyle=(document.body || document.documentElement).style;
		var propNameUC=propName.substr(0, 1).toUpperCase()+propName.substr(1);
		var test=[propName, 'Moz'+propNameUC, 'Webkit'+propNameUC, 'ms'+propNameUC, 'O'+propNameUC];

		for (var i=0; i < test.length; i++) if (elStyle[test[i]] !== undefined) return true;
		return false;
	}
	
	var fx=function(stage, actors, settings, theatre) {
		this.timeout=0;
		var onAfterMove=function() {settings.onAfterMove.apply(stage, [theatre.index, actors.eq(theatre.index), theatre]);};

		this.capable=function() { // return true or failover effect name
			var def=compat[settings.effect] || compat['default'];
			for(var i=0; i < def.requires.length; i++) {
				if (supports(def.requires[i])) {
					return true;
				}
			}
			return def.alternative;
		};
		this.init=function() {
			clearTimeout(this.timeout);
			for(var i=Math.ceil((actors.length - 1) / 2); i >= 0; i--) {
				var left=actors.eq((actors.length + theatre.index - i) % actors.length);
				left
					.removeClass(left.data('theatreCSS3')+'')
					.data('theatreCSS3', i ? 'left'+i : 'central')
					.addClass(left.data('theatreCSS3'));
			
				var right=actors.eq((theatre.index + i) % actors.length);
				right
					.removeClass(right.data('theatreCSS3')+'')
					.data('theatreCSS3', i ? 'right'+i : 'central')
					.addClass(right.data('theatreCSS3'));
			}
			this.timeout=setTimeout(onAfterMove, 1000); /* CSS animation 1s */
		};
		this.next=function(lastPos) {
			this.init();
		};
		this.prev=function(lastPos) {
			this.init();
		};
		this.jump=function(lastPos) {
			this.init();
		};
		this.destroy=function() {
			clearTimeout(this.timeout);
			actors.each(function() {
				var $this=$(this);
				$this
					.removeClass($this.data('theatreCSS3'))
					.removeData('theatreCSS3');
			});
		};
	};

	$.fn.theatre('effect', 'css3:slide', fx);
	$.fn.theatre('effect', 'css3:stack', fx);
	$.fn.theatre('effect', 'css3:circle', fx);	
})(jQuery);
