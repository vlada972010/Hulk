<?php 
	function provera ($a)
	{
		$b=true;
		if(strpos($a, " ")) $b=false;
		if(strpos($a, "/")) $b=false;
		if(strpos($a, "'")) $b=false;
		if(strpos($a, "=")) $b=false;
		if(strpos($a, "\"")) $b=false;
		return $b;
	}
 ?>