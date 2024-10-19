document.addEventListener('DOMContentLoaded', () => {
    fetch('../php/yrSection.php')  // Adjust the path to your PHP script
        .then(response => response.json())
        .then(data => {
            // Debugging: Log the entire fetched data to the console
            console.log('Fetched Data:', data);

            const yrContainer = document.getElementById('yr-container');

            // Ensure yrContainer exists
            if (yrContainer) {
                // Clear existing options except the placeholder
                yrContainer.innerHTML = '<option value="">Year & Section</option>';

                // Check if data is an array
                if (Array.isArray(data)) {
                    data.forEach((yrSection, index) => {
                        console.log('Processing year-section:', yrSection); // Debugging: Log each year-section being processed

                        const option = document.createElement('option');
                        option.value = yrSection;
                        option.textContent = yrSection; // Set both value and text to the correct string
                        yrContainer.appendChild(option);
                    });
                } else {
                    console.error('Data is not an array:', data);
                }
            } else {
                console.error('Dropdown container not found');
            }
        })
        .catch(error => console.error('Error fetching data:', error));
});
