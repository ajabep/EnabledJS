<?php
header_remove('Server');
header_remove('X-Powered-By');


/***
 * https://github.com/cbschuld/Browser.php
 ***/
class Browser {
    private $_agent = '';
    private $_browser_name = '';
    private $_version = '';
    private $_platform = '';
    private $_os = '';
    private $_is_aol = false;
    private $_is_mobile = false;
    private $_is_robot = false;
    private $_aol_version = '';

    const BROWSER_UNKNOWN = 'unknown';
    const VERSION_UNKNOWN = 'unknown';

    const BROWSER_OPERA = 'Opera';                            
    const BROWSER_OPERA_MINI = 'Opera Mini';                  
    const BROWSER_WEBTV = 'WebTV';                            
    const BROWSER_IE = 'Internet Explorer';                   
    const BROWSER_POCKET_IE = 'Pocket Internet Explorer';     
    const BROWSER_KONQUEROR = 'Konqueror';                    
    const BROWSER_ICAB = 'iCab';                              
    const BROWSER_OMNIWEB = 'OmniWeb';                        
    const BROWSER_FIREBIRD = 'Firebird';                      
    const BROWSER_FIREFOX = 'Firefox';                        
    const BROWSER_ICEWEASEL = 'Iceweasel';                    
    const BROWSER_SHIRETOKO = 'Shiretoko';                    
    const BROWSER_MOZILLA = 'Mozilla';                        
    const BROWSER_AMAYA = 'Amaya';                            
    const BROWSER_LYNX = 'Lynx';                              
    const BROWSER_SAFARI = 'Safari';                          
    const BROWSER_IPHONE = 'iPhone';                          
    const BROWSER_IPOD = 'iPod';                              
    const BROWSER_IPAD = 'iPad';                              
    const BROWSER_CHROME = 'Chrome';                          
    const BROWSER_ANDROID = 'Android';                        
    const BROWSER_GOOGLEBOT = 'GoogleBot';                    
    const BROWSER_SLURP = 'Yahoo! Slurp';                     
    const BROWSER_W3CVALIDATOR = 'W3C Validator';             
    const BROWSER_BLACKBERRY = 'BlackBerry';                  
    const BROWSER_ICECAT = 'IceCat';                          
    const BROWSER_NOKIA_S60 = 'Nokia S60 OSS Browser';        
    const BROWSER_NOKIA = 'Nokia Browser';                    
    const BROWSER_MSN = 'MSN Browser';                        
    const BROWSER_MSNBOT = 'MSN Bot';                         
                                                              
     
    const BROWSER_NETSCAPE_NAVIGATOR = 'Netscape Navigator';  
    const BROWSER_GALEON = 'Galeon';                          
    const BROWSER_NETPOSITIVE = 'NetPositive';                
    const BROWSER_PHOENIX = 'Phoenix';                        

    const PLATFORM_UNKNOWN = 'unknown';
    const PLATFORM_WINDOWS = 'Windows';
    const PLATFORM_WINDOWS_CE = 'Windows CE';
    const PLATFORM_APPLE = 'Apple';
    const PLATFORM_LINUX = 'Linux';
    const PLATFORM_OS2 = 'OS/2';
    const PLATFORM_BEOS = 'BeOS';
    const PLATFORM_IPHONE = 'iPhone';
    const PLATFORM_IPOD = 'iPod';
    const PLATFORM_IPAD = 'iPad';
    const PLATFORM_BLACKBERRY = 'BlackBerry';
    const PLATFORM_NOKIA = 'Nokia';
    const PLATFORM_FREEBSD = 'FreeBSD';
    const PLATFORM_OPENBSD = 'OpenBSD';
    const PLATFORM_NETBSD = 'NetBSD';
    const PLATFORM_SUNOS = 'SunOS';
    const PLATFORM_OPENSOLARIS = 'OpenSolaris';
    const PLATFORM_ANDROID = 'Android';
     
    const OPERATING_SYSTEM_UNKNOWN = 'unknown';

    public function Browser($useragent="") {
        $this->reset();
        if( $useragent != "" ) {
            $this->setUserAgent($useragent);
        }
        else {
            $this->determine();
        }
    }

    public function reset() {
        $this->_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "";
        $this->_browser_name = self::BROWSER_UNKNOWN;
        $this->_version = self::VERSION_UNKNOWN;
        $this->_platform = self::PLATFORM_UNKNOWN;
        $this->_os = self::OPERATING_SYSTEM_UNKNOWN;
        $this->_is_aol = false;
        $this->_is_mobile = false;
        $this->_is_robot = false;
        $this->_aol_version = self::VERSION_UNKNOWN;
    }

    function isBrowser($browserName) { return( 0 == strcasecmp($this->_browser_name, trim($browserName))); }
    public function getBrowser() { return $this->_browser_name; }
    public function setBrowser($browser) { return $this->_browser_name = $browser; }
    public function getPlatform() { return $this->_platform; }
    public function setPlatform($platform) { return $this->_platform = $platform; }
    public function getVersion() { return $this->_version; }
    public function setVersion($version) { $this->_version = preg_replace('/[^0-9,.,a-z,A-Z-]/','',$version); }
    public function getAolVersion() { return $this->_aol_version; }
    public function setAolVersion($version) { $this->_aol_version = preg_replace('/[^0-9,.,a-z,A-Z]/','',$version); }
    public function isAol() { return $this->_is_aol; }
    public function isMobile() { return $this->_is_mobile; }
    public function isRobot() { return $this->_is_robot; }
    public function setAol($isAol) { $this->_is_aol = $isAol; }
    protected function setMobile($value=true) { $this->_is_mobile = $value; }
    protected function setRobot($value=true) { $this->_is_robot = $value; }
    public function getUserAgent() { return $this->_agent; }
    public function setUserAgent($agent_string) {
        $this->reset();
        $this->_agent = $agent_string;
        $this->determine();
    }
    public function isChromeFrame() {
        return( strpos($this->_agent,"chromeframe") !== false );
    }
    public function __toString() {
        return "<strong>Browser Name:</strong>{$this->getBrowser()}<br/>\n" .
               "<strong>Browser Version:</strong>{$this->getVersion()}<br/>\n" .
               "<strong>Browser User Agent String:</strong>{$this->getUserAgent()}<br/>\n" .
               "<strong>Platform:</strong>{$this->getPlatform()}<br/>";
    }
    protected function determine() {
        $this->checkPlatform();
        $this->checkBrowsers();
        $this->checkForAol();
    }
     protected function checkBrowsers() {
        return (
            $this->checkBrowserWebTv() ||
            $this->checkBrowserInternetExplorer() ||
            $this->checkBrowserOpera() ||
            $this->checkBrowserGaleon() ||
            $this->checkBrowserNetscapeNavigator9Plus() ||
            $this->checkBrowserFirefox() ||
            $this->checkBrowserChrome() ||
            $this->checkBrowserOmniWeb() ||

            $this->checkBrowserAndroid() ||
            $this->checkBrowseriPad() ||
            $this->checkBrowseriPod() ||
            $this->checkBrowseriPhone() ||
            $this->checkBrowserBlackBerry() ||
            $this->checkBrowserNokia() ||

            $this->checkBrowserGoogleBot() ||
            $this->checkBrowserMSNBot() ||
            $this->checkBrowserSlurp() ||

            $this->checkBrowserSafari() ||
             
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
            $this->checkBrowserMozilla()
        );
    }

