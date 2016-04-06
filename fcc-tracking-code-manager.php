<?php
  /**
	* Plugin Name: FCC Tracking Code Manager
	* Plugin URI: https://github.com/openfcci/fcc-tracking-code-manager
	* Description: A plugin that places quantcast and google analytics tracking code in the footer of each blog on the install (as long as the blog's theme uses the 'wp_footer' action).
	* Version: 1.1
	* Author: Jed Limke
	* Author URI: http://www.fccinteractive.com
	* Site Wide Only: true
	* Network: true
	*/

	// Add the code to the footer.
	function tracking_code_footer_listener() {
		$content = '
			<!-- Start Quantcast tag -->
				<script type="text/javascript">
					_qoptions={qacct:"p-f1gwFa5-x-0VY"};
				</script>
				<script type="text/javascript" src="http://edge.quantserve.com/quant.js"></script>
				<noscript>
					<div><img src="http://pixel.quantserve.com/pixel/p-f1gwFa5-x-0VY.gif" style="display: none;" class="noBorder" height="1" width="1" alt="Quantcast"/></div>
				</noscript>
			<!-- End Quantcast tag -->
			<!-- Start Google Analytics tag -->
			<script>
			(function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,"script","//www.google-analytics.com/analytics.js","ga");

				ga("create", "UA-778232-45", "auto");
				ga("send", "pageview");
				</script>
			<!-- End Google Analytics tag -->
			';
		echo $content;
	}
	add_action('wp_footer', 'tracking_code_footer_listener', 99); // Add a listener for redoing the adminbar hooks.
