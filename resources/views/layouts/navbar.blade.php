<nav class="navbar mb-4" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
        <router-link to="/" exact class="navbar-item mx-2"><img src="/images/logo.png" /></router-link>
            <a
                role="button"
                class="navbar-burger burger"
                id="cestitke-navbar-burger"
                aria-label="menu"
                aria-expanded="false"
                data-target="cestitke-navbar"
            >
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div
            id="cestitke-navbar"
            class="navbar-menu"
        >
            <div class="navbar-start" >
                <router-link to="/" exact class="navbar-item">Početna</router-link>
                <router-link to="/vjencanja" class="navbar-item">Vjenčanja</router-link>
                <router-link to="/rodjendani" class="navbar-item">Rođendani</router-link>
                <router-link to="/krstenja" class="navbar-item">Krštenja</router-link>
                <router-link to="/krizme" class="navbar-item">Krizme</router-link>
                <router-link to="/blagdani" class="navbar-item">Blagdani</router-link>
                <router-link to="/ostalo" class="navbar-item">Ostalo</router-link>
                <router-link to="/kreiraj" class="navbar-item">Kreiraj čestitku</router-link>
            </div>
        </div>
    </div>
</nav>