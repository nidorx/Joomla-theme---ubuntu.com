<?

// no direct access
defined('JFLT_EXEC') or die('Restricted access');

class Jflt_Core_Browser
{

    /**
     * agent of Browser
     * 
     * @var string 
     */
    private $_agent = '';
    /**
     * Name of Browser
     * @var string 
     */
    private $_name = '';
    /**
     *
     * @var string
     */
    private $_version = '';
    /**
     * Flag que determina se o browser é um mobile
     * 
     * @var boolean 
     */
    private $_is_mobile = false;
    /**
     * Flag que determina se o browser é um robo de busca
     * 
     * @var boolean 
     */
    private $_is_robot = false;
    /**
     * Hold an instance of the class
     * This class use singleton
     * 
     * @var Jflt_Core_Browser 
     */
    private static $instance;
    private $_is_aol = false;
    private $_aol_version = '';

    /**
     * The singleton method
     * 
     * @return Jflt_Core_Browser 
     */
    public static function get()
    {
        if (!isset(self::$instance))
        {
            $c = __CLASS__;
            self::$instance = new $c;
        }
        return self::$instance;
    }

    /**
     * A private constructor; prevents direct creation of object
     */
    private function __construct()
    {
        $this->reset();
        $this->determine();
    }

    /**
     * Reset all properties
     */
    public function reset()
    {
        $this->_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "";
        $this->_name = UNKNOWN;
        $this->_version = VERSION_UNKNOWN;
        $this->_is_aol = false;
        $this->_is_mobile = false;
        $this->_is_robot = false;
        $this->_aol_version = VERSION_UNKNOWN;
    }

    /**
     * Check to see if the specific browser is valid
     * 
     * @param string $browserName
     * @return True if the browser is the specified browser
     */
    function isBrowser($browserName)
    {
        return( 0 == strcasecmp($this->_name, trim($browserName)));
    }

    /**
     * The name of the browser.  All return types are from the class contants
     * 
     * @return string Name of the browser
     */
    public function getBrowser()
    {
        return $this->_name;
    }

    /**
     * Set the name of the browser
     * @param $browser The name of the Browser
     */
    public function setBrowser($browser)
    {
        return $this->_name = $browser;
    }

    /**
     * The version of the browser.
     * @return string Version of the browser (will only contain alpha-numeric characters and a period)
     */
    public function getVersion()
    {
        return $this->_version;
    }

    /**
     * Set the version of the browser
     * @param $version The version of the Browser
     */
    public function setVersion($version)
    {
        $this->_version = preg_replace('/[^0-9,.,a-z,A-Z-]/', '', $version);
    }

    /**
     * The version of AOL.
     * @return string Version of AOL (will only contain alpha-numeric characters and a period)
     */
    public function getAolVersion()
    {
        return $this->_aol_version;
    }

    /**
     * Set the version of AOL
     * @param $version The version of AOL
     */
    public function setAolVersion($version)
    {
        $this->_aol_version = preg_replace('/[^0-9,.,a-z,A-Z]/', '', $version);
    }

    /**
     * Is the browser from AOL?
     * @return boolean True if the browser is from AOL otherwise false
     */
    public function isAol()
    {
        return $this->_is_aol;
    }

    /**
     * Is the browser from a mobile device?
     * @return boolean True if the browser is from a mobile device otherwise false
     */
    public function isMobile()
    {
        return $this->_is_mobile;
    }

    /**
     * Is the browser from a robot (ex Slurp,GoogleBot)?
     * @return boolean True if the browser is from a robot otherwise false
     */
    public function isRobot()
    {
        return $this->_is_robot;
    }

    /**
     * Set the browser to be from AOL
     * @param $isAol
     */
    public function setAol($isAol)
    {
        $this->_is_aol = $isAol;
    }

    /**
     * Set the Browser to be mobile
     * @param boolean $value is the browser a mobile brower or not
     */
    protected function setMobile($value=true)
    {
        $this->_is_mobile = $value;
    }

