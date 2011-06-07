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

<script type="text/javascript">
<!--
	Window.onDomReady(function(){
		document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); }	);
	});
// -->
</script>

<div class="joomla <? echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<div class="user">
	
		<? if ( $this->params->get( 'show_page_title' ) ) : ?>
		<h1 class="pagetitle">
			<? echo $this->escape($this->params->get('page_title')); ?>
		</h1>
		<? endif; ?>

		<form action="<? echo JRoute::_( 'index.php' ); ?>" method="post" name="userform" autocomplete="off" class="form-validate">
		<fieldset>
			<legend><? echo JText::_('EDIT YOUR DETAILS'); ?></legend><br />

			<div>
				<span class="label-left">
					<? echo JText::_( 'User Name' ); ?>:
				</span>
				<? echo $this->user->get('username');?>
			</div>
			<div>
				<label class="label-left" for="name">
					<? echo JText::_( 'Your Name' ); ?>:
				</label>
				<input class="inputbox required" type="text" id="name" name="name" value="<? echo $this->escape($this->user->get('name'));?>" />
			</div>
			<div>
				<label class="label-left" for="email">
					<? echo JText::_( 'email' ); ?>:
				</label>
				<input class="inputbox required validate-email" type="text" id="email" name="email" value="<? echo $this->escape($this->user->get('email'));?>" />
			</div>
			
			<? if($this->user->get('password')) : ?>
			<div>
				<label class="label-left" for="password">
					<? echo JText::_( 'Password' ); ?>:
				</label>
				<input class="inputbox validate-password" type="password" id="password" name="password" value="" />
			</div>
			<div>
				<label class="label-left" for="password2">
					<? echo JText::_( 'Verify Password' ); ?>:
				</label>
				<input class="inputbox validate-passverify" type="password" id="password2" name="password2" />
			</div>
			<? endif; ?>
			<br />
			<? if(isset($this->params)) :  echo $this->params->render( 'params' ); endif; ?>
			<br />
			<div class="readon">
				<button type="submit" class="button" onclick="submitbutton( this.form );return false;"><? echo JText::_('Save'); ?></button>
			</div>
			
		</fieldset>
		<input type="hidden" name="username" value="<? echo $this->user->get('username');?>" />
		<input type="hidden" name="id" value="<? echo $this->user->get('id');?>" />
		<input type="hidden" name="gid" value="<? echo $this->user->get('gid');?>" />
		<input type="hidden" name="option" value="com_user" />
		<input type="hidden" name="task" value="save" />
		<? echo JHTML::_( 'form.token' ); ?>
		</form>

	</div>
</div>