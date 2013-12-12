<?php

class MobWeb_UmlautURLKeys_Model_Product_Url extends Mage_Catalog_Model_Product_Url
{
	public function formatUrlKey($str)
	{
	    $str = str_replace(array('Ä', 'ä', 'Ö', 'ö', 'Ü', 'ü'), array('ae', 'ae', 'oe', 'oe', 'ue', 'ue'), $str);
	    return parent::formatUrlKey($str);
	}
}