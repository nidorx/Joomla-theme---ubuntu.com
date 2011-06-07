<?
/**
 * @package   Template Overrides - RocketTheme
 * @version   3.0.11 September 5, 2010
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Rockettheme Gantry Template uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<? if ($params->get('item_title')) : ?>
<h4>
	<? if ($params->get('link_titles') && $item->linkOn != '') : ?>
		<a href="<? echo $item->linkOn;?>">
			<? echo $item->title;?>
		</a>
	<? else : ?>
		<? echo $item->title; ?>
	<? endif; ?>
</h4>
<? endif; ?>

<? if (!$params->get('intro_only')) :
	echo $item->afterDisplayTitle;
endif; ?>

<? echo $item->beforeDisplayContent; ?>

<? echo $item->text; ?>

<? if (isset($item->linkOn) && $item->readmore && $params->get('readmore')) : ?>
  <a class="readon" href="<? echo $item->linkOn; ?>"><span><? echo $item->linkText ?></span></a>
<? endif; ?>
