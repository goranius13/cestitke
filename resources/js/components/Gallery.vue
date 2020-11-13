<template>
    <div class="gallery m-4" id="gallery">
        <div class="gallery-item">
            <div class="content py-2" :style="bg">
                <CardDisplay
                    color="#776655"
                    headingText="Ana i Boris"
                    cardText="Neka vam se ispune sve želje koje bla bla bla bla \ni još bla bla bla"
                    signatureText="Tetka Milka s obitelji"
                    v-bind:isAudio="true"
                />
            </div>
        </div>
        <div class="gallery-item">
            <div class="content py-2" :style="bg3">
                <CardDisplay
                    color="#F64272"
                    headingText="Marija i Ante"
                    cardText="Neka vam se ispune sve želje koje \nbla bla bla bla \ni još bla bla bla"
                    signatureText="Mi naši"
                    v-bind:isAudio="true"
                />
            </div>
        </div>
        <div class="gallery-item">
            <div class="content py-2" :style="bg6">
                <CardDisplay
                    color="#286db6"
                    headingText="Dragi Mario"
                    cardText="Neki tekst za krštenje kojega mi se neda sad tražiti\npa ću ovako :). \nA sve to žele"
                    signatureText="tvoji najdraži"
                    v-bind:isAudio="false"
                />
            </div>
        </div>
        <div class="gallery-item">
            <div class="content py-2" :style="bg4">
                <CardDisplay
                    color="#f1b714"
                    headingText="Nekoj osobi"
                    cardText="želimo sve najbolje za rođendan \ni puno zdravlja \ni sreće \ni sve ostalo što ide"
                    signatureText="Mi naši"
                    v-bind:isAudio="true"
                />
            </div>
        </div>
        <div class="gallery-item">
            <div class="content py-2" :style="bg2">
                <CardDisplay
                    color="#51e5db"
                    headingText="Antonija i Ivan"
                    cardText="Neka vam se ispune sve želje koje bla bla bla bla i još bla bla bla"
                    signatureText="Kolege s posla"
                    v-bind:isAudio="true"
                />
            </div>
        </div>
        <div class="gallery-item">
            <div class="content py-2" :style="bg5">
                <CardDisplay
                    color="#7e4093"
                    headingText="Maloj Mariji"
                    cardText="Sve najbolje za rođendan žele \ni puno poljubaca šalju "
                    signatureText="baka i deda"
                    v-bind:isAudio="false"
                />
            </div>
        </div>
    </div>
</template>

<script>
import CardDisplay from "./CardDisplay.vue";

export default {
    name: "Gallery",
    components: {
        CardDisplay
    },
    data() {
        return {
            bg: {
                background:
                    "url('/images/bg_1_up.png') right bottom no-repeat, url('/images/bg_1_down.png') left top no-repeat",
                backgroundClip: "content-box, content-box",
                backgroundSize: "contain, contain",
                borderRadius: "8px"
            },
            bg2: {
                background:
                    "url('/images/bg_2_up.png') right bottom no-repeat, url('/images/bg_2_down.png') left top no-repeat",
                backgroundClip: "content-box, content-box",
                backgroundSize: "contain, contain",
                borderRadius: "8px"
            },
            bg3: {
                background:
                    "url('/images/bg_3_down.png') right bottom no-repeat, url('/images/bg_3_up.png') left top no-repeat",
                backgroundClip: "content-box, content-box",
                backgroundSize: "contain, contain",
                borderRadius: "8px"
            },
            bg4: {
                background:
                    "url('/images/bg_4_down.png') right bottom no-repeat, url('/images/bg_4_up.png') left top no-repeat",
                backgroundClip: "content-box, content-box",
                backgroundSize: "contain, contain",
                borderRadius: "8px"
            },
            bg5: {
                background:
                    "url('/images/bg_5_down.png') right bottom no-repeat, url('/images/bg_5_up.png') left top no-repeat",
                backgroundClip: "content-box, content-box",
                backgroundSize: "contain, contain",
                borderRadius: "8px"
            },
            bg6: {
                background:
                    "url('/images/bg_6_down.png') right bottom no-repeat, url('/images/bg_6_up.png') left top no-repeat",
                backgroundClip: "content-box, content-box",
                backgroundSize: "contain, contain",
                borderRadius: "8px"
            }
        };
    }
};
</script>

<style>
.gallery {
    display: grid;
    grid-column-gap: 20px;
    grid-row-gap: 20px;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)) !important;
    /*grid-auto-rows: 8px;*/
}
.gallery .card {
    max-width: 100%;
    border-radius: 8px;
    /*box-shadow: 4px 4px 8px #bbb;*/
    box-shadow: 0 4px 2px -1px rgba(0, 0, 0, 0.2),
        0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 2px 6px 0 rgba(0, 0, 0, 0.12);
    transition: all 1.5s ease;
    min-height: 350px;
}

.gallery .card:hover {
    /*box-shadow: 8px 8px 16px #bbb;*/
    box-shadow: 0 4px 2px -1px rgba(0, 0, 0, 0.2),
        0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 2px 6px 0 rgba(0, 0, 0, 0.12);
}
.gallery .card {
    padding: 4px;
}
.gallery .gallery-item {
    transition: grid-row-start 300ms linear;
    transition: transform 300ms ease;
    transition: all 0.5s ease;
    cursor: pointer;
}
.gallery .gallery-item:hover {
    transform: scale(1.025);
}
.vueAudioBetter {
    width: 200px !important;
}
.vueAudioBetter .operate span:last-child {
    display: none !important;
}
@media (max-width: 600px) {
    .gallery {
        grid-template-columns: repeat(auto-fill, minmax(30%, 1fr));
    }
}
@media (max-width: 400px) {
    .gallery {
        grid-template-columns: repeat(auto-fill, minmax(50%, 1fr));
    }
}
@-moz-keyframes zoomin {
    0% {
        max-width: 50%;
        transform: rotate(-30deg);
        filter: blur(4px);
    }
    30% {
        filter: blur(4px);
        transform: rotate(-80deg);
    }
    70% {
        max-width: 50%;
        transform: rotate(45deg);
    }
    100% {
        max-width: 100%;
        transform: rotate(0deg);
    }
}
@-webkit-keyframes zoomin {
    0% {
        max-width: 50%;
        transform: rotate(-30deg);
        filter: blur(4px);
    }
    30% {
        filter: blur(4px);
        transform: rotate(-80deg);
    }
    70% {
        max-width: 50%;
        transform: rotate(45deg);
    }
    100% {
        max-width: 100%;
        transform: rotate(0deg);
    }
}
@-o-keyframes zoomin {
    0% {
        max-width: 50%;
        transform: rotate(-30deg);
        filter: blur(4px);
    }
    30% {
        filter: blur(4px);
        transform: rotate(-80deg);
    }
    70% {
        max-width: 50%;
        transform: rotate(45deg);
    }
    100% {
        max-width: 100%;
        transform: rotate(0deg);
    }
}
@keyframes zoomin {
    0% {
        max-width: 50%;
        transform: rotate(-30deg);
        filter: blur(4px);
    }
    30% {
        filter: blur(4px);
        transform: rotate(-80deg);
    }
    70% {
        max-width: 50%;
        transform: rotate(45deg);
    }
    100% {
        max-width: 100%;
        transform: rotate(0deg);
    }
}
</style>
