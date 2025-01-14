// main.js
document.addEventListener('DOMContentLoaded', () => {
    const contentContainer = document.getElementById('content-container');

    // Add event listeners to navigation links
    document.querySelectorAll('.navigation a').forEach(link => {
        link.addEventListener('click', event => {
            event.preventDefault(); // Prevent default navigation
            const targetPage = link.getAttribute('href'); // Get target page from href

            // Load relevant content
            fetch(targetPage)
                .then(response => response.text())
                .then(data => {
                    contentContainer.innerHTML = data;
                })
                .catch(error => {
                    console.error('Error loading content:', error);
                    contentContainer.innerHTML = '<p>Failed to load content. Please try again later.</p>';
                });
        });
    });
});
