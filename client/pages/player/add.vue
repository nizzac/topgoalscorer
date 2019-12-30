<template>
    <div id="add-player-form">
        <form>
            <input v-model="name" type="text" class="border p-3 rounded" />
            <button type="submit" class="py-3 px-6 bg-yellow-500 rounded ">{{ submitting ? 'Saving..' : 'Add Player' }}</button>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                submitting: false,
            }
        },
        methods: {
            addPlayer() {
                this.submitting = true;
                this.$axios.post('/api/player', { name: this.name })
                    .then(res => {
                        console.log('success');
                    })
                    .catch(err => {
                        console.log('error');
                    })
                    .then(() => {
                        console.log('finished');
                        this.submitting = false;
                    })
            }
        }
    }
</script>