    /**
     * Set the Browser to be a robot
     * @param boolean $value is the browser a robot or not
     */
    protected function setRobot($value=true)
    {
        $this->_is_robot = $value;
    }

    /**
     * Get the user agent value in use to determine the browser
     * @return string The user agent from the HTTP header
     */
    public function getUserAgent()
    {
        return $this->_agent;
    }

    /**
     * Set the user agent value (the construction will use the HTTP header value - this will overwrite it)
     * @param $agent_string The value for the User Agent
     */
    public function setUserAgent($agent_string)
    {
        $this->reset();
        $this->_agent = $agent_string;
        $this->determine();
    }

    /**
     * Used to determine if the browser is actually "chromeframe"
     * @since 1.7
     * @return boolean True if the browser is using chromeframe
     */
    public function isChromeFrame()
    {
        return( strpos($this->_agent, "chromeframe") !== false );
    }

    /**
     * Returns a formatted string with a summary of the details of the browser.
     * @return string formatted string with a summary of the browser
     */
    public function __toString()
    {
        return "<strong>Browser Name:</strong>{$this->getBrowser()}<br/>\n" .
        "<strong>Browser Version:</strong>{$this->getVersion()}<br/>\n" .
        "<strong>Browser User Agent String:</strong>{$this->getUserAgent()}<br/>";
    }

    /**
     * Protected routine to calculate and determine what the browser is in use (including platform)
     */
    protected function determine()
    {
        $this->checkBrowsers();
        $this->checkForAol();
    }

    /**
     * Protected routine to determine the browser type
     * @return boolean True if the browser was detected otherwise false
     */
    protected function checkBrowsers()
    {
        return (
        // well-known, well-used
        // Special Notes:
        // (1) Opera must be checked before FireFox due to the odd
        //     user agents used in some older versions of Opera
        // (2) WebTV is strapped onto Internet Explorer so we must
        //     check for WebTV before IE
        // (3) (deprecated) Galeon is based on Firefox and needs to be
        //     tested before Firefox is tested
        // (4) OmniWeb is based on Safari so OmniWeb check must occur
        //     before Safari
        // (5) Netscape 9+ is based on Firefox so Netscape checks
        //     before FireFox are necessary
        $this->checkBrowserWebTv() ||
        $this->checkBrowserInternetExplorer() ||
        $this->checkBrowserOpera() ||
        $this->checkBrowserGaleon() ||
        $this->checkBrowserNetscapeNavigator9Plus() ||
        $this->checkBrowserFirefox() ||
        $this->checkBrowserChrome() ||
        $this->checkBrowserOmniWeb() ||
        // common mobile
        $this->checkBrowserAndroid() ||
        $this->checkBrowseriPad() ||
        $this->checkBrowseriPod() ||
        $this->checkBrowseriPhone() ||
        $this->checkBrowserBlackBerry() ||
        $this->checkBrowserNokia() ||
        // common bots
        $this->checkBrowserGoogleBot() ||
        $this->checkBrowserMSNBot() ||
        $this->checkBrowserSlurp() ||
        // WebKit base check (post mobile and others)
        $this->checkBrowserSafari() ||
        // everyone else
        $this->checkBrowserNetPositive() ||
        $this->checkBrowserFirebird() ||
        $this->checkBrowserKonqueror() ||
        $this->checkBrowserIcab() ||
        $this->checkBrowserPhoenix() ||
        $this->checkBrowserAmaya() ||
        $this->checkBrowserLynx() ||
        $this->checkBrowserShiretoko() ||
        $this->checkBrowserIceCat() ||
        $this->checkBrowserW3CValidator() ||
        $this->checkBrowserMozilla() /* Mozilla is such an open standard that you must check it last */
        );
    }

