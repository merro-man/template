<?php defined('_JEXEC') or die;
$template = 'templates/'.$this->template;

include_once $template.'/logic.php';
include_once $template.'/head.php';

/* detect mobile devices - http://mobiledetect.net/ */
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
$mobile = ($detect->isMobile() && !$detect->isTablet());

?><!doctype html>
<html lang="<?php echo $this->language; ?>" class="no-js">
<?php echo $htmlHead; ?>
<?php flush(); ?>
	<body class="contentpane modal">
		<jdoc:include type="message" />
		<jdoc:include type="component" />
	</body>
</html>
