<?php
die('Remove this line to be able to run the script');

// PHP setup
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
ini_set('memory_limit', '2064M');
umask(0);

// Magento setup
require 'app/Mage.php';
Mage::setIsDeveloperMode(true);
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

// Load all the produts
$products = Mage::getModel('catalog/product')->getCollection();
echo sprintf('Updating %d products', $products->count());
echo "\n<br />";

// Loop through the products
foreach($products as $product) {
	// Load the full product model
	$product = Mage::getModel('catalog/product')->load($product->getId());

	// Reset the product's URL key
    $product->setUrlKey($product->getName())->save();

    // Display the updated URL key
    $product = Mage::getModel('catalog/product')->load($product->getId());
    echo sprintf('URL key for product %s set to: %s', $product->getName(), $product->getUrlKey());
    echo "\n<br />";

    // Reset the timeout
    set_time_limit(360);
}