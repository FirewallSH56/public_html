<?php
/**
*
*
*
* @package RiseWeb
* @author Onekeko
* @copyright (c) 2020 - All rights reserved.
* @version 3.0
*
*
*
**/

# Ticket

function GenerateTicket(){
	 $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return "JavvoES-".md5($randomString)."-JavvoES";		
}

?>