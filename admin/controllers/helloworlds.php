<?php

defined('_JEXEC') or die('Restricted access');


class HelloWorldControllerHelloWorlds extends JControllerAdmin
{
    
    public function getModel($name = 'HelloWorld', $prefix = 'HelloWorldModel', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);

        return $model;
    }
}