<?php
/**
 * componentcheck.php  Custom form field to check if any plugin is enabled or not
 *
 * @package   componentcheck
 * @author    Codeboxr ( http://codeboxr.com )
 * @copyright Copyright (C) 2011-2014 http://codeboxr.com. All rights reserved.
 * @license   http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @ help: https://github.com/manchumahara/plugincheck
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');
/**
 * Form Field class for the Joomla Framework.
 *
 */
class JFormFieldComponentcheck extends JFormField {

    protected $type = 'componentcheck';

    /**
     */
    protected function getInput() {

        $component     = $this->element['comname'];      

        if(!empty($component)){

            $db = JFactory::getDbo();
            $db->setQuery("SELECT enabled FROM #__extensions WHERE name = '".$component."'");
            $enabled = $db->loadResult();

            if($enabled){
                return '<span class="label label-success">Component '.$component. ' is enabled</span>';
            }
            else{
                return '<span class="label label-warning">Component '.$component. '  is not enabled</span>';
            }
        }
        else{
            return '<span class="label label-info">Field is not configured correctly!</span>';
        }

    }
}