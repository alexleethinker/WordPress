<?php
  
// http://pageaffairs.com/examples/bookmarking-without-js/
// http://4rapiddev.com/internet/share-link-url-of-facebook-twitter-google-plus-stumbleupon-reddit-digg-and-tumblr/

/*
params:
-------
URL, TITLE, DSCR, SRC
ADD - dunno stuff, looks like it has to be there
IMG_URL, IMG_TITLE
*/

  
abstract class ffSocialSharer{ // Social Feeder List
	protected $_the_list;
	
	protected $_formating = array(
		'pinterest' => 'pinterest',
		'blinklist' => 'blinklist',
		'delicious' => 'delicious',
		'designbump' => 'designbump',
		'designmoo' => 'designmoo',
		'digg' => 'digg',
		'dzone' => 'dzone',
		'email' => 'email',
		'evernote' => 'evernote',
		'facebook' => 'facebook',
		'fark' => 'fark',
		'friendfeed' => 'friendfeed',
		'googleplus' => 'googleplus',
		'googlebookmarks' => 'googlebookmarks',
		'linkedin' => 'linkedin',
		'myspace' => 'myspace',
		'netvouz' => 'netvouz',
		'newsvine' => 'newsvine',
		'reddit' => 'reddit',
		'stumbleupon' => 'stumbleupon',
		'technorati' => 'technorati',
		'tumblr' => 'tumblr',
		'twitter' => 'twitter',
		'viadeo' => 'viadeo',
		'vk' => 'vk',
		'xing' => 'xing',
	);

	public function getStyles(){ return array(); }
	public function getScripts(){ return array(); }

	public function getTheList(){
		if( !empty( $this->_the_list ) ){
			return $this->_the_list;
		}
		$this->_makeTheList();

		$updated_list = array();

		foreach( $this->_the_list as $key=>$data ){
			if( empty($this->_formating[$key]) ){
				continue;
			}
			$updated_list[$key] = $data;
			$updated_list[$key]['formating'] = $this->_formating[$key];
		}

		return $this->_the_list = $updated_list;
	}