    protected function checkBrowserBlackBerry() {
        if( stripos($this->_agent,'blackberry') !== false ) {
            $aresult = explode("/",stristr($this->_agent,"BlackBerry"));
            $aversion = explode(' ',$aresult[1]);
            $this->setVersion($aversion[0]);
            $this->_browser_name = self::BROWSER_BLACKBERRY;
            $this->setMobile(true);
            return true;
        }
        return false;
    }

    protected function checkForAol() {
        $this->setAol(false);
        $this->setAolVersion(self::VERSION_UNKNOWN);

        if( stripos($this->_agent,'aol') !== false ) {
            $aversion = explode(' ',stristr($this->_agent, 'AOL'));
            $this->setAol(true);
            $this->setAolVersion(preg_replace('/[^0-9\.a-z]/i', '', $aversion[1]));
            return true;
        }
        return false;
    }

    protected function checkBrowserGoogleBot() {
        if( stripos($this->_agent,'googlebot') !== false ) {
            $aresult = explode('/',stristr($this->_agent,'googlebot'));
            $aversion = explode(' ',$aresult[1]);
            $this->setVersion(str_replace(';','',$aversion[0]));
            $this->_browser_name = self::BROWSER_GOOGLEBOT;
            $this->setRobot(true);
            return true;
        }
        return false;
    }

    protected function checkBrowserMSNBot() {
        if( stripos($this->_agent,"msnbot") !== false ) {
            $aresult = explode("/",stristr($this->_agent,"msnbot"));
            $aversion = explode(" ",$aresult[1]);
            $this->setVersion(str_replace(";","",$aversion[0]));
            $this->_browser_name = self::BROWSER_MSNBOT;
            $this->setRobot(true);
            return true;
        }
        return false;
    }       
     
    protected function checkBrowserW3CValidator() {
        if( stripos($this->_agent,'W3C-checklink') !== false ) {
            $aresult = explode('/',stristr($this->_agent,'W3C-checklink'));
            $aversion = explode(' ',$aresult[1]);
            $this->setVersion($aversion[0]);
            $this->_browser_name = self::BROWSER_W3CVALIDATOR;
            return true;
        }
        else if( stripos($this->_agent,'W3C_Validator') !== false ) {
            $ua = str_replace("W3C_Validator ", "W3C_Validator/", $this->_agent);
            $aresult = explode('/',stristr($ua,'W3C_Validator'));
            $aversion = explode(' ',$aresult[1]);
            $this->setVersion($aversion[0]);
            $this->_browser_name = self::BROWSER_W3CVALIDATOR;
            return true;
        }
        return false;
    }

    protected function checkBrowserSlurp() {
        if( stripos($this->_agent,'slurp') !== false ) {
            $aresult = explode('/',stristr($this->_agent,'Slurp'));
            $aversion = explode(' ',$aresult[1]);
            $this->setVersion($aversion[0]);
            $this->_browser_name = self::BROWSER_SLURP;
            $this->setRobot(true);
            $this->setMobile(false);
            return true;
        }
        return false;
    }

    protected function checkBrowserInternetExplorer() {

        if( stripos($this->_agent,'microsoft internet explorer') !== false ) {
            $this->setBrowser(self::BROWSER_IE);
            $this->setVersion('1.0');
            $aresult = stristr($this->_agent, '/');
            if( preg_match('/308|425|426|474|0b1/i', $aresult) ) {
                $this->setVersion('1.5');
            }
            return true;
        }
        else if( stripos($this->_agent,'msie') !== false && stripos($this->_agent,'opera') === false ) {
            if( stripos($this->_agent,'msnb') !== false ) {
                $aresult = explode(' ',stristr(str_replace(';','; ',$this->_agent),'MSN'));
                $this->setBrowser( self::BROWSER_MSN );
                $this->setVersion(str_replace(array('(',')',';'),'',$aresult[1]));
                return true;
            }
            $aresult = explode(' ',stristr(str_replace(';','; ',$this->_agent),'msie'));
            $this->setBrowser( self::BROWSER_IE );
            $this->setVersion(str_replace(array('(',')',';'),'',$aresult[1]));
            return true;
        }
        else if( stripos($this->_agent,'mspie') !== false || stripos($this->_agent,'pocket') !== false ) {
            $aresult = explode(' ',stristr($this->_agent,'mspie'));
            $this->setPlatform( self::PLATFORM_WINDOWS_CE );
            $this->setBrowser( self::BROWSER_POCKET_IE );
            $this->setMobile(true);

            if( stripos($this->_agent,'mspie') !== false ) {
                $this->setVersion($aresult[1]);
            }
            else {
                $aversion = explode('/',$this->_agent);
                $this->setVersion($aversion[1]);
            }
            return true;
        }
        return false;
    }

    protected function checkBrowserOpera() {
        if( stripos($this->_agent,'opera mini') !== false ) {
            $resultant = stristr($this->_agent, 'opera mini');
            if( preg_match('/\//',$resultant) ) {
                $aresult = explode('/',$resultant);
                $aversion = explode(' ',$aresult[1]);
                $this->setVersion($aversion[0]);
            }
            else {
                $aversion = explode(' ',stristr($resultant,'opera mini'));
                $this->setVersion($aversion[1]);
            }
            $this->_browser_name = self::BROWSER_OPERA_MINI;
            $this->setMobile(true);
            return true;
        }
        else if( stripos($this->_agent,'opera') !== false ) {
            $resultant = stristr($this->_agent, 'opera');
            if( preg_match('/Version\/(10.*)$/',$resultant,$matches) ) {
                $this->setVersion($matches[1]);
            }
            else if( preg_match('/\//',$resultant) ) {
                $aresult = explode('/',str_replace("("," ",$resultant));
                $aversion = explode(' ',$aresult[1]);
                $this->setVersion($aversion[0]);
            }
            else {
                $aversion = explode(' ',stristr($resultant,'opera'));
                $this->setVersion(isset($aversion[1])?$aversion[1]:"");
            }
            $this->_browser_name = self::BROWSER_OPERA;
            return true;
        }
        return false;
    }

