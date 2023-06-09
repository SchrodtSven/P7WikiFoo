<?php

declare(strict_types=1);
/**
 * Main app class - auto loading and initial setup (with public constants) 
 * for current project and starting bootstrapping
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.1
 * @since 2023-05-10
 */

namespace SchrodtSven\P7WikiFoo;

class App
{

    /**
     * Namespace prefix for project files
     * 
     * @var string
     */
    public const VENDOR = 'SchrodtSven\P7WikiFoo';

    /**
     * Prefix to strip from fully qualified namespace to map to directories
     * 
     * @var string
     */
    private const MIMI =  'SchrodtSven\\';

    /**
     * Lib prefix
     * 
     * @var string
     */
    public const LIB_PREFIX = 'src/';

    /**
     * Separator for namespaces
     * 
     * @var string
     */
    public const NAMESPACE_SEPARATOR ='\\';

    /**
     * Main app configuration
     * 
     * @var string
     */
    public const MAIN_CFG = 'src/P7WikiFoo/Internal/main_cfg.php';

    /**
     * Basic template directory
     * 
     * @var string
     */
    public const CHEAP_TPL_DIR = 'src/P7WikiFoo/Tools/Tpl/';

    /**
     * Phtml template directory
     * 
     * @var string
     */
    public const PHTML_TPL_DIR = 'src/P7WikiFoo/App/Views/';

    /**
     * Directory with raw mocking data
     * 
     * @var string
     */
    public const MOCK_RAW_DIR = 'data/Mock/';

    /**
     * Configuration for mocking super global out of http context
     * 
     * @var string
     */
    public const MOCK_HTTP_CFG = 'src/TriviaGame/Internal/mock_http.php';

    /**
     * Sub namespace for action controllers
     * 
     * @var string
     */
    public const ACTION_CONTROLLER_NAMESPACE = '\SchrodtSven\P7WikiFoo\App\Controllers\\';

    /**
     * Suffix for action names
     * 
     * @var string 
     */
    public const ACTION_SUFFIX = 'Action';

    /**
     * Suffix for controller names
     * 
     * @var string 
     */
    public const CONTROLLER_SUFFIX = 'Controller';

    /**
     * Registering AL
     *
     * @return void
     */
    public function registerAutoloader(): void
    {
        /**
         * Registering project specific auto loading
         */
        spl_autoload_register(function ($className) {
            
            // Check if namespace of class to be instantiated belongs to us
            if (str_starts_with($className,  self::VENDOR)) {
                
                $filePathClass = str_replace(self::MIMI, '', $className);
                //replace separator for namespaces with directory separator
                $file = self::LIB_PREFIX . str_replace(
                        self::NAMESPACE_SEPARATOR, 
                        \DIRECTORY_SEPARATOR, 
                        $filePathClass
                    ) . '.php';
             
                // Check if destination class file exists  and include it, 
                // if not so - __do not throw__ \E*, because of AL chain!
                // @see https://www.php-fig.org/psr/psr-4/#2-specification : 
                // "4. Autoloader implementations *MUST NOT* throw exceptions,
                // MUST NOT raise errors of any level, and SHOULD NOT return a value."
                
                if (file_exists($file)) {
                    require_once $file;
                }
            }
        });
    }

    public function __construct()
    {
        // workaround for current PHP Development server -> if route eq '/'
        if(str_ends_with(getcwd(), 'public')) {
            chdir(('../'));    
        }

    }
}

// Running auto loader
(new App())->registerAutoloader();