    /**
     * Determine if the user is using a BlackBerry (last updated 1.7)
     * @return boolean True if the browser is the BlackBerry browser otherwise false
     */
    protected function checkBrowserBlackBerry()
    {
        if (stripos($this->_agent, 'blackberry') !== false)
        {
            $aresult = explode("/", stristr($this->_agent, "BlackBerry"));
            $aversion = explode(' ', $aresult[1]);
            $this->setVersion($aversion[0]);
            $this->_name = BLACKBERRY;
            $this->setMobile(true);
            return true;
        }
        return false;
    }

    /**
     * Determine if the user is using an AOL User Agent (last updated 1.7)
     * @return boolean True if the browser is from AOL otherwise false
     */
    protected function checkForAol()
    {
        $this->setAol(false);
        $this->setAolVersion(VERSION_UNKNOWN);

        if (stripos($this->_agent, 'aol') !== false)
        {
            $aversion = explode(' ', stristr($this->_agent, 'AOL'));
            $this->setAol(true);
            $this->setAolVersion(preg_replace('/[^0-9\.a-z]/i', '', $aversion[1]));
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is the GoogleBot or not (last updated 1.7)
     * @return boolean True if the browser is the GoogletBot otherwise false
     */
    protected function checkBrowserGoogleBot()
    {
        if (stripos($this->_agent, 'googlebot') !== false)
        {
            $aresult = explode('/', stristr($this->_agent, 'googlebot'));
            $aversion = explode(' ', $aresult[1]);
            $this->setVersion(str_replace(';', '', $aversion[0]));
            $this->_name = GOOGLEBOT;
            $this->setRobot(true);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is the MSNBot or not (last updated 1.9)
     * @return boolean True if the browser is the MSNBot otherwise false
     */
    protected function checkBrowserMSNBot()
    {
        if (stripos($this->_agent, "msnbot") !== false)
        {
            $aresult = explode("/", stristr($this->_agent, "msnbot"));
            $aversion = explode(" ", $aresult[1]);
            $this->setVersion(str_replace(";", "", $aversion[0]));
            $this->_name = MSNBOT;
            $this->setRobot(true);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is the W3C Validator or not (last updated 1.7)
     * @return boolean True if the browser is the W3C Validator otherwise false
     */
    protected function checkBrowserW3CValidator()
    {
        if (stripos($this->_agent, 'W3C-checklink') !== false)
        {
            $aresult = explode('/', stristr($this->_agent, 'W3C-checklink'));
            $aversion = explode(' ', $aresult[1]);
            $this->setVersion($aversion[0]);
            $this->_name = W3CVALIDATOR;
            return true;
        } else if (stripos($this->_agent, 'W3C_Validator') !== false)
        {
            // Some of the Validator versions do not delineate w/ a slash - add it back in
            $ua = str_replace("W3C_Validator ", "W3C_Validator/", $this->_agent);
            $aresult = explode('/', stristr($ua, 'W3C_Validator'));
            $aversion = explode(' ', $aresult[1]);
            $this->setVersion($aversion[0]);
            $this->_name = W3CVALIDATOR;
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is the Yahoo! Slurp Robot or not (last updated 1.7)
     * @return boolean True if the browser is the Yahoo! Slurp Robot otherwise false
     */
    protected function checkBrowserSlurp()
    {
        if (stripos($this->_agent, 'slurp') !== false)
        {
            $aresult = explode('/', stristr($this->_agent, 'Slurp'));
            $aversion = explode(' ', $aresult[1]);
            $this->setVersion($aversion[0]);
            $this->_name = SLURP;
            $this->setRobot(true);
            $this->setMobile(false);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is Internet Explorer or not (last updated 1.7)
     * @return boolean True if the browser is Internet Explorer otherwise false
     */
    protected function checkBrowserInternetExplorer()
    {

        // Test for v1 - v1.5 IE
        if (stripos($this->_agent, 'microsoft internet explorer') !== false)
        {
            $this->setBrowser(IE);
            $this->setVersion('1.0');
            $aresult = stristr($this->_agent, '/');
            if (preg_match('/308|425|426|474|0b1/i', $aresult))
            {
                $this->setVersion('1.5');
            }
            return true;
        }
        // Test for versions > 1.5
        else if (stripos($this->_agent, 'msie') !== false && stripos($this->_agent, 'opera') === false)
        {
            // See if the browser is the odd MSN Explorer
            if (stripos($this->_agent, 'msnb') !== false)
            {
                $aresult = explode(' ', stristr(str_replace(';', '; ', $this->_agent), 'MSN'));
                $this->setBrowser(MSN);
                $this->setVersion(str_replace(array('(', ')', ';'), '', $aresult[1]));
                return true;
            }
            $aresult = explode(' ', stristr(str_replace(';', '; ', $this->_agent), 'msie'));
            $this->setBrowser(IE);
            $this->setVersion(str_replace(array('(', ')', ';'), '', $aresult[1]));
            return true;
        }
        // Test for Pocket IE
        else if (stripos($this->_agent, 'mspie') !== false || stripos($this->_agent, 'pocket') !== false)
        {
            $aresult = explode(' ', stristr($this->_agent, 'mspie'));
            $this->setPlatform(PLATFORM_WINDOWS_CE);
            $this->setBrowser(POCKET_IE);
            $this->setMobile(true);

            if (stripos($this->_agent, 'mspie') !== false)
            {
                $this->setVersion($aresult[1]);
            } else
            {
                $aversion = explode('/', $this->_agent);
                $this->setVersion($aversion[1]);
            }
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is Opera or not (last updated 1.7)
     * @return boolean True if the browser is Opera otherwise false
     */
    protected function checkBrowserOpera()
    {
        if (stripos($this->_agent, 'opera mini') !== false)
        {
            $resultant = stristr($this->_agent, 'opera mini');
            if (preg_match('/\//', $resultant))
            {
                $aresult = explode('/', $resultant);
                $aversion = explode(' ', $aresult[1]);
                $this->setVersion($aversion[0]);
            } else
            {
                $aversion = explode(' ', stristr($resultant, 'opera mini'));
                $this->setVersion($aversion[1]);
            }
            $this->_name = OPERA_MINI;
            $this->setMobile(true);
            return true;
        } else if (stripos($this->_agent, 'opera') !== false)
        {
            $resultant = stristr($this->_agent, 'opera');
            if (preg_match('/Version\/(10.*)$/', $resultant, $matches))
            {
                $this->setVersion($matches[1]);
            } else if (preg_match('/\//', $resultant))
            {
                $aresult = explode('/', str_replace("(", " ", $resultant));
                $aversion = explode(' ', $aresult[1]);
                $this->setVersion($aversion[0]);
            } else
            {
                $aversion = explode(' ', stristr($resultant, 'opera'));
                $this->setVersion(isset($aversion[1]) ? $aversion[1] : "");
            }
            $this->_name = OPERA;
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is Chrome or not (last updated 1.7)
     * @return boolean True if the browser is Chrome otherwise false
     */
    protected function checkBrowserChrome()
    {
        if (stripos($this->_agent, 'Chrome') !== false)
        {
            $aresult = explode('/', stristr($this->_agent, 'Chrome'));
            $aversion = explode(' ', $aresult[1]);
            $this->setVersion($aversion[0]);
            $this->setBrowser(CHROME);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is WebTv or not (last updated 1.7)
     * @return boolean True if the browser is WebTv otherwise false
     */
    protected function checkBrowserWebTv()
    {
        if (stripos($this->_agent, 'webtv') !== false)
        {
            $aresult = explode('/', stristr($this->_agent, 'webtv'));
            $aversion = explode(' ', $aresult[1]);
            $this->setVersion($aversion[0]);
            $this->setBrowser(WEBTV);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is NetPositive or not (last updated 1.7)
     * @return boolean True if the browser is NetPositive otherwise false
     */
    protected function checkBrowserNetPositive()
    {
        if (stripos($this->_agent, 'NetPositive') !== false)
        {
            $aresult = explode('/', stristr($this->_agent, 'NetPositive'));
            $aversion = explode(' ', $aresult[1]);
            $this->setVersion(str_replace(array('(', ')', ';'), '', $aversion[0]));
            $this->setBrowser(NETPOSITIVE);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is Galeon or not (last updated 1.7)
     * @return boolean True if the browser is Galeon otherwise false
     */
    protected function checkBrowserGaleon()
    {
        if (stripos($this->_agent, 'galeon') !== false)
        {
            $aresult = explode(' ', stristr($this->_agent, 'galeon'));
            $aversion = explode('/', $aresult[0]);
            $this->setVersion($aversion[1]);
            $this->setBrowser(GALEON);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is Konqueror or not (last updated 1.7)
     * @return boolean True if the browser is Konqueror otherwise false
     */
    protected function checkBrowserKonqueror()
    {
        if (stripos($this->_agent, 'Konqueror') !== false)
        {
            $aresult = explode(' ', stristr($this->_agent, 'Konqueror'));
            $aversion = explode('/', $aresult[0]);
            $this->setVersion($aversion[1]);
            $this->setBrowser(KONQUEROR);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is iCab or not (last updated 1.7)
     * @return boolean True if the browser is iCab otherwise false
     */
    protected function checkBrowserIcab()
    {
        if (stripos($this->_agent, 'icab') !== false)
        {
            $aversion = explode(' ', stristr(str_replace('/', ' ', $this->_agent), 'icab'));
            $this->setVersion($aversion[1]);
            $this->setBrowser(ICAB);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is OmniWeb or not (last updated 1.7)
     * @return boolean True if the browser is OmniWeb otherwise false
     */
    protected function checkBrowserOmniWeb()
    {
        if (stripos($this->_agent, 'omniweb') !== false)
        {
            $aresult = explode('/', stristr($this->_agent, 'omniweb'));
            $aversion = explode(' ', isset($aresult[1]) ? $aresult[1] : "");
            $this->setVersion($aversion[0]);
            $this->setBrowser(OMNIWEB);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is Phoenix or not (last updated 1.7)
     * @return boolean True if the browser is Phoenix otherwise false
     */
    protected function checkBrowserPhoenix()
    {
        if (stripos($this->_agent, 'Phoenix') !== false)
        {
            $aversion = explode('/', stristr($this->_agent, 'Phoenix'));
            $this->setVersion($aversion[1]);
            $this->setBrowser(PHOENIX);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is Firebird or not (last updated 1.7)
     * @return boolean True if the browser is Firebird otherwise false
     */
    protected function checkBrowserFirebird()
    {
        if (stripos($this->_agent, 'Firebird') !== false)
        {
            $aversion = explode('/', stristr($this->_agent, 'Firebird'));
            $this->setVersion($aversion[1]);
            $this->setBrowser(FIREBIRD);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is Netscape Navigator 9+ or not (last updated 1.7)
     * NOTE: (http://browser.netscape.com/ - Official support ended on March 1st, 2008)
     * @return boolean True if the browser is Netscape Navigator 9+ otherwise false
     */
    protected function checkBrowserNetscapeNavigator9Plus()
    {
        if (stripos($this->_agent, 'Firefox') !== false && preg_match('/Navigator\/([^ ]*)/i', $this->_agent, $matches))
        {
            $this->setVersion($matches[1]);
            $this->setBrowser(NETSCAPE_NAVIGATOR);
            return true;
        } else if (stripos($this->_agent, 'Firefox') === false && preg_match('/Netscape6?\/([^ ]*)/i', $this->_agent, $matches))
        {
            $this->setVersion($matches[1]);
            $this->setBrowser(NETSCAPE_NAVIGATOR);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is Shiretoko or not (https://wiki.mozilla.org/Projects/shiretoko) (last updated 1.7)
     * @return boolean True if the browser is Shiretoko otherwise false
     */
    protected function checkBrowserShiretoko()
    {
        if (stripos($this->_agent, 'Mozilla') !== false && preg_match('/Shiretoko\/([^ ]*)/i', $this->_agent, $matches))
        {
            $this->setVersion($matches[1]);
            $this->setBrowser(SHIRETOKO);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is Ice Cat or not (http://en.wikipedia.org/wiki/GNU_IceCat) (last updated 1.7)
     * 
     * @return boolean True if the browser is Ice Cat otherwise false
     */
    protected function checkBrowserIceCat()
    {
        if (stripos($this->_agent, 'Mozilla') !== false && preg_match('/IceCat\/([^ ]*)/i', $this->_agent, $matches))
        {
            $this->setVersion($matches[1]);
            $this->setBrowser(ICECAT);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is Nokia or not (last updated 1.7)
     * @return boolean True if the browser is Nokia otherwise false
     */
    protected function checkBrowserNokia()
    {
        if (preg_match("/Nokia([^\/]+)\/([^ SP]+)/i", $this->_agent, $matches))
        {
            $this->setVersion($matches[2]);
            if (stripos($this->_agent, 'Series60') !== false || strpos($this->_agent, 'S60') !== false)
            {
                $this->setBrowser(NOKIA_S60);
            } else
            {
                $this->setBrowser(NOKIA);
            }
            $this->setMobile(true);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is Firefox or not (last updated 1.7)
     * @return boolean True if the browser is Firefox otherwise false
     */
    protected function checkBrowserFirefox()
    {
        if (stripos($this->_agent, 'safari') === false)
        {
            if (preg_match("/Firefox[\/ \(]([^ ;\)]+)/i", $this->_agent, $matches))
            {
                $this->setVersion($matches[1]);
                $this->setBrowser(FIREFOX);
                return true;
            } else if (preg_match("/Firefox$/i", $this->_agent, $matches))
            {
                $this->setVersion("");
                $this->setBrowser(FIREFOX);
                return true;
            }
        }
        return false;
    }

    /**
     * Determine if the browser is Firefox or not (last updated 1.7)
     * @return boolean True if the browser is Firefox otherwise false
     */
    protected function checkBrowserIceweasel()
    {
        if (stripos($this->_agent, 'Iceweasel') !== false)
        {
            $aresult = explode('/', stristr($this->_agent, 'Iceweasel'));
            $aversion = explode(' ', $aresult[1]);
            $this->setVersion($aversion[0]);
            $this->setBrowser(ICEWEASEL);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is Mozilla or not (last updated 1.7)
     * @return boolean True if the browser is Mozilla otherwise false
     */
    protected function checkBrowserMozilla()
    {
        if (stripos($this->_agent, 'mozilla') !== false && preg_match('/rv:[0-9].[0-9][a-b]?/i', $this->_agent) && stripos($this->_agent, 'netscape') === false)
        {
            $aversion = explode(' ', stristr($this->_agent, 'rv:'));
            preg_match('/rv:[0-9].[0-9][a-b]?/i', $this->_agent, $aversion);
            $this->setVersion(str_replace('rv:', '', $aversion[0]));
            $this->setBrowser(MOZILLA);
            return true;
        } else if (stripos($this->_agent, 'mozilla') !== false && preg_match('/rv:[0-9]\.[0-9]/i', $this->_agent) && stripos($this->_agent, 'netscape') === false)
        {
            $aversion = explode('', stristr($this->_agent, 'rv:'));
            $this->setVersion(str_replace('rv:', '', $aversion[0]));
            $this->setBrowser(MOZILLA);
            return true;
        } else if (stripos($this->_agent, 'mozilla') !== false && preg_match('/mozilla\/([^ ]*)/i', $this->_agent, $matches) && stripos($this->_agent, 'netscape') === false)
        {
            $this->setVersion($matches[1]);
            $this->setBrowser(MOZILLA);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is Lynx or not (last updated 1.7)
     * @return boolean True if the browser is Lynx otherwise false
     */
    protected function checkBrowserLynx()
    {
        if (stripos($this->_agent, 'lynx') !== false)
        {
            $aresult = explode('/', stristr($this->_agent, 'Lynx'));
            $aversion = explode(' ', (isset($aresult[1]) ? $aresult[1] : ""));
            $this->setVersion($aversion[0]);
            $this->setBrowser(LYNX);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is Amaya or not (last updated 1.7)
     * @return boolean True if the browser is Amaya otherwise false
     */
    protected function checkBrowserAmaya()
    {
        if (stripos($this->_agent, 'amaya') !== false)
        {
            $aresult = explode('/', stristr($this->_agent, 'Amaya'));
            $aversion = explode(' ', $aresult[1]);
            $this->setVersion($aversion[0]);
            $this->setBrowser(AMAYA);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is Safari or not (last updated 1.7)
     * @return boolean True if the browser is Safari otherwise false
     */
    protected function checkBrowserSafari()
    {
        if (stripos($this->_agent, 'Safari') !== false && stripos($this->_agent, 'iPhone') === false && stripos($this->_agent, 'iPod') === false)
        {
            $aresult = explode('/', stristr($this->_agent, 'Version'));
            if (isset($aresult[1]))
            {
                $aversion = explode(' ', $aresult[1]);
                $this->setVersion($aversion[0]);
            } else
            {
                $this->setVersion(VERSION_UNKNOWN);
            }
            $this->setBrowser(SAFARI);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is iPhone or not (last updated 1.7)
     * @return boolean True if the browser is iPhone otherwise false
     */
    protected function checkBrowseriPhone()
    {
        if (stripos($this->_agent, 'iPhone') !== false)
        {
            $aresult = explode('/', stristr($this->_agent, 'Version'));
            if (isset($aresult[1]))
            {
                $aversion = explode(' ', $aresult[1]);
                $this->setVersion($aversion[0]);
            } else
            {
                $this->setVersion(VERSION_UNKNOWN);
            }
            $this->setMobile(true);
            $this->setBrowser(IPHONE);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is iPod or not (last updated 1.7)
     * @return boolean True if the browser is iPod otherwise false
     */
    protected function checkBrowseriPad()
    {
        if (stripos($this->_agent, 'iPad') !== false)
        {
            $aresult = explode('/', stristr($this->_agent, 'Version'));
            if (isset($aresult[1]))
            {
                $aversion = explode(' ', $aresult[1]);
                $this->setVersion($aversion[0]);
            } else
            {
                $this->setVersion(VERSION_UNKNOWN);
            }
            $this->setMobile(true);
            $this->setBrowser(IPAD);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is iPod or not (last updated 1.7)
     * @return boolean True if the browser is iPod otherwise false
     */
    protected function checkBrowseriPod()
    {
        if (stripos($this->_agent, 'iPod') !== false)
        {
            $aresult = explode('/', stristr($this->_agent, 'Version'));
            if (isset($aresult[1]))
            {
                $aversion = explode(' ', $aresult[1]);
                $this->setVersion($aversion[0]);
            } else
            {
                $this->setVersion(VERSION_UNKNOWN);
            }
            $this->setMobile(true);
            $this->setBrowser(IPOD);
            return true;
        }
        return false;
    }

    /**
     * Determine if the browser is Android or not (last updated 1.7)
     * @return boolean True if the browser is Android otherwise false
     */
    protected function checkBrowserAndroid()
    {
        if (stripos($this->_agent, 'Android') !== false)
        {
            $aresult = explode(' ', stristr($this->_agent, 'Android'));
            if (isset($aresult[1]))
            {
                $aversion = explode(' ', $aresult[1]);
                $this->setVersion($aversion[0]);
            } else
            {
                $this->setVersion(VERSION_UNKNOWN);
            }
            $this->setMobile(true);
            $this->setBrowser(ANDROID);
            return true;
        }
        return false;
    }

    /* atalhos comuns */

    function isIE6()
    {
        return ($this->_name == IE && $this->_version < 7 );
    }

}

//$browser = Browser::get();
//print_r($browser);
/*
  if ($browser->getBrowser() == Browser::FIREFOX && $browser->getVersion() >= 2) {
  echo 'You have FireFox version 2 or greater';
  } */
