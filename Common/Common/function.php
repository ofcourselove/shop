<?php 


function secret($a){
	return md5($a);
}

function check(){

    return secret(cookie('username').cookie('userid')) === cookie('key');


}








?>