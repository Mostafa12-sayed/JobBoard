<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Steven Townsend</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://via.placeholder.com/1200x400" alt="Background Image" class="header-bg">
            <div class="profile-pic">
                <img src="https://via.placeholder.com/100" alt="Profile Picture" class="profile-img">
            </div>
        </div>

        <div class="main-content">
            <div class="left-section">
                <div class="header-info">
                    <h1>Steven Townsend</h1>
                    <h3>Web Designer</h3>
                </div>
                <p>
                    Obviously I'M Web Developer. Web Developer with over 3 years of experience. Experienced with all stages of the development cycle for dynamic web projects. The as opposed to using ‘Content here, content here’, making it look readable English. ‘Data Structures’ and ‘Algorithms’ are the heart programming. Initially most of the developers do not realize its important but when you will start your career in software development, you will find your code is either taking too much time or taking too much space.
                </p>

                <div class="section-card">
                    <h2>Skills:</h2>
                    <div class="skills">
                        <div class="skill">
                            <span>WordPress</span>
                            <div class="progress-bar">
                                <div class="progress" style="width: 84%;">84%</div>
                            </div>
                        </div>
                        <div class="skill">
                            <span>JavaScript</span>
                            <div class="progress-bar">
                                <div class="progress" style="width: 79%;">79%</div>
                            </div>
                        </div>
                        <div class="skill">
                            <span>HTML</span>
                            <div class="progress-bar">
                                <div class="progress" style="width: 95%;">95%</div>
                            </div>
                        </div>
                        <div class="skill">
                            <span>Figma</span>
                            <div class="progress-bar">
                                <div class="progress" style="width: 85%;">85%</div>
                            </div>
                        </div>
                        <div class="skill">
                            <span>Photoshop</span>
                            <div class="progress-bar">
                                <div class="progress" style="width: 70%;">70%</div>
                            </div>
                        </div>
                        <div class="skill">
                            <span>Illustrator</span>
                            <div class="progress-bar">
                                <div class="progress" style="width: 65%;">65%</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-card">
                    <h2>Experience:</h2>
                    <div class="experience">
                        <div class="exp-item">
                            <div class="exp-icon">
                                <img src="https://via.placeholder.com/40" alt="Icon">
                            </div>
                            <div class="exp-details">
                                <h4>Full Stack Developer <span>Shreethreads - India</span></h4>
                                <p class="exp-date">2019-22</p>
                                <p>It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. One may speculate that over the course of time certain letters were added or deleted at various positions within the text.</p>
                            </div>
                        </div>
                        <div class="exp-item">
                            <div class="exp-icon">
                                <img src="https://via.placeholder.com/40" alt="Icon">
                            </div>
                            <div class="exp-details">
                                <h4>Back-end Developer <span>CircleCl - U.S.A.</span></h4>
                                <p class="exp-date">2017-19</p>
                                <p>It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. One may speculate that over the course of time certain letters were added or deleted at various positions within the text.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-card">
                    <h2>Contact Me:</h2>
                    <form class="contact-form">
                        <div class="form-group">
                            <label for="name">Your Name:</label>
                            <input type="text" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Your Email:</label>
                            <input type="email" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="subject">Your Question:</label>
                            <input type="text" id="subject" name="subject" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <label for="message">Your Comment:</label>
                            <textarea id="message" name="message" placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-green">Send Message</button>
                    </form>
                </div>
            </div>

            <div class="right-section">
                <h2>Personal Detail:</h2>
                <ul class="personal-details">
                    <li><strong>Email:</strong> thomas@mail.com</li>
                    <li><strong>D.O.B.:</strong> 31st Dec, 1996</li>
                    <li><strong>Address:</strong> 15 Razy Street</li>
                    <li><strong>City:</strong> London</li>
                    <li><strong>Country:</strong> UK</li>
                    <li><strong>Postal Code:</strong> 521452</li>
                    <li><strong>Mobile:</strong> (+125)1542-8452</li>
                    <li><strong>Social:</strong>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </li>
                </ul>
                <a href="#" class="btn btn-green download-cv">
                    <i class="fas fa-file-pdf"></i> Download CV
                </a>
            </div>
        </div>
    </div>
</body>
</html>
