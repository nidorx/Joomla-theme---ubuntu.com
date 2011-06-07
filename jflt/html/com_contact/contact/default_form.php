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

$script = '<!--
	function validateForm( frm ) {
		var valid = document.formvalidator.isValid(frm);
		if (valid == false) {
			// do field validation
			if (frm.email.invalid) {
				alert( "' . JText::_('Please enter a valid e-mail address.', true) . '" );
			} else if (frm.text.invalid) {
				alert( "' . JText::_('CONTACT_FORM_NC', true) . '" );
			}
			return false;
		} else {
			frm.submit();
		}
	}
	// -->';
$document = & JFactory::getDocument();
$document->addScriptDeclaration($script);
?>

<? if (isset($this->error) && $this->error != '') : ?>
    <div>
        <p class="error"> <?= $this->error; ?></p>
    </div>
<? endif; ?>


<form action="<?= JRoute::_('index.php'); ?>" method="post" name="emailForm" id="emailForm" class="form-validate beautry-form label-medium colored contact">
    <fieldset>

        <div class="field-container">
            <label class="label-top" for="contact_name">
                <?= JText::_('Enter your name'); ?>:
            </label>
            <input type="text" name="name" id="contact_name" size="30" class="inputbox textinput" value="" />
        </div>
        <div class="clear"></div>
        <div class="field-container">
            <label class="label-top" for="contact_email">
                <?= JText::_('Email address'); ?>:
            </label>
            <input type="text" id="contact_email" name="email" size="30" value="" class="inputbox required validate-email textinput " maxlength="100" />
        </div>
        <div class="clear"></div>
        <div class="field-container">
            <label class="label-top" for="contact_subject">
                <?= JText::_('Message subject'); ?>:
            </label>
            <input type="text" name="subject" id="contact_subject" size="30" class="inputbox textinput " value="" />
        </div>
        <div class="clear"></div>
        <div class="field-container">
            <label class="label-top" for="contact_text">
                <?= JText::_('Enter your message'); ?>:
            </label>
            <textarea cols="50" rows="10" name="text" id="contact_text" class="inputbox required  "></textarea>
        </div>
        <div class="clear"></div>

        <? if ($this->contact->params->get('show_email_copy')) : ?>
            <div>
                <label for="contact_email_copy"><input class="checkbox" type="checkbox" name="email_copy" id="contact_email_copy" value="1"  />

                    <?= JText::_('EMAIL_A_COPY'); ?>
                </label>
            </div>
            <div class="clear"></div>
        <? endif; ?>

        <div class="fltr mrgtop">
            <input type="submit" value="<?= JText::_('Send'); ?>" class="button" onclick="javascript:document.emailForm.submit();" name="<?= JText::_('Send'); ?>">
        </div>
    </fieldset>

    <input type="hidden" name="option" value="com_contact" />
    <input type="hidden" name="view" value="contact" />
    <input type="hidden" name="id" value="<?= $this->contact->id; ?>" />
    <input type="hidden" name="task" value="submit" />
    <?= JHTML::_('form.token'); ?>
</form>