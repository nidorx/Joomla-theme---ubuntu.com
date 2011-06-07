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

<? foreach($this->items as $item) : ?>
<tr class="<? if ($item->odd) { echo 'even'; } else { echo 'odd'; } ?>">
	<td align="right" width="5">
		<? echo $item->count +1; ?>
	</td>
	<td>
		<a href="<? echo $item->link; ?>"><? echo $item->name; ?></a>
	</td>
	<? if ( $this->params->get( 'show_position' ) ) : ?>
	<td>
		<? echo $this->escape($item->con_position); ?>
	</td>
	<? endif; ?>
	<? if ( $this->params->get( 'show_email' ) ) : ?>
	<td width="20%">
		<? echo $item->email_to; ?>
	</td>
	<? endif; ?>
	<? if ( $this->params->get( 'show_telephone' ) ) : ?>
	<td width="15%">
		<? echo $this->escape($item->telephone); ?>
	</td>
	<? endif; ?>
	<? if ( $this->params->get( 'show_mobile' ) ) : ?>
	<td width="15%">
		<? echo $this->escape($item->mobile); ?>
	</td>
	<? endif; ?>
	<? if ( $this->params->get( 'show_fax' ) ) : ?>
	<td width="15%">
		<? echo $this->escape($item->fax); ?>
	</td>
	<? endif; ?>
</tr>
<? endforeach; ?>
