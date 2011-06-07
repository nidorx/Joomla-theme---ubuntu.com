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
			<? echo JText::_('Reset your Password'); ?>
		</h1>
		
		<p>
			<? echo JText::_('RESET_PASSWORD_COMPLETE_DESCRIPTION'); ?>
		</p>
	
		<form action="<? echo JRoute::_( 'index.php?option=com_user&task=completereset' ); ?>" method="post" class="josForm form-validate">
		<fieldset>
			<legend><? echo JText::_('Reset your Password'); ?></legend>
			
			<div>
				<label for="password1" class="hasTip" title="<? echo JText::_('RESET_PASSWORD_PASSWORD1_TIP_TITLE'); ?>::<? echo JText::_('RESET_PASSWORD_PASSWORD1_TIP_TEXT'); ?>"><? echo JText::_('Password'); ?>:</label>
				<input id="password1" name="password1" type="password" class="required validate-password" />
			</div>
			<div>
				<label for="password2" class="hasTip" title="<? echo JText::_('RESET_PASSWORD_PASSWORD2_TIP_TITLE'); ?>::<? echo JText::_('RESET_PASSWORD_PASSWORD2_TIP_TEXT'); ?>"><? echo JText::_('Verify Password'); ?>:</label>
				<input id="password2" name="password2" type="password" class="required validate-password" />
			</div>
			<div class="readon">
				<button type="submit" class="button"><? echo JText::_('Submit'); ?></button>
			</div>
			
		</fieldset>
		<? echo JHTML::_( 'form.token' ); ?>
		</form>
		
	</div>
</div>