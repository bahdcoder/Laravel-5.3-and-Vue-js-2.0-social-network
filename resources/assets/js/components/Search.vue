<template>
      <div class="container">
            <div class="row">
                  <div class="col-lg-6 col-lg-offset-3">
                        <input type="text" class="form-control" placeholder="search for other users" v-model="query" @keyup.enter="search()">
                        <br>
                        <div class="row" v-if="results.length">
                              <div class="text-center" v-for="user in results">
                                    <img :src="user.avatar" alt="">
                                    <h4 class="text-center">{{ user.name }}</h4>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</template>

<script>
      var algoliasearch = require('algoliasearch')

      var client = algoliasearch('TW3HOJFAGI', 'd7b842212e27adab0f94b9fab8c1ce5a')

      var index = client.initIndex('users')

      export default {
            mounted() {
                  
            },
            data() {
                  return {
                        query: '',
                        results: []
                  }
            },
            methods: {
                  search() {
                        index.search(this.query, (err, content) => {
                              this.results = content.hits
                        })
                  }
            }
      }
</script>
