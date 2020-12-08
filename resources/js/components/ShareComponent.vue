<template>
    <footer class="modal-card-foot is-justify-content-center">
        <ShareNetwork
            :network="facebook.network"
            :key="facebook.network"
            :style="{ backgroundColor: facebook.color }"
            :url="sharingUrl"
            :title="cardDetails.header_text"
            :description="cardDetails.card_text"
            :quote="facebookText"
            hashtags="cestitkeonline"
        >
            <i :class="facebook.icon"></i>
        </ShareNetwork>
        <ShareNetwork
            :network="twitter.network"
            :key="twitter.network"
            :style="{ backgroundColor: twitter.color }"
            :url="sharingUrl"
            :title="cardDetails.header_text"
            :description="cardDetails.card_text"
            :quote="cardDetails.signature_text"
            hashtags="cestitkeonline"
        >
            <i :class="twitter.icon"></i>
        </ShareNetwork>
        <ShareNetwork
            :network="email.network"
            :key="email.network"
            :style="{ backgroundColor: email.color }"
            :url="sharingUrl"
            :title="emailTitleText"
            :description="emailDescriptionText"
            :quote="cardDetails.signature_text"
            hashtags="cestitkeonline"
        >
            <i :class="email.icon"></i>
        </ShareNetwork>
    </footer>
</template>

<script>
export default {
    name: "ShareComponent",
    props: {
        cardDetails: {
            type: Object,
            default: () => ({})
        }
    },
    computed: {
        facebookText: function() {
            return (this.cardDetails.header_text + ' | ' + this.cardDetails.card_text + ' | ' + this.cardDetails.signature_text);
        },
        twitterText: function() {
            return (this.cardDetails.header_text + ' | ' + this.cardDetails.card_text + ' | ' + this.cardDetails.signature_text);
        },
        emailDescriptionText: function() {
            return (this.cardDetails.card_text + ' - ' + this.cardDetails.signature_text);
        },
        emailTitleText: function() {
            return ('Čestitka - ' + this.cardDetails.header_text);
        },
        sharingUrl: function() {
            return ('https://cestitke.online/' + this.cardDetails.id);
        }
    },
    data() {
        return {
            facebook:
                {
                    network: "facebook",
                    name: "Facebook",
                    icon: "fab fah fa-lg fa-facebook-f",
                    color: "#1877f2"
                },
            twitter: 
                {
                    network: "twitter",
                    name: "Twitter",
                    icon: "fab fah fa-lg fa-twitter",
                    color: "#1da1f2"
                },
            linkedin: 
                {
                    network: "linkedin",
                    name: "LinkedIn",
                    icon: "fab fah fa-lg fa-linkedin",
                    color: "#007bb5"
                },
            viber: 
                {
                    network: "viber",
                    name: "Viber",
                    icon: "fab fah fa-lg fa-viber",
                    color: "#59267c"
                },
            whatsapp: 
                {
                    network: "whatsapp",
                    name: "Whatsapp",
                    icon: "fab fah fa-lg fa-whatsapp",
                    color: "#25d366"
                },
            email: 
                {
                    network: "email",
                    name: "Email",
                    icon: "far fah fa-lg fa-envelope",
                    color: "#333333"
                }
        };
    }
};
</script>

<style>
.share-network-list {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    max-width: 1000px;
    margin: auto;
}
a[class^="share-network-"] {
    flex: none;
    color: #ffffff;
    background-color: #333;
    border-radius: 3px;
    overflow: hidden;
    display: flex;
    flex-direction: row;
    align-content: center;
    align-items: center;
    cursor: pointer;
    margin: 0 10px 10px 0;
}
a[class^="share-network-"] .fah {
    background-color: rgba(0, 0, 0, 0.2);
    padding: 10px;
    flex: 0 1 auto;
}
a[class^="share-network-"] span {
    padding: 0 10px;
    flex: 1 1 0%;
    font-weight: 500;
}
</style>
