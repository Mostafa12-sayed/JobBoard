<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Courses</title>
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
        <h1 class="p-relative">Courses</h1>
        <div class="courses m-20 d-grid gap-20">
          <!-- start course box -->
          <div class="box bg-white rad-6 p-relative">
            <img src="imgs/course-01.jpg" alt="" class="rad-6" />
            <img src="imgs/team-01.png" alt="" class="course-owner" />
            <div class="p-20">
              <h4 class="mt-0 mb-0">Mastering Web Design</h4>
              <p class="mt-0 mb-0 c-grey fs-14">
                Master The Art Of Web Designing And Mocking, Prototyping And
                Creating Web Design Architecture
              </p>
              <span class="info btn-shape d-block">Course Info </span>
              <div class="between-flex mt-20 p-relative">
                <span class="c-grey mb-0"
                  ><i class="fa-regular fa-user fs-14"></i> 950</span
                >
                <span class="c-grey mb-0">$ 165</span>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative">
            <img src="imgs/course-02.jpg" alt="" class="rad-6" />
            <img src="imgs/team-02.png" alt="" class="course-owner" />
            <div class="p-20">
              <h4 class="mt-0 mb-0">Data Structure And Algorithms</h4>
              <p class="mt-0 mb-0 c-grey fs-14">
                Master The Art Of Data Strcuture And Famous Algorithms Like
                Sorting, Dividing And Conquering
              </p>
              <span class="info btn-shape d-block">Course Info </span>
              <div class="between-flex mt-20 p-relative">
                <span class="c-grey mb-0"
                  ><i class="fa-regular fa-user fs-14"></i> 1150</span
                >
                <span class="c-grey mb-0">$210</span>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative">
            <img src="imgs/course-03.jpg" alt="" class="rad-6" />
            <img src="imgs/team-03.png" alt="" class="course-owner" />
            <div class="p-20">
              <h4 class="mt-0 mb-0">Responsive Web Design</h4>
              <p class="mt-0 mb-0 c-grey fs-14">
                Mastering Responsive Web Design And Media Queries And Know
                Everything About Breakpoints
              </p>
              <span class="info btn-shape d-block">Course Info </span>
              <div class="between-flex mt-20 p-relative">
                <span class="c-grey mb-0"
                  ><i class="fa-regular fa-user fs-14"></i> 650</span
                >
                <span class="c-grey mb-0">$90</span>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative">
            <img src="imgs/course-04.jpg" alt="" class="rad-6" />
            <img src="imgs/team-04.png" alt="" class="course-owner" />
            <div class="p-20">
              <h4 class="mt-0 mb-0">PHP Examples</h4>
              <p class="mt-0 mb-0 c-grey fs-14">
                PHP Tutorials And Examples And Practice On Web Application And
                Connecting With Databases
              </p>
              <span class="info btn-shape d-block">Course Info </span>
              <div class="between-flex mt-20 p-relative">
                <span class="c-grey mb-0"
                  ><i class="fa-regular fa-user fs-14"></i> 850</span
                >
                <span class="c-grey mb-0">$150</span>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative">
            <img src="imgs/course-04.jpg" alt="" class="rad-6" />
            <img src="imgs/team-04.png" alt="" class="course-owner" />
            <div class="p-20">
              <h4 class="mt-0 mb-0">PHP Examples</h4>
              <p class="mt-0 mb-0 c-grey fs-14">
                PHP Tutorials And Examples And Practice On Web Application And
                Connecting With Databases
              </p>
              <span class="info btn-shape d-block">Course Info </span>
              <div class="between-flex mt-20 p-relative">
                <span class="c-grey mb-0"
                  ><i class="fa-regular fa-user fs-14"></i> 850</span
                >
                <span class="c-grey mb-0">$150</span>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative">
            <img src="imgs/course-01.jpg" alt="" class="rad-6" />
            <img src="imgs/team-01.png" alt="" class="course-owner" />
            <div class="p-20">
              <h4 class="mt-0 mb-0">Mastering Web Design</h4>
              <p class="mt-0 mb-0 c-grey fs-14">
                Master The Art Of Web Designing And Mocking, Prototyping And
                Creating Web Design Architecture
              </p>
              <span class="info btn-shape d-block">Course Info </span>
              <div class="between-flex mt-20 p-relative">
                <span class="c-grey mb-0"
                  ><i class="fa-regular fa-user fs-14"></i> 950</span
                >
                <span class="c-grey mb-0">$ 165</span>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative">
            <img src="imgs/course-02.jpg" alt="" class="rad-6" />
            <img src="imgs/team-02.png" alt="" class="course-owner" />
            <div class="p-20">
              <h4 class="mt-0 mb-0">Data Structure And Algorithms</h4>
              <p class="mt-0 mb-0 c-grey fs-14">
                Master The Art Of Data Strcuture And Famous Algorithms Like
                Sorting, Dividing And Conquering
              </p>
              <span class="info btn-shape d-block">Course Info </span>
              <div class="between-flex mt-20 p-relative">
                <span class="c-grey mb-0"
                  ><i class="fa-regular fa-user fs-14"></i> 1150</span
                >
                <span class="c-grey mb-0">$210</span>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative">
            <img src="imgs/course-03.jpg" alt="" class="rad-6" />
            <img src="imgs/team-03.png" alt="" class="course-owner" />
            <div class="p-20">
              <h4 class="mt-0 mb-0">Responsive Web Design</h4>
              <p class="mt-0 mb-0 c-grey fs-14">
                Mastering Responsive Web Design And Media Queries And Know
                Everything About Breakpoints
              </p>
              <span class="info btn-shape d-block">Course Info </span>
              <div class="between-flex mt-20 p-relative">
                <span class="c-grey mb-0"
                  ><i class="fa-regular fa-user fs-14"></i> 650</span
                >
                <span class="c-grey mb-0">$90</span>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative">
            <img src="imgs/course-04.jpg" alt="" class="rad-6" />
            <img src="imgs/team-04.png" alt="" class="course-owner" />
            <div class="p-20">
              <h4 class="mt-0 mb-0">PHP Examples</h4>
              <p class="mt-0 mb-0 c-grey fs-14">
                PHP Tutorials And Examples And Practice On Web Application And
                Connecting With Databases
              </p>
              <span class="info btn-shape d-block">Course Info </span>
              <div class="between-flex mt-20 p-relative">
                <span class="c-grey mb-0"
                  ><i class="fa-regular fa-user fs-14"></i> 850</span
                >
                <span class="c-grey mb-0">$150</span>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative">
            <img src="imgs/course-04.jpg" alt="" class="rad-6" />
            <img src="imgs/team-04.png" alt="" class="course-owner" />
            <div class="p-20">
              <h4 class="mt-0 mb-0">PHP Examples</h4>
              <p class="mt-0 mb-0 c-grey fs-14">
                PHP Tutorials And Examples And Practice On Web Application And
                Connecting With Databases
              </p>
              <span class="info btn-shape d-block">Course Info </span>
              <div class="between-flex mt-20 p-relative">
                <span class="c-grey mb-0"
                  ><i class="fa-regular fa-user fs-14"></i> 850</span
                >
                <span class="c-grey mb-0">$150</span>
              </div>
            </div>
          </div>
          <!-- end course box -->
        </div>
      </div>
    </div>
    <script src="./js/index.js"></script>
  </body>
</html>
