<nav class="navbar mb-4" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                <img src="/images/logo.png" />
            </a>

            <a
                role="button"
                class="navbar-burger burger"
                aria-label="menu"
                aria-expanded="false"
                data-target="navbarBasicExample"
            >
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div
            id="navbarBasicExample"
            class="navbar-menu"
        >
            <div class="navbar-start" >
                <router-link to="/" exact class="navbar-item mx-2">Početna</router-link>
                <router-link to="/vjencanja" class="navbar-item mx-2">Vjenčanja</router-link>
                <router-link to="/rodjendani" class="navbar-item mx-2">Rođendani</router-link>
                <router-link to="/blagdani" class="navbar-item mx-2">Blagdani</router-link>
                <router-link to="/kreiraj" class="navbar-item mx-2">Kreiraj čestitku</router-link>
            </div>
        </div>
    </nav>