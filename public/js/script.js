document.addEventListener('DOMContentLoaded', function() {
    console.log('Document loaded successfully');
    
    // Validación básica de formularios
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(event) {
            let valid = true;
            const inputs = form.querySelectorAll('input[type="text"], input[type="email"]');
            
            inputs.forEach(input => {
                if (input.value.trim() === '') {
                    input.style.border = '2px solid red';
                    valid = false;
                } else {
                    input.style.border = '1px solid #ddd';
                }
            });
            
            if (!valid) {
                event.preventDefault();
                alert('Por favor completa todos los campos.');
            }
        });
    }
    
    // Efecto hover en botones
    const buttons = document.querySelectorAll('button');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            button.style.transform = 'scale(1.05)';
        });
        button.addEventListener('mouseleave', function() {
            button.style.transform = 'scale(1)';
        });
    });
});