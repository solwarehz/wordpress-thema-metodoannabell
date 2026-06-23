# Sistema de Diseño — Método Annabell

## Fuente única de verdad visual (web + diseño gráfico)

> Este documento unifica tipografías, colores, tamaños, componentes y estilo gráfico para que **la landing, las piezas de redes y cualquier material** se vean idénticos. Si algo no está aquí, no se usa. Basado en el material gráfico del cliente (`datos-cliente/`) + `metodo-annabell-brand.json`.

---

## 1. Esencia de marca

| Elemento | Valor |
|----------|-------|
| Nombre | **Método Annabell** |
| Wordmark | MÉTODO **ANNABELL** (ANNABELL en serif oro) |
| Tagline | *De autoempleado a empresario.* |
| Pilares | Liderazgo · Estrategia · Sistemas · Resultados |
| Frase ancla | *No se trata de trabajar más. Se trata de construir mejor.* |
| Personalidad | Premium · ejecutivo · firme · humano. Lujo sobrio, no recargado. |
| Tono de voz | Directo, retador, ejecutivo. Frases cortas y potentes. Acción y resultados medibles. Nada académico, vago ni motivacional genérico. |

---

## 2. Logo y wordmark

- **Insignia:** círculo negro, borde dorado, flecha/gráfico ascendente al centro.
- **Wordmark:** "MÉTODO" en sans tracking amplio (blanco) + "ANNABELL" en serif mayúsculas con gradiente oro. Debajo, línea fina + "DE AUTOEMPLEADO A EMPRESARIO" en mayúsculas espaciadas.
- **Área de protección:** dejar alrededor del logo un margen mínimo = altura de la letra "A" del wordmark.
- **Tamaño mínimo:** 120 px de ancho en web; 24 mm en impreso.
- **Fondos permitidos:** negro (`#0A0A0A`) o blanco. Sobre foto, siempre con overlay oscuro para garantizar contraste.
- **No hacer:** deformar, cambiar colores, poner el oro sobre fondos claros saturados, añadir sombras duras.

---

## 3. Color

### Paleta (tokens)

| Token | HEX | RGB | Rol |
|-------|-----|-----|-----|
| `--negro` | `#0A0A0A` | 10,10,10 | Fondo principal, lienzo |
| `--carbon` | `#161616` | 22,22,22 | Tarjetas, capas, secciones alternas |
| `--carbon-2` | `#2C2C2C` | 44,44,44 | Bordes sutiles, sombras, profundidad |
| `--oro` | `#D4AF37` | 212,175,55 | **Acento principal:** CTA, palabras clave, bordes, íconos |
| `--oro-claro` | `#E8D4A8` | 232,212,168 | Gradiente alto del wordmark, detalles sutiles, overlays |
| `--oro-profundo` | `#B8860B` | 184,134,11 | Gradiente bajo, hover, sombra del oro |
| `--blanco` | `#FFFFFF` | 255,255,255 | Texto principal sobre oscuro, máximo contraste |
| `--gris-texto` | `#C9C9C9` | 201,201,201 | Texto secundario, párrafos largos |

### Valores para impresión (diseño gráfico)
- Oro `#D4AF37` → CMYK aprox. **0 / 17 / 74 / 17** (o tinta dorada Pantone 871/872 metálico si es impreso premium).
- Negro `#0A0A0A` → CMYK **0 / 0 / 0 / 96** (negro rico: 40/30/30/100 para grandes áreas impresas).

### Gradiente oro (wordmark, botones, líneas decorativas)
```css
linear-gradient(180deg, #E8D4A8 0%, #D4AF37 45%, #B8860B 100%)
```
Para líneas/divisores finos: gradiente horizontal del mismo oro, 1–2px.

