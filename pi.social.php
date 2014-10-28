<?php

class Plugin_social extends Plugin {

  var $meta = array(
    'name'        => 'Social',
    'version'     => '0.1',
    'author'      => 'David Matthams',
    'author_url'  => 'http://dmatthams.co.uk'
  );


  public function index() {
    
    // Parameters
    $show 			= $this->fetchParam('show');
    $url            = $this->fetchParam('url', URL::tidy(Config::getSiteURL() . '/' . URL::getCurrent()));
    $showcounter 	= $this->fetchParam('counter','true');

    $items = explode("|", $show);

    $html = '';

    foreach ($items as $key => $value) {

    	if ($value == "facebook") {
    		if ($showcounter == 'true') { 
    			$facebookLayout = 'button_count'; 
    			$facebookWidth = '90';
    		} else {
    			$facebookLayout = 'button'; 
    			$facebookWidth = '55';
    		}
    		$html .= '<iframe src="//www.facebook.com/plugins/like.php?href='.$url.'&amp;width=&amp;layout='. $facebookLayout .'&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=20" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:20px; width:'.$facebookWidth.'px" allowTransparency="true"></iframe>';
    	} elseif ($value == "twitter") {
    		if ($showcounter == 'true') { 
    			$twitterLayout = ""; 
    		} else {
    			$twitterLayout = "data-count='none'"; 
    		}
    		$html .= "<a href='https://twitter.com/share' class='twitter-share-button' ". $twitterLayout .">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";
    	} elseif ($value == "linkedin") {
    		if ($showcounter == 'true') { 
    			$linkedinLayout = "data-counter='right'"; 
    		} else {
    			$linkedinLayout = ""; 
    		}
    		$html .= '<script src="//platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script><script type="IN/Share" data-url="'.$url.'"'. $linkedinLayout .'></script>';
    	} elseif ($value == "pinterest") {
    		$html .= '<a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-color="red"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a><script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>';
    	} elseif ($value == "google") {
    		if ($showcounter == 'true') { 
    			$googleLayout = ''; 
    		} else {
    			$googleLayout = 'data-annotation="none"';
    		}
    		$html .= '<script src="https://apis.google.com/js/platform.js" async defer></script><div class="g-plusone" data-size="medium" '.$googleLayout.'></div>';
    	}
    }
    return $html;

  }

}
