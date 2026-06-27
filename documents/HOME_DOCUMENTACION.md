# Documentación — Rediseño de la Home (Método Annabell)

> Tema: **Método ANNABELL** (v1.4.0) · Página principal (`front-page.php`)
> Trabajo realizado: junio 2026. Repo: `solwarehz/wordpress-thema-metodoannabell` (rama `main`).

Este documento resume **todo lo que se construyó** en la home, **cómo editarlo** sin tocar código, y la **arquitectura técnica** para futuros cambios.

---

## 1. Resumen de lo trabajado

| # | Trabajo | Commit |
|---|---------|--------|
| 1 | Fix del dorado: `<span class="gold">` se conserva al editar | `2df9f04` |
| 2 | Hero rediseñado: líneas, marco de foto, cards con íconos | `580086d`, `142f9ff` |
| 3 | Sección ③ Historia: tarjetas numeradas + cifras | `b070990`, `f4b093c` |
| 4 | Botones de Fotografía y Podcast editables | `edf98de` |
| 5 | Sección ⑩ El Método: foto difuminada + cards con íconos | `5e7ebf5` |
| 6 | Todos los carruseles en bucle infinito (seamless) + lightbox | `f4b093c`, `5e7ebf5` |

---

## 2. Guía de edición (sin código)

Todo se edita en **Apariencia → Personalizar → 🏠 Página Principal (Autoridad)**.

### 2.1. Fragmentos HTML reutilizables

Se pueden **pegar en cualquier título, texto o etiqueta** de la home:

| Quieres… | Pega esto |
|----------|-----------|
| Texto **dorado** | `<span class="gold">tu texto</span>` |
| **Salto de línea** | `<br>` |
| **Línea corta** dorada (decorativa) | `<span class="linea"></span>` |
| **Línea con diamante ✦** | `<span class="linea-d"></span>` |

> ⚠️ Importante: para que el `<span>` se quede al guardar, el archivo `inc/home-fields.php`
> debe estar actualizado en el servidor. Si lo pegas y desaparece, es que el servidor
> aún tiene el código viejo (ver sección 5, Despliegue).

### 2.2. Campos editables por sección

- **② Hero:** etiqueta, título, texto, 2 botones (texto+enlace), foto/retrato, y **6 tarjetas** (ícono SVG + título + descripción).
- **③ Su historia:** etiqueta, título, texto, frase, **7 tarjetas de trayectoria** (foto 4:3 + título + texto, número automático 1–7) y **4 cifras** (número + etiqueta).
- **④ Fotografía:** etiqueta, título, texto, **botón (texto + enlace)**, carrusel de fotos/videos.
- **⑤ Goldent:** etiqueta, título, texto, botón (texto + enlace), carrusel.
- **⑥ Ponencias:** etiqueta, título, intro, carrusel.
- **⑦ Podcast:** etiqueta, título, intro, **botón (texto + enlace)**, carrusel.
- **⑧ Reconocimientos:** etiqueta, título, texto, carrusel.
- **⑨ Conecta (redes):** título + hasta 8 redes (el logo se detecta solo por la URL).
- **⑩ El Método:** etiqueta, título, texto, **foto grande vertical**, **8 íconos SVG** (uno por letra A·N·N·A·B·E·L·L), botón.

---

## 3. Secciones rediseñadas (detalle)

### 3.1. Hero (②)
- Retrato con **marco dorado** (borde + filo interior).
- Botones del hero con **flecha →**.
- **Cards de autoridad** debajo (hasta 6): cada una con **ícono SVG** (pegado, no imagen — hereda el oro vía `currentColor`), título y descripción. En carrusel con autoplay.
- Defaults: Empresaria · Líder de equipos · Mentora · Estratega.

### 3.2. Su historia (③)
- **Carrusel de hasta 7 tarjetas numeradas** (círculo dorado con el número, automático según el orden).
- Cada tarjeta: **foto 4:3 + título + texto**.
- Defaults: las 7 etapas (Mis raíces → Mi misión hoy).
- Debajo, las **4 cifras** (6× · +5,000 · 2 · +15 años).

### 3.3. El Método (⑩)
- **Foto vertical grande a la izquierda (40%)**, a toda la altura, **difuminada hacia el negro** (sin marco sólido).
- Contenido a la derecha **montado sobre la foto**: título con **puntos dorados**, párrafo, carrusel de **8 tarjetas A·N·N·A·B·E·L·L** (letra en Cinzel + palabra + **ícono SVG editable** + texto) y botón con flecha.

