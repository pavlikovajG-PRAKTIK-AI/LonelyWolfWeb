# Brief pro Clauda ve WordPressu — lonelywolf.cz

**Web:** https://lonelywolf.cz (Lonely Wolf Photographer — Jana Pavlíková, fotografka divoké přírody)
**Cíl:** přehlednější menu, blog jako úvod, stránka Wild po zemích, nové galerie,
elegantní popisky druhů, sladěný zelený vzhled, počítadlo návštěv.

> **Jazyk webu:** dvojjazyčně **CZ + EN** – u textů (About, blog) vždy nejdřív
> český odstavec, pod ním anglický. Bez jazykového pluginu.
> **Zásada vzhledu:** vždy **tmavé písmo na světlém pozadí**, ladění do zelené.

---

## 0) Globální barvy a styl (udělej první) — SCHVÁLENÁ PALETA

Odsouhlaseno na živé ukázce: **pozadí = zelený gradient shora**, **teplý akcent =
„západ slunce"** (jen na drobnostech), **bílé karty pouze pod fotkami**, texty
leží přímo na gradientu. Interaktivní ukázka: `palette-preview.html`.

```css
:root{
  --surface:   #FFFFFF;  /* bílá karta POD fotkami */
  --text:      #23261F;  /* hlavní tmavé písmo */
  --muted:     #5C6350;  /* popisky, vedlejší text */
  --green:     #35682B;  /* hlavní zelená – odkazy, nadpisy */
  --green-dark:#204A22;  /* tmavá zelená – banner/patička, hover */
  --green-tint:#E7EEDD;  /* jemné zelené pásy */
  --warm:      #C0562B;  /* akcent „západ slunce" – používej STŘÍDMĚ */
}

/* Pozadí = jemný zelený gradient shora do skoro bílé */
body{
  color:var(--text);
  background:linear-gradient(180deg,#E9F0DC 0%,#FBFCF8 62%) no-repeat;
  background-color:#FBFCF8;      /* výplň pod gradientem u dlouhých stránek */
  background-attachment:fixed;
}
a{ color:var(--green); } a:hover{ color:var(--green-dark); }
h1,h2,h3{ color:var(--green-dark); }
```

**Bílé karty jen pod fotkami** (ne pod texty!). Text/perex leží přímo na gradientu:

```css
/* obal každé fotky (hero i miniatury galerií) */
.photo-card{
  background:#fff;
  padding:8px;
  border-radius:12px;
  box-shadow:0 8px 20px rgba(31,58,32,.14);
  max-width:900px;       /* článek nebude širší než 900 px */
  margin:24px auto;      /* centrovaná karta s mezerou nad/pod */
}
/* DŮLEŽITÉ: obrázek MUSÍ být omezený na šířku karty */
.photo-card img{
  width:100%;
  height:auto;
  display:block;
  border-radius:8px 8px 0 0;
}
.photo-card figcaption{
  font:italic 11pt/1.35 Arial, Helvetica, sans-serif;
  color:var(--muted);
  text-align:left;
  margin-top:6px;
  padding:0 4px 4px;
}
```

**Teplý akcent „západ slunce" — jen na těchto místech (nikde jinak):**

```css
.kicker{ color:var(--warm); font-weight:700; letter-spacing:.16em; text-transform:uppercase; }
.btn, .cta{ background:linear-gradient(95deg,#D98F34,#C0562B); color:#fff; border:0;
            padding:9px 16px; border-radius:8px; }
.lw-counter b{ color:var(--warm); }              /* číslo počítadla */
.sunset-line{ height:3px; background:linear-gradient(90deg,#E8B24A 0%,#D07A2E 45%,#B8442A 100%); }
```

- **„Sunset horizon"**: tenký `.sunset-line` (3 px) hned **pod zeleným bannerem**
  jako linka západu slunce.

**Zásady:** vždy tmavé písmo na světlém pozadí (nikdy tmavé pozadí), dostatečný
kontrast, vzdušné rozestupy. Banner a patička tmavě zelené s bílým písmem.

### Logo
Použij **`VLkLogoNewPruhledny.png`** (kresba vlka v kruhu, průhledné pozadí;
zdroj: `…\Web\VLkLogoNewPruhledny.png`). V banneru ho posaď na **světlý krémový
kruh**, ať tmavá kresba na zelené vynikne:

