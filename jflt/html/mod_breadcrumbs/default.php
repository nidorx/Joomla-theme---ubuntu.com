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
global $jft;
?>

<?
if ($jft->pageIsHome()) :
    $homesetting = 1;
else :
    $homesetting = 0;
endif; ?>
<? if ($jft->pageIsHome()) : ?>
    <a href="<? echo JURI::base(); ?>" id="breadcrumbs-jft"></a>
<? endif; ?>
    <span class="breadcrumbs pathway">
    <?
    if ($option == 'com_tag') {
        echo '<a title="Home" href="' . JURI::base() . '" class="pathway home-breadcrumb"></a>';
    } else {

        for ($i = $homesetting; $i < $count; $i++) :
            if ($i < $count - 1) {
                if (!empty($list[$i]->link)) {
                    if (!$i == 0) {
                        echo '<a href="' . $list[$i]->link . '" class="pathway">' . $list[$i]->name . '</a>';
                    } else {
                        echo '<a href="' . $list[$i]->link . '" class="pathway home-breadcrumb"></a>';
                    }
                } else {
                    echo '<span class="no-link">' . $list[$i]->name . '</span>';
                }
                echo ' &raquo; '; /* � */
            } else if ($params->get('showLast', -1)) {

                echo '<span class="no-link">' . $list[$i]->name . '</span>';
            }
        endfor;
    }
    ?>
</span>