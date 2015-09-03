<?php defined( '_JEXEC' ) or die;

$detect = new Mobile_Detect;
$mobile = ($detect->isMobile() && !$detect->isTablet());

/* VARIABLES */
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$sitename = $app->get('sitename');
$params = $app->getParams();
$siteLang = $this->language;
$siteLangDir = $this->direction;
$pagetype = '';
$bodyclass = '';

// class variables
$menu = $app->getMenu();
$activeMenuItem = $menu->getActive();
$defaultMenuItem = $menu->getDefault();
if ($activeMenuItem == $defaultMenuItem) {
   $pagetype = 'home';
}
else {
   $pagetype = 'internal';
}
$pageclass = $params->get('pageclass_sfx');
if ($pageclass != null) {
   $bodyclass = $pagetype . ' ' . $pageclass;
}
else {
   $bodyclass = $pagetype;
}

// Meta Tags
$doc->setHtml5(true);
$doc->setMetaData('x-ua-compatible', 'ie=edge');
$doc->setMetaData('viewport', 'width=device-width, initial-scale=1');
$doc->setMetaData('cleartype', 'on');

// CSS
$doc->addStyleSheet($template.'/css/main.css');

// old IE
jimport('joomla.environment.browser');
$browser = JBrowser::getInstance();
$browserType = $browser->getBrowser();
$browserVersion = $browser->getMajor();
$oldie = $detect->version('IE', self::VERSION_TYPE_FLOAT) <= 9.0 && !$detect->isMobile();

if(($browserType == 'msie') && ($browserVersion < 9)) {
   $doc->addStyleSheet($template.'/css/ie.css');
   $doc->addScript('https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js');
   $doc->addScript('https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js');
}
?>
