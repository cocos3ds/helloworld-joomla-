<?php

    defined('_JEXEC') or die('Restricted access');

    class HelloWorldViewHelloWorlds extends JViewLegacy

    {
        function display($tpl = null){


            // Get application
            $app = JFactory::getApplication();
            $context = "helloworld.list.admin.helloworld";

            $this->items = $this->get('Items');
            $this->pagination = $this->get('Pagination');
            $this->state			= $this->get('State');
            $this->filter_order 	= $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'greeting', 'cmd');
            $this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
            $this->filterForm    	= $this->get('FilterForm');
            $this->activeFilters 	= $this->get('ActiveFilters');

            if(count($errors = $this->get('Errors'))){
                JError::raiseError(500,implode('<br/>',$errors));
                return false;
            }
            $this->addToolBar();
            parent::display($tpl);

            $this->setDocument();
        }


        function addToolBar(){

            $title = JText::_('COM_HELLOWORLD_MANAGER_HELLOWORLDS');

            if ($this->pagination->total)
            {
                $title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
            }
    
            JToolBarHelper::title($title, 'helloworld');
            JToolBarHelper::deleteList('', 'helloworlds.delete');
            JToolBarHelper::editList('helloworld.edit');
            JToolBarHelper::addNew('helloworld.add');
        }


        protected function setDocument() 
        {
            $document = JFactory::getDocument();
            $document->setTitle(JText::_('COM_HELLOWORLD_ADMINISTRATION'));
        }

    }