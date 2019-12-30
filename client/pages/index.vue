<template>
    <div id="index">
        <player-list></player-list>
        <app-actions></app-actions>
    </div>
</template>

<script>
    import PlayerList from '~/components/player-list.vue'
    import AppActions from '~/components/app-actions.vue'

    export default {
        components: { PlayerList, AppActions },
    }
</script>