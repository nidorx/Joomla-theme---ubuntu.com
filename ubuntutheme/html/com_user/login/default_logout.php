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

<? /** @todo Should this be routed */ ?>

<div class="joomla <? echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	
	<div class="user">
	
		<? if ( $this->params->get( 'show_logout_title' ) ) : ?>
		<h1>
			<? echo $this->escape($this->params->get( 'header_logout' )); ?>
		</h1>
		<? endif; ?>

		<? if ($this->params->get('description_logout') || $this->image) : ?>
		<div class="description">
			<? echo $this->image; ?>
			<? if ($this->params->get('description_logout')) : ?>
				<? echo $this->escape($this->params->get('description_logout_text')); ?>
			<? endif; ?>
		</div>
		<? endif; ?>

		<form action="<? echo JRoute::_( 'index.php' ); ?>" method="post" name="login" id="login">
		<div class="readon">
				<input type="submit" name="Submit" class="button" value="<? echo JText::_( 'Logout' ); ?>" />
			</div>

		<input type="hidden" name="option" value="com_user" />
		<input type="hidden" name="task" value="logout" />
		<input type="hidden" name="return" value="<? echo $this->return; ?>" />
		</form>
		
	</div>
</div>