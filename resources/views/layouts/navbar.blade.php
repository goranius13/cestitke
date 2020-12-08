<nav class="navbar mb-4" role="navigation" aria-label="main navigation">
    <div class="container is-flex is-justify-content-center">
        <div class="navbar-brand">
        <router-link to="/" exact class="navbar-item mx-2"><img src="/images/logo.png" /></router-link>
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
                <router-link to="/kontakt" class="navbar-item mx-2">Kontakt</router-link>
                <router-link to="/uvjeti" class="navbar-item mx-2">Uvjeti</router-link>

            </div>
        </div>
    </div>
</nav>