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

<form action="<? echo JRoute::_('index.php?view=category&id='.$this->category->slug); ?>" method="post" name="adminForm">

<? if ($this->params->get('show_limit')) : ?>
<div class="filter">
	<?
		echo JText::_('Display Num') .'&nbsp;';
		echo $this->pagination->getLimitBox();
	?>
</div>
<? endif; ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="joomla-table">
	<? if ( $this->params->get( 'show_headings' ) ) : ?>
	<tr>
		<th align="right" width="5">
			<? echo JText::_('Num'); ?>
		</th>
		<? if ( $this->params->get( 'show_name' ) ) : ?>
		<th align="left" width="90%">
			<? echo JText::_( 'Feed Name' ); ?>
		</th>
		<? endif; ?>
		<? if ( $this->params->get( 'show_articles' ) ) : ?>
		<th width="10%" align="center" nowrap="nowrap">
			<? echo JText::_( 'Num Articles' ); ?>
		</th>
		<? endif; ?>
	 </tr>
	<? endif; ?>
	
	<? foreach ($this->items as $item) : ?>
	<tr class="<? if ($item->odd) { echo 'even'; } else { echo 'odd'; } ?>">
		<td align="right" width="5">
			<? echo $item->count + 1; ?>
		</td>
		<td width="90%">
			<a href="<? echo $item->link; ?>" class="category"><? echo $this->escape($item->name); ?></a>
		</td>
		<? if ( $this->params->get( 'show_articles' ) ) : ?>
		<td width="10%" align="center">
			<? echo $item->numarticles; ?>
		</td>
		<? endif; ?>
	</tr>
	<? endforeach; ?>

</table>

<div class="pagination">
	<p class="results">
		<? echo $this->pagination->getPagesCounter(); ?>
	</p>
	<? echo $this->pagination->getPagesLinks(); ?>
</div>

</form>