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

    <div class="category-list">


        <? /** Begin Category Description * */ if ($this->category->image || $this->category->description) : ?>
            <div class="description">
                <? if ($this->category->image) : ?>
                    <img class="<? echo $this->category->image_position; ?>" src="<? echo $this->baseurl . '/' . $cparams->get('image_path') . '/' . $this->category->image; ?>" alt="" />
                <? endif; ?>
                <? if ($this->category->description) : ?>
                    <? echo $this->category->description; ?>
                <? endif; ?>
            </div>
        <? /** End Category Description * */ endif; ?>

        <?
        $this->items = & $this->getItems();
        echo $this->loadTemplate('items');
        ?>

        <? if ($this->access->canEdit || $this->access->canEditOwn) : ?>	
            <? echo JHTML::_('icon.create', $this->category, $this->params, $this->access); ?>	
        <? endif; ?>	
    </div>
</div>