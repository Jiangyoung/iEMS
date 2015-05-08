<?php
namespace Common\Util;

class Pagination {
    private $sql = '';
    private $current_page = 1;
    private $max_row = 0;
    private $total_rows = 0;
    private $total_page = 20;

    function __construct(){
        $this->current_page = intval(Http::getGET('p',1));
        if($this->current_page>$this->total_page)$this->current_page = 1;
    }

    public function getRows(){

    }

    public function getTotal_rows(){
        return $this->total_page;
    }

    public function getNav(){
        $navTpl = <<<AAA
<div class="iPagination"><hr/>
    %s &nbsp;|&nbsp;第%d页/共%d页
</div>
AAA;
        $aTpl = '&nbsp;<a href="%s">%s</a>&nbsp;';

        $prev_page = ($this->current_page>1)?($this->current_page-1):false;
        $next_page = ($this->current_page<$this->total_page)?($this->current_page+1):false;


        $a = '';
        $a .= sprintf($aTpl,$this->getLink(1),'首&nbsp;页');
        if($prev_page)$a .= sprintf($aTpl,$this->getLink($prev_page),'上一页');


        //确定 导航开始位置
        $flag = 0;
        //保证最小从1开始
        while(($this->current_page+$flag) - 2 < 0)$flag++;
        //确定中间
        if(($this->current_page+$flag) - 2 > 0)$flag = ($this->current_page+$flag) - 2;
        //保证最大不超过最大页数
        while($flag + 2*2 > $this->total_page)$flag--;
        for($i=0;$i<5;$i++){
            if($this->current_page == ($i+$flag)){
                $a .= sprintf($aTpl,'#','&nbsp;'.($i+$flag).'&nbsp;');
                continue;
            }
            $a .= sprintf($aTpl,$this->getLink($i+$flag),'&nbsp;'.($i+$flag).'&nbsp;');
        }

        if($next_page)$a .= sprintf($aTpl,$this->getLink($next_page),'下一页');
        $a .= sprintf($aTpl,$this->getLink($this->total_page),'尾&nbsp;页');

        $nav = sprintf($navTpl,$a,$this->current_page,$this->total_page);

        return $nav;
    }

    private function getLink($page){
        $link = '';
        $currentUri = $_SERVER['REQUEST_URI'];
        if(empty($_GET)){
            $link = $currentUri.'?p='.$page;
        }else if(Http::getGET('p')){
            $link = preg_replace('/p=(\d*)/','p='.$page,$currentUri);
        }else{
            $link = $currentUri.'&p='.$page;
        }
        return $link;
    }

}