document.addEventListener('DOMContentLoaded', function() {
    // Select all cards and remove the styles
    document.querySelectorAll('.card').forEach(card => {
        card.classList.remove('border-indigo-500', 'scale-105');
    });

    // Apply styles to the default card
    const defaultCard = document.querySelector('#card-1'); // Set your default card's ID or class
    if (defaultCard) {
        defaultCard.classList.add('border-indigo-500', 'scale-105');
    }

    // Add click event listener to all cards
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('click', function() {
            document.querySelectorAll('.card').forEach(c => c.classList.remove('border-indigo-500', 'scale-105'));
            this.classList.add('border-indigo-500', 'scale-105');
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('[data-target]');
    const images = document.querySelectorAll('[id^="img"]');

    // Show the first image by default
    const defaultImage = document.getElementById('img1');
    if (defaultImage) {
        defaultImage.classList.remove('hidden');
        defaultImage.classList.add('fade-in-right');
    }

    cards.forEach(card => {
        card.addEventListener('click', () => {
            const targetId = card.getAttribute('data-target');

            // Hide all images with fade-out animation
            images.forEach(img => {
                if (!img.classList.contains('hidden')) {
                    img.classList.add('fade-in-left');
                    img.classList.remove('fade-out-right');
                    setTimeout(() => img.classList.add('hidden'), 100); // Match duration with animation
                }
            });

            // Show the selected image with fade-in animation
            const targetImage = document.getElementById(targetId);
            if (targetImage) {
                targetImage.classList.remove('hidden');
                targetImage.classList.add('fade-in-left');
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Set the default active button and visible card
    const defaultButtonId = 'btn-1';
    const defaultCardId = 'card-1';
    
    // Function to handle button click
    function handleButtonClick(buttonId, cardId) {
        // Remove 'active' class from all buttons
        document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));

        // Add 'active' class to the clicked button
        document.getElementById(buttonId).classList.add('active');

        // Hide all cards and show the selected card
        document.querySelectorAll('.card').forEach(card => {
            if (card.id === cardId) {
                card.classList.remove('hidden'); // Show the selected card
            } else {
                card.classList.add('hidden'); // Hide other cards
            }
        });
    }

    // Set the default active button and visible card
    handleButtonClick(defaultButtonId, defaultCardId);

    // Add click event listeners to all buttons
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', function() {
            // Get the button ID and determine the corresponding card ID
            const buttonId = this.id;
            const cardId = `card-${this.id.split('-')[1]}`;
            handleButtonClick(buttonId, cardId);
        });
    });
});
 