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
// no direct acces
defined('_JEXEC') or die('Restricted access');
?>

<div class="joomla <? echo $this->escape($this->params->get('pageclass_sfx')); ?>">

    <? if ($this->params->get('show_page_title', 1)) : ?>
        <h1 class="pagetitle">
            <? echo $this->escape($this->params->get('page_title')); ?>
        </h1>
    <? endif; ?>

    <div class="weblinks">

        <h2>
            <a href="<? echo $this->newsfeed->channel['link']; ?>" target="_blank"><? echo str_replace('&apos;', "'", $this->newsfeed->channel['title']); ?></a>
        </h2>

        <? if ($this->params->get('show_feed_description')) : ?>
            <div class="description">
                <? echo str_replace('&apos;', "'", $this->newsfeed->channel['description']); ?>
            </div>
        <? endif; ?>

        <? if (isset($this->newsfeed->image['url']) && isset($this->newsfeed->image['title']) && $this->params->get('show_feed_image')) : ?>
            <img src="<? echo $this->newsfeed->image['url']; ?>" alt="<? echo $this->newsfeed->image['title']; ?>" />
        <? endif; ?>

        <ul>
            <? foreach ($this->newsfeed->items as $item) : ?>
                <li>
                    <? if (!is_null($item->get_link())) : ?>
                        <a href="<? echo $item->get_link(); ?>" target="_blank"><? echo $item->get_title(); ?></a>
                    <? endif; ?>
                    <? if ($this->params->get('show_item_description') && $item->get_description()) : ?>
                        <br />
                        <?
                        $text = $this->limitText($item->get_description(), $this->params->get('feed_word_count'));
                        echo str_replace('&apos;', "'", $text);
                        ?>
                        <br /><br />
                    <? endif; ?>
                </li>
            <? endforeach; ?>
        </ul>

    </div>
</div>
