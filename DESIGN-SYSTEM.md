# Sistema de Diseño — Método A.N.N.A.B.E.L.L.

> Extraído del estado actual del tema (`assets/css/main.css` + tokens dinámicos del Customizer en `functions.php`).
> Estética: **lujo oscuro / dorado** — fondos negros, acento dorado, tipografía serif elegante.
> Este documento es la fuente de verdad actual. Úsalo para contrastar con el archivo del diseñador.

---

## 1. Color

### Fondos (escala de profundidad)
| Token | HEX | Uso |
|---|---|---|
| `--black` | `#0A0A0A` | Fondo base del sitio |
| `--black-soft` | `#111111` | Secciones alternas (problema, método, proceso, para_quién) |
| `--black-card` | `#161616` | Tarjetas (precio, fase, acronym, pq, problema-right) |
| — | `#050505` | Footer (más oscuro que el body) |
| — | `#1A1A1A` / `#161610` | Degradados de tarjetas (bio placeholder, precio featured) |

### Marca — Dorado
| Token | HEX | Uso |
|---|---|---|
| `--gold` | `#C9A84C` | Acento principal: botones, líneas, números, labels |
| `--gold-light` | `#E8C97A` | Hover, citas, degradados, badges |
| `--gold-dark` | `#9A7A2E` | Definido, uso puntual / reservado |

> ⚠️ El Customizer trae un default ligeramente distinto para el claro: `#e0c06a` (vs CSS `#E8C97A`). El Customizer gana en runtime. **Unificar.**

### Texto
| Token | HEX | Uso |
|---|---|---|
| `--white` | `#FFFFFF` | Títulos y texto principal |
| `--gray-light` | `#CCCCCC` | Texto de cuerpo / párrafos |
| `--gray` | `#888888` | Texto secundario, descripciones, captions |

> ⚠️ El Customizer define defaults distintos: blanco `#f5f0e8` y gris `#888888`. **Unificar blanco.**

### Colores semánticos / accent (hardcodeados, NO tokenizados)
| Color | Uso | Recomendación |
|---|---|---|
| `#e05555` | "NO es para ti" (negativo / rechazo) | → crear `--red` / `--negative` |
| `#e0a060` | Badges de "cupos" (urgencia/naranja) | → crear `--amber` / `--urgency` |
| `#25D366` | Botón flotante de WhatsApp (color de marca WA) | dejar fijo (marca externa) |

### Overlays (patrón de transparencias)
- **Dorado:** `rgba(201,168,76, α)` con α = `.05 .06 .08 .1 .12 .15 .2 .25 .3 .35 .4` (bordes, fondos sutiles, glows).
- **Blanco:** `rgba(255,255,255, α)` con α = `.03 .04 .06 .07 .08 .1` (líneas divisorias, fondos de inputs).
- **Negativo:** `rgba(224,160,96,.x)` (cupos) y `rgba(255,80,80,.1)` (borde "no").

---

## 2. Tipografía

### Familias
| Token | Valor (CSS) | Fallback | Notas |
|---|---|---|---|
| `--font-head` | `Playfair Display` | `Georgia, serif` | Customizer default = **Cormorant Garamond** ⚠️ |
| `--font-body` | `Inter` | `system-ui, sans-serif` | |

Fuentes alternativas seleccionables en Customizer:
- Títulos: Cormorant Garamond, Playfair Display, Cinzel, Libre Baskerville, Lora, Raleway
- Texto: Inter, Roboto, Open Sans, Montserrat, Nunito Sans, DM Sans

### Pesos
- **Head:** 400, 600, 700 + *italic 400*
- **Body:** 300 (sub/hero), 400, 500, 600

### Escala de tamaños (rem; base = 16px)
| Rol | Tamaño | Familia / peso |
|---|---|---|
| Hero title | `clamp(2.4, 6vw, 4.2)` | head / 700 |
| Section title | `clamp(1.8, 4vw, 2.8)` | head / 700 |
| CTA title | `clamp(1.8, 4vw, 2.6)` | head / 700 |
| Acronym letter | `3.0` | head / 700 |
| Stat number / precio-value | `2.2` / `2.0` | head / 700 |
| Bio quote | `1.3` | head / italic |
| Hero sub | `1.15` | body / 300 |
| Body / párrafos | `0.9 – 1.0` | body / 400 |
| Microlabels (uppercase) | `0.72 – 0.78` | body / 500-600 |
| Captions / notas | `0.78 – 0.85` | body / 400 |

### Line-height
- Cuerpo base: **1.7** · Párrafos largos: **1.8 – 1.9** · Títulos: **1.15 – 1.2**

### Letter-spacing (rasgo distintivo del sistema)
- Microlabels uppercase: **.2em – .22em**
- Nav / botones: **.06em – .12em**
- Logo: **.12em**
- Patrón recurrente: **labels en MAYÚSCULAS, dorados, pequeños, muy espaciados.**

---

## 3. Espaciado y layout

- **No hay escala de tokens de espaciado**; se usan valores rem ad-hoc.
- Incrementos de facto: `.2 .3 .4 .5 .6 .7 .8 1 1.2 1.5 1.8 2 2.5 3 4 rem`.
- **Sección vertical:** `--section-py: 5rem` (desktop) → `3.5rem` (≤600px).
- **Container:** `max-width: 1100px` (`--max-w`), padding lateral `1.5rem`.
- **Gaps de grid:** tarjetas `1.2rem`, secciones `2–4rem`.
- **Grids principales:** `repeat(auto-fit, minmax(220–240px, 1fr))` para tarjetas; `1fr 1fr` y `1fr 1.4fr` para splits.