	protected function _makeTheList(){
		if( !empty( $this->_the_list ) ){
			return $this->_the_list;
		}

		return $this->_the_list = array(

////////////////////////////////////////////////////////////////////////////////
// IMAGES
////////////////////////////////////////////////////////////////////////////////

			// TODO:
			// Tapiture - http://tapiture.com/bookmarklet/image?img_src=[IMAGE]&page_url=[URL]&page_title=[TITLE]&img_title=[TITLE]&img_width=[IMG WIDTH]img_height=[IMG HEIGHT]

			'pinterest' => array(
					'title' => 'Pinterest',
					'url' => 'http://pinterest.com/pin/create/bookmarklet/', // ?media=[MEDIA]&url=[URL]&is_video=false&description=[TITLE]
					'url_params' => array(
							'URL' => 'url',
							'IMG_URL' => 'media',
							'DSCR' => 'description',
					),
			),

////////////////////////////////////////////////////////////////////////////////
// LINKS
////////////////////////////////////////////////////////////////////////////////

			'blinklist' => array(
					'title' => 'Blinklist',
					'url' => 'http://www.blinklist.com/index.php', // ?Action=Blink/Addblink.php&amp;Url=[url]&amp;Title=[title]
					'url_params' => array(
							'URL' => 'Url',
							'TITLE' => 'Title',
							'ADD' => 'Action=Blink/Addblink.php',
					),
			),

			'delicious' => array(
					'title' => 'Delicious',
					'url' => 'http://del.icio.us/post', // ?url=[URL]&title=[TITLE]]&notes=[DESCRIPTION]
					'url_params' => array(
							'URL' => 'url',
							'TITLE' => 'title',
							'DSCR' => 'notes',
					),
			),

			'designbump' => array(
					'title' => 'Design Bump',
					'url' => 'http://www.designbump.com/node/add/drigg/', // ?url=[URL]&title=[title]&body=[desc]
					'url_params' => array(
							'URL' => 'url',
							'TITLE' => 'title',
							'DSCR' => 'body',
					),
			),

			'designmoo' => array(
					'title' => 'Design Moo',
					'url' => 'http://www.designmoo.com/node/add/drigg/', // ?url=[URL]&title=[title]&body=[desc]
					'url_params' => array(
							'URL' => 'url',
							'TITLE' => 'title',
							'DSCR' => 'body',
					),
			),

			'digg' => array(
					'title' => 'Digg',
					'url' => 'http://digg.com/submit', // ?url=[URL]&title=[TITLE]
					'url_params' => array(
							'URL' => 'url',
							'TITLE' => 'title',
					),
			),

			'dzone' => array(
					'title' => 'DZone',
					'url' => 'http://dzone.com/links/add.html', // ?url=[URL]&amp;title=[title]&amp;description=[desc]
					'url_params' => array(
							'URL' => 'url',
							'TITLE' => 'title',
							'DSCR' => 'description',
					),
			),

			'email' => array(
					'title' => 'Email',
					'url' => 'mailto:', // ?subject=[title]&amp;body=[URL]
					'url_params' => array(
							'URL' => 'subject',
							'TITLE' => 'body',
					),
			),

			'evernote' => array(
					'title' => 'Evernote',
					'url' => 'http://www.evernote.com/clip.action', // ?url=[URL]&amp;title=[title]
					'url_params' => array(
							'URL' => 'url',
							'TITLE' => 'title',
					),
			),

			'facebook' => array(
					'title' => 'Facebook',
					'url' => 'https://www.facebook.com/sharer.php', // ?u=[URL]&t=[TITLE]
					'url_params' => array(
							'URL' => 'u',
					),
			),

			'fark' => array(
					'title' => 'Fark',
					'url' => 'http://cgi.fark.com/cgi/fark/farkit.pl', // ?u=[url]&amp;h=[title]
					'url_params' => array(
							'URL' => 'u',
							'TITLE' => 'h',
					),
			),

			'friendfeed' => array(
					'title' => 'Friendfeed',
					'url' => 'http://www.friendfeed.com/share', // ?url=[URL]&amp;title=[title]
					'url_params' => array(
							'URL' => 'url',
							'TITLE' => 'title',
					),
			),

			'googleplus' => array(
					'title' => 'Google+',
					'url' => 'https://plus.google.com/share', // ?url=[URL]
					'url_params' => array(
							'URL' => 'url',
					),
			),

			'googlebookmarks' =>array(
					'title' => 'Google Bookmarks',
					'url' => 'http://www.google.com/bookmarks/mark', // ?op=edit&amp;bkmk=[URL]&amp;title=[title]&amp;annotation=[desc]
					'url_params' => array(
							'URL' => 'bkmk',
							'TITLE' => 'title',
							'DSCR' => 'annotation',
							'ADD' => 'op=edit',
					),
			),

			// http://www.linkedin.com/shareArticle?mini=true&url=[URL]&title=[TITLE]&source=[SOURCE/DOMAIN]
			'linkedin' => array(
					'title' => 'linkedIn',
					'url' => 'http://www.linkedin.com/shareArticle', //?mini=true&url={articleUrl}&title={articleTitle}&summary={articleSummary}&source={articleSource}
					'url_params' => array(
							'URL' => 'url',
							'TITLE' => 'title',
							'DSCR' => 'summary',
							'SRC' => 'source',
					),
			),

			'myspace' => array(
					'title' => 'Myspace',
					'url' => 'http://www.myspace.com/Modules/PostTo/Pages/', // ?u=[url]&amp;t=[title]
					'url_params' => array(
							'URL' => 'u',
							'TITLE' => 't',
					),
			),

			'netvouz' => array(
					'title' => 'Netvouz',
					'url' => 'http://www.netvouz.com/action/submitBookmark', // ?url=[url]&amp;title=[title]&amp;popup=no
					'url_params' => array(
							'URL' => 'url',
							'TITLE' => 'title',
							'ADD' => 'popup=no',
					),
			),

			'newsvine' => array(
					'title' => 'Newsvine',
					'url' => 'http://www.newsvine.com/_tools/seed&amp;save', // ?u=[URL]&h=[TITLE]
					'url_params' => array(
							'URL' => 'u',
							'TITLE' => 'h',
					),
			),

			'reddit' => array(
					'title' => 'Reddit',
					'url' => 'http://reddit.com/submit', //?url=[URL]&title=[TITLE]
					'url_params' => array(
							'URL' => 'url',
							'TITLE' => 'title',
					),
			),

			'stumbleupon' => array(
					'title' => 'Stumbleupon',
					'url' => 'http://www.stumbleupon.com/submit', //?url=[URL]&title=[TITLE]
					'url_params' => array(
							'URL' => 'url',
							'TITLE' => 'title',
					),
			),

			'technorati' => array(
					'title' => 'Technorati',
					'url' => 'http://technorati.com/faves', // ?add=[URL]&amp;title=[title]
					'url_params' => array(
							'URL' => 'add',
							'TITLE' => 'title',
					),
			),

			// http://www.tumblr.com/share?v=3&u=[URL]&t=[TITLE]
			// http://www.tumblr.com/share?v=3&amp;u=[url]&amp;t=[title]&amp;s=[description]
			'tumblr' => array(
					'title' => 'Tumblr',
					'url' => 'http://www.tumblr.com/share/link', //?url=[URL]&name=[TITLE]&description=[DESCRIPTION]
					'url_params' => array(
							'URL' => 'url',
							'TITLE' => 'name',
							'DSCR' => 'description',
					),
			),

			// http://twitter.com/home?status=[TITLE]+[URL]
			'twitter' => array(
					'title' => 'Twitter',
					'url' => 'http://twitter.com/intent/tweet', //?source=[SRC]&text=[TITLE]&url=[URL]
					'url_params' => array(
							'URL' => 'url',
							'TITLE' => 'text',
							'SRC' => 'source',
					),
			),

			// http://www.addtoany.com/add_to/viadeo?linkurl=PAGE_URL_ENCODED&amp;linkname=PAGE_TITLE_ENCODED
			'viadeo' => array(
					'title' => 'Viadeo',
					'url' => 'http://www.addtoany.com/add_to/viadeo', // ?linkurl=PAGE_URL_ENCODED&amp;linkname=PAGE_TITLE_ENCODED
					'url_params' => array(
							'URL' => 'linkurl',
							'TITLE' => 'linkname',
					),
			),

			// http://vkontakte.ru/share.php?url={page address}
			'vk' => array(
					'title' => 'VK',
					'url' => 'http://vkontakte.ru/share.php', // ?url={page address}
					'url_params' => array(
							'URL' => 'url',
					),
			),

			// https://www.xing.com/app/user?op=share&url=testlink.de;title=Test;provider=testprovider
			'xing' => array(
					'title' => 'XING',
					'url' => 'https://www.xing.com/app/user', // ?op=share&url=testlink.de;title=Test;provider=testprovider
					'url_params' => array(
							'URL' => 'url',
							'TITLE' => 'title',
							'SRC' => 'provider',
							'ADD' => 'op=share',
					),
			),

		);

	}
}