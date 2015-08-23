<?php defined('_JEXEC') or die;
$template = 'templates/'.$this->template;

/* detect mobile devices - http://mobiledetect.net/ */
require_once 'Mobile_Detect.php';

include_once $template.'/logic.php';
include_once $template.'/head.php';
?>
<!doctype html>
<html lang="<?php echo $siteLang; ?>" class="no-js">
<?php echo $htmlHead; ?>
<?php flush(); ?>
	<body class="<?php echo $bodyclass; ?>" role="document">

		<!--[if lt IE 9]>
		<div class="alert alert-warning alert-dismissible text-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<p>You are using an <strong>outdated</strong> browser. Please <a target="_blank" class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		</div>
		<![endif]-->

		<a id="skippy" class="sr-only sr-only-focusable" href="#content">
			<div class="container">
				<span class="skiplink-text">Skip to main content</span>
			</div>
		</a>

		<header class="navbar navbar-static-top" id="top" role="banner">
		  <div class="container">
		    <div class="navbar-header">
		      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#inti-navbar" aria-controls="inti-navbar" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a href="/" class="navbar-brand"><?php echo $sitename ?></a>
		    </div>
		    <nav id="inti-navbar" class="collapse navbar-collapse" role="navigation">
		      <jdoc:include type="modules" name="menu" />
		    </nav>
		  </div>
		</header>

		<?php echo $scripts; ?>
	</body>
</html>
