document.addEventListener('DOMContentLoaded',function(){
  var f=document.getElementById('contactForm');
  if(!f)return;
  f.addEventListener('submit',function(e){
    e.preventDefault();
    var d=new FormData(f);
    fetch(f.action,{method:'POST',body:d}).then(r=>{
      var s=document.getElementById('contactStatus');
      if(r.ok){s.textContent='Message envoyé.';f.reset();}
      else{s.textContent='Erreur.';}
    });
  });
});
