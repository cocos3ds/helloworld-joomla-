<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

?>
<form action="<?php echo JRoute::_('index.php?option=com_helloworld&layout=edit&id=' . (int) $this->item->id); ?>"
      method="post" name="adminForm" id="adminForm">
    <div class="form-horizontal">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_HELLOWORLD_HELLOWORLD_DETAILS'); ?></legend>
            <div class="row-fluid">
                <div class="span6">
                    <?php
                    foreach($this->form->getFieldset() as $field) {
                        echo $field->renderField();
                    }
                    ?>
                </div>
            </div>
        </fieldset>
    </div>
    <input type="hidden" name="task" value="helloworld.edit" />
    <?php echo JHtml::_('form.token'); ?>
</form>