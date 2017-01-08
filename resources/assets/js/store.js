import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

export const store = new Vuex.Store({
      state: {
            nots: [],
            posts: [],
            auth_user: {}
      },
      getters: {
            all_nots(state) {
                  return state.nots
            },
            all_nots_count(state) {
                  return state.nots.length
            },
            all_posts(state) {
                  return state.posts
            }
      },
      mutations: {
            add_not(state, not) {
                  state.nots.push(not)
            },
            add_post(state, post) {
                  state.posts.push(post)
            },
            auth_user_data(state, user) {
                  state.auth_user = user
            },
            update_post_likes(state, payload)
            {
                  var post = state.posts.find( (p) => {
                        return p.id === payload.id
                  })

                  post.likes.push(payload.like)
            }
      }
})