    protected function checkBrowserChrome() {
        if( stripos($this->_agent,'Chrome') !== false ) {
            $aresult = explode('/',stristr($this->_agent,'Chrome'));
            $aversion = explode(' ',$aresult[1]);
            $this->setVersion($aversion[0]);
            $this->setBrowser(self::BROWSER_CHROME);
            return true;
        }
        return false;
    }


    protected function checkBrowserWebTv() {
        if( stripos($this->_agent,'webtv') !== false ) {
            $aresult = explode('/',stristr($this->_agent,'webtv'));
            $aversion = explode(' ',$aresult[1]);
            $this->setVersion($aversion[0]);
            $this->setBrowser(self::BROWSER_WEBTV);
            return true;
        }
        return false;
    }

    protected function checkBrowserNetPositive() {
        if( stripos($this->_agent,'NetPositive') !== false ) {
            $aresult = explode('/',stristr($this->_agent,'NetPositive'));
            $aversion = explode(' ',$aresult[1]);
            $this->setVersion(str_replace(array('(',')',';'),'',$aversion[0]));
            $this->setBrowser(self::BROWSER_NETPOSITIVE);
            return true;
        }
        return false;
    }

    protected function checkBrowserGaleon() {
        if( stripos($this->_agent,'galeon') !== false ) {
            $aresult = explode(' ',stristr($this->_agent,'galeon'));
            $aversion = explode('/',$aresult[0]);
            $this->setVersion($aversion[1]);
            $this->setBrowser(self::BROWSER_GALEON);
            return true;
        }
        return false;
    }

    protected function checkBrowserKonqueror() {
        if( stripos($this->_agent,'Konqueror') !== false ) {
            $aresult = explode(' ',stristr($this->_agent,'Konqueror'));
            $aversion = explode('/',$aresult[0]);
            $this->setVersion($aversion[1]);
            $this->setBrowser(self::BROWSER_KONQUEROR);
            return true;
        }
        return false;
    }

    protected function checkBrowserIcab() {
        if( stripos($this->_agent,'icab') !== false ) {
            $aversion = explode(' ',stristr(str_replace('/',' ',$this->_agent),'icab'));
            $this->setVersion($aversion[1]);
            $this->setBrowser(self::BROWSER_ICAB);
            return true;
        }
        return false;
    }

    protected function checkBrowserOmniWeb() {
        if( stripos($this->_agent,'omniweb') !== false ) {
            $aresult = explode('/',stristr($this->_agent,'omniweb'));
            $aversion = explode(' ',isset($aresult[1])?$aresult[1]:"");
            $this->setVersion($aversion[0]);
            $this->setBrowser(self::BROWSER_OMNIWEB);
            return true;
        }
        return false;
    }

    protected function checkBrowserPhoenix() {
        if( stripos($this->_agent,'Phoenix') !== false ) {
            $aversion = explode('/',stristr($this->_agent,'Phoenix'));
            $this->setVersion($aversion[1]);
            $this->setBrowser(self::BROWSER_PHOENIX);
            return true;
        }
        return false;
    }

    protected function checkBrowserFirebird() {
        if( stripos($this->_agent,'Firebird') !== false ) {
            $aversion = explode('/',stristr($this->_agent,'Firebird'));
            $this->setVersion($aversion[1]);
            $this->setBrowser(self::BROWSER_FIREBIRD);
            return true;
        }
        return false;
    }

    protected function checkBrowserNetscapeNavigator9Plus() {
        if( stripos($this->_agent,'Firefox') !== false && preg_match('/Navigator\/([^ ]*)/i',$this->_agent,$matches) ) {
            $this->setVersion($matches[1]);
            $this->setBrowser(self::BROWSER_NETSCAPE_NAVIGATOR);
            return true;
        }
        else if( stripos($this->_agent,'Firefox') === false && preg_match('/Netscape6?\/([^ ]*)/i',$this->_agent,$matches) ) {
            $this->setVersion($matches[1]);
            $this->setBrowser(self::BROWSER_NETSCAPE_NAVIGATOR);
            return true;
        }
        return false;
    }

    protected function checkBrowserShiretoko() {
        if( stripos($this->_agent,'Mozilla') !== false && preg_match('/Shiretoko\/([^ ]*)/i',$this->_agent,$matches) ) {
            $this->setVersion($matches[1]);
            $this->setBrowser(self::BROWSER_SHIRETOKO);
            return true;
        }
        return false;
    }

    protected function checkBrowserIceCat() {
        if( stripos($this->_agent,'Mozilla') !== false && preg_match('/IceCat\/([^ ]*)/i',$this->_agent,$matches) ) {
            $this->setVersion($matches[1]);
            $this->setBrowser(self::BROWSER_ICECAT);
            return true;
        }
        return false;
    }

    protected function checkBrowserNokia() {
        if( preg_match("/Nokia([^\/]+)\/([^ SP]+)/i",$this->_agent,$matches) ) {
            $this->setVersion($matches[2]);
            if( stripos($this->_agent,'Series60') !== false || strpos($this->_agent,'S60') !== false ) {
                $this->setBrowser(self::BROWSER_NOKIA_S60);
            }
            else {
                $this->setBrowser( self::BROWSER_NOKIA );
            }
            $this->setMobile(true);
            return true;
        }
        return false;
    }

    protected function checkBrowserFirefox() {
        if( stripos($this->_agent,'safari') === false ) {
            if( preg_match("/Firefox[\/ \(]([^ ;\)]+)/i",$this->_agent,$matches) ) {
                $this->setVersion($matches[1]);
                $this->setBrowser(self::BROWSER_FIREFOX);
                return true;
            }
            else if( preg_match("/Firefox$/i",$this->_agent,$matches) ) {
                $this->setVersion("");
                $this->setBrowser(self::BROWSER_FIREFOX);
                return true;
            }
        }
        return false;
    }
    protected function checkBrowserIceweasel() {
        if( stripos($this->_agent,'Iceweasel') !== false ) {
            $aresult = explode('/',stristr($this->_agent,'Iceweasel'));
            $aversion = explode(' ',$aresult[1]);
            $this->setVersion($aversion[0]);
            $this->setBrowser(self::BROWSER_ICEWEASEL);
            return true;
        }
        return false;
    }
    protected function checkBrowserMozilla() {
        if( stripos($this->_agent,'mozilla') !== false  && preg_match('/rv:[0-9].[0-9][a-b]?/i',$this->_agent) && stripos($this->_agent,'netscape') === false) {
            $aversion = explode(' ',stristr($this->_agent,'rv:'));
            preg_match('/rv:[0-9].[0-9][a-b]?/i',$this->_agent,$aversion);
            $this->setVersion(str_replace('rv:','',$aversion[0]));
            $this->setBrowser(self::BROWSER_MOZILLA);
            return true;
        }
        else if( stripos($this->_agent,'mozilla') !== false && preg_match('/rv:[0-9]\.[0-9]/i',$this->_agent) && stripos($this->_agent,'netscape') === false ) {
            $aversion = explode('',stristr($this->_agent,'rv:'));
            $this->setVersion(str_replace('rv:','',$aversion[0]));
            $this->setBrowser(self::BROWSER_MOZILLA);
            return true;
        }
        else if( stripos($this->_agent,'mozilla') !== false  && preg_match('/mozilla\/([^ ]*)/i',$this->_agent,$matches) && stripos($this->_agent,'netscape') === false ) {
            $this->setVersion($matches[1]);
            $this->setBrowser(self::BROWSER_MOZILLA);
            return true;
        }
        return false;
    }

