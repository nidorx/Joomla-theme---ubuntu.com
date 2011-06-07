<?
// no direct access
defined('_JEXEC') or die('Restricted access');
$cparams = & JComponentHelper::getParams('com_media');
?>


<div class="joomla <? echo $this->escape($this->params->get('pageclass_sfx')); ?>">
    <!--
    <? if ($this->params->get('show_page_title', 1) && !$this->contact->params->get('popup') && $this->params->get('page_title') != $this->contact->name) : ?>
                                                        <h1 class="pagetitle">
        <? echo $this->escape($this->params->get('page_title')); ?>
                                                        </h1>
    <? endif; ?>
    -->

    <? if ($this->contact->name && $this->contact->params->get('show_name')) : ?>
        <h1 class="pagetitle">
            <? echo $this->escape($this->contact->name); ?>
        </h1>
    <? endif; ?>

    <div class="contact content-block">

        <div class="headline">
            <? if ($this->contact->con_position && $this->contact->params->get('show_position')) : ?>
                <h1 class="title">
                    <? echo $this->escape($this->contact->con_position); ?>
                </h1>
            <? endif; ?>
            <div class="clear"></div>
        </div>

        <div class="content">
            <div class="contact-left fltl wid50percent">
                <? if ($this->params->get('show_contact_list') && count($this->contacts) > 1) : ?>
                    <div class="filter">
                        <form action="<? echo JRoute::_('index.php') ?>" method="post" name="selectForm" id="selectForm">
                            <? echo JText::_('Select Contact'); ?>:
                            <? echo JHTML::_('select.genericlist', $this->contacts, 'contact_id', 'class="inputbox" onchange="this.form.submit()"', 'id', 'name', $this->contact->id); ?>
                            <input type="hidden" name="option" value="com_contact" />
                        </form>
                    </div>
                <? endif; ?>

                <? if ($this->contact->image && $this->contact->params->get('show_image')) : ?>
                    <div class="image">
                        <? echo JHTML::_('image', 'images/stories' . '/' . $this->contact->image, JText::_('Contact'), array('align' => 'middle')); ?>
                    </div>
                <? endif; ?>

                <? echo $this->loadTemplate('address'); ?>

                <? if ($this->contact->params->get('allow_vcard')) : ?>
                    <p>
                        <? echo JText::_('Download information as a'); ?>
                        <a href="<? echo JURI::base(); ?>index.php?option=com_contact&amp;task=vcard&amp;contact_id=<? echo $this->contact->id; ?>&amp;format=raw&amp;tmpl=component"><? echo JText::_('VCard'); ?></a>
                    </p>
                <? endif; ?>
            </div>




            <?
            if ($this->contact->params->get('show_email_form') && ($this->contact->email_to || $this->contact->user_id)):
                ?>
                <div class="contact-right fltr wid50percent">
                    <?
                    echo $this->loadTemplate('form');
                    ?>
                </div>
            <? endif; ?>
            <div class="clear"></div>
        </div>
    </div>
</div>