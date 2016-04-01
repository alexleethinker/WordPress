<?php

class ffSocialSharerPrinter{

	protected $_iconGroup;
	protected $_socialNetworks = "|pinterest|blinklist|delicious|designbump|designmoo|digg|dzone|email|evernote|facebook|fark|friendfeed|googleplus|googlebookmarks|linkedin|myspace|netvouz|newsvine|reddit|stumbleupon|technorati|tumblr|twitter|viadeo|vk|xing|";
	protected $_htmlStructure = '<span class="fa-wrapper"><a href="[LINK]" title="[TITLE]" target="_blank"><i class="icon-[FORMATING]"></i></a></span>';
	protected $_link;
	protected $_title = "UNDEFINED TITLE";
	protected $_dscr = "";
	protected $_img_link;

	function __construct(){
		$this->_iconGroup = new ffSocialSharer_font_awesome();
		$this->_htmlStructure = $this->_iconGroup->getHTMLStructure();

		// thanks to http://webcheatsheet.com/PHP/get_current_page_url.php
		global $_SERVER;
		$pageURL = 'http';
		if ( !empty($_SERVER["HTTPS"]) and $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
			$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}

        $this->_link = $pageURL;
	}
	
	function setSocialNetworks( $_socialNetworks ){
		$this->_socialNetworks =
				is_array($_socialNetworks) ?
				implode("|", $_socialNetworks) :
				"|".$_socialNetworks."|";
	}

	function setHTMLStructure( $htmlStructure ){ $this->_htmlStructure = $htmlStructure; }
	function setLink( $pageURL ){ $this->_link = $pageURL; }
	function setTitle( $title  ){ $this->_title = $title; }
	function setDscr( $dscr    ){ $this->_dscr = $dscr; }
	function setDescription( $dscr ){ $this->_dscr = $dscr; }
	function setImgLink( $_img_link  ){ $this->_img_link = $_img_link; }

	protected function getSocialLink($url, $url_params){
		$link = $url . '?';
		$params = array();
		foreach ($url_params as $key=>$_GET_param) {
            switch ($key) {
				case 'URL':     $params[] = $_GET_param . '=' . urlencode( $this->_link );    break;
				case 'TITLE':   if( !empty( $this->_title ) )
								$params[] = $_GET_param . '=' . urlencode( $this->_title );   break;
				case 'DSCR':    if( !empty( $this->_dscr ) )
								$params[] = $_GET_param . '=' . urlencode( $this->_dscr );    break;
				case 'IMG_URL': if( !empty( $this->_img_link ) )
								$params[] = $_GET_param . '=' . urlencode( $this->_img_link );break;
				case 'ADD':     if( !empty( $_GET_param ) )
								$params[] = $_GET_param;                                      break;
				default: break;
            }
        }
		return $link . implode("&amp;",$params);
	}

	public function getFormatedLinks(){
        $_links = $this->_iconGroup->getTheList();
        $ret = array();
        foreach ($_links as $key=>$values) {
			if( FALSE === stripos($this->_socialNetworks, "|$key|") ){
				continue;
			}
			$htmlLink = $this->_htmlStructure;
			$htmlLink = str_ireplace('[TITLE]', $values['title'], $htmlLink);
			$htmlLink = str_ireplace('[FORMATING]', $values['formating'], $htmlLink);
			$htmlLink = str_ireplace('[LINK]', $this->getSocialLink($values['url'], $values['url_params']), $htmlLink);
			$ret[ $key ] = $htmlLink;
        }
        return $ret;
	}
}