    protected function checkBrowserLynx() {
        if( stripos($this->_agent,'lynx') !== false ) {
            $aresult = explode('/',stristr($this->_agent,'Lynx'));
            $aversion = explode(' ',(isset($aresult[1])?$aresult[1]:""));
            $this->setVersion($aversion[0]);
            $this->setBrowser(self::BROWSER_LYNX);
            return true;
        }
        return false;
    }

    protected function checkBrowserAmaya() {
        if( stripos($this->_agent,'amaya') !== false ) {
            $aresult = explode('/',stristr($this->_agent,'Amaya'));
            $aversion = explode(' ',$aresult[1]);
            $this->setVersion($aversion[0]);
            $this->setBrowser(self::BROWSER_AMAYA);
            return true;
        }
        return false;
    }

    protected function checkBrowserSafari() {
        if( stripos($this->_agent,'Safari') !== false && stripos($this->_agent,'iPhone') === false && stripos($this->_agent,'iPod') === false ) {
            $aresult = explode('/',stristr($this->_agent,'Version'));
            if( isset($aresult[1]) ) {
                $aversion = explode(' ',$aresult[1]);
                $this->setVersion($aversion[0]);
            }
            else {
                $this->setVersion(self::VERSION_UNKNOWN);
            }
            $this->setBrowser(self::BROWSER_SAFARI);
            return true;
        }
        return false;
    }

    protected function checkBrowseriPhone() {
        if( stripos($this->_agent,'iPhone') !== false ) {
            $aresult = explode('/',stristr($this->_agent,'Version'));
            if( isset($aresult[1]) ) {
                $aversion = explode(' ',$aresult[1]);
                $this->setVersion($aversion[0]);
            }
            else {
                $this->setVersion(self::VERSION_UNKNOWN);
            }
            $this->setMobile(true);
            $this->setBrowser(self::BROWSER_IPHONE);
            return true;
        }
        return false;
    }

    protected function checkBrowseriPad() {
        if( stripos($this->_agent,'iPad') !== false ) {
            $aresult = explode('/',stristr($this->_agent,'Version'));
            if( isset($aresult[1]) ) {
                $aversion = explode(' ',$aresult[1]);
                $this->setVersion($aversion[0]);
            }
            else {
                $this->setVersion(self::VERSION_UNKNOWN);
            }
            $this->setMobile(true);
            $this->setBrowser(self::BROWSER_IPAD);
            return true;
        }
        return false;
    }

    protected function checkBrowseriPod() {
        if( stripos($this->_agent,'iPod') !== false ) {
            $aresult = explode('/',stristr($this->_agent,'Version'));
            if( isset($aresult[1]) ) {
                $aversion = explode(' ',$aresult[1]);
                $this->setVersion($aversion[0]);
            }
            else {
                $this->setVersion(self::VERSION_UNKNOWN);
            }
            $this->setMobile(true);
            $this->setBrowser(self::BROWSER_IPOD);
            return true;
        }
        return false;
    }

    protected function checkBrowserAndroid() {
        if( stripos($this->_agent,'Android') !== false ) {
            $aresult = explode(' ',stristr($this->_agent,'Android'));
            if( isset($aresult[1]) ) {
                $aversion = explode(' ',$aresult[1]);
                $this->setVersion($aversion[0]);
            }
            else {
                $this->setVersion(self::VERSION_UNKNOWN);
            }
            $this->setMobile(true);
            $this->setBrowser(self::BROWSER_ANDROID);
            return true;
        }
        return false;
    }

    protected function checkPlatform() {
        if( stripos($this->_agent, 'windows') !== false ) {
            $this->_platform = self::PLATFORM_WINDOWS;
        }
        else if( stripos($this->_agent, 'iPad') !== false ) {
            $this->_platform = self::PLATFORM_IPAD;
        }
        else if( stripos($this->_agent, 'iPod') !== false ) {
            $this->_platform = self::PLATFORM_IPOD;
        }
        else if( stripos($this->_agent, 'iPhone') !== false ) {
            $this->_platform = self::PLATFORM_IPHONE;
        }
        elseif( stripos($this->_agent, 'mac') !== false ) {
            $this->_platform = self::PLATFORM_APPLE;
        }
        elseif( stripos($this->_agent, 'android') !== false ) {
            $this->_platform = self::PLATFORM_ANDROID;
        }
        elseif( stripos($this->_agent, 'linux') !== false ) {
            $this->_platform = self::PLATFORM_LINUX;
        }
        else if( stripos($this->_agent, 'Nokia') !== false ) {
            $this->_platform = self::PLATFORM_NOKIA;
        }
        else if( stripos($this->_agent, 'BlackBerry') !== false ) {
            $this->_platform = self::PLATFORM_BLACKBERRY;
        }
        elseif( stripos($this->_agent,'FreeBSD') !== false ) {
            $this->_platform = self::PLATFORM_FREEBSD;
        }
        elseif( stripos($this->_agent,'OpenBSD') !== false ) {
            $this->_platform = self::PLATFORM_OPENBSD;
        }
        elseif( stripos($this->_agent,'NetBSD') !== false ) {
            $this->_platform = self::PLATFORM_NETBSD;
        }
        elseif( stripos($this->_agent, 'OpenSolaris') !== false ) {
            $this->_platform = self::PLATFORM_OPENSOLARIS;
        }
        elseif( stripos($this->_agent, 'SunOS') !== false ) {
            $this->_platform = self::PLATFORM_SUNOS;
        }
        elseif( stripos($this->_agent, 'OS\/2') !== false ) {
            $this->_platform = self::PLATFORM_OS2;
        }
        elseif( stripos($this->_agent, 'BeOS') !== false ) {
            $this->_platform = self::PLATFORM_BEOS;
        }
        elseif( stripos($this->_agent, 'win') !== false ) {
            $this->_platform = self::PLATFORM_WINDOWS;
        }

    }
}

$browser = new Browser();
$getBrowser=$browser->getBrowser();

$wayToGeoip='geoip/';

$languagesNames=array(
                    'en'=>'English',
                    'fr'=>'French/Français',
                    'es'=>'Spanish/Español'
                );

