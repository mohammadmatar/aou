<?php

function details($detail,$n){
	$result="";
	if (strlen($detail) > $n) {
		$result=substr($detail,0,$n)."...";
	}else{
		$result=$detail;
		for($j=0;$j<($n)-(int)strlen($detail);$j++){
		$result.=".";
		}
	}
	return $result;
}