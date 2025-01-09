function validateEmail(email) {

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validateLinkedIn(url) {

    return url.includes('linkedin.com/');
}

document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');

    if (form) {
        form.addEventListener('submit', (e) => {
            const emailField = document.querySelector('input[type="email"]');
            const linkedInField = document.querySelector('input[name="linkedin_profile"]');

            if (emailField && !validateEmail(emailField.value)) {
                e.preventDefault();
                alert('Introduceți o adresă de email validă!');
            }

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

    const darkMode = localStorage.getItem('darkMode');
    if (darkMode === 'enabled') {
        enableDarkMode();
    }

    toggleButton.addEventListener('click', function () {
        if (body.classList.contains('dark-mode')) {
            disableDarkMode();
        } else {
            enableDarkMode();
        }
    });

    function enableDarkMode() {
        body.classList.add('dark-mode');
        document.querySelector('.navbar')?.classList.add('dark-mode');
        document.querySelector('.footer')?.classList.add('dark-mode');

        toggleButton.textContent = 'Light Mode';

        localStorage.setItem('darkMode', 'enabled');
    }

    function disableDarkMode() {
        body.classList.remove('dark-mode');
        document.querySelector('.navbar')?.classList.remove('dark-mode');
        document.querySelector('.footer')?.classList.remove('dark-mode');

        toggleButton.textContent = 'Dark Mode';

        localStorage.setItem('darkMode', 'disabled');
    }
});
