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
include_once(dirname(__FILE__) . DS . '..' . DS . 'icon.php');

$canEdit = ($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own'));
?>

<div class="article <? if ($this->item->state == 0)
    echo 'unpublished' ?>">
    <div class="article-bg">

        <? /** Begin Article Title * */ if ($canEdit || $this->item->params->get('show_title')) : ?>
            <div class="headline">
                <? if ($this->item->params->get('show_title')) : ?>
                    <h1 class="article-title">
                        <? if ($this->item->params->get('link_titles') && $this->item->readmore_link != '') : ?>
                            <a href="<? echo $this->item->readmore_link; ?>"><? echo $this->escape($this->item->title); ?></a>
                        <? else : ?>
                            <? echo $this->escape($this->item->title); ?>
                        <? endif; ?>
                    </h1>
                <? endif; ?>

                <? if ($canEdit) : ?>
                    <span class="icon edit">
                        <? echo JHTML::_('icon.edit', $this->item, $this->item->params, $this->access); ?>
                    </span>
                <? endif; ?>
            </div>
        <? /** End Article Title * */ endif; ?>
        <div class="article-content">
            <?
            if (!$this->item->params->get('show_intro')) :
                echo $this->item->event->afterDisplayTitle;
            endif;
            ?>

<? echo $this->item->event->beforeDisplayContent; ?>
<? if ((intval($this->item->modified) != 0 && $this->item->params->get('show_modify_date')) || ($this->item->params->get('show_author') && ($this->item->author != "")) || ($this->item->params->get('show_create_date')) || ($this->item->params->get('show_pdf_icon') || $this->item->params->get('show_print_icon') || $this->item->params->get('show_email_icon'))) : ?>
                <div class="articleinfo">

                    <div class="article-info">
                        <span class="info">

                                <? /** Begin Created Date * */ if ($this->item->params->get('show_create_date')) : ?>
                                <span class="date-posted">
                                <? echo JHTML::_('date', $this->item->created, JText::_('DATE_FORMAT_LC2')); ?>
                                </span>
    <? /** End Created Date * */ endif; ?>



                                <? /** Begin Author * */ if (($this->item->params->get('show_author')) && ($this->item->author != "")) : ?>
                                <span class="author"> ,
                                <? JText::printf('Written by', ($this->escape($this->item->created_by_alias) ? $this->escape($this->item->created_by_alias) : $this->escape($this->item->author))); ?>
                                </span>
    <? /** End Author * */ endif; ?>




                                <? /** Begin Article Icons * */ if ($this->item->params->get('show_pdf_icon') || $this->item->params->get('show_print_icon') || $this->item->params->get('show_email_icon')) : ?>
                                <div class="article-icons">
                                    <?
                                    if ($this->item->params->get('show_pdf_icon')) :
                                        echo RokIcon::pdf($this->item, $this->item->params, $this->access);
                                    endif;
                                    if ($this->item->params->get('show_print_icon')) :
                                        echo RokIcon::print_popup($this->item, $this->item->params, $this->access);
                                    endif;
                                    if ($this->item->params->get('show_email_icon')) :
                                        echo RokIcon::email($this->item, $this->item->params, $this->access);
                                    endif;
                                    ?>
                                </div>
                            <? /** End Article Icons * */ endif; ?>



                            <? /** Begin Modified Date * */ if (intval($this->item->modified) != 0 && $this->item->params->get('show_modify_date')) : ?>
                                <span class="date-modified">
        <? echo JText::sprintf('LAST_UPDATED2', JHTML::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
                                </span>
                            <? /** End Modified Date * */ endif; ?>



                            <? /** Begin Url * */ if ($this->item->params->get('show_url') && $this->item->urls) : ?>
                                <span class="url">
                                    <a href="http://<? echo $this->escape($this->item->urls); ?>" target="_blank"><? echo $this->escape($this->item->urls); ?></a>
                                </span>
    <? /** End Url * */ endif; ?>

                        </span>
                    </div>




                </div>
            <? endif; ?>
            <? if (isset($this->item->toc)) : ?>
                <? echo $this->item->toc; ?>
            <? endif; ?>

<? echo $this->item->text; ?>

                            <? /** Begin Read More * */ if ($this->item->params->get('show_readmore') && $this->item->readmore) : ?>
                <p class="readon-surround">

                    <a href="<? echo $this->item->readmore_link; ?>" class="readon"><span class="button"><span>
                                <?
                                if ($this->item->readmore_register) :
                                    echo JText::_('Register to read more...');
                                elseif ($readmore = $this->item->params->get('readmore')) :
                                    echo $readmore;
                                else :
                                    echo JText::sprintf('Read more...');
                                endif;
                                ?></span></span>
                    </a>
                </p>
            <? /** End Read More * */ endif; ?>

                <? echo $this->item->event->afterDisplayContent; ?>
        </div>

                <? /** Begin Article Sec/Cat * */ if (($this->item->params->get('show_section') && $this->item->sectionid) || ($this->item->params->get('show_category') && $this->item->catid)) : ?>
            <p class="article-cat">
                    <? if ($this->item->params->get('show_section') && $this->item->sectionid && isset($this->item->section)) : ?>
                    <span>
                        <? if ($this->item->params->get('link_section')) : ?>
                            <? echo '<a href="' . JRoute::_(ContentHelperRoute::getSectionRoute($this->item->sectionid)) . '">'; ?>
                        <? endif; ?>
                        <? echo $this->escape($this->item->section); ?>
                    <? if ($this->item->params->get('link_section')) : ?>
                        <? echo '</a>'; ?>
                    <? endif; ?>
                        <? if ($this->item->params->get('show_category')) : ?>
                            <? echo ' - '; ?>
                        <? endif; ?>
                    </span>
                    <? endif; ?>
                    <? if ($this->item->params->get('show_category') && $this->item->catid) : ?>
                    <span>
                        <? if ($this->item->params->get('link_category')) : ?>
                        <? echo '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug, $this->item->sectionid)) . '">'; ?>
                    <? endif; ?>
                <? echo $this->escape($this->item->category); ?>
                <? if ($this->item->params->get('link_category')) : ?>
            <? echo '</a>'; ?>
        <? endif; ?>
                    </span>
    <? endif; ?>
            </p>
<? /** End Article Sec/Cat * */ endif; ?>
        <div class="clear"></div>
    </div>
</div>