<?php
namespace Home\Controller;
use Think\Controller;

class GoodsController extends Controller{
  
  function goods(){
  	//var_dump($_GET);
  	$goods=D('Admin/Goods');
  
    $date=$goods->find(I('get.goods_id'));
   // print_r($this->date['cat_id']);
    //var_dump($this->mbx($date['cat_id']));
    $comment=D('comment')->where(array('goods_id'=>I('get.goods_id')))->select();
    $this->assign('mbx',$this->mbx($date['cat_id']));
    $this->assign('goods',$date);
    $this->assign('comment',$comment);
    $this->history($date);
    $this->display();
   
  }
  function comment(){
        if (IS_POST) {
           $_POST['pubtime']=time();
        }
       if( D('Comment')->add($_POST)){
        $this->success('评论成功','','2');
      }

  }
  function shopcar(){

     $car= \Home\Tool\AddTool::getIns(); 
     $goods=D('Admin/Goods');
     $date=$goods->find(I('get.goods_id'));
     if ($date) {
        $car->add($date['goods_id'],$date['goods_name'],$date['shop_price']);
     }
     //var_dump( session('item') );
     $this->assign('item',session('item'));
     $this->assign('calc',$car->calcMoney());
     $this->display('checkout');

  }
  function history($g){
    
     if (!session('?history')) {
         $history=array();
     }else{
         $history=session('history');
     }
     
     if (isset($history[$g['goods_id']])) {
       unset($history[$g[goods_id]]);
     }

     $row=array();
     $row['goods_id']=$g['goods_id'];
     $row['goods_name']=$g['goods_name'];
     $row['shop_price']=$g['shop_price'];
     $history[$g['goods_id']]=$row;
    if (count($history)>6) {
       $key=key($history);
       unset($history[$key]);
    }
    if ($g['goods_id']) {
      session('history',$history);
    }
    


  }

  function mbx($cat_id){
  	$cat=D('Admin/Cat');
    $date=$cat->select();
  	//print_r($date);exit();
  	 $fh=array();
     while($cat_id>0){
        foreach ( $date as  $v) {
              if ($v['cat_id']==$cat_id) {
                   $fh[]=$v['cat_name'];
                   $cat_id=$v['parent_id'];
                   break;        	   
              }
         }   
      }    
      return array_reverse($fh);
  }






}






?>