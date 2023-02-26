{
  "names": {<?php 
function base32Decode($input){
	$input = strtolower($input);
	if( strlen($input) == 63)
	$input = substr($input,5,52);
	$chars = 'qpzry9x8gf2tvdw0s3jn54khce6mua7l';
	$binary = '';
	 foreach (str_split($input) as $char) {
        $binary .= str_pad(base_convert(strpos($chars, $char), 10, 2), 5, '0', STR_PAD_LEFT);
	}
	$decoded = '';
	foreach (str_split($binary, 8) as $byte) {
		$ex ="00". base_convert($byte, 2, 16);
		$decoded .= substr($ex,strlen($ex)-2);
	}
	$decoded = $decoded."==";
	$decoded = str_replace('00==', '',$decoded);
	$decoded = str_replace('==', '',$decoded);
	return $decoded;
}
	$npub=$_GET["name"];
	$hex=base32Decode($npub);
	?>"<?php echo $npub;?>": "<?php echo $hex;?>"
  }
}