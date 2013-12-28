{{ partials.switcher }}

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ theme_path }}bootstrap/js/bootstrap.min.js"></script>
<script src="{{ theme_path }}bootstrap/js/holder.js"></script>
<script src="{{ theme_path }}bootstrap/js/plugin/jquery.lwtCountdown-1.0.js"></script>
<script>
(function($){
	"use strict";
	
		$('#countdown_dashboard').countDown({
        	targetDate: {
          		'day': 		1,
          		'month': 	1,
          		'year': 	2014,
          		'hour': 	0,
          		'min': 		0,
          		'sec': 		0 
          	},
          	omitWeeks: true
          });

})(jQuery);
</script>