# LonelyWolfWeb

Zdroje a záloha webu **[lonelywolf.cz](https://lonelywolf.cz)** — fotografie divoké
přírody, Jana Pavlíková (Lonely Wolf Photographer).

WordPress + šablona Inspiro. Tento repozitář **není** běžící web; je to záloha
obsahu a zdroj pravdy pro texty, popisky a vzhled.

## Co tu je

| cesta | co to je |
|---|---|
| `lonelywolf-styly.css` | Kompletní Additional CSS webu. **Jediný zdroj vzhledových úprav.** Vkládá se do Vzhled → Přizpůsobit → Další CSS. |
| `blogs/*.md` | Zdrojové texty článků (CZ + EN, perex, seznam fotek). Generuje je aplikace WebEditFotek. |
| `captions/*.csv` | Popisky druhů k fotkám, formát `filename;cz;en;latin`. Název souboru = složka fotek. |
| `backup/` | Export snippetů, inventura pluginů a menu, README k záloze. |
| `docs/` | `WORDPRESS-BRIEF.md` (zadání vzhledu a struktury) + instrukce pro Claudea ve WordPressu. |

## Co tu NENÍ a proč

- **Databázový dump (SQL)** — z wp-adminu ho nejde získat; jen z hostingu nebo pluginem UpdraftPlus.
- **Fotografie** — originály jsou na disku, web verze umí znovu vyrobit WebEditFotek. Do gitu binárky nepatří.
- **Soubory šablony a pluginů** — dají se stáhnout znovu, verze jsou v `backup/inventura.txt`.
- **WXR export obsahu** (`.xml`, ~2 MB) — ukládá se lokálně do `Web\Backups\<datum>\`; sem se nedává, aby repozitář nerostl o binárku při každé záloze.

## Stav (2. 8. 2026)

Publikovaných článků 9: Hroši, Šelmy, Sloni, Zoborožci, Rys iberský,
Na Madagaskaru by chtěl žít každý!, Lemur na kmíně, Brokesie, Sevillské chrliče —
všechny dvojjazyčně (CZ/EN) včetně perexů.

Galerie: Kostarika, Zoo, Landscape, Horse Racing, Cyklotoulky, Mix, Pavouci,
Španělsko, Helgoland.

**Dvojjazyčnost** neřeší jazykový plugin, ale přepínač `CZ | EN` uvnitř článku:
oba jazyky jsou v HTML, viditelný je vždy jeden, volba se pamatuje v localStorage
a přes `data-lwlang` na `<html>` se přepínají i perexy ve výpisu. JS je ve
WordPressu v pluginu Code Snippets (viz `backup/snippet-7-*.php`).

**Fonty** Lora + Source Sans 3 jsou nahrané lokálně na server
(`wp-content/uploads/fonts/`), nic se netahá z Googlu.

## Související

- **WebEditFotek** — nástroj na zmenšování fotek, popisky druhů a generování
  podkladů článků: [pavlikovajG-PRAKTIK-AI/WebEditFotek](https://github.com/pavlikovajG-PRAKTIK-AI/WebEditFotek)
