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

    <div class="blog">


        <? /** Begin Description * */ if ($this->params->def('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
            <div class="description">
                <? if ($this->params->get('show_description_image') && $this->category->image) : ?>
                    <img class="<? echo $this->category->image_position; ?>" src="<? echo $this->baseurl . '/' . $cparams->get('image_path') . '/' . $this->category->image; ?>" align="<? echo $this->category->image_position; ?>" alt="" />
                <? endif; ?>
                <? if ($this->params->get('show_description') && $this->category->description) : ?>
                    <? echo $this->category->description; ?>
                <? endif; ?>
            </div>
        <? /** End Description * */ endif; ?>

        <? /** Begin Leading Articles * */ if ($this->params->def('num_leading_articles', 1)) : ?>
            <div class="leading-articles">
                <? for ($i = $this->pagination->limitstart; $i < ($this->pagination->limitstart + $this->params->get('num_leading_articles')); $i++) : ?>
                    <? if ($i >= $this->total) : break;
                    endif; ?>
                    <?
                    $this->item = & $this->getItem($i, $this->params);
                    echo $this->loadTemplate('item');
                    ?>
                <? endfor; ?>
            </div>
        <? /** End Leading Articles * */ else : $i = $this->pagination->limitstart;
        endif; ?>

        <?
        /** Begin Article Columns * */
        if ($i < $this->total)
        {

            // init vars
            if ($this->params->get('num_columns') < 1)
                $this->params->set('num_columns', 1);

            $count = min($this->params->get('num_intro_articles', 4), ($this->total - $i));
            $rows = ceil($count / $this->params->get('num_columns', 2));
            $columns = array();

            // create intro columns
            for ($j = 0; $j < $count; $j++, $i++)
            {

                if ($this->params->get('multi_column_order', 1) == 0)
                {
                    // order down
                    $column = intval($j / $rows);
                } else
                {
                    // order across
                    $column = $j % $this->params->get('num_columns', 2);
                }

                if (!isset($columns[$column]))
                {
                    $columns[$column] = '';
                }

                $this->item = & $this->getItem($i, $this->params);
                $columns[$column] .= $this->loadTemplate('item');
            }

            // render intro columns
            $count = count($columns);
            if ($count)
            {
                if ($count != 1)
                {
                    echo '<div class="teaser-articles multicolumns">';
                } else
                {
                    echo '<div class="teaser-articles">';
                }
                for ($j = 0; $j < $count; $j++)
                {
                    $firstlast = "";
                    if ($count != 1)
                    {
                        if ($j == 0)
                            $firstlast = "first";
                        if ($j == $count - 1)
                            $firstlast = "last";
                    }
                    echo '<div class="' . $firstlast . ' float-left width' . intval(100 / $count) . '">' . $columns[$j] . '</div>';
                }
                echo '</div>';
            }
        }
        /** End Article Columns * */
        ?>

            <? /** Begin Article Links * */ if ($this->params->def('num_links', 4) && ($i < $this->total)) : ?>
            <div class="article-links">
            <?
            $this->links = array_splice($this->items, $i - $this->pagination->limitstart);
            echo $this->loadTemplate('links');
            ?>
            </div>
<? /** End Article Links * */ endif; ?>

<? /** Begin Pagination * */ if ($this->params->def('show_pagination', 2) == 1 || ($this->params->get('show_pagination') == 2 && $this->pagination->get('pages.total') > 1)) : ?>
            <div class="pagination">
    <? if ($this->params->def('show_pagination_results', 1)) : ?>
                    <p class="results">
        <? echo $this->pagination->getPagesCounter(); ?>
                    </p>
    <? endif; ?>
    <? echo $this->pagination->getPagesLinks(); ?>
            </div>
<? /** End Pagination * */ endif; ?>

    </div>
</div>