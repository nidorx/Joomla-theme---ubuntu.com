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

<? if ($this->params->get('show_page_title', 1)) : ?>
    <h2 class="componentheading<? echo $this->escape($this->params->get('pageclass_sfx')) ?>">
        <? echo $this->escape($this->params->get('page_title')) ?>
    </h2>
<? endif; ?>

<div id="page">
    <div class="joomla">
        <div class="search-result-container">
            <div class="content">
                <? echo $this->loadTemplate('form'); ?>
                <?
                if (!$this->error) :
                    echo $this->loadTemplate('results');
                else :
                    echo $this->loadTemplate('error');
                endif;
                ?>

            </div>
        </div>
    </div>
</div>