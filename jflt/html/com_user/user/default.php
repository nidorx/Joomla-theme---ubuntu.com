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

<div class="joomla <? echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<div class="user">
		<? if ( $this->params->get( 'show_page_title' ) ) : ?>
		<h1 class="pagetitle">
			<? echo $this->escape($this->params->get('page_title')); ?>
		</h1>
		<? endif; ?>
		<p>
			<? echo nl2br($this->escape($this->params->get('welcome_desc', JText::_( 'WELCOME_DESC' )))); ?>
		</p>
	</div>
</div>