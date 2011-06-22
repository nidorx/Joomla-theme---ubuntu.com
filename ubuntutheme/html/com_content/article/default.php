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

$canEdit = ($this->user->authorize('com_content', 'edit', 'content', 'all')
        || $this->user->authorize('com_content', 'edit', 'content', 'own'));
?>
<div class="joomla <? echo $this->escape($this->params->get('pageclass_sfx')); ?>">

        <? /** Begin Page Title * */ if ($this->params->get('show_page_title', 1) && $this->params->get('page_title') != $this->article->title) : ?>
        <h1 class="pagetitle">
        <? echo $this->escape($this->params->get('page_title')); ?>
        </h1>
<? /** End Page Title * */ endif; ?>

    <div class="article internal">
        <div class="article-bg">


                <? /** Begin Article Title * */ if ($canEdit || $this->params->get('show_title')) : ?>
                <div class="headline">
                        <? if ($this->params->get('show_title')) : ?>
                        <h1 class="article-title">
                            <? if ($this->params->get('link_titles') && $this->article->readmore_link != '') : ?>
                                <a href="<? echo $this->article->readmore_link; ?>"><? echo $this->escape($this->article->title); ?></a>
                            <? else : ?>
                                <? echo $this->escape($this->article->title); ?>
                        <? endif; ?>
                        </h1>
                    <? endif; ?>
                    <? if (!$this->print) : ?>
                            <? if ($canEdit) : ?>
                            <span class="icon edit">
                            <? echo JHTML::_('icon.edit', $this->article, $this->params, $this->access); ?>
                            </span>
                        <? endif; ?>
                        <? else : ?>
                        <span class="icon printscreen">
                        <? echo JHTML::_('icon.print_screen', $this->article, $this->params, $this->access); ?>
                        </span>
    <? endif; ?>
                    <div class="clear"></div>
                </div>
<? /** End Article Title * */ endif; ?>

            <div class="article-content">
                <?
                if (!$this->params->get('show_intro')) :
                    echo $this->article->event->afterDisplayTitle;
                endif;
                ?>

                <? echo $this->article->event->beforeDisplayContent; ?>

<? if ((intval($this->article->modified) != 0 && $this->params->get('show_modify_date')) || ($this->params->get('show_author') && ($this->article->author != "")) || ($this->params->get('show_create_date')) || ($this->params->get('show_pdf_icon') || $this->params->get('show_print_icon') || $this->params->get('show_email_icon'))) : ?>
                    <div class="articleinfo">
                        <div class="article-info">
                            <span class="info">
                                    <? /** Begin Created Date * */ if ($this->params->get('show_create_date')) : ?>
                                    <span class="date-posted">
                                    <? echo JHTML::_('date', $this->article->created, JText::_('DATE_FORMAT_LC2')) ?>
                                    </span>
                                <? /** End Created Date * */ endif; ?>

                                    <? /** Begin Author * */ if ($this->params->get('show_author') && ($this->article->author != "")) : ?>
                                    <span class="author">
                                    <? JText::printf('Written by', ($this->escape($this->article->created_by_alias) ? $this->escape($this->article->created_by_alias) : $this->escape($this->article->author))); ?>
                                    </span>
                                <? /** End Author * */endif; ?>

                                    <? /** Begin Article Icons * */ if ($this->params->get('show_pdf_icon') || $this->params->get('show_print_icon') || $this->params->get('show_email_icon')) : ?>
                                    <div class="article-icons">
                                        <?
                                        if ($this->print) :
                                            echo RokIcon::print_screen($this->article, $this->params, $this->access);
                                        elseif ($this->params->get('show_pdf_icon') || $this->params->get('show_print_icon') || $this->params->get('show_email_icon')) :
                                            ?>
                                            <?
                                            if ($this->params->get('show_pdf_icon')) :
                                                echo RokIcon::pdf($this->article, $this->params, $this->access);
                                            endif;
                                            if ($this->params->get('show_print_icon')) :
                                                echo RokIcon::print_popup($this->article, $this->params, $this->access);
                                            endif;
                                            if ($this->params->get('show_email_icon')) :
                                                echo RokIcon::email($this->article, $this->params, $this->access);
                                            endif;
                                        endif;
                                        ?>
                                    </div>
    <? /** End Article Icons * */ endif; ?>



                                    <? /** Begin Modified Date * */ if (intval($this->article->modified) != 0 && $this->params->get('show_modify_date')) : ?>
                                    <span class="date-modified">
                                    <? echo JText::sprintf('LAST_UPDATED2', JHTML::_('date', $this->article->modified, JText::_('DATE_FORMAT_LC2'))); ?>
                                    </span>
    <? /** End Modified Date * */ endif; ?>



    <? /** Begin Url * */ if ($this->params->get('show_url') && $this->article->urls) : ?>
                                    <span class="url">
                                        <a href="http://<? echo $this->article->urls; ?>" target="_blank"><? echo $this->escape($this->article->urls); ?></a>
                                    </span>
    <? /** End Url * */ endif; ?>

                            </span>
                        </div>

                    </div>
                <? endif; ?>

                <? if (isset($this->article->toc)) : ?>
                    <? echo $this->article->toc; ?>
                <? endif; ?>

                <? echo $this->article->text; ?>

            <? echo $this->article->event->afterDisplayContent; ?>
            </div>
                <? /** Begin Article Sec/Cat * */ if (($this->params->get('show_section') && $this->article->sectionid) || ($this->params->get('show_category') && $this->article->catid)) : ?>
                <p class="article-cat">
                        <? if ($this->params->get('show_section') && $this->article->sectionid && isset($this->article->section)) : ?>
                        <span class="section">
                            <? if ($this->params->get('link_section')) : ?>
                                <? echo '<a href="' . JRoute::_(ContentHelperRoute::getSectionRoute($this->article->sectionid)) . '">'; ?>
                            <? endif; ?>
                            <? echo $this->escape($this->article->section); ?>
                            <? if ($this->params->get('link_section')) : ?>
                                <? echo '</a>'; ?>
                            <? endif; ?>
                            <? if ($this->params->get('show_category')) : ?>
                                <? echo ' - '; ?>
                        <? endif; ?>
                        </span>
                    <? endif; ?>
                        <? if ($this->params->get('show_category') && $this->article->catid) : ?>
                        <span class="category">
                            <? if ($this->params->get('link_category')) : ?>
                                <? echo '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->article->catslug, $this->article->sectionid)) . '">'; ?>
                            <? endif; ?>
                            <? echo $this->escape($this->article->category); ?>
                            <? if ($this->params->get('link_category')) : ?>
                                <? echo '</a>'; ?>
                        <? endif; ?>
                        </span>
                <? endif; ?>
                </p>
<? /** End Article Sec/Cat * */ endif; ?>

        </div>
    </div>

</div>