document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('room-buttons');

    // Fetch room data and create buttons
    fetch('fetch_rooms.php')
        .then(response => {
            // Check if response is ok and parse as JSON
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(rooms => {
            if (Array.isArray(rooms)) {
                rooms.forEach(room => {
                    const button = document.createElement('button');
                    button.className = 'room';
                    button.dataset.room = room;
                    button.textContent = room;
                    button.addEventListener('click', () => {
                        filterByRoom(room);
                    });
                    container.appendChild(button);
                });
            } else {
                console.error('Expected an array but got:', rooms);
            }
        })
        .catch(error => console.error('Error fetching rooms:', error));
});
