
try {
    function changeTheme(e) {
        e.preventDefault();
        const htmlTag = document.getElementsByTagName("html")[0];
        const darkIcon = document.getElementById("theme-toggle-dark-icon");
        const lightIcon = document.getElementById("theme-toggle-light-icon");

        if (htmlTag.className.includes("dark")) {
            htmlTag.className = 'light';
            darkIcon.classList.add('hidden');
            lightIcon.classList.remove('hidden');
        } else {
            htmlTag.className = 'dark';
            darkIcon.classList.remove('hidden');
            lightIcon.classList.add('hidden');
        }
    }

    const switcher = document.getElementById("theme-toggle");
    switcher?.addEventListener("click", changeTheme);

    // Initial state setup
    window.addEventListener('load', () => {
        const htmlTag = document.getElementsByTagName("html")[0];
        const darkIcon = document.getElementById("theme-toggle-dark-icon");
        const lightIcon = document.getElementById("theme-toggle-light-icon");

        if (htmlTag.className.includes("dark")) {
            darkIcon.classList.remove('hidden');
            lightIcon.classList.add('hidden');
        } else {
            darkIcon.classList.add('hidden');
            lightIcon.classList.remove('hidden');
        }
    });
} catch (err) {
    console.error(err);
}
