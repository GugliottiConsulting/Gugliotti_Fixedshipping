<?php
/**
 * Gugliotti Fixed Shipping
 */

/**
 * Fixed
 *
 * Default module helper.
 * @author Andre Gugliotti <andre@gugliotti.com.br>
 * @version 0.1.0
 * @package Shipping
 * @license GNU General Public License, version 3
 */
class Gugliotti_Fixedshipping_Model_Carrier_Fixed
	extends Mage_Shipping_Model_Carrier_Abstract
	implements Mage_Shipping_Model_Carrier_Interface
{
	/**
	 * $_code
	 * @var string
	 */
	protected $_code = 'gugliotti_fixedshipping';

	/**
	 * collectRates
	 *
	 * @param Mage_Shipping_Model_Rate_Request $request
	 * @return bool|Mage_Shipping_Model_Rate_Result
	 */
	public function collectRates(Mage_Shipping_Model_Rate_Request $request)
	{
		// get method data
		$carrierTitle = Mage::helper('gugliotti_fixedshipping')->getConfigData('title');
		$methodTitle = Mage::helper('gugliotti_fixedshipping')->getConfigData('method_title');
		$methodPrice = Mage::helper('gugliotti_fixedshipping')->getConfigData('method_price');

		// instantiate method object
		try {
			$method = Mage::getModel('shipping/rate_result_method');
			$method->setCarrier($this->_code);
			$method->setCarrierTitle($carrierTitle);
			$method->setMethod('fixed');
			$method->setMethodTitle($methodTitle);
			$method->setCost($methodPrice);
			$method->setPrice($methodPrice);
		} catch (Exception $e) {
			Mage::logException($e);
			return false;
		}

		// instantiate result object
		try {
			$result = Mage::getModel('shipping/rate_result');
			$result->append($method);
		} catch (Exception $e) {
			Mage::logException($e);
			return false;
		}

		return $result;
	}

	/**
	 * getAllowedMethods
	 */
	public function getAllowedMethods()
	{
	}

	/**
	 * isTrackingAvailable
	 * @return bool
	 */
	public function isTrackingAvailable()
	{
		return false;
	}
}
