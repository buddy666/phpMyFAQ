<?php
/**
* $Id: rss.php,v 1.9 2006-06-17 13:01:25 matteo Exp $
*
* The RSS feed with the news
*
* @package      phpMyFAQ
* @access       public
* @author       Thorsten Rinne <thorsten@phpmyfaq.de>
* @copyright    (c) 2004 - 2005 phpMyFAQ Team
*
* The contents of this file are subject to the Mozilla Public License
* Version 1.1 (the "License"); you may not use this file except in
* compliance with the License. You may obtain a copy of the License at
* http://www.mozilla.org/MPL/
* 
* Software distributed under the License is distributed on an "AS IS"
* basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See the
* License for the specific language governing rights and limitations
* under the License.
*/
define('PMF_ROOT_DIR', dirname(dirname(dirname(__FILE__))));
require_once(PMF_ROOT_DIR.'/inc/Init.php');
PMF_Init::cleanRequest();

require_once (PMF_ROOT_DIR."/inc/Category.php");
require_once (PMF_ROOT_DIR."/lang/".$PMF_CONF["language"]);

$result = $db->query("SELECT datum, header, artikel, link, linktitel, target FROM ".SQLPREFIX."faqnews ORDER BY datum desc");

$rss = "<?xml version=\"1.0\" encoding=\"".$PMF_LANG["metaCharset"]."\" standalone=\"yes\" ?>\n<rss version=\"2.0\">\n<channel>\n";
$rss .= "<title>".$PMF_CONF["title"]."</title>\n";
$rss .= "<description>".$PMF_CONF["metaDescription"]."</description>\n";
$rss .= "<link>http://".$_SERVER["HTTP_HOST"]."</link>";

if ($db->num_rows($result) > 0) {
    
    while ($row = $db->fetch_object($result)) {
        
        $rss .= "\t<item>\n";
        $rss .= "\t\t<title>".$row->header."</title>\n";
        $rss .= "\t\t<description><![CDATA[ ".stripslashes(htmlspecialchars($row->artikel))." ]]></description>\n";
        $rss .= "\t\t<link>http://".$_SERVER["HTTP_HOST"].str_replace ("feed/news/rss.php", "", $_SERVER["PHP_SELF"])."</link>\n";
        $rss .= "\t</item>\n";
        
    }
    
}

$rss .= "</channel>\n</rss>";

header("Content-Type: text/xml");
header("Content-Length: ".strlen($rss));
print $rss;

$db->dbclose();
?>
