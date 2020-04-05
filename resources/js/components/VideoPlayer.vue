<template>
    <div class="container">
        <div id="course-player" style="padding: 56.25% 0 0 0; position: relative;"></div>
    </div>
</template>

<script>
import Player from '@vimeo/player';
export default {
    props: {
        video: {
            type: Object,
            description: 'The video of an episode'
        },
        nextVideoUrl: String
    },
    mounted() {
        const options = {
            id: this.video.vimeo_video_id,
        };

        var player = new Player('course-player', options);
        player.on('ended', () =>{{
            window.location = this.nextVideoUrl;
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