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
<script language="javascript" type="text/javascript">
    function submitbutton(pressbutton)
    {
        var form = document.adminForm;
        if (pressbutton == 'cancel') {
            submitform( pressbutton );
            return;
        }

        // do field validation
        if (document.getElementById('jformtitle').value == ""){
            alert( "<? echo JText::_('Weblink item must have a title', true); ?>" );
        } else if (document.getElementById('jformcatid').value < 1) {
            alert( "<? echo JText::_('You must select a category.', true); ?>" );
        } else if (document.getElementById('jformurl').value == ""){
            alert( "<? echo JText::_('You must have a url.', true); ?>" );
        } else {
            submitform( pressbutton );
        }
    }
</script>

<div class="joomla <? echo $this->escape($this->params->get('pageclass_sfx')); ?>">

    <? if ($this->params->get('show_page_title', 1)) : ?>
        <h1 class="pagetitle">
            <? echo $this->escape($this->params->get('page_title')); ?>
        </h1>
    <? endif; ?>

    <div class="weblinks">
        <div class="content">

            <form action="<? echo $this->action ?>" method="post" name="adminForm" id="adminForm">
                <fieldset>
                    <legend><? echo JText::_('Submit A Web Link'); ?></legend>

                    <div>
                        <label class="label-left" for="jformtitle">
                            <? echo JText::_('Name'); ?>:
                        </label>
                        <input class="inputbox" type="text" id="jformtitle" name="jform[title]" maxlength="250" value="<? echo $this->escape($this->weblink->title); ?>" />
                    </div>
                    <div>
                        <label class="label-left" for="jformcatid">
                            <? echo JText::_('Category'); ?>:
                        </label>
                        <? echo $this->lists['catid']; ?>
                    </div>
                    <div>
                        <label class="label-left" for="jformurl">
                            <? echo JText::_('URL'); ?>:
                        </label>
                        <input class="inputbox" type="text" id="jformurl" name="jform[url]" value="<? echo $this->escape($this->weblink->url); ?>" maxlength="250" />
                    </div>
                    <div>
                        <label class="label-left" for="jformpublished">
                            <? echo JText::_('Published'); ?>:
                        </label>
                        <? echo $this->lists['published']; ?>
                    </div>
                    <div>
                        <label class="label-left" for="jformdescription">
                            <? echo JText::_('Description'); ?>:
                        </label>
                        <textarea class="inputbox" cols="30" rows="6" id="jformdescription" name="jform[description]"><? echo $this->escape($this->weblink->description); ?></textarea>
                    </div>
                    <div>
                        <label class="label-left" for="jformordering">
                            <? echo JText::_('Ordering'); ?>:
                        </label>
                        <? echo $this->lists['ordering']; ?>
                    </div>

                    <div class="save">
                        <button type="button" onclick="submitbutton('save')">
                            <? echo JText::_('Save') ?>
                        </button>
                        <button type="button" onclick="submitbutton('cancel')">
                            <? echo JText::_('Cancel') ?>
                        </button>
                    </div>

                </fieldset>

                <input type="hidden" name="jform[id]" value="<? echo $this->weblink->id; ?>" />
                <input type="hidden" name="jform[ordering]" value="<? echo $this->weblink->ordering; ?>" />
                <input type="hidden" name="jform[approved]" value="<? echo $this->weblink->approved; ?>" />
                <input type="hidden" name="option" value="com_weblinks" />
                <input type="hidden" name="controller" value="weblink" />
                <input type="hidden" name="task" value="" />
                <? echo JHTML::_('form.token'); ?>
            </form>
        </div>
    </div>
</div>