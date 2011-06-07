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

<div class="joomla <? echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<div class="contact">

		<? if ($this->params->get('show_page_title', 1)) : ?>
		<h1 class="pagetitle">
			<? echo $this->escape($this->params->get('page_title')); ?>
		</h1>
		<? endif; ?>

		<? if ($this->category->image || $this->category->description) : ?>
		<div class="description">
			<? if ($this->params->get('image') != -1 && $this->params->get('image') != '') : ?>
				<img class="<? echo $this->params->get('image_align'); ?>" src="<? echo $this->baseurl .'/'. 'images/stories' . '/'. $this->params->get('image'); ?>"  alt="<? echo JText::_( 'Contacts' ); ?>" />
			<? elseif ($this->category->image) : ?>
				<img class="<? echo $this->category->image_position; ?>" src="<? echo $this->baseurl .'/'. 'images/stories' . '/'. $this->category->image; ?>" alt="<? echo JText::_( 'Contacts' ); ?>" />
			<? endif; ?>
			<? if ($this->category->description) : ?>
				<? echo $this->category->description; ?>
			<? endif; ?>
		</div>
		<? endif; ?>

		<script language="javascript" type="text/javascript">
			function tableOrdering( order, dir, task ) {
			var form = document.adminForm;
		
			form.filter_order.value 	= order;
			form.filter_order_Dir.value	= dir;
			document.adminForm.submit( task );
		}
		</script>
		
		<form action="<? echo $this->action; ?>" method="post" name="adminForm">
		<? if ($this->params->get('show_limit')) : ?>
		<div class="filter">
			<? echo JText::_('Display Num') .'&nbsp;'; ?>
			<? echo $this->pagination->getLimitBox(); ?>
		</div>
		<? endif; ?>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="joomla-table">
			<? if ($this->params->get( 'show_headings' )) : ?>
				<tr>
					<th width="5" align="right">
						<? echo JText::_('Num'); ?>
					</th>
					<th align="left">
						<? echo JHTML::_('grid.sort',  'Name', 'cd.name', $this->lists['order_Dir'], $this->lists['order'] ); ?>
					</th>
					<? if ( $this->params->get( 'show_position' ) ) : ?>
					<th align="left">
						<? echo JHTML::_('grid.sort',  'Position', 'cd.con_position', $this->lists['order_Dir'], $this->lists['order'] ); ?>
					</th>
					<? endif; ?>
					<? if ( $this->params->get( 'show_email' ) ) : ?>
					<th width="20%" align="left">
						<? echo JText::_( 'Email' ); ?>
					</th>
					<? endif; ?>
					<? if ( $this->params->get( 'show_telephone' ) ) : ?>
					<th width="15%" align="left">
						<? echo JText::_( 'Phone' ); ?>
					</th>
					<? endif; ?>
					<? if ( $this->params->get( 'show_mobile' ) ) : ?>
					<th width="15%" align="left">
						<? echo JText::_( 'Mobile' ); ?>
					</th>
					<? endif; ?>
					<? if ( $this->params->get( 'show_fax' ) ) : ?>
					<th width="15%" align="left">
						<? echo JText::_( 'Fax' ); ?>
					</th>
					<? endif; ?>
				</tr>
			<? endif; ?>
			<? echo $this->loadTemplate('items'); ?>
		</table>

		<div class="pagination">
			<p class="results">
				<? echo $this->pagination->getPagesCounter(); ?>
			</p>
			<? echo $this->pagination->getPagesLinks(); ?>
		</div>

		<input type="hidden" name="option" value="com_contact" />
		<input type="hidden" name="catid" value="<? echo $this->category->id;?>" />
		<input type="hidden" name="filter_order" value="<? echo $this->lists['order']; ?>" />
		<input type="hidden" name="filter_order_Dir" value="" />
		<input type="hidden" name="viewcache" value="0" />
		</form>

	</div>
</div>
