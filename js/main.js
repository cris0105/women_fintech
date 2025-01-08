// Funcționalitate de validare a formularului
function validateEmail(email) {
    // Verifică dacă adresa de email are un format valid
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validateLinkedIn(url) {
    // Verifică dacă URL-ul conține "linkedin.com/"
    return url.includes('linkedin.com/');
}

document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');

    if (form) {
        form.addEventListener('submit', (e) => {
            const emailField = document.querySelector('input[type="email"]');
            const linkedInField = document.querySelector('input[name="linkedin_profile"]');

            // Validare email
            if (emailField && !validateEmail(emailField.value)) {
                e.preventDefault();
                alert('Introduceți o adresă de email validă!');
            }

            // Validare URL LinkedIn
            if (linkedInField && !validateLinkedIn(linkedInField.value)) {
                e.preventDefault();
                alert('Introduceți un URL valid pentru LinkedIn!');
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('darkModeToggle');
    const body = document.body;

    // Verificare inițială din localStorage
    const darkMode = localStorage.getItem('darkMode');
    if (darkMode === 'enabled') {
        enableDarkMode();
    }

    // Adăugăm event listener pe buton
    toggleButton.addEventListener('click', function () {
        if (body.classList.contains('dark-mode')) {
            disableDarkMode();
        } else {
            enableDarkMode();
        }
    });

    // Activează Dark Mode
    function enableDarkMode() {
        body.classList.add('dark-mode');
        document.querySelector('.navbar')?.classList.add('dark-mode');
        document.querySelector('.footer')?.classList.add('dark-mode');

        // Schimbă textul butonului
        toggleButton.textContent = 'Light Mode';

        // Salvează în localStorage
        localStorage.setItem('darkMode', 'enabled');
    }

    // Dezactivează Dark Mode
    function disableDarkMode() {
        body.classList.remove('dark-mode');
        document.querySelector('.navbar')?.classList.remove('dark-mode');
        document.querySelector('.footer')?.classList.remove('dark-mode');

        // Schimbă textul butonului
        toggleButton.textContent = 'Dark Mode';

        // Salvează în localStorage
        localStorage.setItem('darkMode', 'disabled');
    }
});
