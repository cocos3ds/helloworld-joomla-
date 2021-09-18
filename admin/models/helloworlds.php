<?php
    defined('_JEXEC') or die('Restricted access');

    class HelloWorldModelHelloWorlds extends JModelList{



        public function __construct($config = array())
        {
            if (empty($config['filter_fields']))
            {
                $config['filter_fields'] = array(
                    'id',
                    'greeting',
                    'published'
                );
            }

            parent::__construct($config);
        }


        protected function getListQuery(){
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);
            $query->select('*')->from($db->quoteName('#__helloworld'));


            $search = $this->getState('filter.search');

            if (!empty($search))
            {
                $like = $db->quote('%' . $search . '%');
                $query->where('greeting LIKE ' . $like);
            }

            // Filter by published state
            $published = $this->getState('filter.published');

            if (is_numeric($published))
            {
                $query->where('published = ' . (int) $published);
            }
            elseif ($published === '')
            {
                $query->where('(published IN (0, 1))');
            }

            // Add the list ordering clause.
            $orderCol	= $this->state->get('list.ordering', 'greeting');
            $orderDirn 	= $this->state->get('list.direction', 'asc');

            $query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));


            return $query;
        }
    }