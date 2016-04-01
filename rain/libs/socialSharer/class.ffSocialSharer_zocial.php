<?php

class ffSocialSharer_zocial extends ffSocialSharer{ // Social Feeder List for Zocial
	// protected $_the_list = null;
	
	protected $_formating = array(
		'pinterest' => 'pinterest',
		'delicious' => 'delicious',
		'digg' => 'digg',
		'email' => 'email',
		'evernote' => 'evernote',
		'facebook' => 'facebook',
		'googleplus' => 'googleplus',
		'googlebookmarks' => 'google',
		'linkedin' => 'linkedin',
		'myspace' => 'myspace',
		'reddit' => 'reddit',
		'stumbleupon' => 'stumbleupon',
		'tumblr' => 'tumblr',
		'twitter' => 'twitter',
		'viadeo' => 'viadeo',
		'vk' => 'vk',
		'xing' => 'xing',
	);
	
	public function getHTMLStructure(){
		return '<a href="[LINK]" title="[TITLE]" target="_blank"><span class="zocial icon [FORMATING]">Share on [TITLE]</span></a>';
	}

	public function getStyles() { return array('zocial'); }
	public function getScripts(){ return array(); }

}