```css
.brand-logo{ width:48px; height:48px; border-radius:50%; background:#F4F2EA;
  display:grid; place-items:center; overflow:hidden; box-shadow:0 0 0 1px rgba(255,255,255,.35); }
.brand-logo img{ width:100%; height:100%; object-fit:contain; }
```
Použij ho i jako **favicon** webu.

---

## 1) Menu — na jednu řádku, bez „Rubrics"

Nové menu (Vzhled → Menu), přesně tyto položky v tomto pořadí:

**`Blog` · `Wild` · `Galerie ▾` · `Hornclass` · `About`**

- **Zruš** položku/skupinu **„Rubrics"** (nadřazenou rubriku portfolia).
- **`Galerie ▾`** je rozbalovací (dropdown); pod ní dej všechny galerie
  KROMĚ Wild:
  `Zoo · Landscape · Horse Racing · Cyklotoulky · Mix · Pavouci · Španělsko · Helgoland`
- **`Wild`** zůstává samostatně jako vlajková loď (viz bod 4).
- **`Blog`** = domovská stránka (viz bod 2). **`About`** = životopis (viz bod 3).
- Menu **nesmí zalamovat** na dvě řádky. Zajisti to takto: méně položek (viz výše),
  menší mezery, a na užších obrazovkách klasické „hamburger" menu.
- Sociální ikony (Facebook, Zonerama, Instagram) ponech – v hlavičce vpravo
  nebo v patičce.

---

## 2) Blog jako domovská stránka

