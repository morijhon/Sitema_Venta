<?php include('../session-check.php'); require_login(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>JSMS - Artículos de Primera Necesidad</title>
  <!-- IMPORTANTE: Reemplaza "test" con tu Client ID real de PayPal -->
  <!-- Para obtener tu Client ID: https://developer.paypal.com/dashboard/applications/sandbox -->
  <script src="https://www.paypal.com/sdk/js?client-id=test&currency=PEN"></script>
  <!-- Fuentes y Font Awesome (mismos que usabas) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,800;0,900;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  <!-- CSS local -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header style="position:fixed;top:0;left:0;right:0;z-index:9999;background:rgba(0,0,0,0.8);color:#fff;backdrop-filter:blur(4px);padding:10px 20px;display:flex;align-items:center;justify-content:space-between;">
  <div style="font-weight:600;font-size:16px;">Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?> 👋</div>
  <div><a href="../logout.php" style="color:#fff;text-decoration:none;padding:8px 12px;border-radius:6px;border:1px solid rgba(255,255,255,0.12);">Cerrar sesión</a></div>
</header>
<style>body{padding-top:64px;}</style>

  
  <header class="header">
    <a href="#home" class="logo"><img src="imagenes\logo1.png" height="90" width="90" style="border-radius: 100px;"></a>

    <nav class="nav" id="nav">
      <ul>
        <li><a href="#home" class="active">Inicio</a></li>
        <li><a href="#about">Nosotros</a></li>
        <li><a href="#products">Productos</a></li>
        <li><a href="#higiene">Soporte_recomen</a></li>
        <li><a href="#contact">Contacto</a></li>
      </ul>
    </nav>

    <div class="icons">
      <button id="cartBtn" class="cart-btn" aria-label="Abrir carrito">
        <i class="fas fa-shopping-cart"></i>
        <span id="cart-count" class="cart-count">1</span>
      </button>
      <button id="menuToggle" class="menu-toggle" aria-label="Mostrar menú">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </header>

  <!-- HERO -->
  <section id="home" class="hero">
    <div class="hero-inner">
      <div class="hero-text">
        <h1>Ventas de Artículos de Primera Necesidad</h1>
        <h2>JSMS — Calidad y precio justo</h2>
        <p>Encuentra alimentos, higiene y productos para tu hogar.</p>
        <a class="btn" href="#products">Ver Productos</a>
      </div>
      <div class="hero-image">
        <img src="imagenes/limpieza.png" alt="Productos" />
      </div>
    </div>
  </section>

  <!-- PRODUCTOS / TIENDA -->
  <section id="products" class="section products-section">
    <h2 class="section-title">Catálogo</h2>
    <p class="section-sub">Artículos de primera necesidad — precios claros</p>

    <div class="filters">
      <button class="filter-btn active" data-filter="all">Todos</button>
      <button class="filter-btn" data-filter="alimentos">Alimentos</button>
      <button class="filter-btn" data-filter="higiene">Higiene</button>
      <button class="filter-btn" data-filter="hogar">Hogar</button>
    </div>

    <div id="product-grid" class="product-grid">
      <!-- Las tarjetas de producto se inyectan con JS -->
    </div>
  </section>

  <!-- ABOUT / NOSOTROS -->
  <section id="about" class="section about-section">
    <h2 class="section-title">Nosotros</h2>
    <div class="about-grid">
      <div>
        <h3>¿Quiénes somos?</h3>
        <p>JSMS es una empresa dedicada a la venta de artículos de primera necesidad: alimentos, productos de limpieza e higiene personal, con precios accesibles y disponibilidad local.</p>
        <a class="btn ghost" href="#contact">Contáctanos</a>
      </div>
      <div class="about-cards">
        <div class="about-card">
          <img src="imagenes/Arroz.webp" alt="Arroz">
          <h4>Productos frescos</h4>
          <p>Selección cuidada y control de calidad.</p>
        </div>
        <div class="about-card">
          <img src="imagenes/aceite.webp" alt="Aceite">
          <h4>Precios competitivos</h4>
          <p>Promociones periódicas y paquetes familiares.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- HIGIENE / RESEÑAS -->
  <section id="higiene" class="section review-section">
    <h2 class="section-title">Recomendaciones y soportes</h2>
    <div class="review-grid">
      <div class="review-card">
        <img src="imagenes/pic1.jpg" alt="">
        <h4>Productos confiables</h4>
        <p>Marcas recomendadas para el cuidado diario.</p>
      </div>
      <div class="review-card">
        <img src="imagenes/pic2.jpg" alt="">
        <h4>Atención al cliente</h4>
        <p>Soporte y consultas sobre nuestros productos.</p>
      </div>
      <div class="review-card">
        <img src="imagenes\deliveri.png" alt="">
        <h4>Envíos locales</h4>
        <p>Entrega rápida dentro de la ciudad.</p>
      </div>
    </div>
  </section>

  <!-- CONTACTO -->
  <section id="contact" class="section contact-section">
    <h2 class="section-title">Contacto</h2>
    <div class="contact-grid">
      <form id="contactForm" class="contact-form" novalidate>
        <label for="name">Nombre</label>
        <input id="name" name="name" type="text" placeholder="Tu nombre" required>

        <label for="email">Correo</label>
        <input id="email" name="email" type="email" placeholder="correo@.com" required>

        <label for="phone">Teléfono</label>
        <input id="phone" name="phone" type="tel" placeholder="999 999 999" required pattern="[0-9\s\-]{7,15}">

        <label for="message">Mensaje</label>
        <textarea id="message" name="message" rows="4" placeholder="Escribe tu consulta" required></textarea>

        <div class="form-actions">
          <button type="submit" class="btn">Enviar</button>
          <button type="reset" class="btn ghost">Limpiar</button>
        </div>

        <p id="formMsg" class="form-msg" aria-live="polite"></p>
      </form>

      <div class="contact-info">
        <h3>Visítanos</h3>
        <p>Teléfono: (01) 234-5678</p>
        <p>Dirección: Calle Daniel Alcides 123, Nauta</p>
        <div class="socials">
          <a href="https://www.facebook.com/"><i class="fab fa-facebook-f" headth="30" width="30"></i></a>
          <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
          <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </div>
  </section>
<!-- Botón flotante de WhatsApp (movible) -->
<a href="https://wa.me/51988469378?text=Hola%20quiero%20más%20información"
   class="whatsapp-float bounce" target="_blank" id="whatsapp-btn" title="Contáctame por WhatsApp">
  <img src="imagenes\whatsapp.webp" width="50" height="50"></i>
</a>

<!-- Font Awesome para el ícono -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- FOOTER -->
  <footer class="footer">
    <div>© <span id="year"></span> JSMS — Todos los derechos reservados</div>
  </footer>

  <!-- CARRITO (modal) -->
  <div id="cartModal" class="cart-modal" aria-hidden="true">
    <div class="cart-panel" role="dialog" aria-label="Carrito de compras">
      <header class="cart-header">
        <h3>Tu carrito</h3>
        <button id="closeCart" class="close-btn" aria-label="Cerrar carrito"><i class="fas fa-times"></i></button>
      </header>
      <div id="cartItems" class="cart-items">
        <!-- Items dinámicos -->
      </div>
      <div class="cart-footer">
        <div class="cart-total">Total: S/ <span id="cartTotal">0.00</span></div>
        <div class="cart-actions">
          <button id="clearCart" class="btn ghost">Vaciar</button>
        </div>
        <div class="payment-methods" style="margin-top: 15px; display: flex; flex-direction: column; gap: 10px;">
          <button id="yapeBtn" class="btn-yape" style="width: 100%; padding: 12px; border: none; border-radius: 8px; cursor: pointer; font-weight: 700; display: flex; align-items: center; justify-content: center; gap: 8px;">
            <span style="font-size: 1.2em;">💚</span> Pagar con Yape
          </button>
          <div id="paypal-button-container" style="width: 100%; min-height: 50px;"></div>
        </div>
        <div id="paypal-error-message" style="display: none; margin-top: 10px; padding: 10px; background: #fff3cd; border: 1px solid #ffc107; border-radius: 5px; color: #856404;"></div>
      </div>
    </div>
  </div>

  <!-- Modal de Yape -->
  <div id="yapeModal" class="yape-modal" aria-hidden="true">
    <div class="yape-modal-content">
      <header class="yape-modal-header">
        <h3>Pagar con Yape</h3>
        <button id="closeYapeModal" class="close-btn" aria-label="Cerrar modal Yape"><i class="fas fa-times"></i></button>
      </header>
      <div class="yape-modal-body">
        <div class="yape-info">
          <div class="yape-total">
            <p style="font-size: 0.9rem; color: #666; margin-bottom: 5px;">Total a pagar:</p>
            <p style="font-size: 1.8rem; font-weight: 800; color: #00D4AA; margin: 0;">S/ <span id="yapeTotal">0.00</span></p>
          </div>
          <div class="yape-instructions">
            <p style="margin: 15px 0; font-weight: 600;">📱 Instrucciones:</p>
            <ol style="margin: 10px 0; padding-left: 20px; line-height: 1.8;">
              <li>Abre tu app Yape</li>
              <li>Escanea el código QR o transfiere al número</li>
              <li>Confirma el pago al finalizar</li>
            </ol>
          </div>
          <div class="yape-qr-section">
            <div class="yape-qr-container">
              <div id="yapeQR" class="yape-qr-code">
                <img id="yapeQRImage" src="imagenes\WhatsApp Image 2025-11-08 at 7.48.48 PM.jpeg" alt="Código QR de Yape" style="width: 250px; height: 250px; max-width: 100%; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin: 0 auto; display: block;">
              </div>
            </div>
            <div class="yape-phone">
              <p style="font-weight: 600; margin: 15px 0 5px;">Número de Yape:</p>
              <div class="yape-phone-number" style="display: flex; align-items: center; justify-content: center; gap: 10px; padding: 15px; background: #f8f9fa; border-radius: 8px; margin: 10px 0;">
                <span style="font-size: 1.5rem;">📱</span>
                <span id="yapePhone" style="font-size: 1.3rem; font-weight: 700; color: #00D4AA; letter-spacing: 2px;">988469378</span>
                <button id="copyYapePhone" class="btn-copy" title="Copiar número">
                  <i class="fas fa-copy"></i>
                </button>
              </div>
              <p style="text-align: center; margin-top: 10px; font-size: 0.85rem; color: #666;">
                Escanea el código QR con Yape o transfiere al número
              </p>
            </div>
          </div>
          <div class="yape-confirm-section" style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #e0e0e0;">
            <p style="margin-bottom: 15px; font-weight: 600;">¿Ya realizaste el pago?</p>
            <button id="confirmYapePayment" class="btn-yape-confirm" style="width: 100%; padding: 12px; border: none; border-radius: 8px; cursor: pointer; font-weight: 700; font-size: 1rem;">
              ✅ Confirmar Pago
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="main.js"></script>
  
</body>
</html>