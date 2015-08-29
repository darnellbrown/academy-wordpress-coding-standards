<?php 
	
namespace Foo_Bar;

class Plugin {
	public $config = array();
	
	public function __construct()
	{
		$config = [ 
             "post_type_slug" => "foo", 
             "taxonomy_slug" => "bar", 
             "post_type_name" => "Foo", 
             "taxonomy_name" => "Bar", 
         ]; 
	}
}

?>