- Nastavení → Zobrazování (Reading) → Vaše domovská stránka zobrazuje →
  **Příspěvky** (nebo statická stránka „Blog"). Domovská = blog.
- První obrazovka (hero): velký náhled **nejnovějšího článku** (velká fotka +
  nadpis + krátký perex), ne prázdný banner. **Maximálně využij první obrazovku** –
  ať návštěvník hned vidí fotku a titulek bez scrollování.

---

## 3) Stránka About (přesun životopisu)

- Vytvoř stránku **About** a přesuň na ni stávající text „About the author"
  (teď je na Home). Přidej portrét/logo vlka.
- Dvojjazyčně: český odstavec, pod ním anglický (anglický text už existuje).

---

## 4) Stránka Wild — po zemích, mřížka 3 sloupce, lightbox jen šipky

Chování:
- Nahoře **řada názvů zemí** jako **vnitřní odkazy (kotvy)** na téže stránce:
  `Kostarika · Madagaskar · Botswana · Brazílie – Pantanal` (a další, jak přibudou).
- Pod tím pro každou zemi: **nadpis země** + **mřížka miniatur ve 3 sloupcích**
  (řádků dle počtu). Miniatury se **neořezávají ani nedeformují** (přirozený poměr).
- Klik na miniaturu → zobrazení ve **web rozlišení** (`_web.jpg`).
- V zobrazení se přesouvá **pouze šipkami ◄ ►**, a to **jen v rámci dané země**.
  Zavření křížkem, klávesou Esc nebo klikem mimo obrázek.

Hotový soběstačný kód (vlož jako Custom HTML blok / šablonu stránky Wild).
Doplň jen URL nahraných `_web.jpg` a popisky do polí `data-*`:

```html
<div class="wild">
  <nav class="wild-jump">
    <a href="#kostarika">Kostarika</a>
    <a href="#madagaskar">Madagaskar</a>
    <a href="#botswana">Botswana</a>
    <a href="#pantanal">Brazílie – Pantanal</a>
  </nav>

  <!-- === JEDNA ZEMĚ – zkopíruj celý blok pro každou zemi === -->
  <section id="botswana" class="wild-country" data-country="Botswana">
    <h2>Botswana</h2>
    <div class="wild-grid">
      <!-- Jedna fotka: data-full = velký _web.jpg, data-cap = popisek druhu -->
      <img src="URL/7H3A7790_web.jpg"
           data-full="URL/7H3A7790_web.jpg"
           data-cap="slon africký – African elephant (Loxodonta africana)"
           alt="slon africký" loading="lazy">
      <!-- ...další fotky Botswany... -->
    </div>
  </section>
  <!-- === /ZEMĚ === -->

</div>

<!-- Lightbox (jeden pro celou stránku) -->
<div class="wild-lb" id="wildLb" aria-hidden="true">
  <button class="wild-lb-close" aria-label="Zavřít">&times;</button>
  <button class="wild-lb-nav left"  aria-label="Předchozí">&#10094;</button>
  <img class="wild-lb-img" id="wildLbImg" src="" alt="">
  <div class="wild-lb-cap" id="wildLbCap"></div>
  <button class="wild-lb-nav right" aria-label="Další">&#10095;</button>
</div>

<style>
  .wild-jump{ display:flex; flex-wrap:wrap; gap:14px; justify-content:center;
    padding:14px; background:var(--green-tint); border-radius:10px; margin-bottom:24px; }
  .wild-jump a{ font-weight:700; color:var(--green-dark); }
  .wild-country{ margin-bottom:40px; scroll-margin-top:90px; }
  .wild-country h2{ text-align:center; }
  .wild-grid{ display:grid; grid-template-columns:repeat(3,1fr); gap:16px; }
  .wild-grid img{ width:100%; height:auto; display:block; cursor:pointer;
    border:3px solid var(--green-tint); border-radius:6px; transition:transform .2s; }
  .wild-grid img:hover{ transform:scale(1.02); }
  @media(max-width:700px){ .wild-grid{ grid-template-columns:repeat(2,1fr); } }

  .wild-lb{ display:none; position:fixed; inset:0; z-index:9999;
    background:rgba(0,0,0,.92); align-items:center; justify-content:center; }
  .wild-lb.open{ display:flex; }
  .wild-lb-img{ max-width:88%; max-height:82%; object-fit:contain; }
  .wild-lb-cap{ position:fixed; bottom:22px; left:0; right:0; text-align:center;
    color:#fff; font:italic 13px/1.4 Arial, Helvetica, sans-serif; padding:0 20px; }
  .wild-lb-nav{ position:fixed; top:50%; transform:translateY(-50%);
    background:none; border:0; color:#fff; font-size:44px; cursor:pointer; padding:10px; }
  .wild-lb-nav.left{ left:16px; } .wild-lb-nav.right{ right:16px; }
  .wild-lb-close{ position:fixed; top:14px; right:20px; background:none; border:0;
    color:#fff; font-size:38px; cursor:pointer; }
</style>

<script>
(function(){
  var lb=document.getElementById('wildLb'),
      lbImg=document.getElementById('wildLbImg'),
      lbCap=document.getElementById('wildLbCap'),
      group=[], idx=0;

  function show(i){ idx=(i+group.length)%group.length;
    var el=group[idx];
    lbImg.src=el.getAttribute('data-full')||el.src;
    lbCap.textContent=el.getAttribute('data-cap')||'';
  }
  document.querySelectorAll('.wild-country').forEach(function(sec){
    var imgs=Array.prototype.slice.call(sec.querySelectorAll('.wild-grid img'));
    imgs.forEach(function(img){
      img.addEventListener('click',function(){ group=imgs; show(imgs.indexOf(img));
        lb.classList.add('open'); lb.setAttribute('aria-hidden','false'); });
    });
  });
  function close(){ lb.classList.remove('open'); lb.setAttribute('aria-hidden','true'); }
  document.querySelector('.wild-lb-close').onclick=close;
  document.querySelector('.wild-lb-nav.left').onclick=function(){ show(idx-1); };
  document.querySelector('.wild-lb-nav.right').onclick=function(){ show(idx+1); };
  lb.addEventListener('click',function(e){ if(e.target===lb) close(); });
  document.addEventListener('keydown',function(e){
    if(!lb.classList.contains('open'))return;
    if(e.key==='Escape')close();
    if(e.key==='ArrowLeft')show(idx-1);
    if(e.key==='ArrowRight')show(idx+1);
  });
})();
</script>
```

---

## 5) Galerie — přidat Pavouci, Španělsko, Helgoland

- Přidej tři nové galerie **Pavouci**, **Španělsko**, **Helgoland** (stejný typ
  jako stávající Zoo/Landscape…), zařaď je do dropdownu **Galerie**.
- Stejný vzhled miniatur (3 sloupce, bez ořezu) a stejný lightbox jako u Wild.
- Fotky = obsah příslušných složek `Web` (`*_web.jpg`) po nahrání do médií.

---

## 6) Popisky druhů pod fotkami

- Popisky přicházejí v metadatech fotek (IPTC „Caption") a WordPress je při
  nahrání načte do pole **Popisek (Caption)** média. U galerií/Wild zobraz tento
  popisek **pod obrázkem**.
- Formát je už dvojjazyčný: `český – anglický (latinský)`.
- Styl popisku – přesně takto:

```css
.wp-caption-text, figcaption, .wild-lb-cap{
  font:italic 11pt/1.35 Arial, Helvetica, sans-serif;
  color:var(--muted);
  text-align:left;
  margin-top:6px;
}
```

---

## 7) Blog — formát článku (přepínač CZ | EN)

### Princip
Každý článek: **nadpis**, pak střídavě **krátký text → 1–2 fotky → text → fotka…**
Dvojjazyčně s **přepínačem `CZ | EN`** na začátku — zobrazuje se vždy jen jeden jazyk.
Fotky jsou v článku **jen jednou** a nepřepínají se; mění se pouze text okolo nich.
Popisek pod fotkou je sám dvojjazyčný (`český – anglický (latinský)`), takže zůstává
stejný v obou režimech.

### Postup vložení článku (krok za krokem)

1. **Nový příspěvek** (Příspěvky → Přidat nový). Nastav nadpis a kategorii.
2. Klikni **+** → hledej **Vlastní HTML** → vlož tento blok.
3. Do bloku **zkopíruj celý HTML** ze souboru `…-pro-claude.md` (sekce
   „Hotové HTML ke zkopírování"). Soubor obsahuje kompletní `<article>` tag,
   přepínač, odstavce i `<figure>` bloky — **nic neměň, jen doplň URL obrázků**.
4. **URL obrázků:** každý `<img src="DOPLŇ_URL">` nahraď skutečnou adresou
   z Médií. Fotku najdeš podle názvu souboru v tabulce fotek.
   Jak získat URL: Média → klikni na fotku → zkopíruj „URL souboru" z panelu vpravo.
5. **Ruční perex:** v pravém panelu příspěvku rozbal „Výňatek" a vlož perex
   ze souboru (sekce „Perex"). Perex má taky CZ/EN `<span>` tagy.
6. **Uložit koncept → Náhled → zkontrolovat → Publikovat.**

### Kompletní vzor jedné sekce

```html
<article class="lw-post" lang="cs">

  <!-- PŘEPÍNAČ — jen jednou, na začátku článku -->
  <div class="lang-switch" role="group" aria-label="Jazyk / Language">
    <button type="button" data-lang="cs" class="is-active">CZ</button>
    <button type="button" data-lang="en">EN</button>
  </div>

  <!-- SEKCE: český odstavec, anglický odstavec, pak fotka/fotky -->
  <p lang="cs">Český odstavec…</p>
  <p lang="en">English paragraph…</p>

  <!-- FOTKA: figure > img + figcaption, vše uvnitř .photo-card -->
  <figure class="photo-card">
    <img src="https://lonelywolf.cz/wp-content/uploads/2025/XX/7H3A7790_web.jpg"
         alt="slon africký" loading="lazy">
    <figcaption>slon africký – African elephant (Loxodonta africana)</figcaption>
  </figure>

  <!-- další sekce stejným vzorem… -->

</article>
```

### DŮLEŽITÉ: Zobrazení obrázků

Obrázky **MUSÍ** mít tyto CSS vlastnosti, jinak přetečou kartu:

```css
.photo-card img{
  width: 100%;          /* obrázek zabere celou šířku karty */
  height: auto;         /* zachová poměr stran */
  display: block;       /* žádná mezera pod obrázkem */
  border-radius: 8px 8px 0 0;
}
```

**NIKDY** nepoužívej atributy `width="1920"` nebo `height="1280"` přímo na `<img>` —
obrázek by přetekl kartu. Stačí `src`, `alt` a `loading="lazy"`.

**NIKDY** nepoužívej WordPress blok „Obrázek" — ten přidá vlastní obal a rozbije
`.photo-card` styling. Vždy jen **Vlastní HTML** s `<figure class="photo-card">`.

### CSS do globálních stylů (Vzhled → Přizpůsobit → Další CSS)

Vlož JEDNOU, platí pro všechny články:

```css
/* === PŘEPÍNAČ JAZYKŮ === */
.lw-post[lang="cs"] [lang="en"]{ display:none; }
.lw-post[lang="en"] [lang="cs"]{ display:none; }
.lang-switch{ display:flex; gap:6px; justify-content:flex-end; margin:0 0 18px; }
.lang-switch button{ font:700 12px/1 Arial,Helvetica,sans-serif; letter-spacing:.08em;
  padding:7px 12px; border:1px solid var(--green,#35682B); border-radius:999px;
  background:transparent; color:var(--green,#35682B); cursor:pointer; }
.lang-switch button.is-active{ background:var(--green,#35682B); color:#fff; }

/* === FOTKA V KARTĚ === */
.photo-card{
  background:#fff;
  padding:8px;
  border-radius:12px;
  box-shadow:0 8px 20px rgba(31,58,32,.14);
  max-width:900px;
  margin:24px auto;
}
.photo-card img{
  width:100%;
  height:auto;
  display:block;
  border-radius:8px 8px 0 0;
}
.photo-card figcaption{
  font:italic 11pt/1.35 Arial, Helvetica, sans-serif;
  color:var(--muted,#5C6350);
  text-align:left;
  margin-top:6px;
  padding:0 4px 4px;
}

/* === TEXT ČLÁNKU === */
.lw-post{ max-width:960px; margin:0 auto; padding:0 16px; }
.lw-post p{ font-size:11pt; line-height:1.6; margin:0 0 14px; }
```

### JavaScript jednou pro celý web (Vzhled → Přizpůsobit → Další CSS → nebo zápatí)

```js
(function(){
  var KEY='lwLang';
  function apply(lang){
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
})();
```

### Pravidla
- Výchozí jazyk **čeština**; volba se pamatuje (localStorage) a drží po celém webu.
- Bez JavaScriptu se zobrazí **oba** jazyky — nic se nerozbije a vyhledávače indexují obojí.
- Přepínač patří **na začátek článku**, vpravo nad první odstavec.
- Na výpisu blogu (domovská stránka) obal perexy stejně (`<span lang="cs">` /
  `<span lang="en">` uvnitř `.lw-post`), aby se přepínaly také. Použij **ruční perex**,
  ne automatický výtah — ten by HTML odstranil.

Podklady chodí z aplikace **WebEditFotek** jako soubor `…-pro-claude.md`: obsahuje
tabulku s údaji, kompletní HTML ke zkopírování, a perex — viz pokyny v souboru.

Doporučené kategorie blogu podle zemí: Botswana, Madagaskar, Kostarika,
Brazílie – Pantanal, Španělsko, Helgoland, Doma.

---

## 8) Počítadlo návštěv (start 998)

Decentní, do **patičky** domovské stránky. Preferovaně malý PHP snippet
(Code Snippets plugin nebo functions.php):

```php
// Počítadlo návštěv se startovní hodnotou 998
add_shortcode('lw_counter', function () {
    if (!isset($_COOKIE['lw_seen'])) {                 // počítej 1× za relaci
        $n = (int) get_option('lw_visit_count', 998);
        $n++;
        update_option('lw_visit_count', $n);
        setcookie('lw_seen', '1', time() + 3600, '/');
    } else {
        $n = (int) get_option('lw_visit_count', 998);
    }
    return '<span class="lw-counter">Návštěv / Visits: <b>' . $n . '</b></span>';
});
```

Do patičky vlož `[lw_counter]`. Styl decentně:

```css
.lw-counter{ font-size:12px; color:var(--muted); letter-spacing:.03em; }
```

> Když nejde přidat PHP, použij lehký „visitor counter" plugin a nastav
> **startovní/offset hodnotu 998**.

---

## 9) Pořadí prací (doporučené)

1. Paleta a globální CSS (bod 0)
2. Menu + odstranění Rubrics (bod 1)
3. Blog jako home + About (body 2, 3)
4. Stránka Wild (bod 4)
5. Nové galerie (bod 5)
6. Styl popisků (bod 6)
7. Počítadlo (bod 8)
8. Doladění blogu a hero první obrazovky (body 7, 2)

Po každém kroku zkontroluj, že se **menu nezalamuje**, drží se **tmavé písmo na
světlém pozadí** a web funguje na mobilu i na počítači.
