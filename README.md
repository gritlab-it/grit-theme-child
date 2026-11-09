# Grit Child Theme

Versione V.26.11. Richiede il tema padre nella cartella `grit-theme`.

## Installazione

1. Installa il padre in `wp-content/themes/grit-theme` e il child in `wp-content/themes/grit-theme-child`.
2. Attiva **GRIT Theme Child** da Aspetto → Temi.
3. Inserisci le personalizzazioni nel child.

WordPress carica automaticamente prima il `functions.php` del child e poi quello del padre. Non copiare il `functions.php` del padre nel child e non includerlo manualmente: provocherebbe dichiarazioni duplicate.

## Stili

Aggiungi il CSS in `style.css`, sotto l'intestazione del tema. Il child lo carica dopo i fogli `style`, `main` e `custom` del padre. La versione usa la data di modifica del file per aggiornare l'URL quando cambia il CSS.

Non occorre ricopiare i fogli del padre. Il CSS del child segue le normali regole di specificità della cascata.

## Template Twig e PHP

Per modificare un template Twig, copialo nel child mantenendo il percorso relativo, ad esempio:

- `templates/headers/header_1.twig`
- `templates/footers/footer_1.twig`
- `templates/sections/section_text.twig`
- `templates/page.twig`

Timber cerca prima nel child e usa il padre per i file non presenti. Sono supportate anche le cartelle `views` previste dal padre.

Per i controller PHP, usa la gerarchia WordPress: ad esempio `page.php`, `single.php` o `archive.php` nella radice del child. Il padre aggiornato rispetta anche un `archive.php` del child quando il blog passa da `index.php`.

I moduli elencati in `$grit_includes` del padre supportano override nello stesso percorso `core/...`. Un modulo copiato sostituisce quello del padre interamente: preferisci hook e filtri in `functions.php` per modifiche circoscritte. Le funzioni del padre non sono generalmente sostituibili dichiarandone una con lo stesso nome nel child.

## Risorse aggiuntive

Le librerie, i CSS e i JavaScript condivisi continuano a provenire dal padre. Copiare un file in `assets` del child non lo carica e non sostituisce automaticamente quello del padre: registra esplicitamente le risorse aggiuntive da `functions.php` con handle univoci e le dipendenze necessarie.

Eccezione prevista dal padre: `assets/maps/style.json` nel child sostituisce la palette delle mappe.

Il child può definire `GRIT_AGENCY` prima del caricamento del padre, usando una delle agenzie presenti in `assets/credits/credits.json` del padre.

## Impostazioni e aggiornamenti

Le impostazioni del Customizer sono associate al tema attivo. Passando dal padre al child, non presumere che logo, menu assegnati e opzioni vengano copiati automaticamente. Controllali in Aspetto → Personalizza.

Mantieni gli override limitati ai file necessari e confrontali con il padre dopo un aggiornamento. Non rieseguire la configurazione iniziale del tema su un sito popolato solo per attivare il child.

## Licenza

MIT; vedi `LICENSE`.
