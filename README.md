# MobWeb_UmlautURLKeys extension for Magento

This extension updates Magento's URL creation logic for the category and product URLs. Umlauts will now be replaced with their correct alternative. Magento's default behaviour would turn an "ä" into an "a". With this extension the "ä" will be turned into an "ae". The same for both lower- and uppercase "ü" and "ö".

This repository also includes two scripts that you can run right from inside your Magento's root directory, and that will recreate ALL the category and product URLs following these new rules. However to use these scripts you will have to remove the second line of each script. It is not recommended to leave these scripts accessible on your server once you've run them, because they generate a lot of load on your server.

## Installation

Install using [colinmollenhour/modman](https://github.com/colinmollenhour/modman/).

## Questions? Need help?

Most of my repositories posted here are projects created for customization requests for clients, so they probably aren't very well documented and the code isn't always 100% flexible. If you have a question or are confused about how something is supposed to work, feel free to get in touch and I'll try and help: [info@mobweb.ch](mailto:info@mobweb.ch).