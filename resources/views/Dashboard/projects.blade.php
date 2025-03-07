<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Projects</title>
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
        <h1 class="p-relative">Projects</h1>
        <div class="projects m-20 d-grid gap-20">
          <!-- start projects box -->
          <div class="box p-20 bg-white rad-6 p-relative">
            <span class="fs-13 date c-grey">15/10/2024</span>
            <span class="mt-0 mb-20">Dashboard</span>
            <p class="mt-0 mb-20 c-grey fs-13">
              Dashboard Project Design And Programming And Hosting
            </p>
            <div class="teams d-flex mt-25">
              <img src="imgs/team-01.png" alt=" " />
              <img src="imgs/team-02.png" alt=" " />
              <img src="imgs/team-03.png" alt=" " />
              <img src="imgs/team-04.png" alt=" " />
              <img src="imgs/team-05.png" alt=" " />
            </div>
            <ul class="d-flex">
              <li>Programming</li>
              <li>Design</li>
              <li>Hosting</li>
              <li>Marketing</li>
            </ul>
            <div class="between-flex block-mobile profit">
              <div class="progress p-relative">
                <span class="red" style="width: 50%"> </span>
              </div>
              <span class="c-grey fs-13 block-mobile">$2500</span>
            </div>
          </div>
          <div class="box p-20 bg-white rad-6 p-relative">
            <span class="fs-13 date c-grey">15/6/2022</span>
            <span class="mt-0 mb-20">Academy Portal</span>
            <p class="mt-0 mb-20 c-grey fs-13">
              Academy Portal Project Design And Programming
            </p>
            <div class="teams d-flex mt-25">
              <img src="imgs/team-01.png" alt=" " />

              <img src="imgs/team-03.png" alt=" " />
              <img src="imgs/team-04.png" alt=" " />
            </div>
            <ul class="d-flex">
              <li>Programming</li>
              <li>Design</li>
            </ul>
            <div class="between-flex block-mobile profit">
              <div class="progress p-relative">
                <span class="green" style="width: 80%"> </span>
              </div>
              <span class="c-grey fs-14 block-mobile">$1800</span>
            </div>
          </div>
          <div class="box p-20 bg-white rad-6 p-relative">
            <span class="fs-13 date c-grey">25/5/2024</span>
            <span class="mt-0 mb-20">Chatting Application</span>
            <p class="mt-0 mb-20 c-grey fs-13">
              Chatting Application Project Design
            </p>
            <div class="teams d-flex mt-25">
              <img src="imgs/team-01.png" alt=" " />
              <img src="imgs/team-02.png" alt=" " />
              <img src="imgs/team-03.png" alt=" " />
            </div>
            <ul class="d-flex">
              <li>Design</li>
            </ul>
            <div class="between-flex block-mobile profit">
              <div class="progress p-relative">
                <span class="blue" style="width: 90%"> </span>
              </div>
              <span class="c-grey fs-14 block-mobile">$950</span>
            </div>
          </div>
          <div class="box p-20 bg-white rad-6 p-relative">
            <span class="fs-13 date c-grey">15/10/2024</span>
            <span class="mt-0 mb-20">Flower Blog</span>
            <p class="mt-0 mb-20 c-grey fs-13">
              Flower project Design And Programming And Hosting
            </p>
            <div class="teams d-flex mt-25">
              <img src="imgs/team-01.png" alt=" " />
              <img src="imgs/team-02.png" alt=" " />
              <img src="imgs/team-03.png" alt=" " />
              <img src="imgs/team-04.png" alt=" " />
            </div>
            <ul class="d-flex">
              <li>Programming</li>
              <li>Design</li>
              <li>Hosting</li>
              <li>Marketing</li>
            </ul>
            <div class="between-flex block-mobile profit">
              <div class="progress p-relative">
                <span class="orange" style="width: 20%"> </span>
              </div>
              <span class="c-grey fs-14 block-mobile">$1500</span>
            </div>
          </div>
          <div class="box p-20 bg-white rad-6 p-relative">
            <span class="fs-13 date c-grey">15/10/2024</span>
            <span class="mt-0 mb-20">Dashboard</span>
            <p class="mt-0 mb-20 c-grey fs-13">
              Dashboard Project Design And Programming And Hosting
            </p>
            <div class="teams d-flex mt-25">
              <img src="imgs/team-01.png" alt=" " />
              <img src="imgs/team-02.png" alt=" " />
              <img src="imgs/team-03.png" alt=" " />
              <img src="imgs/team-04.png" alt=" " />
              <img src="imgs/team-05.png" alt=" " />
            </div>
            <ul class="d-flex">
              <li>Programming</li>
              <li>Design</li>
              <li>Hosting</li>
              <li>Marketing</li>
            </ul>
            <div class="between-flex block-mobile profit">
              <div class="progress p-relative">
                <span class="red" style="width: 50%"> </span>
              </div>
              <span class="c-grey fs-13 block-mobile">$2500</span>
            </div>
          </div>
          <div class="box p-20 bg-white rad-6 p-relative">
            <span class="fs-13 date c-grey">15/6/2022</span>
            <span class="mt-0 mb-20">Academy Portal</span>
            <p class="mt-0 mb-20 c-grey fs-13">
              Academy Portal Project Design And Programming
            </p>
            <div class="teams d-flex mt-25">
              <img src="imgs/team-01.png" alt=" " />

              <img src="imgs/team-03.png" alt=" " />
              <img src="imgs/team-04.png" alt=" " />
            </div>
            <ul class="d-flex">
              <li>Programming</li>
              <li>Design</li>
            </ul>
            <div class="between-flex block-mobile profit">
              <div class="progress p-relative">
                <span class="green" style="width: 80%"> </span>
              </div>
              <span class="c-grey fs-14 block-mobile">$1800</span>
            </div>
          </div>
          <div class="box p-20 bg-white rad-6 p-relative">
            <span class="fs-13 date c-grey">25/5/2024</span>
            <span class="mt-0 mb-20">Chatting Application</span>
            <p class="mt-0 mb-20 c-grey fs-13">
              Chatting Application Project Design
            </p>
            <div class="teams d-flex mt-25">
              <img src="imgs/team-01.png" alt=" " />
              <img src="imgs/team-02.png" alt=" " />
              <img src="imgs/team-03.png" alt=" " />
            </div>
            <ul class="d-flex">
              <li>Design</li>
            </ul>
            <div class="between-flex block-mobile profit">
              <div class="progress p-relative">
                <span class="blue" style="width: 90%"> </span>
              </div>
              <span class="c-grey fs-14 block-mobile">$950</span>
            </div>
          </div>
          <div class="box p-20 bg-white rad-6 p-relative">
            <span class="fs-13 date c-grey">15/10/2024</span>
            <span class="mt-0 mb-20">Flower Blog</span>
            <p class="mt-0 mb-20 c-grey fs-13">
              Flower project Design And Programming And Hosting
            </p>
            <div class="teams d-flex mt-25">
              <img src="imgs/team-01.png" alt=" " />
              <img src="imgs/team-02.png" alt=" " />
              <img src="imgs/team-03.png" alt=" " />
              <img src="imgs/team-04.png" alt=" " />
            </div>
            <ul class="d-flex">
              <li>Programming</li>
              <li>Design</li>
              <li>Hosting</li>
              <li>Marketing</li>
            </ul>
            <div class="between-flex block-mobile profit">
              <div class="progress p-relative">
                <span class="orange" style="width: 20%"> </span>
              </div>
              <span class="c-grey fs-14 block-mobile">$1500</span>
            </div>
          </div>
          <!-- end projects box -->
        </div>
      </div>
    </div>
    <script src="./js/index.js"></script>
  </body>
</html>
