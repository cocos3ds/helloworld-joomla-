<?php

    defined('_JEXEC') or die('Restricted access');



    $document = JFactory::getDocument();
    $document->addStyleDeclaration('.icon-helloworld {background-image: url(../media/com_helloworld/images/Tux-16x16.png);}');
    
    $controller = JControllerLegacy::getInstance('HelloWorld');

    $controller->execute(JFactory::getApplication()->input->get('task'));

    $controller->redirect();