<?php
class SKyrychenko_Design_Model_Design_Package extends Mage_Core_Model_Design_Package
{
    /**
     * Overridden: global fallback setup should be used
     *
     * {@inheritdoc}
     */
    public function getFilename($file, array $params)
    {
        Varien_Profiler::start(__METHOD__);
        $fallback = $this->defaultTheme($params);
        $this->updateParamDefaults($params);
        $fallback = $fallback ?: $this->defaultTheme($params);
        $result = $this->_fallback($file, $params, array(
            array(),
            array('_theme' => $fallback ?: $this->getFallbackTheme()),
            array('_theme' => self::DEFAULT_THEME),
        ));
        Varien_Profiler::stop(__METHOD__);
        return $result;
    }

    /**
     * Calculate fallback theme from the configuration
     *
     * @param array $params
     * @return false|string
     */
    private function defaultTheme($params)
    {
        if (!array_key_exists('_area', $params) || $params['_area'] != 'frontend') {
            // fallback will be used only for 'frontend' area
            return false;
        }
        if (!array_key_exists('_package', $params) || !array_key_exists('_theme', $params)) {
            // not able to find fallback if package/theme is not defined
            return false;
        }
        $fallback = unserialize(Mage::getStoreConfig('design/theme/fallback'));
        if (!is_array($fallback)) {
            // fallback is not set up
            return false;
        }
        foreach ($fallback as $rule) {
            if ($rule['package'] == $params['_package'] && $rule['theme'] == $params['_theme']) {
                return $rule['fallback'];
            }
        }
        // fallback is not set up for current theme
        return false;
    }
}
