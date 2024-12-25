<?php
// Start the session if needed
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Bus Management System</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
</head>
<body data-spy="scroll" data-target="#navbar-example" data-offset="0">
    <!-- Header Section -->
    <header class="d-flex justify-content-between align-items-center p-3 bg-light text-dark">
        <div class="d-flex align-items-center">
            <div class="logo-container">
                <img src="Images/buslogo.jpeg" alt="Bus Management System Logo" class="logo" width="50">
            </div>
            <h1 class="ml-3">About Us</h1>
        </div>
    </header>
<style>
        /* Style for circular images */
        .team-img {
            width: 350px;
            height: 350px;
            border-radius: 90%;
            object-fit: cover;
            border: 5px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        /* Card customizations */
        .card {
            border: black;
            border-radius: 80px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            size: 20px;
        }

        .card-body {
            text-align: center;
        }

        /* Section header styling */
        .section h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
            font-weight: 700;
        }

        /* Contact section style */
        #contact ul {
            list-style-type: none;
            padding-left: 0;
        }

        #contact ul li {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        /* Improved Footer */
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
        }

        footer p {
            font-size: 1rem;
            color: #333;
        }

    /* Card Styling */
.card {
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    overflow: hidden;
    position: relative;
    padding: 20px;
}

.card-body {
    padding: 20px;
}

/* Background Flowers */
.card::before {
    content: "";
    position: absolute;
    top: -10px;
    right: -10px;
    width: 100px;
    height: 100px;
    background-image: url('flowers.png'); /* Replace with your flower image path */
    background-size: cover;
    background-position: center;
    opacity: 0.3;
}

.card h2 {
    font-size: 1.8rem;
    color: #333;
    margin-bottom: 15px;
}

.card p, .card ul {
    font-size: 1.1rem;
    color: #555;
    line-height: 1.6;
}

.card ul {
    padding-left: 20px;
    list-style-type: none;
}

.card ul li {
    font-size: 1.2rem;
    color: #555;
    margin: 10px 0;
}

/* Hover Effect */
.card:hover {
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    transform: translateY(-5px);
}

/* Section Styling */
.section {
    padding: 30px;
    margin-top: 20px;
    background-color: #f9f9f9;
}

.section h2 {
    font-size: 2rem;
    color: #333;
    margin-bottom: 20px;
}

.section p, .section ul {
    font-size: 1.2rem;
    color: #555;
    line-height: 1.6;
}

/* Responsive Design */
@media (max-width: 768px) {
    .card {
        padding: 15px;
    }
    .card-body {
        padding: 15px;
    }
}
</style>
    <!-- Navigation Bar -->
    <?php include 'links.php'; ?>
    <nav id="navbar-example" class="navbar navbar-light bg-light sticky-top">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="#about">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#mission">Our Mission</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#team">Meet Our Team</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contact Us</a>
            </li>
        </ul>
    </nav>

    <div class="container mt-4 scrollspy-example">
    <!-- About Us Section Card -->
    <section id="about" class="section card">
        <div class="card-body">
            <h2>About Bus Management System</h2>
            <p>Welcome to the Bus Management System. Our platform is designed to provide efficient and reliable bus management services, catering to both passengers and bus operators. By integrating modern technology and user-friendly design, we aim to enhance the overall travel experience.</p>
            <p>Our system allows users to easily check bus schedules, book tickets, and access real-time tracking information. Operators can efficiently manage their fleet, ensuring timely departures and arrivals while enhancing safety protocols.</p>
        </div>
    </section>

    <!-- Mission Section Card -->
    <section id="mission" class="section card">
        <div class="card-body">
            <h2>Our Mission</h2>
            <p>Our mission is to revolutionize the bus travel experience by providing a seamless and user-friendly platform for managing bus schedules, tracking buses in real time, and ensuring a safe and comfortable journey for all passengers.</p>
            <p>We believe in leveraging technology to improve the efficiency and reliability of public transportation, reducing wait times and enhancing safety. By empowering passengers with accurate information and timely updates, we strive to make bus travel a preferred choice for everyone while promoting eco-friendly commuting options.</p>
        </div>
    </section>

    <!-- History Section Card -->
    <section id="history" class="section card">
        <div class="card-body">
            <h2>Our History</h2>
            <p>Our company was founded in 2023 with a simple goal: to make bus travel safer, faster, and more accessible. Over the years, we've developed an innovative platform that integrates technology into public transportation, improving the experience for both passengers and operators.</p>
            <p>From humble beginnings to being one of the leading bus management systems in the region, our growth has been a testament to our commitment to excellence in service.</p>
        </div>
    </section>

    <!-- Awards Section Card -->
    <section id="awards" class="section card">
        <div class="card-body">
            <h2>Awards & Recognition</h2>
            <ul>
                <li>Best Transportation Management Platform - 2023</li>
                <li>Most Innovative Bus Service Provider - 2024</li>
                <li>Excellence in Customer Service - 2024</li>
            </ul>
        </div>
    </section>

    <!-- Core Values Section Card -->
    <section id="values" class="section card">
        <div class="card-body">
            <h2>Our Core Values</h2>
            <ul>
                <li><strong>Innovation:</strong> We embrace technology to improve bus travel.</li>
                <li><strong>Safety:</strong> We prioritize safety in every aspect of our service.</li>
                <li><strong>Customer Satisfaction:</strong> We focus on delivering the best experience for our passengers.</li>
                <li><strong>Sustainability:</strong> We are committed to reducing our environmental footprint.</li>
            </ul>
        </div>
    </section>

    <!-- Partnerships Section Card -->
    <section id="partnerships" class="section card">
        <div class="card-body">
            <h2>Our Partners</h2>
            <p>We collaborate with various industry leaders to enhance our services. Our partners play a key role in ensuring we deliver the best bus management system to our users.</p>
            <ul>
                <li>ABC Logistics</li>
                <li>XYZ Technologies</li>
                <li>Bus Manufacturers Inc.</li>
                <li>Eco-Friendly Transport Solutions</li>
            </ul>
        </div>
    </section>

    <!-- Future Plans Section Card -->
    <section id="future" class="section card">
        <div class="card-body">
            <h2>Our Future Plans</h2>
            <p>As we continue to evolve, we have big plans for the future. Our next goal is to expand our services to more regions, introduce electric buses to reduce carbon emissions, and integrate more smart technology to make the travel experience even better for our passengers.</p>
            <p>We are committed to making bus travel the preferred mode of transport for everyone, everywhere!</p>
        </div>
    </section>
