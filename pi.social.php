<?php

class Plugin_social extends Plugin {

  var $meta = array(
    'name'        => 'Social',
    'version'     => '0.1.1',
    'author'      => 'David Matthams',
    'author_url'  => 'http://dmatthams.co.uk'
  );


  public function index() {
    
    // Parameters
    $show           = $this->fetchParam('show', "facebook_share|facebook_like|twitter|pinterest|linkedin|google");
    $url            = $this->fetchParam('url', URL::tidy(Config::getSiteURL() . '/' . URL::getCurrent()));
    $showcounter    = $this->fetchParam('counter','true');

    $items = explode("|", $show);

    $html = '';

    foreach ($items as $key => $value) {


         if ($value =="facebook_like" || "facebook_share"){
            $html .= "<div id='fb-root'></div><script>(function(d, s, id) {  var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) return;  js = d.createElement(s); js.id = id;  js.src = '//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.0';  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>";
        }

        if ($value == "facebook_share") {
            if ($showcounter == 'true') { 
                $layout = 'button_count'; 
                $width = '90';
            } else {
                $layout = 'button'; 
                $width = '55';
            }
            $html .= "<div class='fb-share-button' data-href='". $url ."' data-width='". $width ."' data-layout='". $layout ."'></div>";
        } elseif ($value == "facebook_like") {
            if ($showcounter == 'true') { 
                $layout = 'button_count'; 
            } else {
                $layout = 'button'; 
            }
            $html .= "<style>.fb_iframe_widget span {overflow: visible!important;width: 450px!important;}</style><div class='fb-like' data-href='". $url ."' data-layout='". $layout ."' data-action='like' data-show-faces='false' data-share='false'></div>";
        } elseif ($value == "twitter") {
            if ($showcounter == 'true') { 
                $layout = ""; 
            } else {
                $layout = "none"; 
            }
            $html .= "<a href='https://twitter.com/share' class='twitter-share-button' data-url='".$url."' data-count='".$layout."'>Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";
        } elseif ($value == "linkedin") {
            if ($showcounter == 'true') { 
                $layout = "data-counter='right'"; 
            } else {
                $layout = ""; 
            }
            $html .= '<script src="//platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script><script type="IN/Share" data-url="'.$url.'"'. $layout .'></script>';
        } elseif ($value == "pinterest") {
            $html .= '<a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-color="red"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a><script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>';
        } elseif ($value == "google") {
            if ($showcounter == 'true') { 
                $layout = ''; 
            } else {
                $layout = 'data-annotation="none"';
            }
            $html .= '<script src="https://apis.google.com/js/platform.js" async defer></script><div class="g-plusone" data-size="medium" '.$layout.' data-href="'.$url.'"></div>';
        }
    }
    return $html;

  }

}
