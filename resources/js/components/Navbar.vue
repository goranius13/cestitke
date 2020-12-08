<template>
    <nav class="navbar mb-4" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <router-link to="/" exact>
                <a class="navbar-item">
                    <img src="/images/logo.png" />
                </a>
            </router-link>

            <a
                role="button"
                class="navbar-burger burger"
                aria-label="menu"
                aria-expanded="false"
                data-target="navbarBasicExample"
                :class="{ 'is-active': isActive }"
                @click="isActive = !isActive"
            >
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div
            id="navbarBasicExample"
            class="navbar-menu"
            :class="{ 'is-active': isActive }"
            @click="isActive = !isActive"
        >
            <div class="navbar-start">
                <router-link to="/" exact
                    ><a class="navbar-item">Početna</a></router-link
                >
                <router-link to="/vjencanja"
                    ><a class="navbar-item">Vjenčanja</a></router-link
                >
                <router-link to="/rodjendani"
                    ><a class="navbar-item">Rođendani</a></router-link
                >
                <router-link to="/blagdani"
                    ><a class="navbar-item">Blagdani</a></router-link
                >
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "Navbar",
    data() {
        return {
            isActive: false
        };
    }
};
</script>

<style>
.navbar {
    background-color: transparent;
}

.navbar-start .active,
.navbar-start a:hover {
    background-image: linear-gradient(#d12229, #931215);
    color: #fff;
    border-radius: 4px;
}

.navbar-item {
    color: #d12229; /* 931215 */
    font-family: "Raleway", sans-serif;
    font-weight: 600;
    border-radius: 4px;
}
</style>
