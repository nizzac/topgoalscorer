<template>
    <div class="flex flex-row items-center py-2 px-4 border-b border-yellow-400">
        <div class="flex-grow text-left">{{ player.name }}</div>
        <div class="w-1/6 text-center">{{ player.pivot.games }}</div>
        <div class="w-1/6 text-center">{{ player.pivot.goals }}</div>
        <div class="w-1/6 text-center">{{ player.pivot.keeper }}</div>
    </div>
</template>

<script>
    export default {
        props: ['player']
    }
</script>