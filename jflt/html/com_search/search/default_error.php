<? 
/**
 * @package   Template Overrides - RocketTheme
 * @version   3.0.11 September 5, 2010
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Rockettheme Gantry Template uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
defined('_JEXEC') or die('Restricted access');
?>

<h2 class="error<? $this->escape($this->params->get( 'pageclass_sfx' )) ?>">
	<? echo JText::_('Error') ?>
</h2>
<div class="error<? echo $this->escape($this->params->get( 'pageclass_sfx' )) ?>">
	<p><? echo $this->escape($this->error); ?></p>
</div>