### Reglas de uso del color
- **Regla 70/25/5:** ~70% negro, ~25% blanco/gris (texto y respiro), ~5% oro (acentos). El oro **acentúa, no rellena.**
- Oro = lujo y jerarquía: solo títulos clave, una palabra resaltada por frase, bordes, CTA e íconos. Nunca párrafos largos en oro.
- Texto sobre negro: blanco (principal) o gris `#C9C9C9` (secundario). Nunca oro para leer párrafos.
- Contraste mínimo AA: cuerpo en blanco/gris sobre negro siempre cumple.

---

## 4. Tipografía

Sistema de **3 niveles**. Cada uno tiene un rol fijo; no se intercambian.

| Nivel | Fuente | Fallback web | Rol |
|-------|--------|--------------|-----|
| **Display / Wordmark** | **Cinzel** (alt: Playfair Display) | `Georgia, serif` | Wordmark "ANNABELL", frases elegantes destacadas. Serif, MAYÚSCULAS, tracking amplio, oro. |
| **Titular / Impacto** | **Oswald** (alt: Anton) | `Arial Narrow, sans-serif` | H1, H2, etiquetas de fase. Sans condensada, bold/semibold, MAYÚSCULAS. |
| **Cuerpo** | **Lato** (alt: Inter) | `Helvetica, Arial, sans-serif` | Párrafos, listas, subtítulos, FAQ, formulario. Regular 400, Semibold 600 para énfasis. |

> Todas son Google Fonts (gratis) → unidad garantizada entre web y diseño. En Canva/Illustrator usar exactamente estos nombres.

**Import web:**
```html
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Oswald:wght@500;600;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
```

### Escala tipográfica — WEB (desktop / mobile)
| Estilo | Fuente | Peso | Tamaño | Line-height | Tracking |
|--------|--------|------|--------|-------------|----------|
| Eyebrow / micro | Oswald | 600 | 14 / 12 px | 1.2 | +3px MAYÚS |
| H1 hero | Oswald | 700 | 64 / 34 px | 1.05 | 0 |
| H2 sección | Oswald | 600 | 44 / 26 px | 1.1 | 0 |
| H3 tarjeta | Oswald | 600 | 24 / 20 px | 1.2 | +0.5px |
| Frase elegante | Cinzel | 700 | 40 / 24 px | 1.2 | +2px |
| Subhead | Lato | 700 | 22 / 17 px | 1.4 | 0 |
| Cuerpo | Lato | 400 | 18 / 16 px | 1.6 | 0 |
| Botón CTA | Oswald | 700 | 18 / 16 px | 1 | +1px MAYÚS |
| Nota / legal | Lato | 400 | 13 / 12 px | 1.5 | 0 |

### Escala tipográfica — DISEÑO GRÁFICO (lienzo 1080×1350 Instagram 4:5)
| Estilo | Fuente | Tamaño aprox. |
|--------|--------|---------------|
| Wordmark ANNABELL | Cinzel | 90–130 px |
| Titular de pieza | Oswald 700 | 110–160 px |
| Subtítulo | Oswald 600 / Lato 700 | 48–64 px |
| Texto de fase / bullet | Lato 400 | 34–42 px |
| Etiqueta (FASE 1, precio) | Oswald 600 | 30–40 px |
| Nota al pie | Lato 400 | 24–28 px |

> Regla de escalado: el titular de una pieza ocupa ~1/3 del alto; el oro nunca supera ~5% del área.

---

## 5. Espaciado y layout

- **Unidad base:** 8px. Todos los márgenes/padding son múltiplos (8, 16, 24, 32, 48, 64, 96).
- **Ancho de contenido web:** 1140px centrado. Padding lateral mobile: 24px.
- **Ritmo entre secciones:** 96px desktop / 56px mobile.
- **Grid de diseño (piezas):** márgenes de seguridad de 80px en lienzo 1080; nada importante fuera de esa zona.
- **Respiro:** apuntar a 70–80% de área "limpia". El contenido respira; no se satura.

---

## 6. Componentes

