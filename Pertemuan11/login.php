<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "fungsi/pesan_kilat.php";
include "config/koneksi.php";

?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Nama Anda">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Aplikasi Rifqi</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="icon" href="assets/img/favicons/favicon.ico">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 20px;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-ing-lg {
                font-size: 3.5rem;
            }
        }
        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0.5em 1.5em rgba(0, 0, 0, 1), inset 0.125cm .5em rgba(0, 0, 0, .15);
        }
        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }
        .bi {
            vertical-align: -125em;
            fill: currentColor;
        }
        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }
        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1em;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112, 44, 154;
            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #652800;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }
        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
    </style>
    <link href="assets/custom/sign-in.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path d="M13.854 3.646.5.500 10.7081-7 7a.5.5 0 0 1-.708 01-3.5- 3.5.5.5 1 1.708-.708L6.5 10.29316.646-6.6478.5.500 1.7 08 02"></path>
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 10 8 1v14zmo 1AS 8 0 1 1 8 Gas 80010162"></path>
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 16 16">
            <path d="M6.278.768.768 01.08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 01.04.055 1.533-.16.787. 787 1.81.316.733.733 001-.031.8938.349 8.349 0 0 18. 344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124 .06 A.752.752 0 0 1 6.2782"></path>
            <path d="M10.794 3.148a.217.217 01.412 01.387 1.162c.173.518.579. 974 1.097 1.89711.162.387a.217.217 10.4121-1.162.387a1. 734 1.7340-1.097 1.0971-.387 1.162.217.217 0 0 1-412 0 1-387-1.162A1.734 1.734 9.31 6.5931-1.162-.387.217.21 70 010-41211.162-.387a1.734 1.734 01.097-1.0971.387- 1.162zM13.863.099a.145.145 01.274 01.258.774c.115.346.38 6.617.732.7321.774.258.145.145 01 0.2741-.774.258a1.156 1.156 000-.732.7321-.258.774.145.145 001-.274 01-258-.7 741.156 1.156 000-.732-7321-.774-.2580.145.145 01 0-2 741.774-.258c.346-.115.617-.386.732-732L13.863.1z"></path>
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path d="M8 1284 4 0 1 0 0-8 440000 828 0.5.500 1.5.5v2.5. 500 1-1 @v-24.5.5 0 0 1 8 0zmo 138.5.500 1.5.5v2.5.5 0 01-10V-24.5.5 18 137m8-5a.5.5 0 0 1-.5.5h-2a.5.500 1 -1h2a.5.5 @ 1.5.573 83.5.50 @ 1-.5.5h-2a.5.5 @@ 10-1h 2A.5.50 1 3 8rm10.657-5.657.5.5 0 0 10.7071-1.414 1.415 a.5.5 1 1.707-.70811.414-1.414.5.500 1.707 0zm-9.193 9.193.5.50 10.707L3.05 13.657a.5.5001-.707-.70711.41 4-1.414.5.500 1.707 0zm9.193 2.121.5.5 0 0 1-.707 01-1.4 14-1.414.5.5 1.707-.7071.414 1.4148.5.50 1.7072M 4.464 4.465.5.5 1.707 0L2.343 3.05 .5.50 11.707--707 1.414 1.4148.5.50 10.7082"></path>
        </symbol>
    </svg>
    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" width="len" height="1em">
                <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="len" height="1">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi m-auto d-none" width="le" height="1">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="ien" height="1">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    <svg class="bi s-auto d-none" width="le" height="1">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                    <svg class="bi me-2 opacity-58 theme-icon" width="iem" height="1e">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="le" height="1">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>
    <main class="form-signin w-100 m-auto">
        <form action="cek_login.php" method="post">
            <img class="b-4" src="assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Lakukan Login</h1>
            <?php
            if (isset($_SESSION['_flashdata'])) {
                echo "<br>";
                foreach ($_SESSION['_flashdata'] as $key => $val) {
                  echo get_flashdata($key);
                }
              }     
            ?>
            <div class="form-floating">
                <input type="text" class="form-control" name="username" placeholder="username" required>
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Masuk</button>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2017-2023</p>
        </form>
    </main>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!--