<?php
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model{
 
   /*public $_validate=array(
   	  //array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
      array('goods_name','3,10')



  	)
}
*/
 function gettree(){

    return $this->select();

  }

}






?>