</div>



            <h2>Meet Our Team</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="Images/member1.jpg" class="card-img-top team-img" alt="Team Member 1">
                        <div class="card-body">
                            <h5 class="card-title">Namatovu Christine</h5>
                            <p>Namatovu Christine is the visionary behind the Bus Management System. With over 10 years of experience in the transportation industry, Christine has a deep understanding of the challenges and opportunities in public transportation. Her leadership and innovative thinking have been instrumental in the development and success of our platform.</p>
                            <p class="card-text"><strong>CEO & Founder</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="Images/2.jpg" class="card-img-top team-img" alt="Team Member 2">
                        <div class="card-body">
                            <h5 class="card-title">Tazibwawo Wonder</h5>
                            <p>Tazibwawo Wonder oversees the day-to-day operations of the Bus Management System. With a strong background in logistics and operations management, Wonder ensures that our platform runs smoothly and efficiently. Her dedication to excellence and attention to detail have made her an invaluable member of our team.</p>
                            <p class="card-text"><strong>Chief Operating Officer</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="Images/1.jpg" class="card-img-top team-img" alt="Team Member 3">
                        <div class="card-body">
                            <h5 class="card-title">Mulungi Tina</h5>
                            <p>Mulungi Tina is the technical genius behind our platform. With a degree in computer science and extensive experience in software development, Tina leads our tech team in creating innovative solutions for bus management. Her expertise in real-time tracking and data analytics has been crucial to our success.</p>
                            <p class="card-text"><strong>Chief Technology Officer</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card">
                        <img src="Images/member5.jpg" class="card-img-top team-img" alt="Team Member 4">
                        <div class="card-body">
                            <h5 class="card-title">Owomugisha Tracy</h5>
                            <p>OwOwomugisha Tracy is our marketing strategist, focusing on innovative methods to promote our services and engage with our community. Her background in digital marketing allows us to reach a broader audience.</p>
                            <p class="card-text"><strong>Marketing Director</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="Images/member4.jpg" class="card-img-top team-img" alt="Team Member 5">
                        <div class="card-body">
                            <h5 class="card-title">Maita Joy </h5>
                            <p>Maita Joy is our client relations specialist, dedicated to ensuring an exceptional experience for all users of our platform. With her background in customer support, she is always ready to assist and address any concerns.</p>
                            <p class="card-text"><strong>Client Relations Manager</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="Images/member4.jpg" class="card-img-top team-img" alt="Team Member 6">
                        <div class="card-body">
                            <h5 class="card-title">Arinda Christine</h5>
                            <p>Arinda Christine is our finance specialist, responsible for managing our financial operations. With a degree in accounting and finance, she serves as our finance manager, overseeing budgeting and financial planning. Her expertise ensures that we maintain strong financial health while delivering value to our passengers and stakeholders.</p>
                            <p class="card-text"><strong>Finance Manager</strong></p>
                        </div>
                    </div>
                </div>
            </div>


        <section id="contact" class="section">
            <h2>Contact Us</h2>
            <p>If you have any questions or would like to get in touch, please feel free to reach out to us using the information below:</p>
            <ul>
                <li>Email: <a href="mailto:info@busmanagementsystem9@gmail.com">busmanagementsystem9@gmail.com</a></li>
                <li>Phone: +256-753-931-683</li>
                <li>Address: Mbarara , Uganda</li>
            </ul>
        </section>
    </div>
 
    <!-- Footer Section -->
    <footer class="text-center">
        <p>&copy; 2024 Bus Management System. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
