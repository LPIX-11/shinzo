<?php

    require_once '.environment/environment.php';
    require_once 'config/welcome_controller.php';
    require_once 'config/database.php';
    require_once 'libraries/routing/routing.conf.php';
    
    class Autoloader
    {
        static function register()
        {
            spl_autoload_register(array(__CLASS__, "autoload"));
        }

        static function autoload($class)
        {
            //autoloader of system
            if(file_exists("libraries/environment/".$class.".php"))
                require_once "libraries/environment/".$class.".php";
            
            //autoload of developers classes
            else if(file_exists("src/entities/".$class.".php"))
                require_once "src/entities/".$class.".php";
                
            else if(file_exists("src/controller/".$class.".php"))
                require_once "src/controller/".$class.".php";
                
            else if(file_exists("src/model/".$class.".php"))
                require_once "src/model/".$class.".php";
                

            else if(file_exists("src/entities/".$class.".php"))
                require_once "src/entities/".$class.".php";
                
            else if(file_exists("src/controller/".$class.".php"))
                require_once "src/controller/".$class.".php";
                
            else if(file_exists("src/model/".$class.".php"))
                require_once "src/model/".$class.".php";
                
            //for namespaces
            else if(file_exists(str_replace("\\", "/", $class.".php")))
                require_once str_replace("\\", "/", $class.".php");
                
            else if(file_exists(str_replace("\\", "/", $class.".php")))
                require_once str_replace("\\", "/", $class.".php");
                
            else if(file_exists(str_replace("\\", "/", $class.".php")))
                require_once str_replace("\\", "/", $class.".php");
                
            else
            {
                $message = "The <b>".$class."</b> namespace does not correspond to a 
                            directory in your application.
                            <br/> Or maybe you mispelled it.";
                die($message);
            }
        }
    }

    Autoloader::register();