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

<? if(JPluginHelper::isEnabled('authentication', 'openid')) :
		$lang = &JFactory::getLanguage();
		$lang->load( 'plg_authentication_openid', JPATH_ADMINISTRATOR );
		$langScript = 	'var JLanguage = {};'.
						' JLanguage.WHAT_IS_OPENID = \''.JText::_( 'WHAT_IS_OPENID' ).'\';'.
						' JLanguage.LOGIN_WITH_OPENID = \''.JText::_( 'LOGIN_WITH_OPENID' ).'\';'.
						' JLanguage.NORMAL_LOGIN = \''.JText::_( 'NORMAL_LOGIN' ).'\';'.
						' var comlogin = 1;';
		$document = &JFactory::getDocument();
		$document->addScriptDeclaration( $langScript );
		JHTML::_('script', 'openid.js');
endif; ?>

<div class="joomla <? echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	
	<div class="user">

		<? if ( $this->params->get( 'show_login_title' ) ) : ?>
		<h1>
			<? echo $this->params->get( 'header_login' ); ?>
		</h1>
		<? endif; ?>

		<? if ($this->params->get('description_login') || $this->image) : ?>
		<div class="description">
			<? echo $this->image; ?>
			<? if ( $this->params->get( 'description_login' ) ) : ?>
				<? echo $this->params->get( 'description_login_text' ); ?>
			<? endif; ?>
		</div>
		<? endif; ?>
		
		<form action="<? echo JRoute::_( 'index.php', true, $this->params->get('usesecure')); ?>" method="post" name="com-login" id="com-form-login">
		<fieldset>
			<legend><? echo JText::_('LOGIN') ?></legend>
			<br />
			<div>
				<label class="label-left" for="username"><? echo JText::_('Username') ?></label>
				<input name="username" id="username" type="text" class="inputbox" alt="username" size="18" />
			</div>
			<div>
				<label class="label-left" for="passwd"><? echo JText::_('Password') ?></label>
				<input type="password" id="passwd" name="passwd" class="inputbox" size="18" alt="password" />
			</div>
			<? if(JPluginHelper::isEnabled('system', 'remember')) : ?>
			<div>
				<input type="checkbox" id="remember" name="remember" class="inputbox" value="yes" alt="Remember Me" />
				<label for="remember"><? echo JText::_('Remember me') ?></label>
			</div>
			<? endif; ?>
				<div class="readon"><input type="submit" name="Submit" class="button" value="<? echo JText::_('LOGIN') ?>" /></div>
			
		</fieldset>
	
		<ul>
			<li>
				<a href="<? echo JRoute::_( 'index.php?option=com_user&view=reset' ); ?>"><? echo JText::_('FORGOT_YOUR_PASSWORD'); ?></a>
			</li>
			<li>
				<a href="<? echo JRoute::_( 'index.php?option=com_user&view=remind' ); ?>"><? echo JText::_('FORGOT_YOUR_USERNAME'); ?></a>
			</li>
			<? $usersConfig = &JComponentHelper::getParams( 'com_users' ); ?>
			<? if ($usersConfig->get('allowUserRegistration')) : ?>
			<li>
				<a href="<? echo JRoute::_( 'index.php?option=com_user&task=register' ); ?>"><? echo JText::_('REGISTER'); ?></a>
			</li>
			<? endif; ?>
		</ul>

		<input type="hidden" name="option" value="com_user" />
		<input type="hidden" name="task" value="login" />
		<input type="hidden" name="return" value="<? echo $this->return; ?>" />
		<? echo JHTML::_( 'form.token' ); ?>
		</form>

	</div>
</div>