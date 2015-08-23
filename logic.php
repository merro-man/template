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

?>
