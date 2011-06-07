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

<dl class="poll">
	<dt><? echo JText::_( 'Number of Voters' ); ?></dt>
	<dd><? echo $this->votes[0]->voters; ?></dd>
	<dt><? echo JText::_( 'First Vote' ); ?></dt>
	<dd><? echo $this->first_vote; ?></dd>
	<dt><? echo JText::_( 'Last Vote' ); ?></dt>
	<dd><? echo $this->last_vote; ?></dd>
</dl>

<h3>
	<? echo $this->escape($this->poll->title); ?>
</h3>

<table class="pollstableborder">
	<tr>
		<th id="itema" class="td_1"><? echo JText::_( 'Hits' ); ?></th>
		<th id="itemb" class="td_2"><? echo JText::_( 'Percent' ); ?></th>
		<th id="itemc" class="td_3"><? echo JText::_( 'Graph' ); ?></th>
	</tr>
	<? for ( $row = 0; $row < count( $this->votes ); $row++ ) :
		$vote = $this->votes[$row];
	?>
	<tr>
		<td colspan="3" id="question<? echo $row; ?>" class="question">
			<? echo $vote->text; ?>
		</td>
	</tr>
	<tr class="sectiontableentry<? echo $vote->odd; ?>">
		<td headers="itema question<? echo $row; ?>" class="td_1">
			<? echo $vote->hits; ?>
		</td>
		<td headers="itemb question<? echo $row; ?>" class="td_2">
			<? echo $vote->percent.'%' ?>
		</td>
		<td headers="itemc question<? echo $row; ?>" class="td_3">
			<div class="<? echo $vote->class; ?>" style="height:<? echo $vote->barheight; ?>px;width:<? echo $vote->percent; ?>% !important"></div>
		</td>
	</tr>
	<? endfor; ?>
</table>
