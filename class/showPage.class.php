<?php
class showPage{
	public  $each_disNums;//每页显示的条目数   
  	public  $nums;//总条目数   
  	public  $current_page;//当前被选中的页   
  	public  $sub_pages;//每次显示的页数   
  	public  $pageNums;//总页数   
  	public  $page_array = array();//用来构造分页的数组   
  	public  $subPage_link;//每个分页的链接   
  	public  $subPage_type;//显示分页的类型   
	
	
	function __construct($each_disNums,$nums,$current_page,$sub_pages,$subPage_link,$subPage_type){
		$this->each_disNums=intval($each_disNums);
		$this->nums=intval($nums);
		if(!$current_page){
			$this->current_page=1;
		}else{
			$this->current_page=intval($current_page);
		}
		$this->sub_pages=intval($sub_pages);
		$this->pageNums=ceil($nums/$each_disNums);
		$this->subPage_link=$subPage_link;
		$this->show_SubPages($subPage_type);	
	}
	
	/*  
    用来给建立分页的数组初始化的函数。  
   */  
  function initArray(){   
    for($i=0;$i<$this->sub_pages;$i++){   
    $this->page_array[$i]=$i;   
    }   
    return $this->page_array;   
   }   
      
      
  /*  
    construct_num_Page该函数使用来构造显示的条目  
    即使：[1][2][3][4][5][6][7][8][9][10]  
   */  
  function construct_num_Page(){   
    if($this->pageNums < $this->sub_pages){   
    $current_array=array();   
     for($i=0;$i<$this->pageNums;$i++){    
     $current_array[$i]=$i+1;   
     }   
    }else{   
    $current_array=$this->initArray();   
     if($this->current_page <= 3){   
      for($i=0;$i<count($current_array);$i++){   
      $current_array[$i]=$i+1;   
      }   
     }elseif ($this->current_page <= $this->pageNums && $this->current_page > $this->pageNums - $this->sub_pages + 1 ){   
      for($i=0;$i<count($current_array);$i++){   
      $current_array[$i]=($this->pageNums)-($this->sub_pages)+1+$i;   
      }   
     }else{   
      for($i=0;$i<count($current_array);$i++){   
      $current_array[$i]=$this->current_page-2+$i;   
      }   
     }   
    }   
       
    return $current_array;   
   }  
	
	/*
	 * 判断分页类型
	 * */
	function show_SubPages($subPage_type){
		if($subPage_type==1){
			$this->subPageCss1();
		}else if($subPage_type==2){
			$this->subPageCss2();
		}else{
			$this->subPageCss3();
		}
	}
	
	
	/*  
   分页样式1
   共4523条记录,每页显示10条,当前第1/453页 [首页] [上页] [下页] [尾页]  
   */  
  function subPageCss1(){   
   $subPageCss1Str="";   
   $subPageCss1Str.="共".$this->nums."条记录，";   
   $subPageCss1Str.="每页显示".$this->each_disNums."条，";   
   $subPageCss1Str.="当前第".$this->current_page."/".$this->pageNums."页 ";   
    if($this->current_page > 1){   
    $firstPageUrl=$this->subPage_link."1";   
    $prewPageUrl=$this->subPage_link.($this->current_page-1);   
    $subPageCss1Str.="[<a href='$firstPageUrl'>首页</a>] ";   
    $subPageCss1Str.="[<a href='$prewPageUrl'>上一页</a>] ";   
    }else {   
    $subPageCss1Str.="[首页] ";   
    $subPageCss1Str.="[上一页] ";   
    }   
       
    if($this->current_page < $this->pageNums){   
    $lastPageUrl=$this->subPage_link.$this->pageNums;   
    $nextPageUrl=$this->subPage_link.($this->current_page+1);   
    $subPageCss1Str.=" [<a href='$nextPageUrl'>下一页</a>] ";   
    $subPageCss1Str.="[<a href='$lastPageUrl'>尾页</a>] ";   
    }else {   
    $subPageCss1Str.="[下一页] ";   
    $subPageCss1Str.="[尾页] ";   
    }   
       
    echo $subPageCss1Str;   
       
   }  
	
