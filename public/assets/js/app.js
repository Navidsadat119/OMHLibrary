const body=document.body;
document.querySelector('[data-main-menu]')?.addEventListener('click',()=>body.classList.toggle('nav-open'));
document.querySelector('[data-topic-menu]')?.addEventListener('click',()=>body.classList.toggle('topics-open'));
document.querySelector('[data-topic-close]')?.addEventListener('click',()=>body.classList.remove('topics-open'));
document.querySelector('[data-theme-toggle]')?.addEventListener('click',()=>{body.classList.toggle('light');localStorage.theme=body.classList.contains('light')?'light':'dark'});
document.querySelectorAll('[data-topic-toggle]').forEach(btn=>btn.addEventListener('click',()=>{const node=btn.closest('.topic-node');node.classList.toggle('expanded');btn.textContent=node.classList.contains('expanded')?'−':'+';}));
const slider=document.querySelector('#featured');if(slider){let timer=setInterval(()=>{if(slider.matches(':hover'))return;slider.scrollBy({left:200,behavior:'smooth'});if(slider.scrollLeft+slider.clientWidth>=slider.scrollWidth-10)slider.scrollTo({left:0,behavior:'smooth'})},3500);['touchstart','pointerdown'].forEach(e=>slider.addEventListener(e,()=>clearInterval(timer),{once:true}));}
