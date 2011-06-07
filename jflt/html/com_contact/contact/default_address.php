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

<? if ( ( $this->contact->params->get( 'address_check' ) > 0 ) &&  ( $this->contact->address || $this->contact->suburb  || $this->contact->state || $this->contact->country || $this->contact->postcode ) ) : ?>
<table cellpadding="0" cellspacing="0" border="0" class="joomla-table">
	<? if ( $this->contact->params->get( 'address_check' ) > 0 ) : ?>
	<tr>
		<td rowspan="6" valign="top" width="<? echo $this->contact->params->get( 'column_width' ); ?>" >
			<? echo $this->contact->params->get( 'marker_address' ); ?>
		</td>
	</tr>
	<? endif; ?>
	<? if ( $this->contact->address && $this->contact->params->get( 'show_street_address' ) ) : ?>
	<tr>
		<td>
			<? echo nl2br($this->escape($this->contact->address)); ?>
		</td>
	</tr>
	<? endif; ?>
	<? if ( $this->contact->suburb && $this->contact->params->get( 'show_suburb' ) ) : ?>
	<tr>
		<td>
			<? echo $this->escape($this->contact->suburb); ?>
		</td>
	</tr>
	<? endif; ?>
	<? if ( $this->contact->state && $this->contact->params->get( 'show_state' ) ) : ?>
	<tr>
		<td>
			<? echo $this->escape($this->contact->state); ?>
		</td>
	</tr>
	<? endif; ?>
	<? if ( $this->contact->postcode && $this->contact->params->get( 'show_postcode' ) ) : ?>
	<tr>
		<td>
			<? echo $this->escape($this->contact->postcode); ?>
		</td>
	</tr>
	<? endif; ?>
	<? if ( $this->contact->country && $this->contact->params->get( 'show_country' ) ) : ?>
	<tr>
		<td>
			<? echo $this->escape($this->contact->country); ?>
		</td>
	</tr>
	<? endif; ?>
</table>
<? endif; ?>

<? if ( ($this->contact->email_to && $this->contact->params->get( 'show_email' )) || 
			($this->contact->telephone && $this->contact->params->get( 'show_telephone' )) || 
			($this->contact->fax && $this->contact->params->get( 'show_fax' )) || 
			($this->contact->mobile && $this->contact->params->get( 'show_mobile' )) || 
			($this->contact->webpage && $this->contact->params->get( 'show_webpage' )) ) : ?>
<table cellpadding="0" cellspacing="0" border="0" class="joomla-table">
	<? if ( $this->contact->email_to && $this->contact->params->get( 'show_email' ) ) : ?>
	<tr>
		<td width="<? echo $this->contact->params->get( 'column_width' ); ?>" >
			<? echo $this->contact->params->get( 'marker_email' ); ?>
		</td>
		<td>
			<? echo $this->contact->email_to; ?>
		</td>
	</tr>
	<? endif; ?>
	<? if ( $this->contact->telephone && $this->contact->params->get( 'show_telephone' ) ) : ?>
	<tr>
		<td width="<? echo $this->contact->params->get( 'column_width' ); ?>" >
			<? echo $this->contact->params->get( 'marker_telephone' ); ?>
		</td>
		<td>
		<? echo nl2br($this->escape($this->contact->telephone)); ?>
		</td>
	</tr>
	<? endif; ?>
	<? if ( $this->contact->fax && $this->contact->params->get( 'show_fax' ) ) : ?>
	<tr>
		<td width="<? echo $this->contact->params->get( 'column_width' ); ?>" >
			<? echo $this->contact->params->get( 'marker_fax' ); ?>
		</td>
		<td>
			<? echo nl2br($this->escape($this->contact->fax)); ?>
		</td>
	</tr>
	<? endif; ?>
	<? if ( $this->contact->mobile && $this->contact->params->get( 'show_mobile' ) ) :?>
	<tr>
		<td width="<? echo $this->contact->params->get( 'column_width' ); ?>" >
		<? echo $this->contact->params->get( 'marker_mobile' ); ?>
		</td>
		<td>
			<? echo nl2br($this->escape($this->contact->mobile)); ?>
		</td>
	</tr>
	<? endif; ?>
	<? if ( $this->contact->webpage && $this->contact->params->get( 'show_webpage' )) : ?>
	<tr>
		<td width="<? echo $this->contact->params->get( 'column_width' ); ?>" >
		</td>
		<td>
		<a href="<? echo $this->escape($this->contact->webpage); ?>" target="_blank">
				<? echo $this->escape($this->contact->webpage); ?></a>
		</td>
	</tr>
	<? endif; ?>
</table>
<? endif; ?>

<? if ( $this->contact->misc && $this->contact->params->get( 'show_misc' ) ) : ?>
<table cellpadding="0" cellspacing="0" border="0" class="joomla-table">
	<tr>
		<td width="<? echo $this->contact->params->get( 'column_width' ); ?>" valign="top" >
			<? echo $this->contact->params->get( 'marker_misc' ); ?>
		</td>
		<td>
			<? echo nl2br($this->contact->misc); ?>
		</td>
	</tr>
</table>
<? endif; ?>