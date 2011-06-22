<?
// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<h3>
<? echo JText::_('More Articles...'); ?>
</h3>

<ul class="more-articles">
<? foreach ($this->links as $link) : ?>
        <li>
            <a href="<? echo JRoute::_(ContentHelperRoute::getArticleRoute($link->slug, $link->catslug, $link->sectionid)); ?>"><? echo $this->escape($link->title); ?></a>
        </li>
<? endforeach; ?>
</ul>