---

## 4. Sistema de carruseles

Todos los carruseles de la home usan **`assets/js/carousel.js`** (sin librerías).

- **Responsive:** 3 visibles en desktop, 2 en tablet, 1 en móvil.
- **Bucle infinito (seamless):** todos llevan `data-loop="seamless"`. Clonan ítems y al
  llegar al final **saltan sin que se note** → movimiento continuo, sin rebobinado.
- Flechas, dots, swipe táctil y **pausa al pasar el mouse**.
- **Lightbox** (`assets/js/lightbox.js`): las fotos se amplían y los videos se abren en
  popup. Usa **delegación de clicks** y **excluye los clones** (marcados con `aria-hidden`)
  para no duplicar la galería.

---

## 5. Despliegue (IMPORTANTE)

> **`git push` NO actualiza el sitio en vivo.** No hay auto-deploy desde GitHub.

Producción es **metodoannabell.com** en **Hostinger**. Tras pushear a GitHub:

1. Subir los archivos cambiados a Hostinger (hPanel → Administrador de archivos, o
   WordPress → Apariencia → Editor de archivos de tema, o SFTP), en la carpeta del tema.
2. Purgar **SpeedyCache** (caché de páginas).

**Truco para saber si un PHP nuevo ya está vivo:** mirar la etiqueta de un campo en el
Personalizador; si muestra el texto viejo, el archivo no se subió.

**Los textos que edita el cliente viven en la base de datos** (no en el código), así que un
push de código nunca los pisa — pero tampoco los restaura.

---

## 6. Arquitectura técnica (para devs)

### Archivos clave
- `front-page.php` — plantilla de la home (markup por sección).
- `inc/home-fields.php` — Customizer + helpers + defaults (`home_defaults()`).
- `assets/css/home.css` — estilos (scopeados a `.home-page` / `.home-hero` / `.home-metodo`).
- `assets/js/carousel.js`, `assets/js/lightbox.js`, `assets/js/reveal.js`.

### Helpers principales (`inc/home-fields.php`)
- `home_f($name, $default)` — valor del Customizer o default centralizado.
- `home_img($name)` — URL de imagen (escapada).
- `home_kses_svg($svg)` — sanitiza un SVG pegado (solo etiquetas de dibujo, sin `<script>`).
- `home_carousel($prefix, $defaults, $aspect)` — carrusel genérico (fotos/videos).
- `home_hero_cards()`, `home_historia_cards()`, `home_metodo_cards()`, `home_metodo_photo()` — bloques específicos.

### Tipos de campo en el Customizer (closure `$add`)
- `html` → guarda con `wp_kses_post` (acepta `<span class="gold">`, `<br>`, líneas).
- `svg` → guarda con `home_kses_svg` (para pegar íconos SVG).
- `text` / `textarea` / `url` / `checkbox` → sanitización estándar.

### Convenciones
- Todo el CSS va **scopeado** (`.home-page …`) para no chocar con plugins.
- Plugins activos: **ACF** (solo en la landing VSL) y **disable-gutenberg**. No interfieren con la home.
- Para texto dorado: clase `.gold` (`color: var(--oro)` = `#D4AF37`).

---

## 7. Changelog detallado

- **`2df9f04`** — fix: el dorado (`<span class="gold">`) se conserva al editar la home
  (títulos/textos/eyebrows pasan a `wp_kses_post`).
- **`580086d`** — feat: rediseño del Hero (líneas `.linea`/`.linea-d`, marco de foto, cards con íconos SVG editables).
- **`142f9ff`** — style: hero — eyebrow y texto de cards más grandes, botones inline con wrap.
- **`b070990`** — feat: sección ③ Historia — carrusel de 7 tarjetas numeradas (quita cifras).
- **`f4b093c`** — feat: cifras debajo de las tarjetas + carrusel en bucle infinito (seamless).
- **`edf98de`** — feat: inputs de texto para los botones de Fotografía y Podcast.
- **`5e7ebf5`** — feat: rediseño ⑩ El Método (foto difuminada + cards con íconos) y bucle infinito en TODOS los carruseles + lightbox con delegación.
