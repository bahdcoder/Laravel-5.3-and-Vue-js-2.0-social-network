<template>
      <li>
            <a href="/notifications">
                  Unread notifications
                  <span class="badge">7</span>
            </a>
      </li>
</template>

<script>
      export default {
            mounted() {
                  this.get_unread()
            },
            methods: {
                  get_unread() {
                        this.$http.get('/get_unread')
                            .then( (nots) => {
                              console.log(nots)
                            })
                  }
            }
      }
</script>