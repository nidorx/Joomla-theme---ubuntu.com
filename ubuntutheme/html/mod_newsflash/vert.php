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
defined('_JEXEC') or die('Restricted access'); ?>

<? if (count($list) == 1) : ?>
	<? $item = $list[0]; ?>
	<div class="module-newsflash">
		<? modNewsFlashHelper::renderItem($item, $params, $access); ?>
	</div>
<? elseif (count($list) > 1) : ?>
	<div class="module-newsflash">
		<div class="vertical <? echo $params->get('moduleclass_sfx'); ?>">
			<? for ($i = 0, $n = count($list); $i < $n; $i ++) : ?>
			<div class="article <? if ($i == $n - 1) echo 'last'; ?>">
				<? modNewsFlashHelper::renderItem($list[$i], $params, $access); ?>
			</div>
			<? endfor; ?>
		</div>
	</div>
<? endif; ?>
