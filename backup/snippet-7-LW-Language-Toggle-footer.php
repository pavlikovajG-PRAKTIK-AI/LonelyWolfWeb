<?php
// LW Language Toggle CZ/EN (Krok 8) - footer output
// Code Snippets id 7, PHP, AKTIVNI, priorita 10, Run everywhere
// Rekonstrukce podle WORDPRESS-BRIEF.md Krok 8 + uprava z 2.8.2026
// (pridany radek data-lwlang). Obsah odpovida stavu na webu.
add_action('wp_footer', function () {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function(){
      var KEY='lwLang';
      function apply(lang){
        document.documentElement.setAttribute('data-lwlang', lang);
        document.querySelectorAll('.lw-post').forEach(function(a){ a.setAttribute('lang',lang); });
        document.querySelectorAll('.lang-switch button').forEach(function(b){
          b.classList.toggle('is-active', b.dataset.lang===lang);
        });
        try{ localStorage.setItem(KEY,lang); }catch(e){}
      }
      document.addEventListener('click',function(e){
        var b=e.target.closest && e.target.closest('.lang-switch button');
        if(b) apply(b.dataset.lang);
      });
      var saved=null; try{ saved=localStorage.getItem(KEY); }catch(e){}
      apply(saved==='en' ? 'en' : 'cs');
    });
    </script>
    <?php
});
