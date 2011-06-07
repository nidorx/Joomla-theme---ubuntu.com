<?
// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<script type="text/javascript">
    <!--
    Window.onDomReady(function(){
        document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); }	);
    });
    // -->
</script>

<div class="joomla <? echo $this->escape($this->params->get('pageclass_sfx')); ?>">
    <? if ($this->params->get('show_page_title')) : ?>
        <h1 class="pagetitle">
            <? echo $this->escape($this->params->get('page_title')); ?>
        </h1>
    <? endif; ?>

    <div class="user content-block">


        <div class="headline">
            <h1 class="title">
                <? echo JText::_('Register'); ?>
            </h1>
            <div class="clear"></div>
        </div>

        <div class="content">
            <? if (isset($this->message)) : ?>
                <div class="message">
                    <p><? $this->display('message'); ?></p>
                </div>
            <? endif; ?>

            <form action="<? echo JRoute::_('index.php?option=com_user'); ?>" method="post" id="josForm" name="josForm" class="form-validate beautry-form">
                <fieldset>
                    <div class="field-container">
                        <label class="label-left" id="namemsg" for="name">
                            <? echo JText::_('Name'); ?>:
                        </label>
                        <input class="inputbox" type="text" name="name" id="name" value="<? echo $this->escape($this->user->get('name')); ?>" maxlength="50" /> *
                    </div>
                    <div class="clear"></div>
                    <div class="field-container">
                        <label class="label-left" id="usernamemsg" for="username">
                            <? echo JText::_('User name'); ?>:
                        </label>
                        <input class="inputbox" type="text" id="username" name="username" value="<? echo $this->escape($this->user->get('username')); ?>" maxlength="25" /> *
                    </div>
                    <div class="clear"></div>
                    <div class="field-container">
                        <label class="label-left" id="emailmsg" for="email">
                            <? echo JText::_('Email'); ?>:
                        </label>
                        <input class="inputbox" type="text" id="email" name="email" value="<? echo $this->escape($this->user->get('email')); ?>" maxlength="100" /> *

                    </div>
                    <div class="clear"></div>
                    <div class="field-container">
                        <label class="label-left" id="pwmsg" for="password">
                            <? echo JText::_('Password'); ?>:
                        </label>
                        <input class="inputbox required validate-password" type="password" id="password" name="password" value="" /> *

                    </div>
                    <div class="clear"></div>
                    <div class="field-container">
                        <label class="label-left" id="pw2msg" for="password2">
                            <? echo JText::_('Verify Password'); ?>:
                        </label>
                        <input class="inputbox required validate-passverify" type="password" id="password2" name="password2" value="" /> *
                    </div>
                    <div class="clear"></div>
                    <div>
                        <p><? echo JText::_('REGISTER_REQUIRED'); ?></p>
                    </div>
                    <div class="readon">
                        <input type="submit" name="Submit" class="button validate" value="<? echo JText::_('Register'); ?>" />
                    </div>
                </fieldset>

                <input type="hidden" name="task" value="register_save" />
                <input type="hidden" name="id" value="0" />
                <input type="hidden" name="gid" value="0" />
                <? echo JHTML::_('form.token'); ?>
            </form>
           
        </div>
    </div>
</div>