document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('selection-form');
    
    form.addEventListener('submit', function(event) {
        event.preventDefault();  // Prevent default form submission

        const yrSection = document.getElementById('yr-container').value;  // Get the selected year and section

        if (yrSection === "") {
            alert("Please select a year and section.");
            return;
        }

        // Fetch subjects based on selected yrSection
        fetch(`subjectList.php?yrSection=${encodeURIComponent(yrSection)}`)  // Ensure yrSection is passed properly
            .then(response => response.json())
            .then(data => {
                console.log('Response Data:', data);  // Log response for debugging
                
                const draggableContainer = document.getElementById('draggable-container');
                draggableContainer.innerHTML = '';  // Clear previous subjects
                
                const subjects = data.subjects;  // Access the subjects array from the PHP response

                if (Array.isArray(subjects) && subjects.length > 0) {
                    subjects.forEach((subject, index) => {
                        const div = document.createElement('div');
                        div.className = 'draggable';
                        div.draggable = true;
                        div.id = 'subject' + (index + 1);
                        div.textContent = subject;
                        draggableContainer.appendChild(div);

                        // Add drag event listeners
                        div.addEventListener('dragstart', (e) => {
                            e.dataTransfer.setData('text/plain', div.id);
                        });
                    });

                    // Add drag and drop functionality
                    const droppableElements = document.querySelectorAll('.droppable');
                    droppableElements.forEach(droppable => {
                        droppable.addEventListener('dragover', (e) => {
                            e.preventDefault();
                        });
                        droppable.addEventListener('drop', (e) => {
                            if (droppable.children.length === 0) {
                                const draggableId = e.dataTransfer.getData('text/plain');
                                const draggableElement = document.getElementById(draggableId);
                                
                                if (draggableElement) {
                                    droppable.appendChild(draggableElement);
                                }
                            } else {
                                console.log('error: already contains an element');
                            }
                        });
                    });
                } else {
                    alert('No subjects found for the selected year and section.');
                }
            })
            .catch(error => {
                console.error('Error fetching subjects:', error);  // Handle any errors
                alert('Error fetching subjects. Please try again later.');
            });
    });
});
