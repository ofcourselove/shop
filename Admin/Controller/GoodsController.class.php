<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller {
     public $model=null;
     public function __construct(){
     	parent::__construct();
         $this->model = D('Goods');

     }
     public function goodsadd(){
        
        if (IS_POST) {
            $this->model->add($_POST);
        }
        $this->display();

     }
    public function goodslist(){
       //  var_dump($this->model->gettree());
         $this->assign('goods', $this->model->gettree());
         $this->display();
    }
    public function del(){
        
         if($this->model->delete(I('goods_id'))){
          $this->redirect('Admin/Goods/goodslist');
         }else{
         	echo $this->getError;
         }


    }
    public function eidt(){
      if (IS_POST) {
        $this->model->goods_name=I('post.goods_name');
        $this->model->shop_price=I('post.shop_price');
        $a= I('get.goods_id');
     	echo  $this->model->where('goods_id='.$a)->save() ? 'ok' : 'fail'; 
     }else{
      $this->display('goodsadd');
     }


    }
}