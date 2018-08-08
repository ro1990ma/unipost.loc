<?php
class JConfig {
	public $offline = '0';
	public $offline_message = 'Сайт закрыт на техническое обслуживание.<br /> Пожалуйста, зайдите позже.';
	public $display_offline_message = '1';
	public $offline_image = '';
	public $sitename = 'Unipost Express';
	public $editor = 'tinymce';
	public $captcha = '0';
	public $list_limit = '100';
	public $access = '1';
	public $debug = '0';
	public $debug_lang = '0';
	public $dbtype = 'mysqli';
	public $host = 'localhost';

	// public $user = 'unipost_usr';
	// public $password = 'fXZ)U2m+Gl)z';
	public $user = 'root';
	public $password = '123456';

	public $db = 'unipost_main';
	public $dbprefix = 'uni_';
	public $live_site = '';
	public $secret = 'ROyraafNOVB1fGwc';
	public $gzip = '1';
	public $error_reporting = 'simple';
	public $helpurl = 'http://help.joomla.org/proxy/index.php?option=com_help&keyref=Help{major}{minor}:{keyref}';
	public $ftp_host = '127.0.0.1';
	public $ftp_port = '21';
	public $ftp_user = '';
	public $ftp_pass = '';
	public $ftp_root = '';
	public $ftp_enable = '0';
	public $offset = 'Europe/Bucharest';
	public $mailer = 'sendmail';
	public $mailfrom = 'admin@unipost.md';
	public $fromname = '"Unipost-Express"';
	public $sendmail = '/usr/sbin/sendmail';
	public $smtpauth = '0';
	public $smtpuser = '';
	public $smtppass = '';
	public $smtphost = 'localhost';
	public $smtpsecure = 'none';
	public $smtpport = '25';
	public $caching = '0';
	public $cache_handler = 'file';
	public $cachetime = '30';
	public $MetaDesc = 'Курьерская экспресс доставка международных почтовых отправлений: посылок и конвертов, срочная гарантированная курьерская доставка важных документов по городу, курьерские услуги по доставке товаров интернет магазинов';
	public $MetaKeys = 'Курьерская экспресс доставка международных почтовых отправлений: посылок и конвертов, срочная гарантированная курьерская доставка важных документов по городу, курьерские услуги по доставке товаров интернет магазинов';
	public $MetaTitle = '1';
	public $MetaAuthor = '0';
	public $MetaVersion = '0';
	public $robots = '';

	// public $sef = '1';
	// public $sef_rewrite = '1';
	public $sef = '0';
	public $sef_rewrite = '0';

	public $sef_suffix = '0';
	public $unicodeslugs = '0';
	public $feed_limit = '10';
	public $log_path = '/home/unipost/public_html/logs';
	public $tmp_path = '/home/unipost/public_html/tmp';
	public $lifetime = '60';
	public $session_handler = 'database';
	public $MetaRights = '';
	public $sitename_pagetitles = '0';
	public $force_ssl = '0';
	public $feed_email = 'author';
	public $cookie_domain = '';
	public $cookie_path = '';
}
