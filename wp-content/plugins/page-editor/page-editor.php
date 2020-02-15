<?php
/**
 * Plugin Name: Page-Editor
 * Description: Edits HTML code in wordpress pages
 * Version: 1.0.1.
 * Author: PtasDevz
 * 
 */
/*
{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {URI to Plugin License}.
*/

function page_editor_install(){

}
register_activation_hook( __FILE__, 'page_editor_install' );

function page_editor_deactivation(){
    
}
register_deactivation_hook( __FILE__, 'page_editor_deactivation' );

?>