<?php 
namespace Admin\Model;
use Think\Model;
class CatModel extends Model{

  function gettree(){
       
       return $this->select();

   }



}



?>