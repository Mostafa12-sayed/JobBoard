<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Files</title>
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
        <h1 class="p-relative">Files</h1>
        <div class="friends m-20 d-grid gap-20">
          <!-- start course box -->
          <div class="box bg-white rad-6 p-relative p-20">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="friend">
              <img src="imgs/friend-01.jpg" alt="" class="rad-6" />
              <h4 class="mt-10 mb-10">Ahmed Nasser</h4>
              <span class="c-grey fs-13">JavaScript Developer</span>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>99 Friend</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>15 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>25 Articles</span>
              </div>
              <span class="vip fw-bold c-orange">VIP</span>
            </div>

            <div class="between-flex mt-20 p-relative fs-13">
              <span class="c-grey mb-0">Joined 02/10/2021</span>
              <div class="d-flex gap-20">
                <a class="btn-shape d-block blue bg-blue" href="profile.html"
                  >Profile</a
                >
                <a class="btn-shape d-block red bg-red" href="#">Remove</a>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative p-20">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="friend">
              <img src="imgs/friend-02.jpg" alt="" class="rad-6" />
              <h4 class="mt-10 mb-10">Omar Fathy</h4>
              <span class="c-grey fs-13">Cloud Developer</span>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>50 Friend</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>10 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>10 Articles</span>
              </div>
              <span class="vip fw-bold c-orange">VIP</span>
            </div>

            <div class="between-flex mt-20 p-relative fs-13">
              <span class="c-grey mb-0">Joined 02/11/2022</span>
              <div class="d-flex gap-20">
                <a class="btn-shape d-block blue bg-blue" href="profile.html"
                  >Profile</a
                >
                <a class="btn-shape d-block red bg-red" href="#">Remove</a>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative p-20">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="friend">
              <img src="imgs/friend-03.jpg" alt="" class="rad-6" />
              <h4 class="mt-10 mb-10">Omar Ahmed</h4>
              <span class="c-grey fs-13">Mobile Developer</span>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>100 Friend</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>25 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>13 Articles</span>
              </div>
            </div>

            <div class="between-flex mt-20 p-relative fs-13">
              <span class="c-grey mb-0">Joined 16/11/2024</span>
              <div class="d-flex gap-20">
                <a class="btn-shape d-block blue bg-blue" href="profile.html"
                  >Profile</a
                >
                <a class="btn-shape d-block red bg-red" href="#">Remove</a>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative p-20">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="friend">
              <img src="imgs/friend-04.jpg" alt="" class="rad-6" />
              <h4 class="mt-10 mb-10">Shady Nabil</h4>
              <span class="c-grey fs-13">Back-End Developer</span>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>120 Friend</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>13 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>18 Articles</span>
              </div>
              <span class="vip fw-bold c-orange">VIP</span>
            </div>

            <div class="between-flex mt-20 p-relative fs-13">
              <span class="c-grey mb-0">Joined 12/05/2022</span>
              <div class="d-flex gap-20">
                <a class="btn-shape d-block blue bg-blue" href="profile.html"
                  >Profile</a
                >
                <a class="btn-shape d-block red bg-red" href="#">Remove</a>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative p-20">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="friend">
              <img src="imgs/friend-05.jpg" alt="" class="rad-6" />
              <h4 class="mt-10 mb-10">Mohamed Ibrahim</h4>
              <span class="c-grey fs-13">Algorithm Developer</span>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>80 Friend</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>30 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>11 Articles</span>
              </div>
            </div>

            <div class="between-flex mt-20 p-relative fs-13">
              <span class="c-grey mb-0">Joined 05/03/2023</span>
              <div class="d-flex gap-20">
                <a class="btn-shape d-block blue bg-blue" href="profile.html"
                  >Profile</a
                >
                <a class="btn-shape d-block red bg-red" href="#">Remove</a>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative p-20">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="friend">
              <img src="imgs/friend-01.jpg" alt="" class="rad-6" />
              <h4 class="mt-10 mb-10">Ahmed Nasser</h4>
              <span class="c-grey fs-13">JavaScript Developer</span>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>99 Friend</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>15 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>25 Articles</span>
              </div>
            </div>

            <div class="between-flex mt-20 p-relative fs-13">
              <span class="c-grey mb-0">Joined 02/10/2021</span>
              <div class="d-flex gap-20">
                <a class="btn-shape d-block blue bg-blue" href="profile.html"
                  >Profile</a
                >
                <a class="btn-shape d-block red bg-red" href="#">Remove</a>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative p-20">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="friend">
              <img src="imgs/friend-01.jpg" alt="" class="rad-6" />
              <h4 class="mt-10 mb-10">Ahmed Nasser</h4>
              <span class="c-grey fs-13">JavaScript Developer</span>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>99 Friend</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>15 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>25 Articles</span>
              </div>
              <span class="vip fw-bold c-orange">VIP</span>
            </div>

            <div class="between-flex mt-20 p-relative fs-13">
              <span class="c-grey mb-0">Joined 02/10/2021</span>
              <div class="d-flex gap-20">
                <a class="btn-shape d-block blue bg-blue" href="profile.html"
                  >Profile</a
                >
                <a class="btn-shape d-block red bg-red" href="#">Remove</a>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative p-20">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="friend">
              <img src="imgs/friend-02.jpg" alt="" class="rad-6" />
              <h4 class="mt-10 mb-10">Omar Fathy</h4>
              <span class="c-grey fs-13">Cloud Developer</span>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>50 Friend</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>10 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>10 Articles</span>
              </div>
              <span class="vip fw-bold c-orange">VIP</span>
            </div>

            <div class="between-flex mt-20 p-relative fs-13">
              <span class="c-grey mb-0">Joined 02/11/2022</span>
              <div class="d-flex gap-20">
                <a class="btn-shape d-block blue bg-blue" href="profile.html"
                  >Profile</a
                >
                <a class="btn-shape d-block red bg-red" href="#">Remove</a>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative p-20">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="friend">
              <img src="imgs/friend-03.jpg" alt="" class="rad-6" />
              <h4 class="mt-10 mb-10">Omar Ahmed</h4>
              <span class="c-grey fs-13">Mobile Developer</span>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>100 Friend</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>25 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>13 Articles</span>
              </div>
            </div>

            <div class="between-flex mt-20 p-relative fs-13">
              <span class="c-grey mb-0">Joined 16/11/2024</span>
              <div class="d-flex gap-20">
                <a class="btn-shape d-block blue bg-blue" href="profile.html"
                  >Profile</a
                >
                <a class="btn-shape d-block red bg-red" href="#">Remove</a>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative p-20">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="friend">
              <img src="imgs/friend-04.jpg" alt="" class="rad-6" />
              <h4 class="mt-10 mb-10">Shady Nabil</h4>
              <span class="c-grey fs-13">Back-End Developer</span>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>120 Friend</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>13 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>18 Articles</span>
              </div>
              <span class="vip fw-bold c-orange">VIP</span>
            </div>

            <div class="between-flex mt-20 p-relative fs-13">
              <span class="c-grey mb-0">Joined 12/05/2022</span>
              <div class="d-flex gap-20">
                <a class="btn-shape d-block blue bg-blue" href="profile.html"
                  >Profile</a
                >
                <a class="btn-shape d-block red bg-red" href="#">Remove</a>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative p-20">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="friend">
              <img src="imgs/friend-05.jpg" alt="" class="rad-6" />
              <h4 class="mt-10 mb-10">Mohamed Ibrahim</h4>
              <span class="c-grey fs-13">Algorithm Developer</span>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>80 Friend</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>30 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>11 Articles</span>
              </div>
            </div>

            <div class="between-flex mt-20 p-relative fs-13">
              <span class="c-grey mb-0">Joined 05/03/2023</span>
              <div class="d-flex gap-20">
                <a class="btn-shape d-block blue bg-blue" href="profile.html"
                  >Profile</a
                >
                <a class="btn-shape d-block red bg-red" href="#">Remove</a>
              </div>
            </div>
          </div>
          <div class="box bg-white rad-6 p-relative p-20">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="friend">
              <img src="imgs/friend-01.jpg" alt="" class="rad-6" />
              <h4 class="mt-10 mb-10">Ahmed Nasser</h4>
              <span class="c-grey fs-13">JavaScript Developer</span>
            </div>
            <div class="icons fs-14 p-relative">
              <div class="mb-10">
                <i class="fa-regular fa-face-smile fa-fw"></i>
                <span>99 Friend</span>
              </div>
              <div class="mb-10">
                <i class="fa-solid fa-code-commit fa-fw"></i>
                <span>15 Projects</span>
              </div>
              <div>
                <i class="fa-regular fa-newspaper fa-fw"></i>
                <span>25 Articles</span>
              </div>
            </div>

            <div class="between-flex mt-20 p-relative fs-13">
              <span class="c-grey mb-0">Joined 02/10/2021</span>
              <div class="d-flex gap-20">
                <a class="btn-shape d-block blue bg-blue" href="profile.html"
                  >Profile</a
                >
                <a class="btn-shape d-block red bg-red" href="#">Remove</a>
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
