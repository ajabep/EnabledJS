<?php

require 'class/autoload.php';
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
                Browser::BROWSER_FIREFOX.'a22'=>array( // a22 = after 22
                        'name'          =>  'Firefox',
                        'note'          =>  '(à partir de la version 23.0)',
                        'instructions'  =>  array(
                                                    'Ouvrez Firefox.',
                                                    'Tapez "about:config" dans la barre d\'adresse de Firefox.',
                                                    'Sur la page de mise en garde qui s\'affiche, cliquez sur "Je ferai attention, promis !".',
                                                    'Dans le champ de recherche en haut de la page qui s\'ouvre, tapez : "javascript.enabled".',
                                                    'Passez la valeur de l\'option à true (en double-cliquant) pour activer JavaScript.'
                                            ),
                        'imgs'          =>  array(
                                                'firefoxAfter22.png'=>array(450,270)
                                            ),
                        'linksImgs'     =>  false
                        
                    ),
                Browser::BROWSER_FIREFOX.'b23'=>array( // b23 = before 23
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
                                                    'Faites défiler  la fenêtre et sélectionnez l\'item "Javascript".',
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
                        'note'          =>  '(versions 7, 8, 9, 10 et 11)',
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
                Browser::BROWSER_KONQUEROR=>array( // http://whatismyipaddress.ricmedia.com/help/JavaScript/konqueror/
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
		// $languageUser=lang($_COOKIE['enabledJsHtmlLang'], $arrayBrowser);
	}
	if(!$languageUser&&isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
		$httpAcceptLanguage=explode(',',str_replace(';',',',$_SERVER['HTTP_ACCEPT_LANGUAGE']));
		foreach($httpAcceptLanguage as $language){
			if(false!==($positionEgal=strpos($language,'-'))){
				$language=substr($language,$positionEgal);// = strstr($language, '-', true) mais uniquement avec PHP >=5.3.0
			}
		//	var_dump($arrayBrowser);
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
	// var_dump($arrayBrowser);
		$keys=array_keys($arrayBrowser);
		$languageUser=lang($keys[0], $arrayBrowser);
	}
	
	
	function lang($lang, $arrayBrowser){
		if(!array_key_exists($lang,$arrayBrowser)){
			return false;
		}
		else{
			$_COOKIE['enabledJsHtmlLang']=$lang;
			setcookie('enabledJsHtmlLang', $lang, time()+365*24*3600, '/', null, false, true); // if the cookie exist, the date will postponed toa year.
			return $lang;
		}
	}

// echo 'Lang=';var_dump($languageUser, $return, $_GET['lang']);



// if($getBrowser==Browser::BROWSER_IE||$getBrowser==Browser::BROWSER_OPERA||$getBrowser==Browser::BROWSER_FIREFOX||$getBrowser==Browser::BROWSER_CHROME||$getBrowser==Browser::BROWSER_SAFARI||$getBrowser==Browser::BROWSER_ANDROID||$getBrowser==Browser::BROWSER_IPHONE||$getBrowser==Browser::BROWSER_IPOD||$getBrowser==Browser::BROWSER_IPAD||$getBrowser==Browser::BROWSER_NETSCAPE_NAVIGATOR){
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


include 'vue.php';

?>
