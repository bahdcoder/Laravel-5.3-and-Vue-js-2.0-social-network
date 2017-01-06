<template>
      <div>

      </div>
</template>

<script>
      export default {
            mounted() {
                  this.get_auth_user_data()
            },
            methods: {
                  get_auth_user_data() {
                        this.$http.get('/get_auth_user_data')
                            .then( (resp) => {
                                    this.$store.commit('auth_user_data', resp.body)
                            })
                  }
            }
      }
</script>