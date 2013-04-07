<?php
include("./header.php");
?>

<div class="tj-nav">
    <div class="tj-caidan">
      <div class="tj-nav-l fl"></div>
      <div class="tj-nav-r fr"></div>
      <ul>      	
        <li class="cur"><a href="../tuijian/sgjsjh.html">维您蔬果酵素精华</a></li>
        <li class="tj-nav-line"></li> 
        <li><a href="../tuijian/wnxkfgwyl.html">维您蟹壳粉果味饮料</a></li>
        <li class="tj-nav-line"></li>
		<li><a href="../tuijian/wnlbyjgsf.html">维您绿宝有机谷蔬粉</a></li>
        <li class="tj-nav-line"></li>
        <li><a href="../tuijian/wnndp.html">维您纳豆片</a></li>    
        <li class="tj-nav-line"></li> 
        <li><a href="../tuijian/wnhk.html">维您海矿1400饮用水</a></li>              
      </ul>
      <div class="clear"></div>
    </div>
  </div>
  <div class="tj-cont">
  	<div style="background:url(../images/tj-cont-top.jpg) no-repeat center top;">
        <div style=" width:950px; border:1px solid #CBCDC8; margin:0px auto"> 
        	<img src="../images/sgjsjh/sgjsjh_r1_c1.jpg" width="950" height="461" /> 
            <img src="../images/sgjsjh/sgjsjh_r2_c1.jpg" width="950" height="1100" />
            <img src="../images/sgjsjh/sgjsjh_r3_c1.jpg" width="950" height="1016" /> 
            <img src="../images/sgjsjh/sgjsjh_r4_c1.jpg" width="950" height="1253" />
            <img src="../images/sgjsjh/sgjsjh_r5_c1.jpg" width="950" height="859" />
        <img src="../images/sgjsjh/sgjsjh_r6_c1.jpg" width="950" height="897" /></div>
    </div>
  </div>
</div>
<div id="floop">
<a href="http://www.wm18.com/detail-132311-V1007550-001.html" target="_blank"><img src="../images/sgjsjh/fudong.gif" width="88" height="74" border="0" /></a>
<p style="margin-top:10px;"><a href="http://www.wm18.com/detail-132311-V1007550-001.html" target="_blank"><img src="../images/goumai.jpg" width="80" height="24" /></a></p>
</div>
      <style type="text/css">
        #floop{
            position: fixed;
            margin-left:50%;
            left:490px;
            top:30%;
			text-align:center;
        }
        </style>
<script>
lastScrollY=0;
function heartBeat(){
var diffY;
if (document.documentElement && document.documentElement.scrollTop)
    diffY = document.documentElement.scrollTop;
else if (document.body)
    diffY = document.body.scrollTop
else
    {/*Netscape stuff*/}
percent=.1*(diffY-lastScrollY);
if(percent>0)percent=Math.ceil(percent);
else percent=Math.floor(percent);
document.getElementById("floop").style.top=parseInt(document.getElementById("floop").style.top)+percent+"px";
lastScrollY=lastScrollY+percent;
if(lastScrollY<200)
{
document.getElementById("floop").style.display="none";
}
else
{
document.getElementById("floop").style.display="block";
}
}
var gkuan=document.body.clientWidth;
var ks=(gkuan-960)/2-30;

window.setInterval("heartBeat()",1);
</script>
</div>


<?php
include("./footer.php");
?>