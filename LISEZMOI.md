EnabledJS
=========

## Présentation ##

EnabledJS est un système totalement autonome. Il s'agit d'un système qui permet d'afficher au client la procédure pour activer le JavaScript en fonction de son navigateur et de sa langue.
Entièrement personnalisable, il est facile de rajouter une langue, un navigateur, des manipulation pour tel ou tel navigateur, etc...

## Licences ##

Le contenu de la page est mis à disposition selon les termes de la [Licence Creative Commons Attribution - Pas d’Utilisation Commerciale - Partage dans les Mêmes Conditions 4.0 International](http://creativecommons.org/licenses/by-nc-sa/4.0/deed.fr).<br>
Fondé(e) sur une œuvre à http://maboite.qc.ca/activation_js.php.

Le code source est mis à disposition les termes de la [licence MIT](http://choosealicense.com/licenses/mit/).

Le système est designé avec Boostrap, mis à disposition sous [licence MIT](https://github.com/twbs/bootstrap/blob/master/LICENSE).

Ce système utilise Browser.php pour détecter quel est le navigateur du client, lequel est mis à disposition selon la licence [GNU GPL](https://github.com/cbschuld/Browser.php/blob/master/lib/Browser.php#L11-L22).

## Sources ##

Vous pouvez retrouver les sources sur [Cloud9](https://c9.io/ajabep/enabled_js) et sur [Github](https://github.com/ajabep/EnabledJS).

## Ajout / Personnalisation ##

### Attention ###

Pensez bien à mettre le nom et le code à deux lettre de la langue dans la tableau stocké dans la variable `$languagesNames`, présent à la ligne 931 dans la version de production, et à la ligne 9 pour la version de développement, selon le modèle suivant :

    $languagesNames=array(
        {CODE DE LA LANGUE N°1}=>{NOM AFFICHÉ},
        {CODE DE LA LANGUE N°2}=>{NOM AFFICHÉ},
        {CODE DE LA LANGUE N°3}=>{NOM AFFICHÉ}
    );

Pour ceux ayant la version de développement, allez à la ligne 15.

Pour ceux ayant la version de production, allez à la ligne 937.

Dans le tableau stocké dans la variable `$arrayBrowser`, ajoutez un tableau ayant pour clé le code à deux lettres de la langue en question. Par exemple, pour le français, ce sera `fr`.


Le tableau en question doit être sous la forme suivante :

    array(
        'texts'=>array(
                'title'             =>  {CONTENU DE LA BALISE TITLE},
                'h1'                =>  {TITRE DE LA PAGE (DANS LA BALISE H1)},
                'contact'           =>  {TEXTE POUR LE CONTACT},
                'metaDescription'   =>  {DESCRIPTION DE LA PAGE},
                'javascriptDisabled'=>  {TEXTE À AFFICHER LORSQUE LE JAVASCRIPT N'EST PAS ACTIVÉ},
                'javascriptEnabled' =>  {TEXTE À AFFICHER LORSQUE LE JAVASCRIPT EST ACTIVÉ},
                'reloadPage'        =>  {TEXTE INVITANT À RECHARGER LA PAGE},
                'readMore'          =>  {TEXTE INVITANT À LIRE LES INSTRUCTIONS POUR LES AUTRES NAVIGATEURS},
                'click2zoom'        =>  {TEXTE INVITANT À CLIQUER SUR LES IMAGES POUR LES AGRANDIR},
                'alt'               =>  {TEXTE ALTERNATIF GÉNÉRAL POUR LES IMAGES},
                'sourceC9'          =>  {TEXTE INVITANT À LIRE LES SOURCES SUR CLOUD9},
                'sourceGithub'      =>  {TEXTE INVITANT À LIRE LES SOURCES SUR GITHUB},
                'Dareboost'         =>  {TEXTE INVITANT À VOIR LES PERFORMANCES SUR DAREBOOST}
            ),
        {CLÉ CORRESPONDANT AU NAVIGATEUR}=>array(
                'name'          =>  {NOM DU NAVIGATEUR},
                'note'          =>  {TEXTE COMPLÉMENTAIRE},
                'instructions'  =>  array(
                                            {INSTRUCTION N°1},
                                            {INSTRUCTION N°2},
                                            {INSTRUCTION N°3}
                                    ),
                'imgs'          =>  array(
                                        {URL DE L'IMAGE N°1 (SE TROUVANT DANS LE DOSSIER 'imgEnabledJS' OU 'img' SELON LA VERSION)} => array( {LARGEUR DE L'IMAGE} , {HAUTEUR DE L'IMAGE} ),
                                        {URL DE L'IMAGE N°2 (SE TROUVANT DANS LE DOSSIER 'imgEnabledJS' OU 'img' SELON LA VERSION)} => array( {LARGEUR DE L'IMAGE} , {HAUTEUR DE L'IMAGE} )
                                    ),
                'linksImgs'     =>  {(BOOL) SI LES IMAGES ONT BESOIN DE LIENS POUR ÊTRE AFFICHÉ PLUS GRANDES}
                
            )
    )




