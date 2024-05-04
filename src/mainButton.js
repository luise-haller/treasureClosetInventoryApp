function scrollToSection2() {
    const section2 = document.getElementById('sec-2');
    section2.scrollIntoView({ behavior: 'smooth' });
}

// Function to be executed when the form is submitted
function handleFormSubmit(event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Get form data
    var form = document.getElementById('productForm');
    var formData = new FormData(form);

    
    // Submit the form using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'Main.php', true); // Submit to Main.php
    xhr.onload = function() {
        // Process server response if needed
        if (xhr.status >= 200 && xhr.status < 400) {
            // Server response was successful
            console.log(xhr.responseText);
            // Parse the response JSON data if applicable
            var responseData = JSON.parse(xhr.responseText);
            // Update the HTML table with the submitted data
            updateTable(responseData);
        } else {
            console.error('Error: ' + xhr.statusText);
        }
    };
    xhr.onerror = function() {
        console.error('Error: Request failed');
    };
    xhr.send(formData);
}

function updateTable(data) {
    var tableBody = document.querySelector('.table tbody');
    var newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${data.product}</td>
        <td>${data.link}</td>
        <td>${data.status}</td>
        <td>${data.stock}</td>
        <td>${data.target}</td>
        <td>${data.needed}</td>
        <td>${data.lastUpdated}</td>
        <td>Edit</td>
        <td>Delete</td>
    `;
    tableBody.appendChild(newRow);
}

// event listener to the form for form submission
document.getElementById('productForm').addEventListener('submit', handleFormSubmit);
