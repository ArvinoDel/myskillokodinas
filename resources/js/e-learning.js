
    document.addEventListener('DOMContentLoaded', () => {
        // Select all buttons and cards
        const buttons = document.querySelectorAll('.tab-button');
        const cards = document.querySelectorAll('.card');

        // Check if buttons and cards are found; if not, exit the script
        if (buttons.length === 0 || cards.length === 0) {
            console.error('Buttons or cards not found in the DOM.');
            return;
        }

        // Set the first button as active and display the first set of cards
        const firstCategoryId = buttons[0].getAttribute('data-category-id');
        setActiveButton(buttons[0]);
        filterCards(firstCategoryId);

        // Add click event listeners to each button
        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const categoryId = button.getAttribute('data-category-id');

                // Change button color to indicate active state
                setActiveButton(button);

                // Display only the cards that match the selected category ID
                filterCards(categoryId);
            });
        });

        // Function to set the active button and remove active state from others
        function setActiveButton(activeButton) {
            // Reset all buttons to the default style
            buttons.forEach(button => {
                button.classList.remove('bg-cyan-500', 'text-white');
                button.classList.add('bg-gray-200', 'text-gray-700');
            });

            // Set the clicked button to active style
            activeButton.classList.remove('bg-gray-200', 'text-gray-700');
            activeButton.classList.add('bg-cyan-500', 'text-white');
        }

        // Function to show cards based on the selected category ID
        function filterCards(categoryId) {
            cards.forEach(card => {
                if (card.getAttribute('data-category-id') === categoryId) {
                    card.classList.remove('hidden'); // Show the card
                } else {
                    card.classList.add('hidden'); // Hide the card
                }
            });
        }
    });