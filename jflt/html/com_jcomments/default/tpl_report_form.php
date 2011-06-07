<?
// no direct access
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Restricted access');

class jtt_tpl_report_form extends JoomlaTuneTemplate
{
	function render() 
	{
?>
<h4><? echo JText::_('Report to administrator'); ?></h4>
<form id="comments-report-form" name="comments-report-form" action="javascript:void(null);">
<?
		if ($this->getVar('isGuest', 1) == 1) {
?>
<p>
	<input id="comments-report-form-name" type="text" name="name" value="" maxlength="255" size="22" />
	<label for="comments-report-form-name"><? echo JText::_('Name'); ?></label>
</p>
<?
		}
?>
<p>
	<input id="comments-report-form-reason" type="text" name="reason" value="" maxlength="255" size="22" />
	<label for="comments-report-form-reason"><? echo JText::_('Reason'); ?></label>
</p>
<div id="comments-report-form-buttons">
	<div class="btn"><div><a href="#" onclick="jcomments.saveReport();return false;" title="<? echo JText::_('Submit'); ?>"><? echo JText::_('Submit'); ?></a></div></div>
	<div class="btn"><div><a href="#" onclick="jcomments.cancelReport();return false;" title="<? echo JText::_('Cancel'); ?>"><? echo JText::_('Cancel'); ?></a></div></div>
	<div style="clear:both;"></div>
</div>
<input type="hidden" name="commentid" value="<? echo $this->getVar('comment-id'); ?>" />
</form>
<?
	}
}
?>