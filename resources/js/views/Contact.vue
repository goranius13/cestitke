<template>
    <div class="columns my-4 is-flex is-justify-content-center">
        <div class="column is-half-desktop m-4">            

            <p v-if="errors.length">
                <b>Please correct the following error(s):</b>
                <ul>
                    <li v-for="error in errors">{{ error }}</li>
                </ul>
            </p>

            <p class="control my-4">
                <input
                    class="input"
                    type="email"
                    name="email"
                    v-model="message.email"
                    placeholder="E-Mail adresa"
                    required
                />
                <i class="bar"></i>
            </p>

            <p class="control my-4">
                <input
                    class="input"
                    type="text"
                    name="name"
                    v-model="message.name"
                    placeholder="Ime i prezime"
                    required
                />
                <i class="bar"></i>
            </p>

            <p class="control my-4">
                <textarea
                    class="textarea"
                    type="text"
                    name="message"
                    v-model="message.text"
                    placeholder="Unesite poruku"
                    required
                ></textarea>
                <i class="bar"></i>
            </p>

            <p class="control my-4">
                <button class="button cestitke-red" @click="checkForm">
                    Pošalji
                </button>
            </p>
            
            <article class="message" v-if="isMailSent" :class="[{ 'is-success': isMailSentSuccess }, { 'is-danger': !isMailSentSuccess }]">
                <div class="message-body" v-if="isMailSentSuccess">
                    Vaša poruka je uspješno poslana.
                </div>
                <div class="message-body" v-else>
                    Došlo je do pogreške prilikom slanja poruke. Molimo Vas pokušajte ponovno za par minuta.
                </div>
            </article>

        </div>
    </div>
</template>

<script>
export default {
    name: "Contact",
    components: {},
    data() {
        return {
            message: {
                name: "",
                email: "",
                text: ""
            },
            errors: [],
            isMailSent: false,
            isMailSentSuccess: false
        };
    },
    methods: {
        checkForm: function(e) {
            this.errors = [];

            if (!this.message.name) {
                this.errors.push("Name required.");
            }
            if (!this.message.email) {
                this.errors.push("Email required.");
            } else if (!this.validEmail(this.message.email)) {
                this.errors.push("Valid email required.");
            }

            if (!this.errors.length) {
                axios
                .post("/api/contact", {
                    data: this.message,
                    _method: "put"
                })
                .then(
                    response => {
                        console.log(response);
                        this.isMailSent = true;
                        this.isMailSentSuccess = response.data.success;
                    },
                    error => {
                        console.log(error);
                        this.isMailSent = true;
                    }
                );
            }

            e.preventDefault();
        },
        validEmail: function(email) {
            var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
    }
};
</script>

<style>
.label {
    float: left;
}
.cestitke-red {
    background: #d12229;
    color: #fff;
}
.cestitke-red:hover {
    color: #fff;
}

.background-thumbs {
    max-width: 90% !important;
}

.background-thumbs-body {
    align-items: unset !important;
}
</style>
