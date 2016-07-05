<?php
namespace Home\Controller;
use Think\Controller;
class CommentController extends Controller{


     function comment(){
     	 $comment=D('Comment');
         $date=array();
         $date['email']=I('post.email');
         $date['content']=I('post.content');
         $date['goods_id']=I('post.id');
         var_dump($date);
         //$this->display('Home\Goods\goods'); CommentController连接view必须名字相对应文件夹Commentss
           

     }









}







?>