$arrayBrowser=array(
            'fr'=>array(
                'texts'=>array(
                        'title'             =>  'Comment activer JavaScript',
                        'h1'                =>  'Activer le JavaScript',
                        'contact'           =>  'Contact',
                        'metaDescription'   =>  'Procédure pour activer JavaScript dans les navigateurs Principaux.',
                        'javascriptDisabled'=>  'Votre JavaScript n\'est pas activé. Merci de suivre la procédure correspondant à votre navigateur pour l\'activer.',
                        'javascriptEnabled' =>  'Votre JavaScript est activé.',
                        'reloadPage'        =>  'Actualisez la page',
                        'readMore'          =>  'Lire les instructions des autres navigateurs',
                        'click2zoom'        =>  '(Cliquez pour agrandir)',
                        'alt'               =>  'illustration',
                        'sourceC9'          =>  'Sources sur Cloud9',
                        'sourceGithub'      =>  'Sources sur Github',
                        'Dareboost'         =>  'Voir les performances',
                        'headerObsolete'    =>  'Votre navigateur est obsolète !',
                        'textObsolete'      =>  'Vous utilisez un navigateur obsolète. Pour une meilleure expérience web et une sécurité accrue, vous devriez mettre à jour votre navigateur ou en télécharger un plus récent comme <a href="https://www.mozilla.org/firefox/new/">Firefox</a>, <a href="http://www.google.com/chrome">Chrome</a> ou <a href="http://www.apple.com/safari/download/">Safari</a>, par exemple).',
                        'headerWhy'         =>  'Pourquoi activer le support du JavaScript ?',
                        'textWhy'           =>  'Le JavaScript (souvent abrégé JS) est un langage de programmation de scripts côté client, en complément du langage <abbr title="Hypertext Markup Language">HTML</abbr>. A l\'aide de la méthode <abbr title="Asynchronous Javascript And XML">AJAX</abbr>, il permet de faire des pages qui se mettent à jour sans se recharger entièrement pour des sites plus fluides et plus écologique.<br>Décrié, ce langage est néanmoins une technologie beaucoup moins énergivore que son concurrent l\'Adobe Flash. Pris en compte par tous les navigateurs, c\'est un langage <em>Open Source</em> d\'avenir. L\'activer peut vous aider à avoir un meuilleur visuel d\'un site, ainsi qu\'une meuilleur intéraction.',
                        'headerWho'         =>  'Comment l\'activer ?',
                        'toggleNav'         =>  'Menu de navigation'
                    ),
                Browser::BROWSER_FIREFOX.'a22'=>array(
                        'name'          =>  'Firefox',
                        'note'          =>  '(à partir de la version 23.0)',
                        'instructions'  =>  array(
                                                    'Ouvrez Firefox.',
                                                    'Tapez "about:config" dans la barre d\'adresse de Firefox.',
                                                    'Sur la page de mise en garde qui s\'affiche, cliquez sur "Je ferai attention, promis !".',
                                                    'Dans le champ de recherche en haut de la page qui ouvre, tapez : "javascript.enabled".',
                                                    'Passez la valeur de l\'option à true (en double-cliquant) pour activer JavaScript.'
                                            ),
                        'imgs'          =>  array(
                                                'firefoxAfter22.png'=>array(450,270)
                                            ),
                        'linksImgs'     =>  false
                        
                    ),
                Browser::BROWSER_FIREFOX.'b23'=>array(
                        'name'          =>  'Firefox',
                        'note'          =>  '(versions antérieures à 23.0)',
                        'instructions'  =>  array(
                                                    'Ouvrez Firefox.',
                                                    'Cliquez sur "Outils" dans la barre de menu de Firefox.',
                                                    'Cliquez sur l\'onglet "Contenu"',
                                                    'Cochez la case "Activer le JavaScript" si elle est décochée.',
                                            ),
                        'imgs'          =>  array(
                                                'firefoxBefore23.png'=>array(644,549)
                                            ),
                        'linksImgs'     =>  false
                        
                    ),
                Browser::BROWSER_CHROME=>array(
                        'name'          =>  'Google Chrome / Chromium',
                        'note'          =>  null,
                        'instructions'  =>  array(
                                                    'Ouvrez Chrome.',
                                                    'Dans la barre de menus, cliquez sur l\'icône menu.',
                                                    'Choisissez "Paramètres".',
                                                    'Dans le bas de la page, cliquez sur "Afficher les paramètres avancés…".',
                                                    'Dans Confidentialité, cliquez sur le bouton "Paramètres de contenu...".',
                                                    'Dans la fenêtre qui ouvre, allez à JavaScript et cochez l\'option "Autoriser tous les sites à exécuter JavaScript (recommandé)".',
                                                    'Fermez l\'onglet.'
                                            ),
                        'imgs'          =>  array(
                                                'chrome.png'=>array(652,533)
                                            ),
                        'linksImgs'     =>  false
                        
                    ),
                Browser::BROWSER_ANDROID=>array(
                        'name'          =>  'Android',
                        'note'          =>  null,
                        'instructions'  =>  array(
                                                    'Lancez le Navigateur.',
                                                    'Ouvrez le menu.',
                                                    'Sélectionnez "Plus".',
                                                    'Sélectionnez "Paramètres".',
                                                    'Sélectionnez "Activer le JavaScript".'
                                            ),
                        'imgs'          =>  array(),
                        'linksImgs'     =>  false
                        
                    ),
                'iOS'=>array(
                        'name'          =>  'iOS',
                        'note'          =>  '',
                        'instructions'  =>  array(
                                                    'Lancez le menu "paramètres" dans le menu principal de l\'appareil.',
                                                    'Sélectionnez le sous-menu "Safari".',
                                                    'Faites défiler la fenêtre et sélectionnez l\'item "Javascript".',
                                                    'Mettez le curseur sur "On".'
                                            ),
                        'imgs'          =>  array(),
                        'linksImgs'     =>  false
                        
                    ),
                Browser::BROWSER_POCKET_IE=>array(
                        'name'          =>  'Internet Explorer Mobile',
                        'note'          =>  'sur Windows Phone',
                        'instructions'  =>  array(
                                                    'Ouvrez le navigateur.',
                                                    'Sélectionnez "Réglage".',
                                                    'Sélectionnez "Script Java".',
                                                    'Cliquez sur "Activé".'
                                            ),
                        'imgs'          =>  array(),
                        'linksImgs'     =>  false
                        
                    ),
                Browser::BROWSER_BLACKBERRY=>array(
                        'name'          =>  'BlackBerry',
                        'note'          =>  '',
                        'instructions'  =>  array(
                                                    'Ouvrez le navigateur.',
                                                    'Appuyez sur la touche "Menu".',
                                                    'Cliquez sur "Options".',
                                                    'Cliquez sur "Configuration du navigateur".',
                                                    'Cochez la case "Prise en charge JavaScript." si celle-ci n\'est pas coché.',
                                                    'Appuyez sur la touche "Menu".',
                                                    'Cliquez sur Enregistrer les options.'
                                            ),
                        'imgs'          =>  array(),
                        'linksImgs'     =>  false
                        
                    ),
                Browser::BROWSER_SAFARI=>array(
                        'name'          =>  'Safari',
                        'note'          =>  null,
                        'instructions'  =>  array(
                                                    'Ouvrez Safari.',
                                                    'Dans la barre de menus, cliquez sur Édition.',
                                                    'Choisissez Préférences...',
                                                    'Cliquez sur Sécurité dans le haut de la fenêtre.',
                                                    'Dans Contenu web, cochez la case Activer JavaScript.'
                                            ),
                        'imgs'          =>  array(
                                                'safari.png'=>array(628,406)
                                            ),
                        'linksImgs'     =>  false
                        
                    ),
                Browser::BROWSER_OPERA=>array(
                        'name'          =>  'Opera',
                        'note'          =>  null,
                        'instructions'  =>  array(
                                                    'Lancez Opera.',
                                                    'Cliquez sur le menu Outils (ou sur le bouton Opéra, selon la version du navigateur).',
                                                    'Choisissez Préférences (ou Réglages, Préférences).',
                                                    'Dans la fenêtre qui ouvre, cliquez sur l\'onglet Avancé.',
                                                    'Cliquez sur Contenu dans la liste de gauche.',
                                                    'Cochez Activer le JavaScript.',
                                                    'Options JavaScript... si désiré.',
                                                    'Cliquez sur OK.'
                                            ),
                        'imgs'          =>  array(
                                                'opera.png'=>array(622,518)
                                            ),
                        'linksImgs'     =>  false
                        
                    ),
                Browser::BROWSER_NETSCAPE_NAVIGATOR=>array(
                        'name'          =>  'Netscape',
                        'note'          =>  null,
                        'instructions'  =>  array(
                                                    'Lancez Netscape.',
                                                    'Sélectionnez le menu "Modifier".',
                                                    'Sélectionnez le menu "Préférences".',
                                                    'Sélectionnez le menu "Avancé".',
                                                    'Activez l\'option "Activer JavaScript".'
                                            ),
                        'imgs'          =>  array(),
                        'linksImgs'     =>  false
                        
                    ),
                Browser::BROWSER_IE.'a6'=>array(
                        'name'          =>  'Internet Explorer',
                        'note'          =>  '(versions 7, 8, 9 et 10)',
                        'instructions'  =>  array(
                                                    'Lancez Internet Explorer.',
                                                    'Dans la barre de menus, cliquez sur "Outils".',
                                                    'Dans le menu déroulant, choisissez "Options Internet".',
                                                    'Cliquez sur l\'onglet "Sécurité".',
                                                    'Sélectionnez la zone "Internet".',
                                                    'Cliquez sur le bouton "Personnaliser le niveau...".',
                                                    'Dans la fenêtre "Paramètres de sécurité - Zone Internet", faites défiler la liste jusqu\'a la section "Scripts ASP"',
                                                    'Cochez Activé.',
                                                    'Confirmez en cliquant sur Ok.',
                                                    'Si un fenêtre d\'avertissement s\'ouvre, répondez "oui".',
                                                    'Cliquez sur Ok pour quitter la boîte de dialogue Options Internet.'
                                            ),
                        'imgs'          =>  array(
                                                'ieAfter6.png'=>array(486,562),
                                                'ieAfter6_2.png'=>array(463,481)
                                            ),
                        'linksImgs'     =>  true
                        
                    ),
                Browser::BROWSER_IE.'6'=>array(
                        'name'          =>  'Internet Explorer',
                        'note'          =>  '(versions 6.x)',
                        'instructions'  =>  array(
                                                    'Lancez Internet Explorer.',
                                                    'Cliquez sur "Outils" dans la barre de menus.',
                                                    'Dans le menu déroulant, choisissez "Options Internet".',
                                                    'Cliquez sur l\'onglet "Sécurité".',
                                                    'Sélectionnez la zone "Internet".',
                                                    'Cliquez sur le bouton "Personnaliser le niveau..."',
                                                    'Dans la fenêtre "Paramètres de sécurité", descendez dans la liste jusqu\'à la section "Script".',
                                                    'Dans la sous-section "Active Scripting", cochez "Activer".',
                                                    'Confirmez en cliquant sur le bouton "OK".',
                                                    'Répondez "oui" dans la fenêtre d\'avertissement qui apparaît.',
                                                    'Cliquez sur le bouton "OK" pour quitter la boîte de dialogue "Options Internet".'
                                            ),
                        'imgs'          =>  array(
                                                'ie6.png'=>array(443,511),
                                                'ie6_2.png'=>array(353,415)
                                            ),
                        'linksImgs'     =>  true
                    ),
                Browser::BROWSER_KONQUEROR=>array(
                        'name'          =>  'Konqueror',
                        'note'          =>  null,
                        'instructions'  =>  array(
                                                    'Lancez Konqueror.',
                                                    'Cliquez sur "Outils" dans la barre de menus.',
                                                    'Cliquez sur "Configurer Konqueror".',
                                                    'Dans la boite de dialogue "Configuration - Kenqueror", cliquez sur "Java & JavaScript" dans la zone à gauche.',
                                                    'Cliquez sur l\'onglet "Javascript".',
                                                    'Coche la case "Activer le Javascript global" si elle est décoché.',
                                                    'Cliquez sur le bouton "Appliquer" en bas de la fenêtre.'
                                            ),
                        'imgs'          =>  array(),
                        'linksImgs'     =>  false
                    )
            )
    );




	$languageUser=false;
	if(!$languageUser&&isset($_GET['lang'])&&array_key_exists($_GET['lang'],$arrayBrowser)){
		$languageUser=lang($_GET['lang'], $arrayBrowser);
	}
	if(isset($_COOKIE['enabledJsHtmlLang'])&&array_key_exists($_COOKIE['enabledJsHtmlLang'],$arrayBrowser)){
		$languageUser=$_COOKIE['enabledJsHtmlLang'];
	}
	if(!$languageUser&&isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
		$httpAcceptLanguage=explode(',',str_replace(';',',',$_SERVER['HTTP_ACCEPT_LANGUAGE']));
		foreach($httpAcceptLanguage as $language){
			if(false!==($positionEgal=strpos($language,'-'))){
				$language=substr($language,$positionEgal);
			}
			if(false===strpos($language,'=')&&array_key_exists($language,$arrayBrowser)){
				$languageUser=lang($language, $arrayBrowser);
				break;
			}
		}
	}
	if(!$languageUser&&isset($_SERVER['REMOTE_ADDR'])&&$_SERVER['REMOTE_ADDR']!='127.0.0.1'){
		require_once($wayToGeoip.'geoipcity.inc.php');
		$geoipDatabase=geoip_open($wayToGeoip.'GeoLiteCity.dat',GEOIP_STANDARD);
		$record=geoip_record_by_addr($geoipDatabase, $_SERVER['REMOTE_ADDR']);
		if(is_object($record)&&array_key_exists($record->country_code,$arrayBrowser)){
			$languageUser=lang($record->country_code, $arrayBrowser);
		}
	}
	if(!$languageUser&&!empty($defaultLanguage)&&array_key_exists($this->defaultLanguage,$arrayBrowser)){
		$languageUser=lang($this->defaultLanguage, $arrayBrowser);
	}
	if(!$languageUser){
		$keys=array_keys($arrayBrowser);
		$languageUser=lang($keys[0], $arrayBrowser);
	}
	
	
	function lang($lang, $arrayBrowser){
		if(!array_key_exists($lang,$arrayBrowser)){
			return false;
		}
		else{
			$_COOKIE['enabledJsHtmlLang']=$lang;
			setcookie('enabledJsHtmlLang', $lang, time()+365*24*3600, '/', null, false, true);
			return $lang;
		}
	}




