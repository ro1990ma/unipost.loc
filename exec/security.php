<?php
	class Security {
		function Security() {
			Security::AntiXSS();
			Security::ValueFilter();
			Security::CheckQString();
			$User_IP 		= $_SERVER['REMOTE_ADDR'];
			$server_time	= date("H:i:s", time()); 
			$query_string 	= $_SERVER['QUERY_STRING'];
			$log_content 	= "[$server_time] IP: $User_IP, Query String: $query_string";
			Security::WriteLog('all',$log_content);
		}
		function AntiXSS() {
			$p	= parse_url($_SERVER['HTTP_REFERER']);
			if ($p['port'])	{	$p	= $p['host'].':'.$p['port'];	}
			else 			{	$p	= $p['host'];					}
			if ($p != $_SERVER['HTTP_HOST']) {
				if ($_POST) {
					$User_IP 		= $_SERVER['REMOTE_ADDR'];
					$server_time 	= date("H:i:s", time());
					$query_string 	= $_SERVER['QUERY_STRING'];
					$log_content 	= "[$server_time] - XSS POST, IP: $User_IP, Query String: $query_string\n";
					Security::WriteLog('Attack',$log_content);
					//Die ("<div style='text-align: center; font-size: 18px; color: red;'>XSS Attack!</div>");
				}
				foreach ($_GET as $check_url) {
					if (!is_array($check_url)) {
						$check_url	= str_replace("\"", "", $check_url);
						if ((eregi("<[^>]*script*\"?[^>]*>", $check_url)) || (eregi("<[^>]*object*\"?[^>]*>", $check_url)) || (eregi("<[^>]*iframe*\"?[^>]*>", $check_url)) || (eregi("<[^>]*applet*\"?[^>]*>", $check_url)) || (eregi("<[^>]*meta*\"?[^>]*>", $check_url)) || (eregi("<[^>]*style*\"?[^>]*>", $check_url)) || (eregi("<[^>]*form*\"?[^>]*>", $check_url)) || (eregi("\([^>]*\"?[^)]*\)", $check_url)) || (eregi("\"", $check_url))) {
							$User_IP 		= $_SERVER['REMOTE_ADDR'];
							$server_time	= date("H:i:s", time()); 
							$query_string 	= $_SERVER['QUERY_STRING'];
							$log_content 	= "[$server_time] - XSS GET, IP: $User_IP, Query String: $query_string\n";
							Security::WriteLog('Attack',$log_content);
							Die ("<div style='text-align: center; font-size: 18px; color: red;'>XSS Attack!</div>");
						}
					}
				}
				unset($check_url);
			}
		}
		function CheckValue($str) {
			if(strpos(str_replace("''", "", $str), "'") != false) {
				return str_replace("'", "''", $str);
			}
			else {
				return $str;
			}
		}
		function Secure($str) {
			if (is_array($str)) {
				foreach($str AS $id => $value) {
					$str[$id]	= Security::Secure($value);
				}
			}
			else {
				$str	= Security::CheckValue($str);
			}
			return $str;
		}
		function CheckQString() {
			$query_string	= $_SERVER['QUERY_STRING'];
			$badlist		= array('chr(', 'chr=', 'chr%20', '%20chr', 'wget%20', '%20wget', 'wget(','cmd=', '%20cmd', 'cmd%20', 'rush=', '%20rush', 'rush%20','union%20', '%20union', 'union(', 'union=', 'echr(', '%20echr', 'echr%20', 'echr=','esystem(', 'esystem%20', 'cp%20', '%20cp', 'cp(', 'mdir%20', '%20mdir', 'mdir(','mcd%20', 'mrd%20', 'rm%20', '%20mcd', '%20mrd', '%20rm','mcd(', 'mrd(', 'rm(', 'mcd=', 'mrd=', 'mv%20', 'rmdir%20', 'mv(', 'rmdir(','chmod(', 'chmod%20', '%20chmod', 'chmod(', 'chmod=', 'chown%20', 'chgrp%20', 'chown(', 'chgrp(','locate%20', 'grep%20', 'locate(', 'grep(', 'diff%20', 'kill%20', 'kill(', 'killall','passwd%20', '%20passwd', 'passwd(', 'telnet%20', 'vi(', 'vi%20','insert%20into', 'select%20', 'nigga(', '%20nigga', 'nigga%20', 'fopen', 'fwrite', '%20like', 'like%20','$_request', '$_get', '$request', '$get', '.system', 'HTTP_PHP', '&aim', '%20getenv', 'getenv%20','new_password', '&icq','/etc/password','/etc/shadow', '/etc/groups', '/etc/gshadow','HTTP_USER_AGENT', 'HTTP_HOST', '/bin/ps', 'wget%20', 'uname\x20-a', '/usr/bin/id','/bin/echo', '/bin/kill', '/bin/', '/chgrp', '/chown', '/usr/bin', 'g\+\+', 'bin/python','bin/tclsh', 'bin/nasm', 'perl%20', 'traceroute%20', 'ping%20', '.pl', '/usr/X11R6/bin/xterm', 'lsof%20','/bin/mail', '.conf', 'motd%20', 'HTTP/1.', '.inc.php', 'config.php', 'cgi-', '.eml','file\://', 'window.open', '<SCRIPT>', 'javascript\://','img src', 'img%20src','.jsp','ftp.exe','xp_enumdsn', 'xp_availablemedia', 'xp_filelist', 'xp_cmdshell', 'nc.exe', '.htpasswd','servlet', '/etc/passwd', 'wwwacl', '~root', '~ftp', '.js', '.jsp', 'admin_', '.history','bash_history', '.bash_history', '~nobody', 'server-info', 'server-status', 'reboot%20', 'halt%20','powerdown%20', '/home/ftp', '/home/www', 'secure_site, ok', 'chunked', 'org.apache', '/servlet/con','<script', '/robot.txt' ,'/perl' ,'mod_gzip_status', 'db_mysql.inc', '.inc', 'select%20from','select from', 'drop%20', '.system', 'getenv', 'http_', '_php', 'php_', 'phpinfo()', 'DELETE FROM', '.exe', 'DELETE', '<?php', '?>', 'sql=','../','..\\','"','>','<','%','&lt','&gt');
			$replace_bad	= str_replace($badlist, '*', $query_string);
			if ($query_string != $replace_bad) {
				$User_IP		= $_SERVER['REMOTE_ADDR'];
				$server_time	= date("H:i:s", time()); 
				$log_content	= "[$server_time] - BAD LINK, IP: $User_IP, Query String: $query_string\n";
				Security::WriteLog('Attack',$log_content);
				Die ("<div style='text-align: center; font-size: 18px; color: red;'>Attack Detected!<br>Your IP: ".$User_IP."</div>");
			}
		}
		function ValueFilter() {
			$GET_KEYS		= array_keys($_GET);
			$i 				= 0;
			while($i < count($GET_KEYS)) {
				$_GET[$GET_KEYS[$i]]			= Security::Secure($_GET[$GET_KEYS[$i]]);
				$i++;
			}
			$REQUEST_KEYS	= array_keys($_REQUEST);
			$i				= 0;
			while($i < count($REQUEST_KEYS)) {
				$_REQUEST[$REQUEST_KEYS[$i]]	= Security::Secure($_REQUEST[$REQUEST_KEYS[$i]]);
				$i++;
			}
			$POST_KEYS		= array_keys($_POST);
			$i 				= 0;
			while($i < count($POST_KEYS)) {
				$_POST[$POST_KEYS[$i]]			= Security::Secure($_POST[$POST_KEYS[$i]]);
				$i++;
			}
			$COOKIE_KEYS	= array_keys($_COOKIE);
			$i				= 0;
			while($i < count($COOKIE_KEYS)) {
				$_COOKIE[$COOKIE_KEYS[$i]]		= Security::Secure($_COOKIE[$COOKIE_KEYS[$i]]);
				$i++;
			}
		}
		function WriteLog($where,$content) {
			if(!$where) {
				Die ("<div style='text-align: center; font-size: 18px; color: red;'>Log folder doesn't exist!</div>");
			}
			if($handle = fopen('./Logs/'.$where.'/'.date("d.m.Y", time()).'.txt', 'a+')) {
				if (fwrite($handle, $content) === FALSE) {
					fclose($handle);
				}
			}
		}
		function CheckWord($a) {
			$a	= preg_replace('/[<>;%\'"`]/i','',stripslashes($a));
			return	$a;
		}
	}
?>