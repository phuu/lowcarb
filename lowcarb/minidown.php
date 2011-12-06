<?php if(!BOOT) exit("No direct script access.");

  /**
   * 
   * ✧ lowcarb
   *   super-light php blog framework
   * 
   *   Minidown (super-light markdown parser)
   * 
   *   autoloaded
   * 
   */
  class Minidown {
    
    /**
     * parse "markdown" to html
     *
     * @param string $string 
     * @return string
     * @author Tom Ashworth
     */
    public function out($string) {
      
      $string = stripslashes($string);
      
      $string = $string . "\n\n";

      // Standardise newlines
      $string = preg_replace("/\r\n/i", "\n", $string);
      $string = preg_replace("/\r/i", "\n", $string);

      // The RegEx beuty
      $markdown = array(
        "/\n+(>\s{1}(.+))\n{2,}/i" => "<blockquote>$2</blockquote>"
      , "/#+\s{1}(.+)\n+/i" => "<h3>$1</h3>"
      , "/\((.+?)\)\[(\S+?)\]/i" => "<a href=$2>$1</a>"
      , "/(-\s{1}(.+)\n{1}.+)/im" => "<ul>$1"
      , "/(-\s{1}(.+)\n)\n+/im" => "$1</ul>"
      , "/(-\s{1}(.+))\n?/i" => "<li>$2</li>"
      , "/^(.+)\n{2,}/i" => "<p>$1</p>"
      , "/\n+(.+)\n{2,}/i" => "<p>$1</p>"
      );
    
      // Do the replacement
      foreach($markdown as $pattern => $replace) {
        $string = preg_replace($pattern, $replace, $string);
      }
      
      return $string;
      
    }
    
    
  }
  
?>