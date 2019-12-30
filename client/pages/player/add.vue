<template>
    <div id="add-player-form">
        <form @submit.prevent="addPlayer" class="mb-8">
            <div v-if="errors.name" class="text-red-500 text-sm">{{ errors.name[0] }}</div>
            <div v-if="success" class="text-white text-sm bg-green-500 rounded p-3 mb-5 cursor-pointer" @click="success=false">{{ success }}</div>
            <div class="flex">
                <input v-model="name" type="text" class="flex-grow border border-gray-500 p-3 rounded" placeholder="First and Last Name" />
                <button type="submit" class="flex-shrink py-3 px-6 bg-yellow-500 rounded ml-3">{{ submitting ? 'Saving..' : 'Add Player' }}</button>
            </div>
        </form>
        <div class="text-center">
            <nuxt-link :to="{ name: 'index' }">Back</nuxt-link>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                errors: {},
                success: false,
                submitting: false,
            }
        },
        methods: {
            addPlayer() {
                this.submitting = true;
                this.errors = {};
                this.success = false;

                this.$axios.post('/api/player', { name: this.name })
                    .then(response => {
                        this.name = '';
                        this.success = response.data.success;
                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            this.errors = error.response.data.errors;
                        } else if (error.response.status == 403) {
                            console.log('Unauthorised Actions');
                        } else {
                            console.log('Something went wrong! Couldn\'t save player');
                        }
                    })
                    .then(() => {
                        console.log('finished');
                        this.submitting = false;
                    })
            }
        }
    }
</script>