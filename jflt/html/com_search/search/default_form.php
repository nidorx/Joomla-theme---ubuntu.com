<?
defined('_JEXEC') or die('Restricted access');
?>

<form id="form-search-result" action="<? echo JRoute::_('index.php?option=com_search#content') ?>" method="post" class="search_result">
    <div class="content">
        <div class="searchword">
            <label for="search_searchword"><? echo JText::_('Search Keyword') ?> </label>
            <input type="text" name="searchword" id="search_searchword"  maxlength="20" value="<? echo $this->escape($this->searchword) ?>" class="inputbox" />
        </div>
        <input type="submit" name="Search" onClick="this.form.submit()" class="button" value="<? echo JText::_('Search'); ?>" />
        <div class="clear"></div>

        <div class="parameters">
            <label for="ordering" class="ordering"><? echo JText::_('Ordering') ?>:</label>
            <? echo $this->lists['ordering']; ?>

            <? if (count($this->results)) : ?>
                <label for="limit"><? echo JText :: _('Display Num') ?></label>
                <? echo $this->pagination->getLimitBox(); ?>
            <? endif; ?>
            <div class="clear"></div>
        </div>

        <? if ($this->params->get('search_areas', 1)) : ?>
            <div class="only">
                <? echo JText::_('Search Only') ?>:
                <? foreach ($this->searchareas['search'] as $val => $txt) : ?>
                    <? $checked = is_array($this->searchareas['active']) && in_array($val, $this->searchareas['active']) ? 'checked="true"' : ''; ?>
                    <input type="checkbox" name="areas[]" value="<? echo $val ?>" id="area_<? echo $val ?>" <? echo $checked ?> />
                    <label for="area_<? echo $val ?>">
                        <? echo JText::_($txt); ?>
                    </label>
                <? endforeach; ?>
                <div class="clear"></div>
            </div>
        <? endif; ?>

        <input type="hidden" name="task"   value="search" />
    </div>
</form>
<div class="clear"></div>
