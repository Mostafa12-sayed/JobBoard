<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Dashboard</title>
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
              id="settings"
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
        <h1 class="p-relative">Dashboard</h1>
        <div class="wrapper d-grid gap-20">
          <!-- start welcom widget -->
          <div class="welcome bg-white rad-10 txt-c-mobile block-mobile">
            <div class="intro p-20 d-flex space-between bg-eee">
              <div>
                <h2 class="m-0">Welcome</h2>
                <p class="c-grey mt-5">Mostsfa</p>
              </div>
              <img class="hide-mobile" src="imgs/welcome.png" alt="" />
            </div>
            <img src="imgs/avatar.png" class="avatar" alt="" />
            <div class="body txt-c d-flex p-20 mt-20 mb-20 block-mobile d">
              <div>
                Mostafa sayed
                <span class="d-block c-grey fs-14 mt-10">Developer</span>
              </div>
              <div>
                80 <span class="d-block c-grey fs-14 mt-10">Projects</span>
              </div>

              <div>
                $8500 <span class="d-block c-grey fs-14 mt-10">Earned</span>
              </div>
            </div>
            <a
              href="profile.html"
              class="visit bg-blue d-block c-white w-fit btn-shape"
              >Profile</a
            >
          </div>
          <!-- end welcom widget -->

          <!-- start quick draft widget -->
          <div
            class="quick-draft bg-white rad-10 txt-c-mobile block-mobile p-20"
          >
            <h2 class="mt-0 mb-10">Quick Draft</h2>
            <p class="mt-0 mb-20 c-grey fc-15">Write Draft For Your Ideas</p>
            <form class="form-drft">
              <input
                type="text"
                placeholder="Title"
                class="d-block mb-20 w-full b-none bg-eee rad-6 p-10"
              />
              <textarea
                name="thought"
                id=""
                placeholder="Your Thought"
                class="d-block mb-20 w-full b-none bg-eee rad-6 p-10"
              ></textarea>
              <input
                type="submit"
                class="save d-block bg-blue c-white rad-6 b-none w-fit btn-shape ml-auto"
                value="Save"
              />
            </form>
          </div>
          <!-- end quick draft widget -->

          <!-- start yearly targets -->
          <div class="targets bg-white rad-10 block-mobile p-20">
            <h2 class="mt-0 mb-10">Yearly Targets</h2>
            <p class="mt-0 mb-20 c-grey fc-15">Targets of the Year</p>
            <div class="">
              <div class="targets-row mb-20 center-flex blue">
                <div class="icon center-flex">
                  <i class="fa-solid fa-dollar-sign fa-lg c-blue"></i>
                </div>
                <div class="details">
                  <span class="fs-14 c-grey">Money</span>
                  <span class="d-block mt-5 mb-10 fw-bold"> $20.000</span>
                  <div class="progress p-relative">
                    <span class="bg-blue blue" style="width: 40%">
                      <span class="bg-blue">40%</span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="targets-row mb-20 center-flex orange">
                <div class="icon center-flex">
                  <i class="fa-solid fa-dollar-sign fa-lg c-orange"></i>
                </div>
                <div class="details">
                  <span class="fs-14 c-grey">Projects</span>
                  <span class="d-block mt-5 mb-10 fw-bold"> 24</span>
                  <div class="progress p-relative">
                    <span class="bg-orange orange" style="width: 55%">
                      <span class="bg-orange">55%</span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="targets-row mb-20 center-flex green">
                <div class="icon center-flex">
                  <i class="fa-solid fa-dollar-sign fa-lg c-green"></i>
                </div>
                <div class="details">
                  <span class="fs-14 c-grey">Team</span>
                  <span class="d-block mt-5 mb-10 fw-bold"> 12</span>
                  <div class="progress p-relative">
                    <span class="bg-green green" style="width: 75%">
                      <span class="bg-green">75%</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end yearly targets -->
          <!-- start Tickets -->
          <div class="tickets bg-white rad-10 block-mobile p-20">
            <h2 class="mt-0 mb-10">Tickets Statistic</h2>
            <p class="mt-0 mb-20 c-grey fc-15">
              Everything About Support Tickets
            </p>
            <div class="d-flex txt-c gap-20 f-wrap">
              <div class="box rad-10 p-20 fs-13 c-grey">
                <i
                  class="fa-regular fa-rectangle-list fa-2x mb-20 c-orange"
                ></i>
                <span class="d-block mb-10 fw-bold c-black"> 2500</span>
                Total
              </div>
              <div class="box rad-6 p-20 fs-13 c-grey">
                <i class="fa-solid fa-spinner fa-2x mb-20 c-blue"></i>
                <span class="d-block mb-10 fw-bold c-black"> 500</span>
                Pending
              </div>
              <div class="box rad-6 p-20 fs-13 c-grey">
                <i class="fa-regular fa-circle-check fa-2x mb-20 c-green"></i>
                <span class="d-block mb-10 fw-bold c-black"> 1900</span>
                Closed
              </div>
              <div class="box rad-6 p-20 fs-13 c-grey">
                <i class="fa-regular fa-rectangle-xmark fa-2x mb-20 c-red"></i>
                <span class="d-block mb-10 fw-bold c-black"> 100</span>
                Deleted
              </div>
            </div>
          </div>
          <!-- end Tickets -->

          <!-- start news -->
          <div class="news bg-white rad-10 p-20 txt-c-mobile">
            <h2 class="mt-0 mb-20">Latest News</h2>

            <div class="news-row d-flex align-center">
              <img src="imgs/news-01.png" alt="" class="rad-10" />
              <div class="news-details">
                <h3 class="c-black d-block fw-bold m-0">
                  Created SASS Section
                </h3>
                <p class="c-grey m-0 fs-14">New SASS Examples & Futorials</p>
              </div>
              <span class="bg-eee rad-6 fs-13 btn-shape lable">3 Days Ago</span>
            </div>
            <div class="news-row d-flex align-center">
              <img src="imgs/news-01.png" alt="" />
              <div class="news-details">
                <h3 class="c-black d-block fw-bold m-0">
                  Created SASS Section
                </h3>
                <p class="c-grey m-0 fs-14">New SASS Examples & Futorials</p>
              </div>
              <span class="bg-eee rad-6 fs-13 btn-shape lable">3 Days Ago</span>
            </div>
            <div class="news-row d-flex align-center">
              <img src="imgs/news-02.png" alt="" />
              <div class="news-details">
                <h3 class="c-black d-block fw-bold m-0">
                  Created SASS Section
                </h3>
                <p class="c-grey m-0 fs-14">New SASS Examples & Futorials</p>
              </div>
              <span class="bg-eee rad-6 fs-13 btn-shape lable">5 Days Ago</span>
            </div>
            <div class="news-row d-flex align-center">
              <img src="imgs/news-03.png" alt="" />
              <div class="news-details">
                <h3 class="c-black d-block fw-bold m-0">
                  Created SASS Section
                </h3>
                <p class="c-grey m-0 fs-14">New SASS Examples & Futorials</p>
              </div>
              <span class="bg-eee rad-6 fs-13 btn-shape lable">4 Days Ago</span>
            </div>
            <div class="news-row d-flex align-center">
              <img src="imgs/news-04.png" alt="" />
              <div class="news-details">
                <h3 class="c-black d-block fw-bold m-0">
                  Created SASS Section
                </h3>
                <p class="c-grey m-0 fs-14">New SASS Examples & Futorials</p>
              </div>
              <span class="bg-eee rad-6 fs-13 btn-shape lable">2 Days Ago</span>
            </div>
          </div>
          <!-- end news -->

          <!-- start tasks -->
          <div class="lastest-tasks bg-white rad-10 p-20">
            <h2 class="mt-0 mb-20">Latest Tasks</h2>

            <div class="task-row d-flex align-center">
              <div class="task-details">
                <h3 class="c-black d-block fw-bold m-0">
                  Created SASS Section
                </h3>
                <p class="c-grey m-0 fs-14">New SASS Examples & Futorials</p>
              </div>
              <i class="fa-regular fa-trash-can trash"></i>
            </div>
            <div class="task-row d-flex align-center">
              <div class="task-details">
                <h3 class="c-black d-block fw-bold m-0">
                  Created SASS Section
                </h3>
                <p class="c-grey m-0 fs-14">New SASS Examples & Futorials</p>
              </div>
              <i class="fa-regular fa-trash-can trash"></i>
            </div>
            <div class="task-row d-flex align-center">
              <div class="task-details">
                <h3 class="c-black d-block fw-bold m-0">
                  Created SASS Section
                </h3>
                <p class="c-grey m-0 fs-14">New SASS Examples & Futorials</p>
              </div>
              <i class="fa-regular fa-trash-can trash"></i>
            </div>
            <div class="task-row d-flex align-center done">
              <div class="task-details">
                <h3 class="c-black d-block fw-bold m-0">
                  Created SASS Section
                </h3>
                <p class="c-grey m-0 fs-14">New SASS Examples & Futorials</p>
              </div>
              <i class="fa-regular fa-trash-can trash"></i>
            </div>
            <div class="task-row d-flex align-center">
              <div class="task-details">
                <h3 class="c-black d-block fw-bold m-0">
                  Created SASS Section
                </h3>
                <p class="c-grey m-0 fs-14">New SASS Examples & Futorials</p>
              </div>
              <i class="fa-regular fa-trash-can trash"></i>
            </div>
          </div>
          <!-- end tasks -->

          <!-- start tasks -->
          <div class="top-search bg-white rad-10 p-20">
            <h2 class="mt-0 mb-20">Top Search Items</h2>
            <div class="search-row d-flex align-center space-between mb-10">
              <span class="c-black d-block m-0 fs-14 c-grey">keyword</span>
              <span class="rad-6 fs-13 c-grey">Search Count</span>
            </div>
            <div class="search-row d-flex align-center space-between">
              <span class="c-black d-block m-0 fs-14">Programming</span>
              <span class="bg-eee rad-6 fs-13 btn-shape lable">220</span>
            </div>
            <div class="search-row d-flex align-center space-between">
              <span class="c-black d-block m-0 fs-14">JavaScript</span>
              <span class="bg-eee rad-6 fs-13 btn-shape lable">180</span>
            </div>
            <div class="search-row d-flex align-center space-between">
              <span class="c-black d-block m-0 fs-14">PHP</span>
              <span class="bg-eee rad-6 fs-13 btn-shape lable">145</span>
            </div>
            <div class="search-row d-flex align-center space-between">
              <span class="c-black d-block m-0 fs-14">Code</span>
              <span class="bg-eee rad-6 fs-13 btn-shape lable">130</span>
            </div>
            <div class="search-row d-flex align-center space-between">
              <span class="c-black d-block m-0 fs-14">Design</span>
              <span class="bg-eee rad-6 fs-13 btn-shape lable">110</span>
            </div>
            <div class="search-row d-flex align-center space-between">
              <span class="c-black d-block m-0 fs-14">Logic</span>
              <span class="bg-eee rad-6 fs-13 btn-shape lable">95</span>
            </div>
          </div>
          <!-- end tasks -->

          <!-- start Latest uploads -->
          <div class="latest-uploads bg-white rad-10 p-20">
            <h2 class="mt-0 mb-20">Latest News</h2>
            <div class="uploads-row d-flex align-center">
              <img src="imgs/pdf.svg" alt="" class="rad-10" />
              <div class="uploads-details flex-grow">
                <span class="c-black d-block m-0"> my-file.pdf </span>
                <p class="c-grey m-0 fs-14">mostafa</p>
              </div>
              <span class="bg-eee rad-6 fs-13 btn-shape lable">2.9mb</span>
            </div>

            <div class="uploads-row d-flex align-center">
              <img src="imgs/png.svg" alt="" class="rad-10" />
              <div class="uploads-details flex-grow">
                <span class="c-black d-block m-0"> image-file.png </span>
                <p class="c-grey m-0 fs-14">sayed</p>
              </div>
              <span class="bg-eee rad-6 fs-13 btn-shape lable">3.2mb</span>
            </div>
            <div class="uploads-row d-flex align-center">
              <img src="imgs/psd.svg" alt="" class="rad-10" />
              <div class="uploads-details flex-grow">
                <span class="c-black d-block m-0"> psd-file.psd </span>
                <p class="c-grey m-0 fs-14">mostafa</p>
              </div>
              <span class="bg-eee rad-6 fs-13 btn-shape lable">6.5mb</span>
            </div>
            <div class="uploads-row d-flex align-center">
              <img src="imgs/zip.svg" alt="" class="rad-10" />
              <div class="uploads-details flex-grow">
                <span class="c-black d-block m-0"> zip-file.zip </span>
                <p class="c-grey m-0 fs-14">sayed</p>
              </div>
              <span class="bg-eee rad-6 fs-13 btn-shape lable">2.3mb</span>
            </div>
            <div class="uploads-row d-flex align-center">
              <img src="imgs/dll.svg" alt="" class="rad-10" />
              <div class="uploads-details flex-grow">
                <span class="c-black d-block m-0"> dll-file.dll </span>
                <p class="c-grey m-0 fs-14">mohamed</p>
              </div>
              <span class="bg-eee rad-6 fs-13 btn-shape lable">9.6mb</span>
            </div>
          </div>
          <!-- end Latest uploads -->

          <!-- start last project project widget -->
          <div class="last-project bg-white rad-10 p-20 p-relative">
            <h2 class="mt-0 mb-20">Last Project Progress</h2>
            <ul class="m-0 p-relative">
              <li class="mt-25 d-flex align-center done">Got the project</li>
              <li class="mt-25 d-flex align-center done">
                Started the project
              </li>
              <li class="mt-25 d-flex align-center done">
                The project About To Finish
              </li>
              <li class="mt-25 d-flex align-center current">
                Test the project
              </li>
              <li class="mt-25 d-flex align-center">
                Finish the project & Get Money
              </li>
            </ul>
            <img
              src="imgs/project.png"
              alt=""
              class="launch-icon hide-mobile"
            />
          </div>
          <!-- end last project project widget -->

          <!-- start reminders -->
          <div class="reminders bg-white rad-10 p-20">
            <h2 class="mt-0 mb-20">Reminders</h2>
            <div class="reminder-row d-flex align-center blue">
              <div class="circle blue"></div>
              <div class="reminder-details p-relative">
                <h3 class="c-black d-block fw-bold m-0">Check My Tasks List</h3>
                <p class="c-grey m-0 fs-14">28/09/2022 - 12:00am</p>
              </div>
            </div>
            <div class="reminder-row d-flex align-center orange">
              <div class="circle orange"></div>
              <div class="reminder-details p-relative">
                <h3 class="c-black d-block fw-bold m-0">Check My Projects</h3>
                <p class="c-grey m-0 fs-14">26/10/2022 - 12:00am</p>
              </div>
            </div>

            <div class="reminder-row d-flex align-center green">
              <div class="circle green"></div>
              <div class="reminder-details p-relative">
                <h3 class="c-black d-block fw-bold m-0">Call All my Clients</h3>
                <p class="c-grey m-0 fs-14">05/11/2022 - 12:00am</p>
              </div>
            </div>
            <div class="reminder-row d-flex align-center red">
              <div class="circle red"></div>
              <div class="reminder-details p-relative">
                <h3 class="c-black d-block fw-bold m-0">
                  Finish The Development Workshope
                </h3>
                <p class="c-grey m-0 fs-14">20/12/2022 - 12:00am</p>
              </div>
            </div>
          </div>
          <!-- end reminders -->

          <!-- start last post -->
          <div class="last-post bg-white rad-10 p-20">
            <h2 class="mt-0 mb-20">Latest Post</h2>
            <div class="post-details d-flex align-center">
              <img src="imgs/avatar.png" alt="" class="" class="image" />
              <div class="p-relative">
                <h3 class="c-black d-block fw-bold m-0 fs-16">Mostafa sayed</h3>
                <p class="c-grey m-0 fs-13">About 3 Hours Ago</p>
              </div>
            </div>

            <p class="m-0 d-block mb-25 txt-c-mobile">
              You can fool all of the people some of the time, and some of the
              people all of the time, but you can't fool all of the people all
              of the time.
            </p>
            <div class="c-grey d-flex space-between mt-20">
              <span> <i class="fa-regular fa-heart mr-5"></i> 1.7k </span>
              <span> <i class="fa-regular fa-comments mr-5"></i>500 </span>
            </div>
          </div>
          <!-- end last post -->

          <!-- start social media -->
          <div class="social-media-stats bg-white rad-10 p-20">
            <h2 class="mt-0 mb-25">Soical Media Stats</h2>
            <div class="box twitter between-flex p-15 mb-10 p-relative">
              <i
                class="fa-brands fa-twitter fa-2x c-white h-full center-flex"
              ></i>
              <span class="flex-grow">90k Followers</span>
              <a href="#" class="fs-13 c-white btn-shape">Follow</a>
            </div>
            <div class="box facebook between-flex p-15 mb-10 p-relative">
              <i
                class="fa-brands fa-facebook fa-2x c-white h-full center-flex"
              ></i>
              <span class="flex-grow">1M Like</span>
              <a href="#" class="fs-13 c-white btn-shape">Like</a>
            </div>
            <div class="box youtube between-flex p-15 mb-10 p-relative">
              <i
                class="fa-brands fa-youtube fa-2x c-white h-full center-flex"
              ></i>
              <span class="flex-grow">1M Subs</span>
              <a href="#" class="fs-13 c-white btn-shape">Subsicribe</a>
            </div>
            <div class="box linkedin between-flex p-15 mb-10 p-relative">
              <i
                class="fa-brands fa-linkedin fa-2x c-white h-full center-flex"
              ></i>
              <span class="flex-grow">90K Followers</span>
              <a href="#" class="fs-13 c-white btn-shape">Follow</a>
            </div>
          </div>
          <!-- end social media -->
        </div>
        <!-- /* start project table */ -->
        <div class="projects p-20 bg-white rad-10 m-20">
          <h2 class="mt-0 mb-20">Projects</h2>
          <div class="resposive-table">
            <table class="fs-15 w-full">
              <thead>
                <tr>
                  <td>Name</td>
                  <td>Finish Date</td>
                  <td>Client</td>
                  <td>Price</td>
                  <td>Team</td>
                  <td>Status</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Ministry Wikipedia</td>
                  <td>10 may 2022</td>
                  <td>MiNISTRY</td>
                  <td>$5300</td>
                  <td>
                    <img src="imgs/team-01.png" alt="" />
                    <img src="imgs/team-02.png" alt="" />
                    <img src="imgs/team-03.png" alt="" />
                    <img src="imgs/team-04.png" alt="" />
                  </td>
                  <td>
                    <span class="bg-red c-white btn-shape">Rejected</span>
                  </td>
                </tr>
                <tr>
                  <td>Ministry Wikipedia</td>
                  <td>10 may 2022</td>
                  <td>MiNISTRY</td>
                  <td>$5300</td>
                  <td>
                    <img src="imgs/team-01.png" alt="" />
                    <img src="imgs/team-02.png" alt="" />
                    <img src="imgs/team-03.png" alt="" />
                    <img src="imgs/team-04.png" alt="" />
                  </td>
                  <td>
                    <span class="bg-green c-white btn-shape">Completed</span>
                  </td>
                </tr>
                <tr>
                  <td>Ministry Wikipedia</td>
                  <td>10 may 2022</td>
                  <td>MiNISTRY</td>
                  <td>$5300</td>
                  <td>
                    <img src="imgs/team-01.png" alt="" />
                    <img src="imgs/team-02.png" alt="" />
                    <img src="imgs/team-03.png" alt="" />
                  </td>
                  <td>
                    <span class="bg-orange c-white btn-shape">Pending</span>
                  </td>
                </tr>
                <tr>
                  <td>Ministry Wikipedia</td>
                  <td>10 may 2022</td>
                  <td>MiNISTRY</td>
                  <td>$5300</td>
                  <td>
                    <img src="imgs/team-01.png" alt="" />

                    <img src="imgs/team-03.png" alt="" />
                    <img src="imgs/team-04.png" alt="" />
                  </td>
                  <td>
                    <span class="bg-green c-white btn-shape">Completed</span>
                  </td>
                </tr>
                <tr>
                  <td>Ministry Wikipedia</td>
                  <td>10 may 2022</td>
                  <td>MiNISTRY</td>
                  <td>$5300</td>
                  <td>
                    <img src="imgs/team-01.png" alt="" />
                    <img src="imgs/team-02.png" alt="" />
                  </td>
                  <td>
                    <span class="bg-orange c-white btn-shape">Pending</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="./js/index.js"></script>
</html>
