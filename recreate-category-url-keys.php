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

// Load all the categories
$categories = Mage::getModel('catalog/category')->getCollection();
echo sprintf('Updating %d categories', $categories->count());
echo "\n<br />";

// Loop through the categories
foreach($categories as $category) {
	// Load the full category model
	$categoryId = $category->getId();
	$category = Mage::getModel('catalog/category')->load($category->getId());

	// Only update the "normal" categories
	if($categoryId < 4) {
		echo sprintf('Skipping category with ID %d', $categoryId);
		echo "\n<br />";
		continue;
	}

	// Reset the category's URL key
    $category->setUrlKey($category->formatUrlKey($category->getName()))->save();

    // Display the updated URL key
    $category = Mage::getModel('catalog/category')->load($category->getId());
    echo sprintf('URL key for category %s set to: %s', $category->getName(), $category->getUrlKey());
    echo "\n<br />";

    // Reset the timeout
    set_time_limit(360);
}