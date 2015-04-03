<?php

function numberToRoman($N) 
{
	$c='IVXLCDM'; 
	for($a=5,$b=$s='';$N;$b++,$a^=7)for($o=$N%$a,$N=$N/$a^0;$o--;$s=$c[$o>2?$b+$N-($N&=-2)+$o=1:$b].$s); 
	return $s; 
}

function numberToStar($N) 
{
	$N*=1;
	$s='';
	for($i=1;$i<=$N;$i++){
		$s.='<span class="glyphicon glyphicon-star"></span>';
	}
	for(;$i<=3;$i++){
		$s.='<span class="glyphicon glyphicon-star-empty"></span>';
	}
	return $s; 
}
