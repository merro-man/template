<?php defined('_JEXEC') or die;
$scripts = '';

$scripts .= $tab . '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>' . $lnEnd;
$scripts .= $tab . '<script>window.jQuery || document.write(\'<script src="' . $template; . '/js/jquery-1.11.3.min.js"><\/script>\')</script>' . $lnEnd;
$scripts .= $tab . '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>' . $lnEnd;

// Generate script declarations
foreach ($doc->_script as $type => $content)
{
	$scripts .= $tab . '<script type="' . $type . '">' . $lnEnd;
	// This is for full XHTML support.
	if ($doc->_mime != 'text/html')
	{
		$scripts .= $tab . $tab . '//<![CDATA[' . $lnEnd;
	}
	$scripts .= $content . $lnEnd;
	// See above note
	if ($doc->_mime != 'text/html')
	{
		$scripts .= $tab . $tab . '//]]>' . $lnEnd;
	}
	$scripts .= $tab . '</script>' . $lnEnd;
}
// Generate script language declarations.
if (count(JText::script()))
{
	$scripts .= $tab . '<script type="text/javascript">' . $lnEnd;
	if ($doc->_mime != 'text/html')
	{
		$scripts .= $tab . $tab . '//<![CDATA[' . $lnEnd;
	}
	$scripts .= $tab . $tab . '(function() {' . $lnEnd;
	$scripts .= $tab . $tab . $tab . 'Joomla.JText.load(' . json_encode(JText::script()) . ');' . $lnEnd;
	$scripts .= $tab . $tab . '})();' . $lnEnd;
	if ($doc->_mime != 'text/html')
	{
		$scripts .= $tab . $tab . '//]]>' . $lnEnd;
	}
	$scripts .= $tab . '</script>' . $lnEnd;
}
?>