### Botón primario (CTA)
- Fondo: gradiente oro (§3). Texto: `#0A0A0A`, Oswald 700, MAYÚS, +1px tracking.
- Alto 56px, padding horizontal 32px, radio 8px.
- Hover: brillo +8%, sombra `0 6px 24px rgba(212,175,55,.35)`.

### Botón secundario
- Fondo transparente, borde 1px `#D4AF37`, texto oro. Hover: relleno oro 10%.

### Tarjeta
- Fondo `#161616`, borde 1px `rgba(212,175,55,.30)`, radio 12px, padding 32px.
- Ícono superior en círculo con borde oro. Título Oswald, cuerpo Lato gris.

### Badge / chip
- Fondo transparente o `#161616`, borde oro 1px, texto oro Oswald 600, 12–14px, MAYÚS, padding 8×16, radio 999px.
- Uso: "APERTURA OFICIAL DE CUPOS", "SOLO 2 CUPOS POR MES".

### Divisor
- Línea 1–2px con gradiente oro, ancho 48–80px, centrada. Marca separación elegante entre bloques.

### Íconos
- Estilo **lineal (outline), trazo fino, oro**, dentro de círculo con borde oro. Coherentes en grosor.
- Set sugerido: Lucide / Feather (line icons) tintados en `#D4AF37`. Nunca íconos rellenos multicolor.

---

## 7. Fotografía e imagen

- **Estilo:** cinematográfico, oscuro, elegante. Personas reales en entornos profesionales (oficina, clínica), mirada segura.
- **Tratamiento:** bajar exposición, sombras profundas, leve viñeta. Sobre la foto, **overlay negro 40–70%** para que el texto y el oro resalten.
- **Encuadre:** dejar zona negativa (lado izquierdo o inferior) para el texto.
- **Evitar:** stock genérico colorido, fondos claros saturados, filtros cálidos exagerados.

---

## 8. Tokens listos para web (CSS)

```css
:root{
  /* Color */
  --negro:#0A0A0A; --carbon:#161616; --carbon-2:#2C2C2C;
  --oro:#D4AF37; --oro-claro:#E8D4A8; --oro-profundo:#B8860B;
  --blanco:#FFFFFF; --gris-texto:#C9C9C9;
  --grad-oro:linear-gradient(180deg,#E8D4A8 0%,#D4AF37 45%,#B8860B 100%);

  /* Tipografía */
  --font-display:'Cinzel',Georgia,serif;
  --font-titular:'Oswald','Arial Narrow',sans-serif;
  --font-cuerpo:'Lato',Helvetica,Arial,sans-serif;

  /* Escala (desktop) */
  --fs-h1:64px; --fs-h2:44px; --fs-h3:24px;
  --fs-elegante:40px; --fs-subhead:22px; --fs-body:18px;
  --fs-eyebrow:14px; --fs-btn:18px; --fs-nota:13px;

  /* Espaciado */
  --space-1:8px; --space-2:16px; --space-3:24px;
  --space-4:32px; --space-6:48px; --space-8:64px; --space-12:96px;
  --content-width:1140px; --radius:12px; --radius-btn:8px;
}
```

---

## 9. Checklist de unidad (antes de publicar cualquier pieza o sección)

- [ ] ¿Usa solo los colores de §3? (oro como acento, no relleno)
- [ ] ¿Tipografías = Cinzel / Oswald / Lato en su rol correcto?
- [ ] ¿El oro ocupa ≤ ~5% del área?
- [ ] ¿Texto de lectura en blanco/gris, nunca en oro?
- [ ] ¿Respiro 70–80%, sin saturar?
- [ ] ¿Wordmark con área de protección y sobre fondo válido?
- [ ] ¿Íconos lineales oro, mismo grosor?
- [ ] ¿Fotos oscuras con overlay y zona para texto?

---

**Versión:** 1.0 · 2026-06-20 · Aplica a: landing VSL, redes (4:5 / 1:1 / 9:16), email, presentaciones.
