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
        <h1 class="p-relative">Settings</h1>
        <div class="settings-page m-20 d-grid gap-20">
          <!-- start settins box -->
          <div class="p-20 bg-white rad-6 p-relative">
            <h2 class="mt-0 mb-20">Site Control</h2>
            <p class="mt-0 mb-20 c-grey fs-15">
              Control The Website If There Is Maintenance
            </p>
            <div class="mb-15 between-flex">
              <div>
                <span>Website Control</span>
                <p class="mt-5 mb-0 c-grey fs-13">
                  Open/Close Website And Type The Reason
                </p>
              </div>
              <div>
                <label>
                  <input type="checkbox" class="toggle-checkbox" />
                  <div class="toggle-switch"></div>
                </label>
              </div>
            </div>
            <textarea
              class="close-message p-10 rad-6 d-block w-full"
              placeholder="Close Message Content"
            ></textarea>
          </div>
          <!-- end settings box -->

          <!-- start general info -->
          <div class="p-20 bg-white rad-6 p-relative">
            <h2 class="mt-0 mb-20">General Info</h2>
            <p class="mt-0 mb-20 c-grey fs-15">
              General Information About Your Account
            </p>
            <div class="mb-10">
              <label for="first-name " class="d-block c-grey mb-5 fs-15"
                >First Name</label
              >
              <input
                type="text"
                placeholder="First Name"
                class="w-full rad-6 p-10 fs-15"
              />
            </div>
            <div class="mb-10">
              <label for="last-name " class="d-block c-grey mb-5 fs-15"
                >Last Name</label
              >
              <input
                type="text"
                placeholder="Last Name"
                class="w-full rad-6 p-10 fs-15"
              />
            </div>

            <div class="mb-10">
              <label for="email" class="d-block c-grey mb-5 fs-15">Email</label>
              <div class="d-flex align-center">
                <input
                  type="text"
                  placeholder="o@nn.sa"
                  class="w-full rad-6 p-10 fs-15 mr-5"
                  disabled
                />
                <a href="#" class="c-blue p-10">Change</a>
              </div>
            </div>
          </div>
          <!-- end general info -->

          <!-- start security info -->
          <div class="p-20 bg-white rad-6 p-relative">
            <h2 class="mt-0 mb-20">Security Info</h2>
            <p class="mt-0 mb-20 c-grey fs-15">
              Security Information About Your Account
            </p>
            <div class="securtiy-row between-flex">
              <div>
                <span>Password</span>
                <p class="c-grey fs-13 mt-5">Last Change On 25/10/2021</p>
              </div>
              <a href="#" class="btn-shape bg-blue c-white hover-blue"
                >Change</a
              >
            </div>

            <div class="securtiy-row between-flex align-center">
              <div class="mt-10">
                <span>Two-Factor Authentication</span>
                <p class="c-grey fs-13 mt-5">Enable/Disable The Feature</p>
              </div>
              <label>
                <input type="checkbox" class="toggle-checkbox" />
                <div class="toggle-switch"></div>
              </label>
            </div>
            <div class="securtiy-row between-flex">
              <div class="mt-10">
                <span>Devices</span>
                <p class="c-grey fs-13 mt-5">Check The Login Devices List</p>
              </div>
              <a href="#" class="btn-shape bg-eee c-black">Devices</a>
            </div>
          </div>
          <!-- end security info -->

          <!-- start social info -->
          <div class="p-20 bg-white rad-6 p-relative">
            <h2 class="mt-0 mb-20">Social Info</h2>
            <p class="mt-0 mb-20 c-grey fs-15">Social Media Information</p>
            <div class="social-row mb-15">
              <div class="mb-10 p-relative">
                <i
                  class="fa-brands fa-twitter fa-2x c-white h-full center-flex c-grey"
                ></i>
                <input
                  type="text"
                  placeholder="Twitter User Name"
                  class="w-full rad-6 fs-15"
                />
              </div>
            </div>
            <div class="social-row mb-15">
              <div class="mb-10 p-relative">
                <i
                  class="fa-brands fa-facebook-f fa-2x c-white h-full center-flex c-grey"
                ></i>
                <input
                  type="text"
                  placeholder="Facebook User Name"
                  class="w-full rad-6 fs-15"
                />
              </div>
            </div>
            <div class="social-row mb-15">
              <div class="mb-10 p-relative">
                <i
                  class="fa-brands fa-youtube fa-2x c-white h-full center-flex c-grey"
                ></i>
                <input
                  type="text"
                  placeholder="Youtube User name"
                  class="w-full rad-6 fs-15"
                />
              </div>
            </div>
            <div class="social-row">
              <div class="p-relative">
                <i
                  class="fa-brands fa-linkedin fa-2x c-white h-full center-flex c-grey"
                ></i>
                <input
                  type="text"
                  placeholder="Linkedin User Name"
                  class="w-full rad-6 fs-15"
                />
              </div>
            </div>
          </div>
          <!-- end social info -->

          <!-- start Widgets Control -->
          <div class="widget-control p-20 bg-white rad-6 p-relative">
            <h2 class="mt-0 mb-10">Widgets Control</h2>
            <p class="mt-0 mb-20 c-grey fs-15">Show/Hide Widgets</p>
            <div class="box mb-15">
              <div class="mb-10 p-relative">
                <input
                  type="checkbox"
                  class="rad-6 fs-15"
                  name="draft"
                  id="draft"
                />
                <label for="draft">Quick Draft</label>
              </div>
              <div class="mb-10 p-relative">
                <input
                  type="checkbox"
                  class="rad-6 fs-15"
                  name="targets"
                  id="targets"
                />
                <label for="targets">Yearly Targets</label>
              </div>
              <div class="mb-10 p-relative">
                <input
                  type="checkbox"
                  class="rad-6 fs-15"
                  name="tickets"
                  id="tickets"
                />
                <label for="tickets">Tickets Statistics</label>
              </div>
              <div class="mb-10 p-relative">
                <input
                  type="checkbox"
                  class="rad-6 fs-15"
                  name="news"
                  id="news"
                />
                <label for="news">Latest News</label>
              </div>
              <div class="mb-10 p-relative">
                <input
                  type="checkbox"
                  class="rad-6 fs-15"
                  name="tasks"
                  id="tasks"
                />
                <label for="tasks" class="fs-16">Latest Tasks</label>
              </div>
              <div class="mb-10 p-relative">
                <input
                  type="checkbox"
                  class="rad-6 fs-15"
                  name="search-items"
                  id="search-items"
                />
                <label for="search-items" class="fs-16">Top Search Items</label>
              </div>
            </div>
          </div>
          <!-- end Widgets Control -->

          <!-- start Backup Manager -->
          <div class="backup-manager p-20 bg-white rad-6 p-relative">
            <h2 class="mt-0 mb-10">Backup Manager</h2>
            <p class="mt-0 mb-20 c-grey fs-15">
              Control Backup Time And Locations
            </p>
            <div class="box mb-15">
              <div class="mb-10 p-relative redio">
                <input
                  type="radio"
                  class="rad-6 fs-15"
                  name="bachup"
                  id="daily"
                />
                <label for="daily">Daily</label>
              </div>
              <div class="mb-10 p-relative redio">
                <input
                  type="radio"
                  class="rad-6 fs-15"
                  name="bachup"
                  id="weekly"
                />
                <label for="weekly">Weekly</label>
              </div>
              <div class="mb-10 p-relative redio">
                <input
                  type="radio"
                  class="rad-6 fs-15"
                  name="bachup"
                  id="monthly"
                />
                <label for="monthly">Tickets Statistics</label>
              </div>
            </div>
            <div class="box between-flex gap-20">
              <input type="radio" id="megaman" name="server" />
              <label
                for="megaman"
                class="method-backup p-10 w-full block-mobile"
              >
                <i class="fa-solid fa-server d-block mb-10 d-block"></i>
                <span>Megaman</span>
              </label>
              <input type="radio" id="zero" name="server" />

              <label for="zero" class="method-backup p-10 w-full">
                <i class="fa-solid fa-server d-block mb-10 d-block"></i>
                <span>Zero</span>
              </label>
              <input type="radio" id="sigma" name="server" />

              <label for="sigma" class="method-backup p-10 w-full">
                <i class="fa-solid fa-server d-block mb-10 d-block"></i>
                <span>Sigma</span>
              </label>
            </div>
          </div>
          <!-- end Widgets Control -->
        </div>
      </div>
    </div>
    <script src="./js/index.js"></script>
  </body>
</html>
