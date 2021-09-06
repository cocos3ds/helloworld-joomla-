<?php

    defined('_JEXEC') or die('Restricted access');

    class HelloWorldViewHelloWorlds extends JViewLegacy

    {
        function display($tpl = null){
            $this->items = $this->get('Items');
            $this->pagination = $this->get('Pagination');

            if(count($errors = $this->get('Errors'))){
                JError::raiseError(500,implode('<br/>',$errors));
                return false;
            }
            $this->addToolBar();
            parent::display($tpl);
        }


        function addToolBar(){

            JToolbarHelper::title(JText::_('COM_HELLOWORLD_MANAGER_HELLOWORLDS'));
            JToolbarHelper::addNew('helloworld.add');
            JToolbarHelper::editList('helloworld.edit');
            JToolbarHelper::deleteList('', 'helloworlds.delete');
        }

    }