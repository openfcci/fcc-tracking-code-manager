<?php
/**
* Plugin Name: FCC Tracking Code Manager
* Plugin URI: https://github.com/openfcci/fcc-tracking-code-manager
* Description: A plugin that places quantcast and google analytics tracking code in the footer of each blog on the install (as long as the blog's theme uses the 'wp_footer' action).
* Version: 1.16.05.12
* Author: Forum Communications Company
* Author URI: http://forumcomm.com/
* Site Wide Only: true
* Network: true
*/


/*--------------------------------------------------------------
# Quantcast Tracking Pixel & Google Analytics Tracking Tag
--------------------------------------------------------------*/

/**
 * Add the code to the footer.
 */
function tracking_code_footer_listener() {
	$content = '
  <!--  Quantcast Tag -->
  <script>
    var ezt = ezt || [];
    (function() {
        var elem = document.createElement("script");
        elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://pixel") + ".quantserve.com/aquant.js?a=p-f1gwFa5-x-0VY";
        elem.async = true;
        elem.type = "text/javascript";
        var scpt = document.getElementsByTagName("script")[0];
        scpt.parentNode.insertBefore(elem, scpt);
    }());
    ezt.push({
        qacct: "p-f1gwFa5-x-0VY",
        uid: ""
    });
  </script>
  <noscript>
    <img src="//pixel.quantserve.com/pixel/p-f1gwFa5-x-0VY.gif" style="display: none;" border="0" height="1" width="1" alt="Quantcast"/>
  </noscript>
  <!-- End Quantcast Tag -->

	<!-- Start Google Analytics tag -->
	<script>
  (function(i, s, o, g, r, a, m) {
    i["GoogleAnalyticsObject"] = r;
    i[r] = i[r] || function() {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o), m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
  })(window, document, "script", "//www.google-analytics.com/analytics.js", "ga");
  ga("create", "UA-778232-45", "auto");
  ga("send", "pageview");
		</script>
	<!-- End Google Analytics tag -->
		';
	echo $content;
}
add_action('wp_footer', 'tracking_code_footer_listener', 99);
