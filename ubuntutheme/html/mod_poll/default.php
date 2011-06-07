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
defined('_JEXEC') or die('Restricted access');
?>

<h4 class="polltitle">
	<? echo $poll->title; ?>
</h4>
<form action="index.php" method="post" name="form2" class="poll">
	<fieldset>
		<? for ($i = 0, $n = count($options); $i < $n; $i ++) : ?>
		<div class="pollrow">
			<input type="radio" name="voteid" id="voteid<? echo $options[$i]->id;?>" value="<? echo $options[$i]->id;?>" alt="<? echo $options[$i]->id;?>" />
			<label for="voteid<? echo $options[$i]->id;?>">
				<? echo $options[$i]->text; ?>
			</label>
		</div>
		<? endfor; ?>
	</fieldset>
	<div class="pollbuttons">
		<div class="readon">
			<input type="submit" name="task_button" class="button" value="<? echo JText::_('Vote'); ?>" />
		
			<input type="button" name="option" class="button" value="<? echo JText::_('Results'); ?>" onclick="document.location.href='<? echo JRoute::_("index.php?option=com_poll&id=$poll->slug".$itemid); ?>'" />
		</div>
	</div>

	<input type="hidden" name="option" value="com_poll" />
	<input type="hidden" name="task" value="vote" />
	<input type="hidden" name="id" value="<? echo $poll->id;?>" />
	<? echo JHTML::_( 'form.token' ); ?>
</form>
