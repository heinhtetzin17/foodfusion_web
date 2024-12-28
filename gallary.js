class gallary {
    constructor() {
        // Wait for DOM to be ready before initializing
        document.addEventListener('DOMContentLoaded', () => {
            this.modal();
        });
    }

    modal() {
        const parentElement = document.querySelector('.ps');
        if (!parentElement) {
            console.warn('Element with class "ps" not found');
            return;
        }

        parentElement.addEventListener('click', (e) => {
            // ... rest of the click handler code ...
        });
    }
    // ... rest of the class implementation ...
}