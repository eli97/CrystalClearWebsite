let appHeader = `
    <!-- Header Menu of the Page -->
    <header>

        <!-- Top header menu containing
            logo and Navigation bar -->
        <div id="top-header">


            <!-- Navigation Bar -->
            <nav>
                <!-- Logo -->
                <div class="logo">
                    <a href="#Home">
                        <div class="overlay"></div>
                    </a>
                </div>

                <input id="collapseMenu" class="toggle" type="checkbox">
                <label for="collapseMenu" class="menu-toggle">Menu</label>

                <div id="nav-menu">
                    <ul>
                        <li class="nav-item"><a href="#Home">Home</a></li>
                        <li class="nav-item"><a href="#Estimates">Estimates</a></li>
                        <li class="nav-item"><a href="#Contact">Contact Us</a></li>
                        <li class="nav-item"><a href="#Login">Login</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- Image menu in Header to contain an Image and
            a sample text over that image -->
        <div id="header-image-menu">

        </div>
    </header>
`;
document.getElementById("app-header").innerHTML = appHeader;