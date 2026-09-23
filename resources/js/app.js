document.addEventListener('DOMContentLoaded',()=>{
 const root=document.documentElement;
 const saved=localStorage.getItem('omh-theme'); if(saved) root.dataset.theme=saved;
 document.getElementById('themeToggle')?.addEventListener('click',()=>{
   root.dataset.theme=root.dataset.theme==='dark'?'light':'dark';
   localStorage.setItem('omh-theme',root.dataset.theme);
 });
 const drawer=document.getElementById('topicDrawer');
 document.querySelectorAll('[data-menu]').forEach(b=>b.addEventListener('click',()=>drawer?.classList.add('open')));
 drawer?.querySelector('[data-close]')?.addEventListener('click',()=>drawer.classList.remove('open'));
});
