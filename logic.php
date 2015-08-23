<?php defined( '_JEXEC' ) or die;

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$menu = $app->getMenu();
$active = $app->getMenu()->getActive();
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx');
$templateparams	= $app->getTemplate(true)->params;

$this->language  = $doc->language;
$this->direction = $doc->direction;

// Detecting Active Variables
$layout   = $app->input->getCmd('layout', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

// Meta Tags
$doc->setHtml5(true);
$doc->setMetaData('x-ua-compatible', 'ie=edge');
$doc->setMetaData('viewport', 'width=device-width, initial-scale=1');
$doc->setMetaData('cleartype', 'on');

// CSS
$doc->addStyleSheet($template.'/css/main.css');

?>
