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
defined('_JEXEC') or die('Restricted access');
?>

<? JHTML::_('stylesheet', 'poll_bars.css', 'components/com_poll/assets/'); ?>

<? if ($this->params->get('show_page_title', 1)) : ?>
    <h1 class="pagetitle">
        <?= $this->escape($this->params->get('page_title')); ?>
    </h1>
<? endif; ?>

<div class="poll poll-result">
    <div class="content">
        <form action="index.php" method="post" name="poll" id="poll">
            <label for="id">
                <? echo JText::_('Select Poll'); ?>&nbsp;<? echo $this->lists['polls']; ?>
            </label>
        </form>
        <?
        if (count($this->votes)) :
            echo $this->loadTemplate('graph');
        endif;
        ?>
    </div>
</div>
