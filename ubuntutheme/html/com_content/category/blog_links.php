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
defined('_JEXEC') or die('Restricted access'); ?>

<h3>
	<? echo JText::_( 'More Articles...' ); ?>
</h3>

<ul class="more-articles">
	<? foreach ($this->links as $link) : ?>
	<li>
		<a href="<? echo JRoute::_(ContentHelperRoute::getArticleRoute($link->slug, $link->catslug, $link->sectionid)); ?>"><? echo $this->escape($link->title); ?></a>
	</li>
	<? endforeach; ?>
</ul>
