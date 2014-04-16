<?php header('Content-Type: text/html; charset=utf-8');header('Content-Language: '.$languageUser); ?><!DOCTYPE html>
<html lang="fr"<?php
            //if($getBrowser==Browser::BROWSER_IE||$getBrowser==Browser::BROWSER_OPERA||$getBrowser==Browser::BROWSER_FIREFOX||$getBrowser==Browser::BROWSER_CHROME||$getBrowser==Browser::BROWSER_SAFARI||$getBrowser==Browser::BROWSER_ANDROID||$getBrowser==Browser::BROWSER_IPHONE||$getBrowser==Browser::BROWSER_IPOD||$getBrowser==Browser::BROWSER_IPAD||$getBrowser==Browser::BROWSER_NETSCAPE_NAVIGATOR){
            if($getBrowser==Browser::BROWSER_FIREFOX||$getBrowser==Browser::BROWSER_CHROME||$getBrowser==Browser::BROWSER_ANDROID||$getBrowser==Browser::BROWSER_IPHONE||$getBrowser==Browser::BROWSER_IPOD||$getBrowser==Browser::BROWSER_IPAD||$getBrowser==Browser::BROWSER_POCKET_IE||$getBrowser==Browser::BROWSER_BLACKBERRY||$getBrowser==Browser::BROWSER_SAFARI||$getBrowser==Browser::BROWSER_OPERA||$getBrowser==Browser::BROWSER_NETSCAPE_NAVIGATOR||$getBrowser==Browser::BROWSER_IE||$getBrowser==Browser::BROWSER_KONQUEROR){
                echo ' class="known"';
            }
            else{
                echo ' class="unknown"';
            }
