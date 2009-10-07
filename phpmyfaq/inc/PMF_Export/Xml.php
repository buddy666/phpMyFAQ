<?php
/**
 * XML Export class for phpMyFAQ
 *
 * @category  phpMyFAQ
 * @package   PMF_Export
 * @author    Thorsten Rinne <thorsten@phpmyfaq.de>
 * @since     2009-10-07
 * @license   Mozilla Public License 1.1
 * @copyright 2009 phpMyFAQ Team
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


/**
 * PMF_Export_Xml
 *
 * @category  phpMyFAQ
 * @package   PMF_Export
 * @author    Thorsten Rinne <thorsten@phpmyfaq.de>
 * @since     2009-10-07
 * @license   Mozilla Public License 1.1
 * @copyright 2009 phpMyFAQ Team
 */
class PMF_Export_Xml extends PMF_Export 
{
	/**
	 * XMLWriter object
	 * 
	 * @var XMLWriter
	 */
	private $xml = null;
	
	/**
	 * Constructor
	 * 
     * @param PMF_Faq      $faq      PMF_Faq object
     * @param PMF_Category $category PMF_Category object 
     * 
	 * return PMF_Export_Xml
	 */
	public function __construct(PMF_Faq $faq, PMF_Category $category)
	{
		$this->faq      = $faq;
		$this->category = $category;
		$this->xml      = new XMLWriter();
		
		$this->xml->openMemory();
	}
	
	/**
	 * Generates the export
	 * 
	 * @param integer $categoryId Category Id
	 * @param boolean $downwards  If true, downwards, otherwise upward ordering
	 * @param string  $language   Language
	 * 
	 * @return string
	 */
	public function generate($categoryId = 0, $downwards = true, $language = '')
	{
		
	}
}