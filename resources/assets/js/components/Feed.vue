<template>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="panel panel-default" v-for="post in posts">
                        <div class="panel-heading">
                            <img :src="post.user.avatar" alt="" width="40px" height="40px" class="avatar-feed">
                            {{ post.user.name }}
                            <span class="pull-right">
                                {{ post.created_at }}
                            </span>
                        </div>

                        <div class="panel-body">
                            <p class="text-center">
                                {{ post.content }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        mounted() {
            this.get_feed()
        },

        methods: {
            get_feed() {
                this.$http.get('/feed')
                    .then( (response) => {
                        response.body.forEach( (post) => {
                            this.$store.commit('add_post', post)
                        })
                    })
            }
        },

        computed: {
            posts() {
                return this.$store.getters.all_posts
            }
        }
    }
</script>



<style>
    .avatar-feed{
        border-radius: 50%;
    }
</style>