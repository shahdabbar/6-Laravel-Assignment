<template>
    <div>
        <button class="btn btn-primary ml-4" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');
        },

        props: ['userId', 'follows'],

        data: function() {
            return {
                status: this.follows,
            }
        },

        methods: {
            followUser() {
                axios.post('/follow/' + this.userId).then(
                    response => {
                        this.status = !this.status;
                      console.log(response.data)
                    });
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow'
            }
        }
    }
</script>
