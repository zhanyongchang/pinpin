    var taba=document.getElementById("Rdemo");
    var taba1=document.getElementById("Rdemo1");
    var taba2=document.getElementById("Rdemo2");
    var speeda=30; 
    taba2.innerHTML=taba1.innerHTML;
    function Marqueea(){
          if(taba.scrollLeft<=0)
            taba.scrollLeft+=taba2.offsetWidth
          else{
            taba.scrollLeft--;
          }
    }
    var MyMara=setInterval(Marqueea,speeda);
    taba.onmouseover=function() {clearInterval(MyMara)};
    taba.onmouseout=function() {MyMara=setInterval(Marqueea,speeda)};
    