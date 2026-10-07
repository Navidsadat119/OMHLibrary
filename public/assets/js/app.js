(function(){
 const splash=document.getElementById('omhSplash');
 if(splash){setTimeout(()=>splash.classList.add('hide'),1900);}
 const slider=document.querySelector('#featured');
 if(slider){let timer=setInterval(()=>{if(slider.matches(':hover'))return;slider.scrollBy({left:210,behavior:'smooth'});if(slider.scrollLeft+slider.clientWidth>=slider.scrollWidth-8)slider.scrollTo({left:0,behavior:'smooth'})},3200);slider.addEventListener('touchstart',()=>clearInterval(timer),{once:true});}
 document.addEventListener('keydown',e=>{if(e.key==='Escape'){document.body.classList.remove('topics-open','nav-open')}});
})();