> 💡 Oportunidad de unificación: si el diseñador trae una escala (4/8pt), conviene tokenizar `--space-*`.

---

## 4. Bordes, radios y sombras

### Border-radius
| Valor | Uso |
|---|---|
| `2px` | Botones |
| `4px` | Inputs, notas, placeholder bio |
| `6px` | Tarjetas (acronym, fase) |
| `8px` | Tarjetas (precio, pq, problema-right) |
| `12px` | Video, tarjeta testimonio |
| `20px` | Pills (labels, badges, cupos) |
| `50%` | Avatares, iconos circulares, botones de carrusel |

### Bordes
- Línea estándar: `1px solid rgba(255,255,255,.06–.1)`.
- Acento: `1px solid rgba(201,168,76,.15–.4)`.
- Énfasis: `2–3px` dorado sólido (citas `border-left`, avatares).

### Sombras (estilo "flat + glow", muy pocas)
- Video: `0 0 60px rgba(201,168,76,.08), 0 20px 60px rgba(0,0,0,.6)`.
- WhatsApp float: `0 4px 20px rgba(37,211,102,.4)` → hover `0 6px 28px / .55`.
- Filosofía: **sin sombras pesadas**; profundidad por color de fondo y bordes dorados, no por elevación.

---

## 5. Movimiento / animación

| Propiedad | Valor |
|---|---|
| Transición estándar | `.2s – .25s` (color, border, transform) |
| Transición lenta | `.3s` (nav), `.6s` (fade-up) |
| Hover de tarjeta | `transform: translateY(-4px a -5px)` + borde dorado |
| Carrusel | `transform .55s cubic-bezier(.25,.46,.45,.94)` |
| `fade-up` (scroll) | `opacity 0→1`, `translateY(30px→0)`, `.6s ease` (vía IntersectionObserver) |
| `@keyframes float` | partículas hero, `±10px`, `4s` infinito |

---

## 6. Breakpoints

| Ancho | Cambios |
|---|---|
| `≤ 900px` | Grids 2-col → 1-col; aparece menú móvil (hamburguesa); footer 2-col |
| `≤ 782px` | Ajuste de admin-bar de WordPress (`top: 46px`) |
| `≤ 600px` | `--section-py: 3.5rem`; hero stats/CTA en columna; precios/footer/form 1-col |

Z-index: **nav `100`**, **wa-float `99`**.

---

## 7. Componentes (inventario)

| Componente | Clase base | Variantes / notas |
|---|---|---|
| Botón | `.btn` | `.btn-gold` (relleno→hover invertido), `.btn-outline`, `.btn-lg`, `.btn-full`. Mayúsculas, radius 2px |
| Nav | `.site-nav` | `.scrolled` (fondo opaco al hacer scroll), `.nav-toggle` móvil |
| Hero | `.hero` | `.hero-label` (pill), `.hero-title` (con `<em>` dorado), `.hero-stats`, partículas |
| Encabezado de sección | `.section-label` + `.section-title` + `.section-desc` | Patrón repetido en todas las secciones |
| Tarjeta acrónimo | `.acronym-card` | Letra grande dorada + palabra + descripción |
| Tarjeta fase | `.fase-item` | Número en círculo + título + descripción |
| Tarjeta precio | `.precio-card` | `.featured` (borde dorado + degradado), `.precio-badge`, precio tachado |
| Caja Sí/No | `.pq-box.yes` / `.no` | Dorado vs rojo `#e05555` |
| Testimonio | `.testimonio-card` | Carrusel con dots, flechas, swipe; avatar con iniciales fallback |
| Formulario | `.form-control` | Fondo translúcido, focus dorado, labels uppercase |
| Divisor | `.gold-divider` | Línea dorada degradada, `opacity .3`, entre secciones |
| WhatsApp float | `.wa-float` | Verde `#25D366`, fijo abajo-derecha |
| Footer | `.site-footer` | 3-col → 2 → 1, fondo `#050505` |

---

## 8. Notas para la unificación con el diseñador

Puntos donde **hay doble fuente de verdad** o falta tokenizar (revisar contra el archivo del diseñador):

1. **Dorado claro:** CSS `#E8C97A` vs Customizer `#e0c06a`. Elegir uno.
2. **Blanco:** CSS `#FFFFFF` vs Customizer `#f5f0e8`. Elegir uno.
3. **Fuente de títulos:** CSS `Playfair Display` vs Customizer default `Cormorant Garamond`. Elegir uno.
4. **Colores semánticos sin token:** `#e05555` (negativo) y `#e0a060` (urgencia/cupos) están hardcodeados → conviene crear `--negative` y `--urgency`.
5. **Sin escala de espaciado tokenizada:** si el diseñador usa una grilla 4/8pt, definir `--space-*`.
6. **Sin tokens de radius/shadow:** valores sueltos repetidos → podrían volverse `--radius-sm/md/lg` y `--shadow-*`.

> Cuando me pases el archivo del diseñador, comparo ambos y propongo un set de tokens unificado (qué se mantiene, qué cambia, qué se añade).
