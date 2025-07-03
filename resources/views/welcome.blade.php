<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Farmacia Salud Rápida</title>
    <style> body { font-family: 'Arial', sans-serif; margin: 0; padding: 0; background-color: #fff5f5; color: #333; } .container { max-width: 1200px; margin: 0 auto; padding: 20px; } header { display: flex; justify-content: flex-end; padding: 15px 0; } nav a { margin-left: 15px; padding: 8px 15px; text-decoration: none; color: #d32f2f; border: 1px solid #d32f2f; border-radius: 4px; transition: all 0.3s; } nav a:hover { background-color: #d32f2f; color: white; } .main-content { display: flex; flex-wrap: wrap; gap: 30px; margin: 40px 0; } .info-section { flex: 1; min-width: 300px; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); } .image-section { flex: 1; min-width: 300px; background: #ffebee; border-radius: 8px; display: flex; align-items: center; justify-content: center; overflow: hidden; } .image-section img { max-width: 100%; height: auto; } h1 { color: #d32f2f; margin-bottom: 20px; } p { margin-bottom: 20px; line-height: 1.6; } .feature-list { margin: 25px 0; } .feature-item { display: flex; align-items: center; margin-bottom: 15px; } .feature-icon { margin-right: 10px; color: #d32f2f; } .buttons { display: flex; gap: 15px; margin-top: 30px; } .btn { padding: 10px 20px; border-radius: 4px; text-decoration: none; font-weight: 500; transition: all 0.3s; } .btn-primary { background-color: #d32f2f; color: white; } .btn-primary:hover { background-color: #b71c1c; } .btn-secondary { border: 1px solid #d32f2f; color: #d32f2f; } .btn-secondary:hover { background-color: #ffebee; } footer { text-align: center; padding: 20px; margin-top: 40px; color: #666; font-size: 14px; } .footer-links { margin-top: 15px; } .footer-links a { margin: 0 10px; color: #d32f2f; text-decoration: none; } @media (max-width: 768px) { .main-content { flex-direction: column; } } </style>

</head>
<body>
    <div class="container">
        <header>
            <nav>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}">INICIO</a>
                    @else
                        <a href="{{ route('login') }}">Iniciar sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrarse</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </header>
        
        <div class="main-content">
            <div class="info-section">
                <h1>Bienvenido a Farmacia Salud Rápida</h1>
                <p>Su salud es nuestra prioridad. Ofrecemos productos farmacéuticos de calidad y atención personalizada.</p>
                
                <div class="feature-list">
                    <div class="feature-item">
                        <span class="feature-icon">✓</span>
                        <span>
                            Explora nuestro catálogo completo de 
                            <a href="/productos" target="_blank" style="color: #d32f2f; text-decoration: underline;">
                                medicamentos y productos
                            </a>
                        </span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">✓</span>
                        <span>
                            Conoce nuestros 
                            <a href="/servicios" target="_blank" style="color: #d32f2f; text-decoration: underline;">
                                servicios de asesoramiento farmacéutico
                            </a>
                        </span>
                    </div>
                </div>
                
                <div class="buttons">
                    <a href="/productos" class="btn btn-primary">Ver catálogo</a>
                    <a href="/contacto" class="btn btn-secondary">Contacto</a>
                </div>
            </div>
            
            <div class="image-section">
                <img src="https://img.freepik.com/vector-gratis/cruz-medica-vector-diseno-logotipo-hospital_53876-136743.jpg?semt=ais_hybrid&w=740" alt="Logo temporal">
            </div>
        </div>
        
        <footer>
            <p>© 2025 Farmacia Salud Rápida. Todos los derechos reservados.</p>
            <p>Horario: Lunes a Viernes 8:00 - 20:00 | Sábados 9:00 - 14:00</p>
            <div class="footer-links">
                <a href="#">Política de privacidad</a>
                <a href="#">Términos de servicio</a>
                <a href="#">Contacto</a>
            </div>
        </footer>
    </div>
    <script>
</script>
</body>
</html>