<template>
        <div>
            <p class="text-center" v-if="loading">
                Loading...
            </p>
            <p class="text-center" v-if="!loading">
                <button class="btn btn-success" v-if="status == 0" @click="add_friend">Add Friend</button>
                <button class="btn btn-success" v-if="status == 'pending'" @click="accept_friend">Accept Friend</button>
                <span class="text-success" v-if="status == 'waiting'">Waiting for response</span>
                <span class="text-success" v-if="status == 'friends'">Friends</span>
            </p>
        </div>
</template>

<script>
    export default {
        mounted() {
            this.$http.get('/check_relationship_status/' + this.profile_user_id )
                .then( (resp) => {
                    console.log(resp)
                    this.status = resp.body.status
                    this.loading = false
                })
        },
        props: ['profile_user_id'],
        data() {
            return {
                status: '',
                loading: true
            }
        },
        methods: {
            add_friend() {
                this.loading = true
                this.$http.get('/add_friend/' + this.profile_user_id )
                    .then( (r) => {
                        if(r.body == 1)
                            this.status = 'waiting'
                            noty({
                                type: 'success',
                                layout: 'bottomLeft',
                                text: 'Friend request sent .'
                            })
                            this.loading = false
                    })
            },
            accept_friend() {
                this.loading = true
                this.$http.get('/accept_friend/' + this.profile_user_id )
                    .then( (r) => {
                        if(r.body == 1)
                            this.status = 'friends'
                            noty({
                                type: 'success',
                                layout: 'bottomLeft',
                                text: 'You are now friend. Go ahead and hangout .'
                            })
                            this.loading = false
                    })
            }
        }
    }
</script>
