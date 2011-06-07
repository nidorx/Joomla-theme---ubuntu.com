<?
/**
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
if (($this->error->code) == '404') {
 header("Location: http://www.alexrodin.com");
exit;
} else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<? echo $this->language; ?>" lang="<? echo $this->language; ?>" dir="<? echo $this->direction; ?>">
<head>
	<title><? echo $this->error->code ?> - <? echo $this->title; ?></title>
	<link rel="stylesheet" href="<? echo $this->baseurl; ?>/templates/system/css/error.css" type="text/css" />
	<? if($this->direction == 'rtl') : ?>
	<link rel="stylesheet" href="<? echo $this->baseurl ?>/templates/system/css/error_rtl.css" type="text/css" />
	<? endif; ?>
</head>
<body>
	<div align="center">
		<div id="outline">
		<div id="errorboxoutline">
			<div id="errorboxheader"><? echo $this->error->code ?> - <? echo $this->error->message ?></div>
			<div id="errorboxbody">
			<p><strong><? echo JText::_('You may not be able to visit this page because of:'); ?></strong></p>
				<ol>
					<li><? echo JText::_('An out-of-date bookmark/favourite'); ?></li>
					<li><? echo JText::_('A search engine that has an out-of-date listing for this site'); ?></li>
					<li><? echo JText::_('A mis-typed address'); ?></li>
					<li><? echo JText::_('You have no access to this page'); ?></li>
					<li><? echo JText::_('The requested resource was not found'); ?></li>
					<li><? echo JText::_('An error has occurred while processing your request.'); ?></li>
				</ol>
			<p><strong><? echo JText::_('Please try one of the following pages:'); ?></strong></p>
			<p>
				<ul>
					<li><a href="<? echo $this->baseurl; ?>/index.php" title="<? echo JText::_('Go to the home page'); ?>"><? echo JText::_('Home Page'); ?></a></li>
				</ul>
			</p>
			<p><? echo JText::_('If difficulties persist, please contact the system administrator of this site.'); ?></p>
			<div id="techinfo">
			<p><? echo $this->error->message; ?></p>
			<p>
				<? if($this->debug) :
					echo $this->renderBacktrace();
				endif; ?>
			</p>
			</div>
			</div>
		</div>
		</div>
	</div>
</body>
</html>

<? } ?>
