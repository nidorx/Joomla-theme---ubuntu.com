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

    <div class="weblinks">
        <div class="content">

            <? if (($this->params->def('image', -1) != -1) || $this->params->def('show_comp_description', 1)) : ?>
                <div class="description">
                    <?
                    if (isset($this->image)) : echo $this->image;
                    endif;
                    echo $this->params->get('comp_description');
                    ?>
                </div>
            <? endif; ?>

            <ul>
                <? foreach ($this->categories as $category) : ?>
                    <li>
                        <a href="<? echo $category->link; ?>" class="category<? echo $this->params->get('pageclass_sfx'); ?>"><? echo $this->escape($category->title); ?></a>
                        <span class="number">
                					(<? echo $category->numlinks; ?>)
                        </span>
                    </li>
                <? endforeach; ?>
            </ul>

        </div>
    </div>
</div>