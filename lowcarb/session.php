<?php if(!BOOT) exit("No direct script access.");

  /**
   * 
   * ✧ lowcarb
   * 
   *   Session
   * 
   *   autoloaded
   * 
   */

  class Session {
    
    /**
     * start session
     *
     * @author Tom Ashworth
     */
    function __construct() {
      session_start();
    }
    
    
    /**
     *  sets data property
     * 
     */ 
    public function __set($name, $value) {
      $_SESSION[$name] = $value;
    }
    
    /**
     *  gets data property or null
     * 
     */
    public function __get($name) {
      if( array_key_exists($name, $_SESSION) ) {
        return $_SESSION[$name];
      }
      return null;
    }
    
    
  }
  
?>