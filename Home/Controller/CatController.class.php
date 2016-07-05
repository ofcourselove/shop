<?php

namespace Home\Controller;
use Think\Controller;
class CatController extends Controller{

   function cat(){
       $cat=D('Admin/Goods');  // 必须“/” no"\"
       $cat_id=I('get.cat_id');
       echo "$cat_id";
       $date=$cat->where("cat_id=$cat_id")->select();
       //var_dump($date);
       $this->assign('cat',$date);
   	   $this->display();
   }



}











?>