?>>
<head>
    <title><?php echo $arrayBrowser[$languageUser]['texts']['title']; ?></title>
    <meta name="description" content="<?php echo $arrayBrowser[$languageUser]['texts']['metaDescription']; ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" ><![endif]-->
	<link rel="icon" type="image/x-icon" href="img/favicon.ico">
        <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png" >
        <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png" >
        <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png" >
        <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png" >
        <link rel="apple-touch-icon" sizes="60x60" href="img/apple-touch-icon-60x60.png" >
        <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png" >
        <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png" >
        <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png" >
        <link rel="icon" type="image/png" href="img/favicon-196x196.png" sizes="196x196" >
        <link rel="icon" type="image/png" href="img/favicon-160x160.png" sizes="160x160" >
        <link rel="icon" type="image/png" href="img/favicon-96x96.png" sizes="96x96" >
        <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" >
        <link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16" >
        <!--meta name="msapplication-TileColor" content="#ffc40d" >
        <meta name="msapplication-TileImage" content="img/mstile-144x144.png" >
        <meta name="msapplication-square70x70logo" content="img/mstile-70x70.png" >
        <meta name="msapplication-square144x144logo" content="img/mstile-144x144.png" >
        <meta name="msapplication-square150x150logo" content="img/mstile-150x150.png" >
        <meta name="msapplication-square310x310logo" content="img/mstile-310x310.png" >
        <meta name="msapplication-wide310x150logo" content="img/mstile-310x150.png" -->
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.min.css">
</head>
<body>
    
    
    
    
    
    
    <div id="wrap">

        <div class="container">
            
            <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only"><?php echo $arrayBrowser[$languageUser]['texts']['toggleNav']; ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="http://ajabep.tk/EnabledJS/">Ajabep/<span class="text-muted">EnabledJS/</span></a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Others Language <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <?php
                                    // echo '<pre>'; var_dump($arrayBrowser); echo count($arrayBrowser).'</pre>';
                                        foreach($arrayBrowser as $lang=>$array){
                                            echo '<li><!--span class="flag flag-'.$lang.'"></span--><a href="'.(($lang==$languageUser)?'#IdQuiExistePas':'?lang='.$lang).'">'.$languagesNames[$lang].'</a></li><!-- an ID which does not exist avoids the slide at the beginning of the page -->';
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li><a href="http://ajabep.tk/contact/"><?php echo $arrayBrowser[$languageUser]['texts']['contact']; ?></a></li>
                            <li><a href="https://c9.io/ajabep/enabled_js"><?php echo $arrayBrowser[$languageUser]['texts']['sourceC9']; ?></a></li>
                            <li><a href="https://github.com/ajabep/EnabledJS"><?php echo $arrayBrowser[$languageUser]['texts']['sourceGithub']; ?></a></li>
                            <li><a href="https://www.dareboost.com/fr/report/5304ffabe4b037e2f79c6008"><?php echo $arrayBrowser[$languageUser]['texts']['Dareboost']; ?></a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
            
            <div class="page-header">
              <h1><?php echo $arrayBrowser[$languageUser]['texts']['h1']; ?></h1>
            </div>
            <noscript><div class="alert alert-danger"><?php echo $arrayBrowser[$languageUser]['texts']['javascriptDisabled']; ?></div></noscript>
            <div class="alert alert-success jsOnly" id="jsShow"><?php echo $arrayBrowser[$languageUser]['texts']['javascriptEnabled']; ?></div>
            
            <?php
                if(($getBrowser==Browser::BROWSER_IE&&$browser->getVersion()<8)||($getBrowser==Browser::BROWSER_FIREFOX&&$browser->getVersion()<26)||$getBrowser==Browser::BROWSER_NETSCAPE_NAVIGATOR){
                        if(!($getBrowser==Browser::BROWSER_FIREFOX&&$browser->getVersion()>21)){
                        ?>
                <div class="alert alert-warning">
                    <h3><?php echo $arrayBrowser[$languageUser]['texts']['headerObsolete']; ?></h3>
                    <p><?php echo $arrayBrowser[$languageUser]['texts']['textObsolete']; ?></p>
                </div>
            <?php
                    }
                }
            ?>
            
            <hr class="featurette-divider">
            
            <h2><?php echo $arrayBrowser[$languageUser]['texts']['headerWhy']; ?></h2>
            <p class="alert alert-info"><?php echo $arrayBrowser[$languageUser]['texts']['textWhy']; ?></p>
            
            <hr class="featurette-divider">
            
            <h2><?php echo $arrayBrowser[$languageUser]['texts']['headerWho']; ?></h2>
            <?php
                if($getBrowser==Browser::BROWSER_FIREFOX||$getBrowser==Browser::BROWSER_CHROME||$getBrowser==Browser::BROWSER_ANDROID||$getBrowser==Browser::BROWSER_IPHONE||$getBrowser==Browser::BROWSER_IPOD||$getBrowser==Browser::BROWSER_IPAD||$getBrowser==Browser::BROWSER_POCKET_IE||$getBrowser==Browser::BROWSER_BLACKBERRY||$getBrowser==Browser::BROWSER_SAFARI||$getBrowser==Browser::BROWSER_OPERA||$getBrowser==Browser::BROWSER_NETSCAPE_NAVIGATOR||$getBrowser==Browser::BROWSER_IE||$getBrowser==Browser::BROWSER_KONQUEROR){
                /*        if($getBrowser==Browser::BROWSER_IE){
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
                        $browserDatas=$arrayBrowser[$browserKey];*/
                    ?>
                    <hr class="featurette-divider">
                    <div class="row featurette">
                        <div class="<?php
                            if($browserDatas['linksImgs'])
                                echo 'col-md-9';
                            else
                                echo 'col-md-7';
                            echo '">';
                            ?>
                            <h2 class="featurette-heading <?php echo $browserKey; ?>"><?php echo $browserDatas['name'].((is_null($browserDatas['note']))?'':' <span class="text-muted">'.$browserDatas['note'].'</span>'); ?></h2>
                            <ul class="lead"><?php
                                foreach($browserDatas['instructions'] as $instruction){
                                    echo '<li>'.$instruction.'</li>';
                                }
                                ?>
                                <li><?php echo $arrayBrowser[$languageUser]['texts']['reloadPage']; ?><kbd>F5</kbd>.</li>
                            </ul>
                        </div>
                        <figure class="<?php
                            if($browserDatas['linksImgs'])
                                echo 'col-md-3 col-lg-3';
                            else
                                echo 'col-md-5';
                            
                            echo '">';
                            foreach($browserDatas['imgs'] as $img=>$size){
                                if($browserDatas['linksImgs'])
                                    echo '<a href="img/'.$img.'">';
                                
                                echo '<img src="img/'.$img.'" width="'.$size[0].'" height="'.$size[1].'" class="featurette-image img-responsive" alt="'.$arrayBrowser[$languageUser]['texts']['alt'].'">';
                                if($browserDatas['linksImgs'])
                                    echo '</a>';
                            }
                            if($browserDatas['linksImgs'])
                                echo '<figcaption class="hidden-xs hidden-sm">'.$arrayBrowser[$languageUser]['texts']['click2zoom'].'</figcaption>';
                            ?>
                        </figure>
                    </div>
                </div>
                <div id="parentReadMore" class="parentReadMore">
                    <div class="container">
                        <p id="readMore" class="readMore"><?php echo $arrayBrowser[$languageUser]['texts']['readMore']; ?></p>
                        <div class="others">
                    <?php
                }
                
                foreach($arrayBrowser[$languageUser] as $browserID=>$browserDatas){
                    if((isset($browserKey)&&$browserID==$browserKey)||$browserID=='texts')
                        continue 1;
                    
                    ?>
                    <hr class="featurette-divider">
                    <div class="row featurette">
                        <div class="<?php
                            if($browserDatas['linksImgs'])
                                echo 'col-md-9';
                            else
                                echo 'col-md-7';
                            echo '">';
                            ?>
                            <h2 class="featurette-heading <?php echo $browserID; ?>"><?php echo $browserDatas['name'].((is_null($browserDatas['note']))?'':' <span class="text-muted">'.$browserDatas['note'].'</span>'); ?></h2>
                            <ul class="lead"><?php
                                foreach($browserDatas['instructions'] as $instruction){
                                    echo '<li>'.$instruction.'</li>';
                                }
                                ?>
                                <li><?php echo $arrayBrowser[$languageUser]['texts']['reloadPage']; ?><kbd>F5</kbd>.</li>
                            </ul>
                        </div>
                        <figure class="<?php
                            if($browserDatas['linksImgs'])
                                echo 'col-md-3 col-lg-3';
                            else
                                echo 'col-md-5';
                            
                            echo '">';
                            foreach($browserDatas['imgs'] as $img=>$size){
                                if($browserDatas['linksImgs'])
                                    echo '<a href="img/'.$img.'">';
                                
                                echo '<img src="img/'.$img.'" width="'.$size[0].'" height="'.$size[1].'" class="featurette-image img-responsive" alt="'.$arrayBrowser[$languageUser]['texts']['alt'].'">';
                                if($browserDatas['linksImgs'])
                                    echo '</a>';
                            }
                            if($browserDatas['linksImgs'])
                                echo '<figcaption class="hidden-xs hidden-sm">'.$arrayBrowser[$languageUser]['texts']['click2zoom'].'</figcaption>';
                            ?>
                        </figure>
                    </div>
                    <?php
                }
                if(isset($browserKey))
                    echo '</div></div>';
            ?>
        </div>
    
        <div id="footer">
          <div class="container">
            <p><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Creative Commons License" width="80" height="15" src="http://i.creativecommons.org/l/by-nc-sa/4.0/80x15.png" /></a><br>The text of EnabledJS is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a>.<br>Based on a work at <a  href="http://maboite.qc.ca/activation_js.php">http://maboite.qc.ca/activation_js.php</a>.</p>
            <p class="text-muted">Designed with <a href="http://getbootstrap.com/">Boostrap</a>. Source code under <a href="http://choosealicense.com/licenses/mit/">MIT License</a>.</p>
          </div>
        </div>
    </div>
    <!--script src="//code.jquery.com/jquery.min.js" async></script>
    <script src="js/bootstrap.js" async></script-->
    <script>window.onload=function(){document.getElementById("jsShow").className+=" display"};document.getElementById("readMore").onclick=function(){var a=document.getElementById("parentReadMore");RegExp("(?:^|\\s)open(?!\\S)","g").test(a.className)?a.className=a.className.replace(/(?:^|\s)open(?!\S)/g,""):a.className+=" open"};</script>
</body>
</html>
