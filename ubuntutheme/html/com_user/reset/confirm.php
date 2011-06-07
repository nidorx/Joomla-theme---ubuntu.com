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

<div class="joomla <? echo $this->params->get('pageclass_sfx')?>">
	<div class="user">

		<h1 class="pagetitle">
			<? echo JText::_('Confirm your Account'); ?>
		</h1>

		<p>
			<? echo JText::_('RESET_PASSWORD_CONFIRM_DESCRIPTION'); ?>
		</p>

		<form action="<? echo JRoute::_( 'index.php?option=com_user&task=confirmreset' ); ?>" method="post" class="josForm form-validate">
		<fieldset>
			<legend><? echo JText::_('Confirm your Account'); ?></legend>
			
			<div>
				<label for="username" class="hasTip" title="<? echo JText::_('RESET_PASSWORD_USERNAME_TIP_TITLE'); ?>::<? echo JText::_('RESET_PASSWORD_USERNAME_TIP_TEXT'); ?>"><? echo JText::_('User Name'); ?>:</label>
				<input id="username" name="username" type="text" class="required" size="36" />
			</div>
			<div>
				<label for="token" class="hasTip" title="<? echo JText::_('RESET_PASSWORD_TOKEN_TIP_TITLE'); ?>::<? echo JText::_('RESET_PASSWORD_TOKEN_TIP_TEXT'); ?>"><? echo JText::_('Token'); ?>:</label>
				<input id="token" name="token" type="text" class="required" size="36" />
			</div>
			<div class="readon">
				<button type="submit" class="button"><? echo JText::_('Submit'); ?></button>
			</div>
			
		</fieldset>
		<? echo JHTML::_( 'form.token' ); ?>
		</form>
	</div>
</div>