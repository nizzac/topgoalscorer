<template>
    <div class="top-scorers bg-yellow-200 rounded-lg overflow-hidden mb-8 border-l border-r border-yellow-400">
        <div class="flex flex-row items-center py-2 px-4 bg-yellow-400">
            <div class="flex-grow text-left font-bold">Name</div>
            <div class="w-1/6 text-center font-bold">Played</div>
            <div class="w-1/6 text-center font-bold">Scored</div>
            <div class="w-1/6 text-center font-bold">Keeper</div>
        </div>
        <player-item v-for="player in players" :key="player.id" :player="player" />
    </div>
</template>

<script>
    import PlayerItem from '~/components/player-item.vue'

    export default {
        components: { PlayerItem },
        data() {
            return {
                players: null
            }
        },
        mounted() {
            this.getPlayers();
        },
        methods: {
            async getPlayers() {
                await this.$axios.get('/api/latest')
                    .then(res => {
                        this.players = res.data.players;
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }
        }
    }
</script>