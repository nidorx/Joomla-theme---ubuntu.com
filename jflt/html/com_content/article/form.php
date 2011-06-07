<?
/**
 * @package   Template Overrides - RocketTheme
 * @version   3.0.11 September 5, 2010
 * @author    YOOtheme http://www.yootheme.com & RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2009 YOOtheme GmbH
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * These template overrides are based on the fantastic GNU/GPLv2 overrides created by YOOtheme (http://www.yootheme.com)
 *
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

$config = & JFactory::getConfig();
$publish_up = & JFactory::getDate($this->article->publish_up);
$publish_up->setOffset($config->getValue('config.offset'));
$publish_up = $publish_up->toFormat();

if (!isset($this->article->publish_down) || $this->article->publish_down == 'Never')
{
    $publish_down = JText::_('Never');
} else
{
    $publish_down = & JFactory::getDate($this->article->publish_down);
    $publish_down->setOffset($config->getValue('config.offset'));
    $publish_down = $publish_down->toFormat();
}
?>

<script language="javascript" type="text/javascript">
    <!--
    function setgood() {
        // TODO: Put setGood back
        return true;
    }

    var sectioncategories = new Array;
<?
$i = 0;
foreach ($this->lists['sectioncategories'] as $k => $items)
{
    foreach ($items as $v)
    {
        echo "sectioncategories[" . $i++ . "] = new Array( '$k','" . addslashes($v->id) . "','" . addslashes($v->title) . "' );\n\t\t";
    }
}
?>


    function submitbutton(pressbutton) {
        var form = document.adminForm;
        if (pressbutton == 'cancel') {
            submitform( pressbutton );
            return;
        }
        try {
            form.onsubmit();
        } catch(e) {
            alert(e);
        }

        // do field validation
        var text = <? echo $this->editor->getContent('text'); ?>
        if (form.title.value == '') {
            return alert ( "<? echo JText::_('Article must have a title', true); ?>" );
        } else if (text == '') {
            return alert ( "<? echo JText::_('Article must have some text', true); ?>");
        } else if (parseInt('<? echo $this->article->sectionid; ?>')) {
            // for articles
            if (form.catid && getSelectedValue('adminForm','catid') < 1) {
                return alert ( "<? echo JText::_('Please select a category', true); ?>" );
            }
        }
<? echo $this->editor->save('text'); ?>
        submitform(pressbutton);
    }
    //-->
</script>

<div class="joomla <? echo $this->escape($this->params->get('pageclass_sfx')); ?>">

    <? if ($this->params->get('show_page_title', 1)) : ?>
        <h1 class="pagetitle">
            <? echo $this->escape($this->params->get('page_title')); ?>
        </h1>
    <? endif; ?>

    <div class="edit-article">



        <form action="<? echo $this->action ?>" method="post" name="adminForm" onSubmit="setgood();">
            <fieldset>
                <legend><? echo JText::_('Editor'); ?></legend><br />

                <div class="save">
                    <div class="readon"><button type="button" class="button" onclick="submitbutton('save')">
                            <? echo JText::_('Save') ?>
                        </button></div>
                    <div class="readon"><button type="button" class="button" onclick="submitbutton('cancel')">
                            <? echo JText::_('Cancel') ?>
                        </button></div>
                </div>

                <div>
                    <label for="title">
                        <? echo JText::_('Title'); ?>:
                    </label>
                    <input class="inputbox" type="text" id="title" name="title" size="50" maxlength="100" value="<? echo $this->escape($this->article->title); ?>" />
                    <input class="inputbox" type="hidden" id="alias" name="alias" value="<? echo $this->escape($this->article->alias); ?>" />
                </div>

                <?
                echo $this->editor->display('text', $this->article->text, '100%', '400', '70', '15');
                ?>

            </fieldset>

            <fieldset>
                <legend><? echo JText::_('Publishing'); ?></legend><br />

                <div>
                    <label class="label-left" for="sectionid">
                        <? echo JText::_('Section'); ?>:
                    </label>
                    <? echo $this->lists['sectionid']; ?>
                </div>

                <div>
                    <label class="label-left" for="catid">
                        <? echo JText::_('Category'); ?>:
                    </label>
                    <? echo $this->lists['catid']; ?>
                </div>

                <? if ($this->user->authorize('com_content', 'publish', 'content', 'all')) : ?>
                    <div>
                        <label class="label-left" for="state">
                            <? echo JText::_('Published'); ?>:
                        </label>
                        <? echo $this->lists['state']; ?>
                    </div>
                <? endif; ?>

                <div>
                    <label class="label-left" for="frontpage">
                        <? echo JText::_('Show on Front Page'); ?>:
                    </label>
                    <? echo $this->lists['frontpage']; ?>
                </div>

                <div>
                    <label class="label-left" for="created_by_alias">
                        <? echo JText::_('Author Alias'); ?>:
                    </label>
                    <input type="text" id="created_by_alias" name="created_by_alias" maxlength="100" value="<? echo $this->escape($this->article->created_by_alias); ?>" class="inputbox" />
                </div>

                <div>
                    <label class="label-left" for="publish_up">
                        <? echo JText::_('Start Publishing'); ?>:
                    </label>
                    <? echo JHTML::_('calendar', $publish_up, 'publish_up', 'publish_up', '%Y-%m-%d %H:%M:%S', array('class' => 'inputbox', 'size' => '25', 'maxlength' => '19')); ?>
                </div>

                <div>
                    <label class="label-left" for="publish_down">
                        <? echo JText::_('Finish Publishing'); ?>:
                    </label>
                    <? echo JHTML::_('calendar', $publish_down, 'publish_down', 'publish_down', '%Y-%m-%d %H:%M:%S', array('class' => 'inputbox', 'size' => '25', 'maxlength' => '19')); ?>
                </div>

                <div>
                    <label class="label-left" for="access">
                        <? echo JText::_('Access Level'); ?>:
                    </label>
                    <? echo $this->lists['access']; ?>
                </div>

                <div>
                    <label class="label-left" for="ordering">
                        <? echo JText::_('Ordering'); ?>:
                    </label>
                    <? echo $this->lists['ordering']; ?>
                </div>

            </fieldset>

            <fieldset>
                <legend><? echo JText::_('Metadata'); ?></legend><br />

                <div>
                    <label class="label-left" for="metadesc">
                        <? echo JText::_('Description'); ?>:
                    </label>
                    <textarea rows="5" cols="50" style="width:500px; height:120px" class="inputbox" id="metadesc" name="metadesc"><? echo str_replace('&', '&amp;', $this->article->metadesc); ?></textarea>
                </div>

                <div>
                    <label class="label-left" for="metakey">
                        <? echo JText::_('Keywords'); ?>:
                    </label>
                    <textarea rows="5" cols="50" style="width:500px; height:50px" class="inputbox" id="metakey" name="metakey"><? echo str_replace('&', '&amp;', $this->article->metakey); ?></textarea>
                </div>

            </fieldset>

            <input type="hidden" name="option" value="com_content" />
            <input type="hidden" name="id" value="<? echo $this->article->id; ?>" />
            <input type="hidden" name="version" value="<? echo $this->article->version; ?>" />
            <input type="hidden" name="created_by" value="<? echo $this->article->created_by; ?>" />
            <input type="hidden" name="referer" value="<? echo str_replace(array('"', '<', '>', "'"), '', @$_SERVER['HTTP_REFERER']); ?>" />
            <? echo JHTML::_('form.token'); ?>
            <input type="hidden" name="task" value="" />
        </form>

        <? echo JHTML::_('behavior.keepalive'); ?>

    </div>
</div>