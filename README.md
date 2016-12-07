Design Fallback
===============
This Magento extension introduces global fallback in Magento package/themes

Description
===========
By default, Magento allows configuring fallback theme for each specific store view.
But when you create widget in Magento admin (you can choose even multiple store views for your widget),
Magento calculates this configuration in the scope of current store view (which is `admin`).

Therefore if you have theme `child`, which fallback to the `parent` theme with some widget template file,
Magento will not find the template file to configure your widget.
For more details, check `Mage_Core_Model_Design_Package::getFilename` in runtime on widget edit page for child theme.

Is it a very often case, when the same theme should fallback to different parent themes depends on store view?
If you believe so, DO NOT USE this extension. If you want to configure fallback in your themes globally,
you're welcome with this extension!

Installation
============
See [modman documentation](https://github.com/colinmollenhour/modman/wiki)

Configuration
=============
![Magento System Configuration](https://github.com/blackakula/Magento-Design-Fallback/raw/master/screenshot.png)
