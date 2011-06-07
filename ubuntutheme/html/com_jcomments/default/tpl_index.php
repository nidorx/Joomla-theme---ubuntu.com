<?
// no direct access
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Restricted access');
/*
*
* Main template for JComments. Don't change it without serious reasons ;)
* Then creating new template you can copy this file to new template's dir without changes
*
*/
class jtt_tpl_index extends JoomlaTuneTemplate
{
	function render() 
	{
		$object_id = $this->getVar('comment-object_id');
		$object_group = $this->getVar('comment-object_group');

		// comments data is prepared in tpl_list and tpl_comments templates 
		$comments = $this->getVar('comments-list', '');

		// form data is prepared in tpl_form template.
		$form = $this->getVar('comments-form');

		if ($comments != '' || $form != '' || $this->getVar('comments-anticache')) {
			// include comments css (only if we are in administor's panel)
			if ($this->getVar('comments-css', 0) == 1) {
				include_once (JCOMMENTS_HELPERS.DS.'system.php');
?>
<link href="<? echo JCommentsSystemPluginHelper::getCSS(); ?>" rel="stylesheet" type="text/css" />
<?
                        	if ($this->getVar('direction') == 'rtl') {
					$rtlCSS = JCommentsSystemPluginHelper::getCSS(true);
					if ($rtlCSS != '') {
?>
<link href="<? echo $rtlCSS; ?>" rel="stylesheet" type="text/css" />
<?
					}
                        	}
			}

			// include JComments JavaScript initialization
?>
<script type="text/javascript">
<!--
var jcomments=new JComments(<? echo $object_id;?>, '<? echo $object_group; ?>','<? echo $this->getVar('ajaxurl'); ?>');
jcomments.setList('comments-list');
//-->
</script>
<?
			// IMPORTANT: Do not rename this div's id! Some JavaScript functions references to it!
?>
<div id="jc">
<div id="comments"><? echo $comments; ?></div>
<?
			// Display comments form (or link to show form)
			if (isset($form)) {
				echo $form;
			}
?>
<div id="comments-footer" align="center"><? echo $this->getVar('support'); ?></div>
<?
			// Some magic like dynamic comments list loader (anticache) and auto go to anchor script
			$aca = (int) ($this->getVar('comments-gotocomment') == 1);
			$acp = (int) ($this->getVar('comments-anticache') == 1);
			$acf = (int) (($this->getVar('comments-form-link') == 1) && ($this->getVar('comments-form-locked', 0) == 0));

			if ($aca || $acp || $acf) {
?>
<script type="text/javascript">
<!--
jcomments.setAntiCache(<? echo $aca;?>,<? echo $acp;?>,<? echo $acf;?>);
//-->
</script> 
<?
			}
?>
</div>
<?
		}
	}
}
?>