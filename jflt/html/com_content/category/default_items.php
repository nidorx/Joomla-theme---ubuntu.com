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
?>

<script language="javascript" type="text/javascript">
<!--
function tableOrdering( order, dir, task ) {
	var form = document.adminForm;

	form.filter_order.value 	= order;
	form.filter_order_Dir.value	= dir;
	document.adminForm.submit( task );
}
// -->
</script>

<form action="<? echo $this->action; ?>" method="post" name="adminForm">

<? if ($this->params->get('filter') || $this->params->get('show_pagination_limit')) : ?>
<div class="filter">
	<? if ($this->params->get('filter')) : ?>
		<? echo JText::_($this->params->get('filter_type') . ' Filter'); ?>
		&nbsp;<input type="text" name="filter" value="<? echo $this->escape($this->lists['filter']);?>" onchange="document.adminForm.submit();" />
	<? endif; ?>
	
	<? if ($this->params->get('show_pagination_limit')) : ?>
		&nbsp;&nbsp;&nbsp;<?	echo JText::_('Display Num'); ?>
		&nbsp;<? echo $this->pagination->getLimitBox(); ?>
	<? endif; ?>
</div>
<? endif; ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="joomla-table">

	<? if ($this->params->get('show_headings')) : ?>
	<tr>
		<th align="right" width="5%">
			<? echo JText::_('Num'); ?>
		</th>
		<? if ($this->params->get('show_title')) : ?>
		<th align="left" width="45%">
			<? echo JHTML::_('grid.sort',  'Item Title', 'a.title', $this->lists['order_Dir'], $this->lists['order'] ); ?>
		</th>
		<? endif; ?>
		<? if ($this->params->get('show_date')) : ?>
		<th align="left" width="25%">
			<? echo JHTML::_('grid.sort',  'Date', 'a.created', $this->lists['order_Dir'], $this->lists['order'] ); ?>
		</th>
		<? endif; ?>
		<? if ($this->params->get('show_author')) : ?>
		<th align="left" width="20%">
			<? echo JHTML::_('grid.sort',  'Author', 'author', $this->lists['order_Dir'], $this->lists['order'] ); ?>
		</th>
		<? endif; ?>
		<? if ($this->params->get('show_hits')) : ?>
		<th align="center" width="5%" nowrap="nowrap">
			<? echo JHTML::_('grid.sort',  'Hits', 'a.hits', $this->lists['order_Dir'], $this->lists['order'] ); ?>
		</th>
		<? endif; ?>
	</tr>
	<? endif; ?>
	
	<? foreach ($this->items as $item) : ?>
	<tr class="<? if ($item->odd) { echo 'even'; } else { echo 'odd'; } ?>">
		<td align="right">
			<? echo $this->pagination->getRowOffset( $item->count ); ?>
		</td>
		<? if ($this->params->get('show_title')) : ?>
			<? if ($item->access <= $this->user->get('aid', 0)) : ?>
			<td>
				<a href="<? echo $item->link; ?>"><? echo $this->escape($item->title); ?></a>
				<? $this->item = $item; echo JHTML::_('icon.edit', $item, $this->params, $this->access) ?>
			</td>
			<? else : ?>
			<td>
				<?
					echo $this->escape($item->title).' : ';
					$link = JRoute::_('index.php?option=com_user&view=login');
					$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug, $item->sectionid), false);
					$fullURL = new JURI($link);
					$fullURL->setVar('return', base64_encode($returnURL));
					$link = $fullURL->toString();
				?>
				<a href="<? echo $link; ?>"><? echo JText::_( 'Register to read more...' ); ?></a>
			</td>
			<? endif; ?>
		<? endif; ?>
		<? if ($this->params->get('show_date')) : ?>
		<td>
			<? echo $item->created; ?>
		</td>
		<? endif; ?>
		<? if ($this->params->get('show_author')) : ?>
		<td >
			<? echo $this->escape($item->created_by_alias) ? $this->escape($item->created_by_alias) : $this->escape($item->author); ?>
		</td>
		<? endif; ?>
		<? if ($this->params->get('show_hits')) : ?>
		<td align="center">
			<? echo $this->escape($item->hits) ? $this->escape($item->hits) : '-'; ?>
		</td>
		<? endif; ?>
	</tr>
	<? endforeach; ?>
	
</table>

<? if ($this->params->get('show_pagination')) : ?>
<div class="pagination">
	<p class="results">
		<? echo $this->pagination->getPagesCounter(); ?>
	</p>
	<? echo $this->pagination->getPagesLinks(); ?>
</div>
<? endif; ?>

<input type="hidden" name="id" value="<? echo $this->category->id; ?>" />
<input type="hidden" name="sectionid" value="<? echo $this->category->sectionid; ?>" />
<input type="hidden" name="task" value="<? echo $this->lists['task']; ?>" />
<input type="hidden" name="filter_order" value="" />
<input type="hidden" name="filter_order_Dir" value="" />
<input type="hidden" name="limitstart" value="0" />
</form>
