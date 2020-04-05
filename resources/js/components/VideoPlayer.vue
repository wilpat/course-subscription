<template>
    <div class="container">
        <div id="course-player" style="padding: 56.25% 0 0 0; position: relative;"></div>
    </div>
</template>

<script>
import Player from '@vimeo/player';
export default {
    props: {
        vimeoVideoId: Number,
        nextEpisodeUrl: String
    },
    mounted() {
        const options = {
            id: this.vimeoVideoId
        };

        var player = new Player('course-player', options);
        player.on('ended', () =>{{
            window.location = this.nextEpisodeUrl;
        }})
    }
}
</script>

<style>
    iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100%;
    }
</style>