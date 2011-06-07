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
$cparams = & JComponentHelper::getParams('com_media');
?>

<div class="joomla <? echo $this->escape($this->params->get('pageclass_sfx')); ?>">
    <? /** Begin Page Title * */ if ($this->params->get('show_page_title', 1)) : ?>
        <h1 class="pagetitle">
            <? echo $this->escape($this->params->get('page_title')); ?>
        </h1>
    <? /** End Page Title * */ endif; ?>

    <div class="section-list">
        <div class="content">

        <? /** Begin Description * */ if (($this->params->get('show_description_image') && $this->section->image) || ($this->params->get('show_description') && $this->section->description)) : ?>
            <div class="description">
                <? if ($this->params->get('show_description_image') && $this->section->image) : ?>
                    <img class="<? echo $this->section->image_position; ?>" src="<? echo $this->baseurl . '/' . $cparams->get('image_path') . '/' . $this->section->image; ?>" alt="" />
                <? endif; ?>
                <? if ($this->params->get('show_description') && $this->section->description) : ?>
                    <? echo $this->section->description; ?>
                <? endif; ?>
            </div>
        <? /** End Description * */ endif; ?>

        <? /** Begin Categories * */ if ($this->params->get('show_categories', 1)) : ?>
            <ul>
                <? foreach ($this->categories as $category) : ?>
                    <? if (!$this->params->get('show_empty_categories') && !$category->numitems)
                        continue; ?>
                    <li>
                        <a href="<? echo $category->link; ?>" class="category"><? echo $this->escape($category->title); ?></a>
                        <? if ($this->params->get('show_cat_num_articles')) : ?>
                            &nbsp;
                            <span class="number">
            					( <?
                if ($category->numitems == 1)
                {
                    echo $category->numitems . " " . JText::_('item');
                } else
                {
                    echo $category->numitems . " " . JText::_('items');
                }
                ?> )
                            </span>
                    <? endif; ?>
                    <? if ($this->params->def('show_category_description', 1) && $category->description) : ?>
                            <br />
                    <? echo $category->description; ?>
        <? endif; ?>
                    </li>
    <? endforeach; ?>
            </ul>
<? /** End Categories * */ endif; ?>
        
    </div>
    </div>
</div>