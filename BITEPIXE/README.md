# 🎮 BITEPIXE - Web de Noticias y Análisis de Videojuegos

**BITEPIXE** es una plataforma web diseñada para ofrecer noticias, análisis, rankings y contenido nostálgico del mundo de los videojuegos. Este proyecto se ha desarrollado con PHP, MySQL y CSS personalizado, integrando funcionalidades como sistema de usuarios, login/registro, análisis con plataformas dinámicas y una interfaz moderna y responsive.

---

## 🧩 Tecnologías utilizadas

- PHP 8
- MySQL (phpMyAdmin)
- HTML5
- CSS3 + Bootstrap 5.3
- JavaScript (mínimo)
- Google Fonts + Font Awesome

---

## 📁 Estructura del proyecto


---

## 👥 Funcionalidades principales

- ✔ Registro de usuarios (con cifrado de contraseña y avatar por URL)
- ✔ Inicio de sesión seguro (sesiones y validación)
- ✔ Mostrar avatar y nombre del usuario logueado en el header
- ✔ Sistema de logout con botón circular de apagado
- ✔ Noticias dinámicas cargadas desde base de datos (estilo bento grid)
- ✔ Sección “Memory Card” con recuerdos nostálgicos
- ✔ Módulo de **Análisis**:
  - Tarjetas dinámicas con título, imagen y plataformas
  - Múltiples plataformas por análisis (soporte multivalor en base de datos)
  - Iconos dinámicos que se cargan según las plataformas asociadas
  - Página detallada con título, subtítulo, nota, texto completo, fecha y logos de plataforma
- ✔ Interfaz responsive y diseño visual atractivo (inspirado en estética gaming moderna)

---

## 🗃 Base de datos (MySQL)

### Tabla `usuarios`
| id | nombre | email | password | rol | avatar | fecha_registro |

### Tabla `noticias`
| id | titulo | imagen | texto | fecha |

### Tabla `analisis`
| id | titulo | subtitulo | texto | nota | plataforma | imagen | id_usuario | fecha |

### Tabla `memory_card`
| id | titulo | texto | imagen |

---

## 📌 Mejoras pendientes o futuras funcionalidades
- Subida de imagen real para el avatar (actualmente por enlace externo)
- Sistema de comentarios en análisis
- Backend para gestión de contenido (panel admin)
- Rankings dinámicos
- Sistema de likes o votos en análisis
- Mejoras SEO y accesibilidad

---

## 📸 Capturas (opcional en GitHub)


---

## 💡 Autor
Desarrollado por **Alberto** como proyecto académico y portafolio personal.  
Contacto: bertocover@gmail.com

---

## ⚠️ Notas finales
Este proyecto está en evolución continua y sirve como base para practicar:
- Integración frontend-backend
- Manipulación dinámica de datos con PHP
- Diseño centrado en usuario (UI/UX)

---

¡Gracias por visitar BITEPIXE!
