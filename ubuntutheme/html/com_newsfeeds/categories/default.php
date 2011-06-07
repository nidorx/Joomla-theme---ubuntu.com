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

    <? if ($this->params->get('show_page_title', 1)) : ?>
        <h1 class="pagetitle">
            <? echo $this->escape($this->params->get('page_title')); ?>
        </h1>
    <? endif; ?>

    <div class="newsfeeds">

        <? if (($this->params->get('image') != -1) || $this->params->get('show_comp_description')) : ?>
            <div class="description">
                <?
                if (isset($this->image)) : echo $this->image;
                endif;
                echo $this->escape($this->params->get('comp_description'));
                ?>
            </div>
        <? endif; ?>

        <ul>
            <? foreach ($this->categories as $category) : ?>
                <li>
                    <a href="<? echo $category->link ?>"><? echo $this->escape($category->title); ?></a>

                    <? if ($this->params->get('show_cat_items')) : ?>
                        <span class="number">
                        						(<? echo $category->numlinks; ?>)
                        </span>
                    <? endif; ?>

                    <? if ($this->params->get('show_cat_description') && $category->description) : ?>
                        <br /><? echo $category->description; ?>
                    <? endif; ?>
                </li>
            <? endforeach; ?>
        </ul>

    </div>
</div>