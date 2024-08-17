<!-- Include Bootstrap CSS for modal styling -->

<div class="container-fluid contact-bg-image">
    <div class="jumbotron text-center">
        <div class="overlay"></div>
        <div class="jumbotron-content" data-aos="fade-up">
            <h1 class="display-1">Where Quality Meets Innovation</h1>
            <h5>
               "Blending traditional craftsmanship with modern innovation for timeless results."
            </h5>
        </div>
    </div>
</div>

<div class="container-fluid p-4 contact-methods-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card profile-card mt-5" data-aos="fade-right">
                    <div class="card-body text-center">
                        <div class="rounded-circle profile-img"><i class="fa-regular fa-paper-plane fa-2x"></i></div>
                        <p class="fs-4 fw-bold">Drop Us Email</p>
                        <p class="card-text fw-normal">You drop us email any time. our team will call you back as soon as possible</p>
                        <button class="contact-button" onclick="scrollToContact()">Send Email</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card profile-card mt-5" data-aos="fade-right">
                    <div class="card-body text-center">
                        <div class="rounded-circle profile-img"><i class="fa-solid fa-comments fa-2x"></i></div>
                        <p class="fs-4 fw-bold">Chat with us</p>
                        <p class="card-text fw-normal">You drop us email any time. our team will call you back as soon as possible</p>
                        <button class="contact-button" onclick="openWhatsApp()">Send Message</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card profile-card mt-5" data-aos="fade-right">
                    <div class="card-body text-center">
                        <div class="rounded-circle profile-img"><i class="fa-solid fa-map-location fa-2x"></i></div>
                        <p class="fs-4 fw-bold">Visit our Office</p>
                        <p class="card-text fw-normal">You drop us email any time. our team will call you back as soon as possible</p>
                        <button class="contact-button" onclick="openGoogleMaps()">Get Direction</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid contact-container">
    <div class="row">
        <h1 class="mt-4 text-white">Drop Us Email</h1>
        <div class="col-md-6">
        <form action="send_mail.php" method="POST">
    <div class="form-group">
        <input type="text" class="form-control mt-4 p-3" name="name" placeholder="Enter your name" required>
    </div>
    <div class="form-group">
        <input type="email" class="form-control mt-4 p-3" name="email" placeholder="Enter your email" required>
    </div>
    <div class="form-group">
        <textarea class="form-control mt-4 p-3" name="message" rows="3" placeholder="Enter your message" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary w-100 mt-4 p-3">Submit <i class="fa-regular fa-paper-plane"></i></button>
</form>
        </div>
        <div class="col-md-6 p-4 address-container">
            <div class="address-card">
                <h4>Address</h4>
                <p class="address mt-3">
                    <i class='bx bx-map'></i> Aggarwal Enclave Balloke Road,<br> Opposite Hotel Miraas,<br>
                    Ludhiana - 141001
                </p>
                <p class="main">
                    <i class='bx bx-envelope'></i> info@jdbuilders.co.in
                </p>
            </div>
        </div>
    </div>
</div>


<script>
    function scrollToContact() {
        const contactContainer = document.getElementById('contact-container');
        contactContainer.scrollIntoView({ behavior: 'smooth' });
    }

    function openWhatsApp() {
        const phoneNumber = '918591262068'; // Replace with your WhatsApp number
        const message = 'Hello, I would like to chat with you!';
        const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
        window.open(url, '_blank');
    }

    function openGoogleMaps() {
        const latitude = '30.930032'; // Replace with your latitude
        const longitude = '75.795960'; // Replace with your longitude
        const url = `https://www.google.com/maps/dir/?api=1&destination=${latitude},${longitude}`;
        window.open(url, '_blank');
    }

    document.getElementById('contactForm').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const message = document.getElementById('message').value;

        // Send the form data using AJAX
        fetch('./service/sendMail.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ name, email, message })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect to the thank you page
                window.location.href = 'thankYou.html';
            } else {
                alert('There was an error sending your message. Please try again later.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('There was an error sending your message. Please try again later.');
        });
    });
    
</script>
