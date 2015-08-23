<?php defined('_JEXEC') or die;

public function compatWarning()
{
   $compatWarning = '';

   $compatWarning .= $tab . '<!--[if lt IE 9]>' . $lnEnd;
   $compatWarning .= $tab . $tab . '<div class="alert alert-warning alert-dismissible text-center" role="alert">' . $lnEnd;
   $compatWarning .= $tab . $tab . $tab . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $lnEnd;
   $compatWarning .= $tab . $tab . $tab . '<p>You are using an <strong>outdated</strong> browser. Please <a target="_blank" class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>' . $lnEnd;
   $compatWarning .= $tab . $tab . '</div>' . $lnEnd;
   $compatWarning .= $tab . '<![endif]-->' . $lnEnd;

   return $compatWarning;
}

public function htmlHeader()
{
   $htmlHeader = '';

   

   return $htmlHeader;
}

?>
