<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_about.css">
    <title>About</title>

</head>
<body>
    <div>
        <div class="about-container">
            <p class="title">
                <span id="title-top">OUR PROJECT </span><br />
                <span id="title-bottom">&amp; OUR ROLES</span>
            </p>
            <div class="scroll-container">
                <div class="aboutProject">
                    <h1>About Our project:</h1>
                    <div class="description">
                        CoLab is a integrated webpage project management website designed to streamline workflow monitoring and task management.
                        With CoLab, users can efficiently oversee team progress, foster organization, enhance communication, and ensure timely project completion.
                    </div>
                </div>
                <h2>Our Roles:</h2>
                <div class="top">
                    <p class="left">
                        <span class="name">Jun Sheng</span><br />
                        <span class="role">Team Leader</span><br /><br />
                        <span class="desc">
                            - Reminding Backend <br />
                            - Hosting Website (AWS EC2) <br />
                            - Database Management <br />
                            - Hosting MySql database (AWS RDS)
                        </span>
                    </p>
                    <p class="right">
                        <span class="name">Yun Yang</span><br />
                        <span class="role">Vice Leader</span><br /><br />
                        <span class="desc">
                            - Project Filter [Frontend + Backend]<br />
                            - Gantt Chart [Frontend + Backend]<br />
                            - Notification Pop Up [Frontend] <br />
                            - Add Project Form [Frontend]<br />
                            - About Page [Frontend] <br />
                            - Main Page  [Frontend]
                        </span>
                    </p>
                </div>
                <div class="bottom">
                    <p class="left">
                        <span class="name">Aidan</span><br />
                        <span class="desc">
                            - Redesigned CSS [Frontend] <br />
                            - Project Page [Frontend] <br />
                            - Login and Sign In [Frontend] <br />
                            - Contact Us Form [Frontend + Backend]
                        </span>
                    </p>
                    <p class="right">
                        <span class="name">Ian</span><br />
                    <span class="desc">
                        - Payment System [Frontend + Backend]<br/>
                        - Notifications [Backend] <br />
                        - Profile Page [Frontend]<br />
                        - Profile Page Change Password [Frontend] <br />
                        - About Page [Frontend]
                     </span>
                    </p>
                </div>
            </div>

            <div class="buttons">
                <button type="button" id="back" onclick="window.location.href='helpme.php'">Back</button>
            </div>
        </div>

        <div class="donate-container">
            <span id="support">Support us by buying us a coffee!</span>
            <button type="button" id="donate" onclick="window.location.href='https://buy.stripe.com/test_aEU006fzC3aieRi8ww'">Donate</button>
        </div>
    </div>
</body>
</html>
