<?php
namespace TYPO3\CMS\Vidi\ViewHelpers\Component;
/***************************************************************
*  Copyright notice
*
*  (c) 2013 Fabien Udriot <fabien.udriot@typo3.org>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
use TYPO3\CMS\Backend\Utility\IconUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * View helper which renders a "xml export" item to be placed in the menu.
 */
class MenuItemExportXmlViewHelper extends AbstractViewHelper {

	/**
	 * Renders an "xml export" item to be placed in the menu.
	 * Only the admin is allowed to export for now as security is not handled.
	 *
	 * @return string
	 */
	public function render() {
		$result = '';
		if ($this->getBackendUser()->isAdmin()) {
			$result = sprintf('<li><a href="#" class="export-xml" data-format="xml">%s %s</a></li>',
				IconUtility::getSpriteIcon('mimetypes-text-html'),
				LocalizationUtility::translate('export-xml', 'vidi')
			);
		}
		return $result;
	}

	/**
	 * Returns an instance of the current Backend User.
	 *
	 * @return \TYPO3\CMS\Core\Authentication\BackendUserAuthentication
	 */
	protected function getBackendUser() {
		return $GLOBALS['BE_USER'];
	}
}
