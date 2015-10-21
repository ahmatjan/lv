<?php
class MY_Loader extends CI_Loader
{
 	protected $_ci_modules = array();

 	protected $_ci_module_paths  = array();
 	
 	public function __construct()
    {
        
        parent::__construct();
        load_class('Module','core');
        $this->_ci_module_paths = array(APPPATH);
    }
   
	/**
     * Module Loader
     * 
     * This function lets users load and instantiate classes.
	 * It is designed to be called from a user's app controllers.
	 *
	 * @param	string	the name of the class
	 * @param	mixed	the optional parameters
	 * @param	string	an optional object name
	 * @return	void
     */
    public function module($module = '', $params = NULL, $object_name = NULL)
    {
        if(is_array($module))
        {
            foreach($module as $class)
            {

                $this->module($class, $params);
            }
            
            return;
        }
        
        if($module == '' or isset($this->_ci_modules[$module])) {
            return FALSE;
        }
 
        if(! is_null($params) && ! is_array($params)) {
            $params = NULL;
        }
        
        $subdir = '';
 
        // Is the module in a sub-folder? If so, parse out the filename and path.
        if (($last_slash = strrpos($module, '/')) !== FALSE)
        {
                // The path is in front of the last slash
                $subdir = substr($module, 0, $last_slash + 1);
 
                // And the module name behind it
                $module = substr($module, $last_slash + 1);
        }
        
        foreach($this->_ci_module_paths as $path)
        {
        	$module=ucfirst($module);
        	
            $filepath = $path .'modules/'.$subdir.$module.'.php';
            
            if ( ! file_exists($filepath))
            {
                continue;
            }
            
            include_once($filepath);
            
            $module = strtolower($module);
 
            if (empty($object_name))
            {
                $object_name = $module;
            }
            
            $module = ucfirst($module);
            $CI = &get_instance();
            if($params !== NULL)
            {
                $CI->$object_name = new $module($params);
            }
            else
            {
                $CI->$object_name = new $module();
            }
            
            $this->_ci_modules[] = $object_name;
            
            return;
        }
    }
}