if($getBrowser==Browser::BROWSER_FIREFOX||$getBrowser==Browser::BROWSER_CHROME||$getBrowser==Browser::BROWSER_ANDROID||$getBrowser==Browser::BROWSER_IPHONE||$getBrowser==Browser::BROWSER_IPOD||$getBrowser==Browser::BROWSER_IPAD||$getBrowser==Browser::BROWSER_POCKET_IE||$getBrowser==Browser::BROWSER_BLACKBERRY||$getBrowser==Browser::BROWSER_SAFARI||$getBrowser==Browser::BROWSER_OPERA||$getBrowser==Browser::BROWSER_NETSCAPE_NAVIGATOR||$getBrowser==Browser::BROWSER_IE||$getBrowser==Browser::BROWSER_KONQUEROR){
    
    if($getBrowser==Browser::BROWSER_IE){
        if($browser->getVersion()==6)
            $suffix='6';
        elseif($browser->getVersion()>6)
            $suffix='a6';
        $browserKey=$getBrowser.$suffix;
    }
    elseif($getBrowser==Browser::BROWSER_FIREFOX){
        if($browser->getVersion()<23)
            $suffix='b23';
        elseif($browser->getVersion()>22)
            $suffix='a22';
        $browserKey=$getBrowser.$suffix;
    }
    
    elseif($getBrowser==Browser::BROWSER_IPHONE||$getBrowser==Browser::BROWSER_IPOD||$getBrowser==Browser::BROWSER_IPAD){
        $browserKey='iOS';
    }
    else{
        $browserKey=$getBrowser;
        
    }
    $browserDatas=$arrayBrowser[$languageUser][$browserKey];
}


