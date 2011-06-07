<?
defined('_JEXEC') or die('Restricted access');
?>

<? if (count($this->results)) : ?>
    <div class="results-info top">
        <div class="details">
            <? if (!empty($this->searchword)) : ?>
                <div class="keywords searchintro<?= $this->escape($this->params->get('pageclass_sfx')) ?>">
                    <?= $this->result ?>
                </div>
            <? endif; ?>

            <div class="pages">
                <div class="counter"><?= $this->pagination->getPagesCounter(); ?> - </div>
                <?= $this->pagination->getPagesLinks(); ?>
            </div>
        </div>  
    </div>
    <div class="results">
        <? $start = $this->pagination->limitstart + 1; ?>
        <ol class="list" start="<?= $start ?>">
            <? foreach ($this->results as $result) : ?>
                <?
                $text = $result->text;
                $text = preg_replace('/\[.+?\]/', '', $text);
                ?>	
                <li>
                    <? if ($result->href) : ?>
                        <h3>
                            <a href="<?= JRoute :: _($result->href) ?>" <?= ($result->browsernav == 1) ? 'target="_blank"' : ''; ?> >
                                <?= $this->escape($result->title); ?></a>
                        </h3>
                    <? endif; ?>
                    <div class="content">
                        <? if ($result->section) : ?>
                            <p><?= JText::_('Category') ?>:
                                <span class="small">
                                    <?= $this->escape($result->section); ?>
                                </span>
                            </p>
                        <? endif; ?>

                        <div class="description">
                            <?= $result->text; ?>
                        </div>
                        <span class="small">
                            <?= $this->escape($result->created); ?>
                        </span>
                    </div>
                </li>
            <? endforeach; ?>
        </ol>
    </div>

    <div class="results-info bottom">
        <div class="details">

            <div class="pages">
                <div class="counter"><?= $this->pagination->getPagesCounter(); ?> - </div>
                <div class="links">
                    <div class="pagination">
                        <?= $this->pagination->getPagesLinks(); ?>
                    </div>
                </div>
            </div>
        </div>  
    </div>
<? else: ?>
    <div class="noresults"></div>
<? endif; ?>
