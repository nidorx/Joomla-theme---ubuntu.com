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

<script language="javascript" type="text/javascript">
	function tableOrdering( order, dir, task ) {
	var form = document.adminForm;

	form.filter_order.value 	= order;
	form.filter_order_Dir.value	= dir;
	document.adminForm.submit( task );
}
</script>

<form action="<? echo JFilterOutput::ampReplace($this->action); ?>" method="post" name="adminForm">

<div class="filter">
<?
	echo JText::_('Display Num') .'&nbsp;';
	echo $this->pagination->getLimitBox();
?>
</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="joomla-table">
	<? if ( $this->params->def( 'show_headings', 1 ) ) : ?>
	<tr>
		<th width="10" align="right">
			<? echo JText::_('Num'); ?>
		</th>
		<th align="left" width="90%">
			<? echo JHTML::_('grid.sort',  'Web Link', 'title', $this->lists['order_Dir'], $this->lists['order'] ); ?>
		</th>
		<? if ( $this->params->get( 'show_link_hits' ) ) : ?>
		<th width="30" align="right" nowrap="nowrap">
			<? echo JHTML::_('grid.sort',  'Hits', 'hits', $this->lists['order_Dir'], $this->lists['order'] ); ?>
		</th>
		<? endif; ?>
	</tr>
	<? endif; ?>
	
	<? foreach ($this->items as $item) : ?>
	<tr class="<? if ($item->odd) { echo 'even'; } else { echo 'odd'; } ?>">
		<td align="right">
			<? echo $this->pagination->getRowOffset( $item->count ); ?>
		</td>
		<td>
			<? if ( $item->image ) : ?>
				&nbsp;&nbsp;<? echo $item->image;?>&nbsp;&nbsp;
			<? endif; ?>
			<? echo $item->link; ?>
			<? if ( $this->params->get( 'show_link_description' ) ) : ?>
				<br /><span class="description"><? echo nl2br($this->escape($item->description)); ?></span>
			<? endif; ?>
		</td>
		<? if ( $this->params->get( 'show_link_hits' ) ) : ?>
		<td align="center">
			<? echo $item->hits; ?>
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

<input type="hidden" name="filter_order" value="<? echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="" />
<input type="hidden" name="viewcache" value="0" />
</form>