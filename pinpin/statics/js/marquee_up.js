    var demoU = document.getElementById("Udemo");
    var demoU1 = document.getElementById("Udemo1");
    var demoU2 = document.getElementById("Udemo2");
    var speedU=30;    
    demoU2.innerHTML = demoU1.innerHTML   
    function MarqueeU(){
        if(demoU2.offsetTop-demoU.scrollTop<=0)    
            demoU.scrollTop-=demoU1.offsetHeight   
        else{
            demoU.scrollTop++
        }
    }
    var MyMarU = setInterval(MarqueeU,speedU);       
    demoU.onmouseover = function(){clearInterval(MyMarU)}    
    demoU.onmouseout = function(){MyMarU = setInterval(MarqueeU,speedU)}  