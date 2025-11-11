/**
 * Header JavaScript - ETC Vallenas
 * JavaScript simple para el header estilo Maquiperu (SIN animaciones)
 */

class SimpleHeaderController {
    constructor() {
        this.mobileToggle = document.querySelector('.mobile-toggle');
        this.navbarCollapse = document.querySelector('#mainNav');
        this.dropdownItems = document.querySelectorAll('.dropdown-item');

        this.init();
    }

    init() {
        this.initMobileToggle();
        this.initDropdowns();
        this.initOutsideClick();
    }

    /**
     * Dropdowns simples - solo hover en desktop
     */
    initDropdowns() {
        // Los dropdowns funcionan solo con CSS hover en desktop
        // En móvil se muestran siempre expandidos
        if (window.innerWidth < 992) {
            // En móvil, todos los submenús están visibles
            return;
        }
    }

    /**
     * Toggle simple del menú móvil
     */
    initMobileToggle() {
        if (this.mobileToggle && this.navbarCollapse) {
            this.mobileToggle.addEventListener('click', (e) => {
                e.preventDefault();

                if (this.navbarCollapse.classList.contains('show')) {
                    this.navbarCollapse.classList.remove('show');
                } else {
                    this.navbarCollapse.classList.add('show');
                }
            });
        }
    }



    /**
     * Cerrar menú al hacer clic fuera
     */
    initOutsideClick() {
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.navbar-orange')) {
                if (this.navbarCollapse.classList.contains('show')) {
                    this.navbarCollapse.classList.remove('show');
                }
            }
        });
    }
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    const headerController = new SimpleHeaderController();
    window.headerController = headerController;
});

// Funcionalidad adicional para Bootstrap collapse
document.addEventListener('DOMContentLoaded', function() {
    // Manejar collapse de Bootstrap
    const collapseElementList = [].slice.call(document.querySelectorAll('.collapse'));

    collapseElementList.forEach(function (collapseEl) {
        collapseEl.addEventListener('show.bs.collapse', function () {
            // Comportamiento al mostrar
        });

        collapseEl.addEventListener('hide.bs.collapse', function () {
            // Comportamiento al ocultar
        });
    });
});
