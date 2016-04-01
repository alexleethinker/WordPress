<?php

class ffSocialSharer_font_awesome extends ffSocialSharer{ // Social Feeder List for Zocial
	// protected $_the_list = null;
	
	protected $_formating = array(
		'pinterest'       => 'pinterest',
		'email'           => 'envelope',
		'facebook'        => 'facebook',
		'googleplus'      => 'google-plus',
		'googlebookmarks' => 'google-plus-sign',
		'linkedin'        => 'linkedin',
		'tumblr'          => 'tumblr',
		'twitter'         => 'twitter',
		'vk'              => 'vk',
		'xing'            => 'xing',
	);
	
	public function getHTMLStructure(){
		return '<span class="fa-wrapper"><a href="[LINK]" title="" target="_blank"><i class="icon-[FORMATING]"></i> [TITLE]</a></span>';
	}

	public function getStyles() { return array('font-awesome'); }
	public function getScripts(){ return array(); }

}