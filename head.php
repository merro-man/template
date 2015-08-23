<?php defined( '_JEXEC' ) or die;

// Get line endings
$lnEnd = $doc->_getLineEnd();
$tab = $doc->_getTab();
$tagEnd = ' />';
$html5TagEnd = '>';
$htmlHead = '';

$htmlHead .= '<head>' . $lnEnd;
$htmlHead .= $tab . '<meta charset="' . $doc->getCharset() . '">' . $lnEnd;

// Generate META tags (needs to happen as early as possible in the head)
foreach ($doc->_metaTags as $type => $tag)
{
  foreach ($tag as $name => $content)
  {
    if ($type == 'http-equiv' && !($doc->isHtml5() && $name == 'content-type') && $content != "text/html; charset=utf-8")
    {
      $htmlHead .= $tab . '<meta http-equiv="' . $name . '" content="' . htmlspecialchars($content) . '">' . $lnEnd;
    }
    elseif ($type == 'standard' && !empty($content))
    {
      $htmlHead .= $tab . '<meta name="' . $name . '" content="' . htmlspecialchars($content) . '">' . $lnEnd;
    }
  }
}

// Generate base tag - use with caution
/* $base = $doc->getBase();

if (!empty($base))
{
  $htmlHead .= $tab . '<base href="' . $base . '" />' . $lnEnd;
}
*/

// Don't add empty descriptions
$documentDescription = $doc->getDescription();

if ($documentDescription)
{
  $htmlHead .= $tab . '<meta name="description" content="' . htmlspecialchars($documentDescription) . '">' . $lnEnd;
}

$htmlHead .= $tab . '<title>' . htmlspecialchars($doc->getTitle(), ENT_COMPAT, 'UTF-8') . '</title>' . $lnEnd;

$icon = $template . '/favicon.ico';
if (file_exists( $icon )) {
  $htmlHead .= $tab . '<link rel="icon" href="' . $icon . '">' . $lnEnd;
}

// Generate link declarations
foreach ($doc->_links as $link => $linkAtrr)
{
  $htmlHead .= $tab . '<link href="' . $link . '" ' . $linkAtrr['relType'] . '="' . $linkAtrr['relation'] . '"';

  if ($temp = JArrayHelper::toString($linkAtrr['attribs']))
  {
    $htmlHead .= ' ' . $temp;
  }

  $htmlHead .= '>' . $lnEnd;
}

// Generate stylesheet declarations
foreach ($doc->_style as $type => $content)
{
  $htmlHead .= $tab . '<style type="' . $type . '">' . $lnEnd;

  // This is for full XHTML support.
  if ($doc->_mime != 'text/html')
  {
    $htmlHead .= $tab . $tab . '/*<![CDATA[*/' . $lnEnd;
  }

  $htmlHead .= $content . $lnEnd;

  // See above note
  if ($doc->_mime != 'text/html')
  {
    $htmlHead .= $tab . $tab . '/*]]>*/' . $lnEnd;
  }

  $htmlHead .= $tab . '</style>' . $lnEnd;
}

// Generate stylesheet links
foreach ($doc->_styleSheets as $strSrc => $strAttr)
{
  $htmlHead .= $tab . '<link rel="stylesheet" href="' . $strSrc . '"';

  if (!is_null($strAttr['media']))
  {
    $htmlHead .= ' media="' . $strAttr['media'] . '"';
  }

  $htmlHead .= '>' . $lnEnd;
}

// Output the custom tags - array_unique makes sure that we don't output the same tags twice
foreach (array_unique($doc->_custom) as $custom)
{
  $htmlHead .= $tab . $custom . $lnEnd;
}

// the only js in the HEAD should be Modernizr. Less js files in HEAD = faster page render.
$htmlHead .= $tab . '<script src="' . $template .'/js/modernizr.js' . '"></script>' . $lnEnd;

$htmlHead .= '</head>' . $lnEnd;
?>
