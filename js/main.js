// Manejo de navegación entre vistas
document.addEventListener('DOMContentLoaded', function() {
    // Mostrar vista inicial
    showView('inicio');
    
    // Manejar clics en enlaces de navegación
    document.querySelectorAll('[data-view]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const viewName = this.getAttribute('data-view');
            showView(viewName);
            
            // Actualizar clase activa en navegación
            document.querySelectorAll('.nav-link').forEach(navLink => {
                navLink.classList.remove('active');
            });
            
            if (this.classList.contains('nav-link')) {
                this.classList.add('active');
            }
        });
    });
    
    // Manejar envío de receta
    document.getElementById('receta-form').addEventListener('submit', function(e) {
        e.preventDefault();
        submitReceta();
    });
    
    // Manejar envío de pago
    document.getElementById('pago-form').addEventListener('submit', function(e) {
        e.preventDefault();
        submitPago();
    });
    
    // Manejar envío de consulta
    document.getElementById('consulta-form').addEventListener('submit', function(e) {
        e.preventDefault();
        submitConsulta();
    });
    
    // Manejar envío de contacto
    document.getElementById('contacto-form').addEventListener('submit', function(e) {
        e.preventDefault();
        submitContacto();
    });
    
    // Mostrar/ocultar datos de tarjeta según método de pago
    document.querySelectorAll('input[name="metodo-pago"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const datosTarjeta = document.getElementById('datos-tarjeta');
            datosTarjeta.style.display = this.value === 'linea' ? 'block' : 'none';
        });
    });
});

// Función para mostrar una vista específica
function showView(viewName) {
    // Ocultar todas las vistas
    document.querySelectorAll('.view').forEach(view => {
        view.classList.add('hidden');
    });
    
    // Mostrar la vista solicitada
    document.getElementById(`${viewName}-view`).classList.remove('hidden');
    
    // Scroll al inicio de la página
    window.scrollTo(0, 0);
}

// Función para enviar receta (simulación)
function submitReceta() {
    const formData = {
        nombre: document.getElementById('nombre').value,
        telefono: document.getElementById('telefono').value,
        email: document.getElementById('email').value,
        medicamentos: document.getElementById('medicamentos').value,
        archivo: document.getElementById('archivo').files[0] ? document.getElementById('archivo').files[0].name : null
    };
    
    // Aquí normalmente harías una llamada al backend
    // Simulamos una llamada exitosa
    console.log('Enviando receta al backend:', formData);
    
    // Mostrar resumen en vista de pago
    const resumenPedido = document.getElementById('resumen-pedido');
    resumenPedido.innerHTML = `
        <p><strong>Nombre:</strong> ${formData.nombre}</p>
        <p><strong>Teléfono:</strong> ${formData.telefono}</p>
        <p><strong>Medicamentos:</strong></p>
        <p>${formData.medicamentos.replace(/\n/g, '<br>')}</p>
        ${formData.archivo ? `<p><strong>Archivo adjunto:</strong> ${formData.archivo}</p>` : ''}
    `;
    
    // Mostrar vista de pago
    showView('pago');
}

// Función para procesar pago (simulación)
function submitPago() {
    const metodoPago = document.querySelector('input[name="metodo-pago"]:checked').value;
    const datosPago = {};
    
    if (metodoPago === 'linea') {
        datosPago.numeroTarjeta = document.getElementById('numero-tarjeta').value;
        datosPago.fechaExp = document.getElementById('fecha-exp').value;
        datosPago.cvv = document.getElementById('cvv').value;
    }
    
    // Aquí normalmente harías una llamada al backend para procesar el pago
    console.log('Procesando pago:', { metodoPago, datosPago });
    
    // Mostrar detalles en vista de confirmación
    const detallesPedido = document.getElementById('detalles-pedido');
    detallesPedido.innerHTML = `
        <p><strong>Método de pago:</strong> ${metodoPago === 'linea' ? 'Pago en línea' : 'Pago en caja'}</p>
        ${metodoPago === 'linea' ? `<p><strong>Tarjeta terminada en:</strong> ${datosPago.numeroTarjeta.slice(-4)}</p>` : ''}
        <p>Recibirás un correo electrónico con los detalles de tu pedido.</p>
    `;
    
    // Mostrar vista de confirmación
    showView('confirmacion');
}

// Función para enviar consulta (simulación)
function submitConsulta() {
    const formData = {
        nombre: document.getElementById('consulta-nombre').value,
        email: document.getElementById('consulta-email').value,
        telefono: document.getElementById('consulta-telefono').value,
        mensaje: document.getElementById('consulta-mensaje').value
    };
    
    // Aquí normalmente harías una llamada al backend
    console.log('Enviando consulta al backend:', formData);
    
    // Mostrar mensaje de éxito
    alert('Tu consulta ha sido enviada. Un farmacéutico te responderá pronto.');
    
    // Limpiar formulario
    document.getElementById('consulta-form').reset();
}

// Función para enviar contacto (simulación)
function submitContacto() {
    const formData = {
        nombre: document.getElementById('contacto-nombre').value,
        email: document.getElementById('contacto-email').value,
        asunto: document.getElementById('contacto-asunto').value,
        mensaje: document.getElementById('contacto-mensaje').value
    };
    
    // Aquí normalmente harías una llamada al backend
    console.log('Enviando mensaje de contacto:', formData);
    
    // Mostrar mensaje de éxito
    alert('Gracias por tu mensaje. Nos pondremos en contacto contigo pronto.');
    
    // Limpiar formulario
    document.getElementById('contacto-form').reset();
}