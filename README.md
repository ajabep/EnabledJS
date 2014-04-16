EnabledJS
=========

## Presentation ##

EnabledJS is a standalone system. It's a system which displays the customer how to enable JavaScript according to his browser and his language. Fully customizable, it is easy to add a language, a browser, the handling for such or such browser, etc ...

## Licenses ##

The content of this page is licensed under a [Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License](creativecommons.org/licenses/by-nc-sa/4.0/).
Based on a work at http://maboite.qc.ca/activation_js.php.

The source code is is licensed under a [MIT License](creativecommons.org/licenses/by-nc-sa/4.0/)(http://choosealicense.com/licenses/mit/).

This system is design with Bootstrap, which is licensed under a [MIT License](https://github.com/twbs/bootstrap/blob/master/LICENSE).
This system use Browser.php to detect the browser, which is which is licensed under a [GNU GPL](https://github.com/cbschuld/Browser.php/blob/master/lib/Browser.php#L11-L22).

## Sources ##

You can find the sources on [Cloud9](https://c9.io/ajabep/enabled_js) and on [Github](https://github.com/ajabep/EnabledJS).

## Adding / Customizing ##

### Warning ###
Remember to put the name and the two letter code of the language in the array stored in the `$languagesNames` variable present at the line 931 in the production version, and at the line 9 in the development version, as the following model:

    $languagesNames=array(
        {LANGUAGE'S CODE #1}=>{NAME POSTED},
        {LANGUAGE'S CODE #2}=>{NAME POSTED},
        {LANGUAGE'S CODE #3}=>{NAME POSTED}
    );

For those who have the development version, go to line 15.

For those who have the production version, go to line 937.

In the array stored in the `$arrayBrowser` variable, add an array having as key the 2 letters code of the language. For example, if you want add/customize the English language, the code is `en`.

The array that you just created must be as follows :

    array(
        'texts'=>array(
                'title'             =>  {CONTENTS OF THE TAG TITLE},
                'h1'                =>  {TITLE OF THE PAGE (IN TAG H1)},
                'contact'           =>  {TEXT FOR CONTACT TAB},
                'metaDescription'   =>  {DESCRIPTION OF THE PAGE},
                'javascriptDisabled'=>  {TEXT TO DISPLAY WHEN THE JAVASCRIPT IS NOT ENABLED},
                'javascriptEnabled' =>  {TEXT TO DISPLAY WHEN THE JAVASCRIPT IS ENABLED},
                'reloadPage'        =>  {TEXT REQUESTING TO RELOAD THE PAGE},
                'readMore'          =>  {TEXT REQUESTING TO READ INSTRUCTIONS FOR OTHER BROWSERS},
                'click2zoom'        =>  {TEXT REQUESTING TO CLICK ON THE IMAGES TO ENLARGE},
                'alt'               =>  {ALTERNATIVE TEXT GENERAL FOR IMAGES},
                'sourceC9'          =>  {TEXT REQUESTING TO READ THE SOURCES ON CLOUD9},
                'sourceGithub'      =>  {TEXT REQUESTING TO READ THE SOURCES ON GITHUB},
                'Dareboost'         =>  {TEXT REQUESTING TO SEE PERFORMANCES ON DAREBOOST},

                'headerObsolete'    =>  {TITLE OF THE BOX WHICH SAID THIS BROWSER IS OBSOLETE},
                'textObsolete'      =>  {TEXT REQUESTING TO UPDATE HIS BROWSER},
                'headerWhy'         =>  {TITLE OF THE BOX WHICH EXPLAIN THE UTILITY OF THE JAVASCRIPT},
                'textWhy'           =>  {TEXT WHICH EXPLAIN THE UTILITY OF THE JAVASCRIPT},
                'headerWho'         =>  {TITLE OF THE MAIN CONTENT OF THIS PAGE : HOW TO ENABLED THE JAVASCRIPT}
            ),
        {KEY CORRESPONDING TO BROWSER}=>array(
                'name'          =>  {NAME OF BROWSER},
                'note'          =>  {ADDITIONAL TEXT},
                'instructions'  =>  array(
                                            {INSTRUCTION #1},
                                            {INSTRUCTION #2},
                                            {INSTRUCTION #3}
                                    ),
                'imgs'          =>  array(
                                        {URL IMAGE #1 (LOCATED IN THE FILE 'imgEnabledJS' OR 'img' ACCORDING TO THE VERSION)} => array( {WEIGHT OF THE IMAGE} , {HEIGHT OF THE IMAGE} ),
                                        {URL IMAGE #2 (LOCATED IN THE FILE 'imgEnabledJS' OR 'img' ACCORDING TO THE VERSION)} => array( {WEIGHT OF THE IMAGE} , {HEIGHT OF THE IMAGE} )
                                    ),
                'linksImgs'     =>  {(BOOL) IF THE IMAGES NEED LINK TO BE DISPLAY MORE LAGER}
                
            )
    )




