
function contactUserAJAX() {
    function sendmessageAjax(event) {
        event.preventDefault();

        const alertContainer = document.querySelector(".alert-container-contact");
        const contactContainer = document.querySelector(".contact-section-container");
        const successContainer = document.querySelector(".success-container");
        // Get form values
        const userNameForm = document.querySelector("#send-contact-form .first_name").value.trim();
        const userSurnameForm = document.querySelector("#send-contact-form .last_name").value.trim();
        const email = document.querySelector("#send-contact-form .email").value.trim();
        const address = document.querySelector("#send-contact-form .address").value.trim();
        const city = document.querySelector("#send-contact-form .city").value.trim();
        const postal = document.querySelector("#send-contact-form .postal").value.trim();
        const country = document.querySelector("#send-contact-form .country").value.trim();
        const message = document.querySelector("#send-contact-form .message").value.trim();

        // Validate required fields
        if (!userNameForm || !userSurnameForm || !email || !address || !city || !postal || !country || !message) {
            alertContainer.innerHTML = "<div class='alert alert-danger  text-center'>Please fill in all fields.</div>";
            return;
        }

        // Create FormData object
        const formData = new FormData();
        formData.append('first_name', userNameForm);
        formData.append('last_name', userSurnameForm);
        formData.append('email', email);
        formData.append('address', address);
        formData.append('city', city);
        formData.append('postal', postal);
        formData.append('country', country);
        formData.append('message', message);

        // Send data via AJAX
        fetch('./ajax/send_msg_contact.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data.trim() === "1") {
                document.querySelector("#send-contact-form").reset(); // Clear form
                // empty form and display success msg
                contactContainer.innerHTML = "";

                successContainer.style.display="flex"
                successContainer.innerHTML = `<div class='alert alert-success text-center'>Thank you ${userNameForm}, Your message has been sent successfully!</div>`;
                window.scrollTo({ top: 0, behavior: 'smooth' });

            } else {
                alertContainer.innerHTML = `${data}`;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alertContainer.innerHTML = "<div class='alert alert-danger  text-center'>Something went wrong. Please try again.</div>";
        });
    }

    // Attach event listener to the submit button
    const sendButton = document.querySelector(".send-contact-form");
    if (sendButton) {
        sendButton.addEventListener("click", function(e) {
            e.preventDefault();
            sendmessageAjax(e);
        });
    }


    // Submit on Enter key press
    document.addEventListener("keydown", (event) => {
        if (event.key === "Enter") {
            sendmessageAjax(event);
        }
    });
}

contactUserAJAX();
