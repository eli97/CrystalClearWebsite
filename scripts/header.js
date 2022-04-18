let appHeader = `
    <!-- Header Menu of the Page -->
    <header>

        <!-- Top header menu containing
            logo and Navigation bar -->
        <div id="top-header">

            <!-- Logo -->
            <div class="logo">
                <a href="#">
                    <div class="overlay"></div>
                </a>
            </div>

            <!-- Navigation Menu -->
            <nav>
                <div id="nav-menu">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Estimates</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Login</a></li>
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