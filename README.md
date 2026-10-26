# Museo Virtual de Alcaldes de El Progreso

Sitio web que recorre la historia de los alcaldes de El Progreso, Yoro (Honduras), con biografías, galería de imágenes y eventos del museo. Incluye un panel de administración para gestionar el contenido.

## Funcionalidades

**Sitio público**
- Biografía de cada alcalde, con foto y detalle en ventana modal.
- Galería de imágenes.
- Eventos con inscripción en línea.
- Página de contacto.
- Encuesta de satisfacción enviada por correo a los inscritos (PHPMailer + Gmail).

**Panel de administración**
- Inicio de sesión con contraseña cifrada (`password_hash()`).
- Gestión de alcaldes, eventos y galería.
- Lista de inscritos por evento.

## Tecnologías

PHP 8 · MySQL / MariaDB · PHPMailer · HTML · CSS · JavaScript

## Instalación local (XAMPP)

1. Copia la carpeta del proyecto dentro de `htdocs`.
2. En phpMyAdmin crea una base de datos llamada `museo_alcaldes` e importa `Base de datos tablas/museo_alcaldes.sql`.
3. Si tu MySQL usa otro usuario o contraseña, ajústalo en `PHP/config.php`.
4. Abre `http://localhost/PaginaWebAlcaldes/PaginaPrincipal.php`.

### Envío de correos (opcional)

Para enviar la encuesta por correo, copia `PHP/mail_config.example.php` como `PHP/mail_config.php` y escribe tu cuenta de Gmail y una [clave de aplicación](https://myaccount.google.com/apppasswords). Ese archivo está en `.gitignore` para que la clave no se suba al repositorio.

## Usuario de prueba

| Usuario | Contraseña |
|---|---|
| `admin` | `admin123` |
