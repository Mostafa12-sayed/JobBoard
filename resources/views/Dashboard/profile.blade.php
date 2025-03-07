<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Settings</title>
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/framwork.css" />
    <link rel="stylesheet" href="css/master.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="page d-flex">
      <div class="sidebar p-relative bg-white p-20">
        <h3 class="p-relative txt-c mt-0">Mostafa</h3>
        <ul>
          <li>
            <a
              href="index.html"
              class="d-flex fs-14 rad-6 p-10 align-center c-black align-center"
              id="index"
            >
              <i class="fa-regular fa-chart-bar fa-fw mr-5"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a
              href="setting.html"
              class="d-flex fs-14 rad-6 p-10 align-center c-black align-center"
              id="setting"
            >
              <i class="fa-solid fa-gear fa-fw mr-5"></i>
              <span>Settings</span>
            </a>
          </li>
          <li>
            <a
              href="profile.html"
              class="d-flex fs-14 rad-6 p-10 align-center c-black align-center"
              id="profile"
            >
              <i class="fa-regular fa-user fa-fw mr-5"></i>
              <span>Profile</span>
            </a>
          </li>
          <li>
            <a
              href="projects.html"
              class="d-flex fs-14 rad-6 p-10 align-center c-black align-center"
              id="projects"
            >
              <i class="fa-solid fa-diagram-project fa-fw mr-5"></i>
              <span>Projects</span>
            </a>
          </li>
          <li>
            <a
              href="courses.html"
              class="d-flex fs-14 rad-6 p-10 align-center c-black align-center"
              id="courses"
            >
              <i class="fa-solid fa-graduation-cap fa-fw mr-5"></i>
              <span>Courses</span>
            </a>
          </li>
          <li>
            <a
              class="d-flex align-center fs-14 c-black rad-6 p-10"
              href="friends.html"
              id="friends"
            >
              <i class="fa-regular fa-circle-user fa-fw mr-5"></i>
              <span>Friends</span>
            </a>
          </li>
          <li>
            <a
              class="d-flex align-center fs-14 c-black rad-6 p-10"
              href="files.html"
              id="files"
            >
              <i class="fa-regular fa-file fa-fw mr-5"></i>
              <span>Files</span>
            </a>
          </li>
          <li>
            <a
              class="d-flex align-center fs-14 c-black rad-6 p-10"
              href="plans.html"
              id="plans"
            >
              <i class="fa-regular fa-credit-card fa-fw mr-5"></i>
              <span>Plans</span>
            </a>
          </li>
          <li class="logout">
            <a
              class="d-flex align-center fs-14 c-black rad-6 p-10"
              href="login.html"
            >
              <i class="fa-solid fa-right-from-bracket mr-5"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="content w-full">
        <!-- start head -->
        <div class="head bg-white p-15 d-flex align-center between-flex">
          <div class="search p-relative">
            <input
              class="p-10"
              type="search"
              name=""
              id=""
              placeholder="Type A keyword"
            />
          </div>
          <div class="icons d-flex align-center">
            <span class="notification p-relative">
              <i class="fa-regular fa-bell fa-lg"></i>
            </span>
            <img src="imgs/avatar.png " alt="" />
          </div>
        </div>
        <!-- end head -->
        <h1 class="p-relative">Profile</h1>
        <div
          class="profile m-20 mb-0 bg-white rad-6 d-flex block-mobile txt-c-mobile"
        >
          <div class="avatar-box align-center">
            <img src="imgs/avatar.png" alt="" class="image mb-10" />
            <h2 class="mt-10 m-0 mb-10">Mostafa sayed</h2>
            <span class="mt-0 c-grey mb-20 d-block">Level 20</span>
            <div class="progress p-relative mb-20">
              <span class="bg-blue blue" style="width: 50%">
                <!-- <span class="bg-blue">40%</span> -->
              </span>
            </div>
            <div class="starts mb-20">
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
            </div>
            <span class="mt-0 c-grey fs-13">550 Rating</span>
          </div>
          <div class="information-box">
            <div class="box-info d-flex block-mobile">
              <p class="c-grey m-0 fs-15 w-full">General Information</p>
              <div class="fs-14">
                <span class="c-grey">Full Name:</span>
                <span class="c-black">Mostsfa sayed</span>
              </div>
              <div class="fs-14">
                <span class="c-grey">Country:</span>
                <span class="c-black">Egypt</span>
              </div>
              <div class="fs-14">
                <span class="c-grey">Gender :</span>
                <span class="c-black">Male</span>
              </div>
              <label>
                <input type="checkbox" class="toggle-checkbox" />
                <div class="toggle-switch"></div>
              </label>
            </div>
            <div class="box-info d-flex block-mobile">
              <p class="c-grey m-0 fs-15 w-full">Personal Information</p>
              <div class="fs-14">
                <span class="c-grey">Email:</span>
                <span class="c-black">mostafa@gmail.com</span>
              </div>
              <div class="fs-14">
                <span class="c-grey"> Phone:</span>
                <span class="c-black">01022074789</span>
              </div>
              <div class="fs-14">
                <span class="c-grey">Date Of Birth:</span>
                <span class="c-black">8/12/1999</span>
              </div>
              <label>
                <input type="checkbox" class="toggle-checkbox" />
                <div class="toggle-switch"></div>
              </label>
            </div>
            <div class="box-info d-flex block-mobile">
              <p class="c-grey m-0 fs-15 w-full">Job Information</p>
              <div class="fs-14">
                <span class="c-grey">Title:</span>
                <span class="c-black">Full Stack Developer</span>
              </div>
              <div class="fs-14">
                <span class="c-grey"> Programming Language:</span>
                <span class="c-black">PHP</span>
              </div>
              <div class="fs-14">
                <span class="c-grey">Years Of Experienc:</span>
                <span class="c-black">+1</span>
              </div>
              <label>
                <input type="checkbox" class="toggle-checkbox" />
                <div class="toggle-switch"></div>
              </label>
            </div>
            <div class="box-info d-flex block-mobile">
              <p class="c-grey m-0 fs-15 d-block w-full">Billing Information</p>
              <div class="fs-14">
                <span class="c-grey">Payment Method:</span>
                <span class="c-black">Paypal</span>
              </div>
              <div class="fs-14">
                <span class="c-grey">Email:</span>
                <span class="c-black">email@website.com</span>
              </div>
              <div class="fs-14">
                <span class="c-grey">Subscription:</span>
                <span class="c-black">Monthly</span>
              </div>
              <label>
                <input type="checkbox" class="toggle-checkbox" />
                <div class="toggle-switch"></div>
              </label>
            </div>
          </div>
        </div>
        <div
          class="other-data m-20 mb-0 rad-6 d-flex block-mobile txt-c-mobile gap-20"
        >
          <div class="skills p-20 bg-white rad-6 p-relative flex-grow mt-20">
            <h2 class="mt-0 mb-10">Backup Manager</h2>
            <p class="mt-0 mb-20 c-grey fs-15">Complete Skills List</p>
            <div class="skills-row">
              <ul class="d-flex">
                <li>HTML</li>
                <li>Pugjs</li>
                <li>HAML</li>
              </ul>
            </div>
            <div class="skills-row">
              <ul class="d-flex">
                <li>CSS</li>
                <li>SASS</li>
                <li>Stylus</li>
              </ul>
            </div>

            <div class="skills-row">
              <ul class="d-flex">
                <li>JavaScript</li>
                <li>TypeScript</li>
              </ul>
            </div>

            <div class="skills-row">
              <ul class="d-flex">
                <li>Vuejs</li>
                <li>Reactjs</li>
              </ul>
            </div>

            <div class="skills-row">
              <ul class="d-flex">
                <li>Jest</li>
                <li>Jasmine</li>
              </ul>
            </div>

            <div class="skills-row">
              <ul class="d-flex">
                <li>PHP</li>
                <li>Laravel</li>
              </ul>
            </div>

            <div class="skills-row">
              <ul class="d-flex">
                <li>Python</li>
                <li>Django</li>
              </ul>
            </div>
          </div>
          <div class="activits p-20 bg-white rad-6 mt-20">
            <h2 class="mt-0 mb-10">Latest Activities</h2>
            <p class="mt-0 mb-20 c-grey fs-15">
              Latest Activities Done By The User
            </p>

            <div class="activits-row d-flex align-center txt-c-mobile">
              <img src="imgs/activity-01.png" alt="" />
              <div class="info">
                <span class="d-block mb-10">Store</span>
                <span class="c-grey"> Bought The Mastering Python Course </span>
              </div>
              <div class="date">
                <span class="d-block mb-10">18:10</span>
                <span class="c-grey">Yesterday</span>
              </div>
            </div>
            <div class="activits-row d-flex align-center txt-c-mobile">
              <img src="imgs/activity-02.png" alt="" />
              <div class="info">
                <span class="d-block mb-10">Academy</span>
                <span class="c-grey"> Got The PHP Certificate</span>
              </div>
              <div class="date">
                <span class="d-block mb-10">16:05</span>
                <span class="c-grey">Yesterday</span>
              </div>
            </div>
            <div class="activits-row d-flex align-center txt-c-mobile">
              <img src="imgs/activity-03.png" alt="" />
              <div class="info">
                <span class="d-block mb-10">Badges</span>
                <span class="c-grey"> Unlocked The 10 Skills Badge </span>
              </div>
              <div class="date">
                <span class="d-block mb-10">18:05</span>
                <span class="c-grey">Yesterday</span>
              </div>
            </div>
            <div class="activits-row d-flex align-center txt-c-mobile">
              <img src="imgs/activity-01.png" alt="" />
              <div class="info">
                <span class="d-block mb-10">Store</span>
                <span class="c-grey"> Bought The Mastering Python Course </span>
              </div>
              <div class="date">
                <span class="d-block mb-10">18:10</span>
                <span class="c-grey">Yesterday</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="./js/index.js"></script>
  </body>
</html>
