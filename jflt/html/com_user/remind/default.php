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
    <? if ($this->params->get('show_page_title')) : ?>
        <h1 class="pagetitle">
            <? echo $this->escape($this->params->get('page_title')); ?>
        </h1>
    <? endif; ?>

    <div class="user content-block">

        <div class="headline">
            <h1 class="title">
                <? echo JText::_('Reminder Username'); ?>
            </h1>

            <div class="clear"></div>
        </div>

        <div class="content">
            <div class="message">
                <p><? echo JText::_('REMIND_USERNAME_DESCRIPTION'); ?></p>
            </div>
            <form action="<? echo JRoute::_('index.php?option=com_user&task=remindusername'); ?>" method="post" class="josForm form-validate">
                <fieldset>
                    <div>
                        <label for="email" class="hasTip" title="<? echo JText::_('REMIND_USERNAME_EMAIL_TIP_TITLE'); ?>::<? echo JText::_('REMIND_USERNAME_EMAIL_TIP_TEXT'); ?>"><? echo JText::_('Email Address'); ?>:</label>
                        <input id="email" name="email" type="text" class="required validate-email" />
                    </div><br />
                    <div class="readon">
                        <button type="submit" class="button"><? echo JText::_('Submit'); ?></button>
                    </div>
                </fieldset>
                <? echo JHTML::_('form.token'); ?>
            </form>
        </div>

    </div>
</div>