	/*  
   	分页样式2
   	当前第1/453页 [首页] [上页] 1 2 3 4 5 6 7 8 9 10 [下页] [尾页]  
   */  
  function subPageCss2(){   
   $subPageCss2Str=""; 
   $subPageCss2Str.="<div class='pager'>";   

    if($this->current_page > 1){   
    $firstPageUrl=$this->subPage_link."1";   
    $prewPageUrl=$this->subPage_link.($this->current_page-1);   
    $subPageCss2Str.="<a href='$firstPageUrl'>首页</a> ";   
    $subPageCss2Str.="<a href='$prewPageUrl'>上一页</a> ";   
    }else {   
    $subPageCss2Str.="<a>首页</a> ";   
    $subPageCss2Str.="<a>上一页</a> ";   
    }   
       
   $a=$this->construct_num_Page();   
    for($i=0;$i<count($a);$i++){   
    $s=$a[$i];   
     if($s == $this->current_page ){   
     $subPageCss2Str.="<span class='currentfg'>".$s."</span> ";   
     }else{   
     $url=$this->subPage_link.$s;   
     $subPageCss2Str.="<a href='$url'>".$s."</a> ";   
     }   
    }   
       
    if($this->current_page < $this->pageNums){   
    $lastPageUrl=$this->subPage_link.$this->pageNums;   
    $nextPageUrl=$this->subPage_link.($this->current_page+1);   
    $subPageCss2Str.=" <a href='$nextPageUrl'>下一页</a> ";   
    $subPageCss2Str.="<a href='$lastPageUrl'>尾页</a> ";   
    }else {   
    $subPageCss2Str.="<a>下一页</a>";   
    $subPageCss2Str.="<a>尾页</a>";   
    }  
    $subPageCss2Str.="</div>"; 
    echo $subPageCss2Str;   
   } 

   /*  
   	分页样式3，英文
   	当前第1/453页 [首页] [上页] 1 2 3 4 5 6 7 8 9 10 [下页] [尾页]  
   */  
  function subPageCss3(){   
   $subPageCss2Str=""; 
   $subPageCss2Str.="<div class='pager'>";   
   $subPageCss2Str.="All".$this->nums."line，";   
   $subPageCss2Str.="Each page".$this->each_disNums."line"; 
       
   
    if($this->current_page > 1){   
    $firstPageUrl=$this->subPage_link."1";   
    $prewPageUrl=$this->subPage_link.($this->current_page-1);   
    $subPageCss2Str.="<a href='$firstPageUrl'>First</a> ";   
    $subPageCss2Str.="<a href='$prewPageUrl'>Prev</a> ";   
    }else {   
    $subPageCss2Str.="<a>First</a>";   
    $subPageCss2Str.="<a>Prev</a>";   
    }   
       
   $a=$this->construct_num_Page();   
    for($i=0;$i<count($a);$i++){   
    $s=$a[$i];   
     if($s == $this->current_page ){   
     $subPageCss2Str.="<span class='currentfg'>".$s."</span>";   
     }else{   
     $url=$this->subPage_link.$s;   
     $subPageCss2Str.="<a href='$url'>".$s."</a>";   
     }   
    }   
       
    if($this->current_page < $this->pageNums){   
    $lastPageUrl=$this->subPage_link.$this->pageNums;   
    $nextPageUrl=$this->subPage_link.($this->current_page+1);   
    $subPageCss2Str.=" <a href='$nextPageUrl'>Next</a> ";   
    $subPageCss2Str.="<a href='$lastPageUrl'>Last</a> ";   
    }else {   
    $subPageCss2Str.="<a>Next</a>";   
    $subPageCss2Str.="<a>Last</a>";   
    }  
    $subPageCss2Str.="</div>"; 
    echo $subPageCss2Str;   
   } 
}