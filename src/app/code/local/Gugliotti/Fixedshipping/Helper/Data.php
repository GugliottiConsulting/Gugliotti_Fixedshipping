<?php
/**
 * Gugliotti Fixed Shipping
 */

/**
 * Data Helper
 *
 * Default module helper.
 * @author Andre Gugliotti <andre@gugliotti.com.br>
 * @version 0.1.0
 * @package Shipping
 * @license GNU General Public License, version 3
 */
class Gugliotti_Fixedshipping_Helper_Data extends Mage_Core_Helper_Abstract
{
	/**
	 * getConfigData
	 *
	 * Returns the value for a given configuration.
	 * @param mixed $data
	 * @return mixed
	 */
	public function getConfigData($data)
	{
		return Mage::getStoreConfig('carriers/gugliotti_fixedshipping/' . $data);
	}
}
