<template>
    <div>
        <a :href="episode.url" v-for="(episode,index) in episodes" :key="index" class="text-decoration-none" style="color:black">
            <b-card no-body class="overflow-hidden mb-2">
                <b-row no-gutters>
                    <b-col md="2">
                        <b-button>
                            {{ episode.episode_number }}
                        </b-button>
                    </b-col>
                    <b-col md="10">
                        <b-card-body :title="episode.title">
                            <b-card-text>
                                {{ episode.description.substring(0,200) + '...' }}
                            </b-card-text>
                        </b-card-body>
                    </b-col>
                </b-row>
            </b-card>
        </a>
        
    </div>
</template>

<script>
export default {
    props: {
        episodes: {
            type: Array,
            description: 'The episodes of this course'
        }
    }
}
</script>