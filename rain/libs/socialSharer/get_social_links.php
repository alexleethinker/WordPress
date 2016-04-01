<?php

require_once dirname(__FILE__) . '/class.ffSocialSharer.php';
//require_once dirname(__FILE__) . '/class.ffSocialSharer_zocial.php';
require_once dirname(__FILE__) . '/class.ffSocialSharer_font_awesome.php';
require_once dirname(__FILE__) . '/class.ffSocialSharerPrinter.php';

function get_social_links(){
	$share = 1 * rain_get_option('sharing-on');
	if( empty($share) ) {return;}
	$share = rain_get_option('share-on');
	if( empty($share) ) {return;}

	$ffSocShrPrnt = new ffSocialSharerPrinter();
	
	$ffSocShrPrnt->setHTMLStructure(
		// <a class="share-item fa fa-google-plus" href=""></a>
		'<a class="share-item fa fa-[FORMATING]" href="[LINK]" title="[TITLE]" target="_blank"></a>'
	);

	$ffSocShrPrnt->setSocialNetworks( implode('|', rain_get_option( 'share-on' ) ) );

	$ffSocShrPrnt->setLink( get_permalink() );	

	$ffSocShrPrnt->setDscr( get_the_title() );
	$ffSocShrPrnt->setTitle( get_the_title() );

	$links = $ffSocShrPrnt->getFormatedLinks();
	$order = array( 'googleplus', 'twitter', 'facebook' );

	echo '<div class="share-this">';
	echo '<div class="share-this-bm">';
	echo '<i class="fa fa-share"></i>';
	echo '</div>';
	echo '<div class="share-this-inner">';

	foreach ($order as $index => $network) {
		if( isSet( $links[$network] ) ){
			echo $links[$network];
		}
	}

	echo '</div>';
	echo '</div>';

}