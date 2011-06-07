<?
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
                <p><? echo JText::_('RESET_PASSWORD_REQUEST_DESCRIPTION'); ?></p>
            </div>

            <form action="<? echo JRoute::_('index.php?option=com_user&task=requestreset'); ?>" method="post" class="josForm form-validate">
                <fieldset>
                    <legend><? echo JText::_('RESET YOUR PASSWORD') ?></legend><br />

                    <div>
                        <label for="email" class="hasTip" title="<? echo JText::_('RESET_PASSWORD_EMAIL_TIP_TITLE'); ?>::<? echo JText::_('RESET_PASSWORD_EMAIL_TIP_TEXT'); ?>"><? echo JText::_('Email Address'); ?>:</label>
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