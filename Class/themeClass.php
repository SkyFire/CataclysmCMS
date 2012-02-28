<?php
/**
*
* @author Kennen [AlceNet - Community]
* @author http://www.alcenet.info
*
* @package themeClass
*/

class themeClass
    {

        
        function loader_template($theme) {
            switch ($theme) {
                case "header":
                    include("Theme/$theme.php");
                    break;
                
                case "footer":
                    include("Theme/$theme.php");
                    break;
                
                case "block":
                    include("Theme/$theme.php");
                    break;
                default:
                    break;
            }
        }

    }
?>