header('Content-Type: text/html; charset=utf-8');
header('Content-Language: '.$languageUser);

?><!DOCTYPE html><html lang="fr"<?php if($getBrowser==Browser::BROWSER_FIREFOX||$getBrowser==Browser::BROWSER_CHROME||$getBrowser==Browser::BROWSER_ANDROID||$getBrowser==Browser::BROWSER_IPHONE||$getBrowser==Browser::BROWSER_IPOD||$getBrowser==Browser::BROWSER_IPAD||$getBrowser==Browser::BROWSER_POCKET_IE||$getBrowser==Browser::BROWSER_BLACKBERRY||$getBrowser==Browser::BROWSER_SAFARI||$getBrowser==Browser::BROWSER_OPERA||$getBrowser==Browser::BROWSER_NETSCAPE_NAVIGATOR||$getBrowser==Browser::BROWSER_IE||$getBrowser==Browser::BROWSER_KONQUEROR){echo ' class="known"';}else{echo ' class="unknown"';} ?>><head><title><?php echo $arrayBrowser[$languageUser]['texts']['title']; ?></title><meta name="description" content="<?php echo $arrayBrowser[$languageUser]['texts']['metaDescription']; ?>"><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="imgEnabledJS/favicon.ico" ><![endif]--><link rel="icon" type="image/x-icon" href="imgEnabledJS/favicon.ico"><link rel="apple-touch-icon" sizes="57x57" href="imgEnabledJS/apple-touch-icon-57x57.png"><link rel="apple-touch-icon" sizes="114x114" href="imgEnabledJS/apple-touch-icon-114x114.png"><link rel="apple-touch-icon" sizes="72x72" href="imgEnabledJS/apple-touch-icon-72x72.png"><link rel="apple-touch-icon" sizes="144x144" href="imgEnabledJS/apple-touch-icon-144x144.png"><link rel="apple-touch-icon" sizes="60x60" href="imgEnabledJS/apple-touch-icon-60x60.png"><link rel="apple-touch-icon" sizes="120x120" href="imgEnabledJS/apple-touch-icon-120x120.png"><link rel="apple-touch-icon" sizes="76x76" href="imgEnabledJS/apple-touch-icon-76x76.png"><link rel="apple-touch-icon" sizes="152x152" href="imgEnabledJS/apple-touch-icon-152x152.png"><link rel="icon" type="image/png" href="imgEnabledJS/favicon-196x196.png" sizes="196x196"><link rel="icon" type="image/png" href="imgEnabledJS/favicon-160x160.png" sizes="160x160"><link rel="icon" type="image/png" href="imgEnabledJS/favicon-96x96.png" sizes="96x96"><link rel="icon" type="image/png" href="imgEnabledJS/favicon-32x32.png" sizes="32x32"><link rel="icon" type="image/png" href="imgEnabledJS/favicon-16x16.png" sizes="16x16"><link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"><link rel="stylesheet" href="cssEnabledJS/style.min.css"></head><body><div id="wrap"><div class="container"><div class="navbar navbar-default navbar-fixed-top" role="navigation"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only"><?php echo $arrayBrowser[$languageUser]['texts']['toggleNav']; ?></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="http://ajabep.tk/EnabledJS/">Ajabep/<span class="text-muted">EnabledJS/</span></a></div><div class="collapse navbar-collapse"><ul class="nav navbar-nav"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Others Language <b class="caret"></b></a><ul class="dropdown-menu"><?php foreach($arrayBrowser as $lang=>$array){echo '<li><a href="'.(($lang==$languageUser)?'#IdQuiExistePas':'?lang='.$lang).'">'.$languagesNames[$lang].'</a></li>';} ?></ul></li><li><a href="http://ajabep.tk/contact/"><?php echo $arrayBrowser[$languageUser]['texts']['contact']; ?></a></li><li><a href="https://c9.io/ajabep/enabled_js"><?php echo $arrayBrowser[$languageUser]['texts']['sourceC9']; ?></a></li><li><a href="https://github.com/ajabep/EnabledJS"><?php echo $arrayBrowser[$languageUser]['texts']['sourceGithub']; ?></a></li><li><a href="https://www.dareboost.com/fr/report/5304ffabe4b037e2f79c6008"><?php echo $arrayBrowser[$languageUser]['texts']['Dareboost']; ?></a></li></ul></div></div></div><div class="page-header"><h1><?php echo $arrayBrowser[$languageUser]['texts']['h1']; ?></h1></div><noscript><div class="alert alert-danger"><?php echo $arrayBrowser[$languageUser]['texts']['javascriptDisabled']; ?></div></noscript><div class="alert alert-success jsOnly" id="jsShow"><?php echo $arrayBrowser[$languageUser]['texts']['javascriptEnabled']; ?></div><?php if(($getBrowser==Browser::BROWSER_IE&&$browser->getVersion()<8)||($getBrowser==Browser::BROWSER_FIREFOX&&$browser->getVersion()<26)||$getBrowser==Browser::BROWSER_NETSCAPE_NAVIGATOR){if(!($getBrowser==Browser::BROWSER_FIREFOX&&$browser->getVersion()>21)){ ?><div class="alert alert-warning"><h3><?php echo $arrayBrowser[$languageUser]['texts']['headerObsolete']; ?></h3><p><?php echo $arrayBrowser[$languageUser]['texts']['textObsolete']; ?></p></div><?php }} ?><hr class="featurette-divider"><h2><?php echo $arrayBrowser[$languageUser]['texts']['headerWhy']; ?></h2><p class="alert alert-info"><?php echo $arrayBrowser[$languageUser]['texts']['textWhy']; ?></p><hr class="featurette-divider"><h2><?php echo $arrayBrowser[$languageUser]['texts']['headerWho']; ?></h2><?php if($getBrowser==Browser::BROWSER_FIREFOX||$getBrowser==Browser::BROWSER_CHROME||$getBrowser==Browser::BROWSER_ANDROID||$getBrowser==Browser::BROWSER_IPHONE||$getBrowser==Browser::BROWSER_IPOD||$getBrowser==Browser::BROWSER_IPAD||$getBrowser==Browser::BROWSER_POCKET_IE||$getBrowser==Browser::BROWSER_BLACKBERRY||$getBrowser==Browser::BROWSER_SAFARI||$getBrowser==Browser::BROWSER_OPERA||$getBrowser==Browser::BROWSER_NETSCAPE_NAVIGATOR||$getBrowser==Browser::BROWSER_IE||$getBrowser==Browser::BROWSER_KONQUEROR){ ?><hr class="featurette-divider"><div class="row featurette"><div class="<?php if($browserDatas['linksImgs']){echo 'col-md-9';}else{echo 'col-md-7';}echo '">'; ?><h3 class="h2 featurette-heading <?php echo $browserKey; ?>"><?php echo $browserDatas['name'].((is_null($browserDatas['note']))?'':' <small>'.$browserDatas['note'].'</small>'); ?></h3><ul class="lead"><?php foreach($browserDatas['instructions'] as $instruction){echo '<li>'.$instruction.'</li>';} ?><li><?php echo $arrayBrowser[$languageUser]['texts']['reloadPage']; ?><kbd>F5</kbd>.</li></ul></div><figure class="<?php if($browserDatas['linksImgs']){echo 'col-md-3 col-lg-3';}else{echo 'col-md-5';}echo '">';foreach($browserDatas['imgs'] as $img=>$size){if($browserDatas['linksImgs']){echo '<a href="imgEnabledJS/'.$img.'">';}echo '<img src="imgEnabledJS/'.$img.'" width="'.$size[0].'" height="'.$size[1].'" class="featurette-image img-responsive" alt="'.$arrayBrowser[$languageUser]['texts']['alt'].'">';if($browserDatas['linksImgs']){echo '</a>';}}if($browserDatas['linksImgs']){echo '<figcaption class="hidden-xs hidden-sm">'.$arrayBrowser[$languageUser]['texts']['click2zoom'].'</figcaption>';} ?></figure></div></div><div id="parentReadMore" class="parentReadMore"><div class="container"><p id="readMore" class="readMore"><?php echo $arrayBrowser[$languageUser]['texts']['readMore']; ?></p><div class="others"><?php }foreach($arrayBrowser[$languageUser] as $browserID=>$browserDatas){if((isset($browserKey)&&$browserID==$browserKey)||$browserID=='texts'){continue 1;} ?><hr class="featurette-divider"><div class="row featurette"><div class="<?php if($browserDatas['linksImgs']){echo 'col-md-9';}else{echo 'col-md-7';}echo '">'; ?><h3 class="h2 featurette-heading <?php echo $browserID; ?>"><?php echo $browserDatas['name'].((is_null($browserDatas['note']))?'':' <small>'.$browserDatas['note'].'</small>'); ?></h3><ul class="lead"><?php foreach($browserDatas['instructions'] as $instruction){echo '<li>'.$instruction.'</li>';} ?><li><?php echo $arrayBrowser[$languageUser]['texts']['reloadPage']; ?><kbd>F5</kbd>.</li></ul></div><figure class="<?php if($browserDatas['linksImgs']){echo 'col-md-3 col-lg-3';}else{echo 'col-md-5';}echo '">';foreach($browserDatas['imgs'] as $img=>$size){if($browserDatas['linksImgs']){echo '<a href="imgEnabledJS/'.$img.'">';}echo '<img src="imgEnabledJS/'.$img.'" width="'.$size[0].'" height="'.$size[1].'" class="featurette-image img-responsive" alt="'.$arrayBrowser[$languageUser]['texts']['alt'].'">';if($browserDatas['linksImgs']){echo '</a>';}}if($browserDatas['linksImgs']){echo '<figcaption class="hidden-xs hidden-sm">'.$arrayBrowser[$languageUser]['texts']['click2zoom'].'</figcaption>';} ?></figure></div><?php }if(isset($browserKey)){echo '</div></div>';} ?></div></div><div id="footer"><div class="container"><p><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Creative Commons License" width="80" height="15" src="http://i.creativecommons.org/l/by-nc-sa/4.0/80x15.png" /></a><br>The text of EnabledJS is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a>.<br>Based on a work at <a  href="http://maboite.qc.ca/activation_js.php">http://maboite.qc.ca/activation_js.php</a>.</p><p class="text-muted">Designed with <a href="http://getbootstrap.com/">Boostrap</a>. Source code under <a href="http://choosealicense.com/licenses/mit/">MIT License</a>.</p></div></div><script>window.onload=function(){document.getElementById("jsShow").className+=" display"};document.getElementById("readMore").onclick=function(){var a=document.getElementById("parentReadMore");RegExp("(?:^|\\s)open(?!\\S)","g").test(a.className)?a.className=a.className.replace(/(?:^|\s)open(?!\S)/g,""):a.className+=" open"};</script></body></html>
