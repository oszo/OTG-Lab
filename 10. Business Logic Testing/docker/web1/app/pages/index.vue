<template>
  <v-layout
    justify-center
    wrap
  >
    <v-flex text-xs-center>
      <div>
        <app-logo/>
        <h1 class="vue-title">
          VueStore
        </h1>
        <h2 class="vue-subtitle">
          Online Shopping Websites
        </h2>
        <div class="text-center">
          <v-btn
            color="teal"
            nuxt
            large
            outline
            to="/store"
          >
            Shopping
          </v-btn>
        </div>
      </div>
    </v-flex>
  </v-layout>
</template>

<script>
import AppLogo from '~/components/Logo.vue'

export default {
  components: {
    AppLogo
  }
}
</script>

<style>
.container {
  min-height: 80vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.vue-title {
  font-family: "Quicksand", "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; /* 1 */
  display: block;
  font-weight: 300;
  font-size: 100px;
  color: #35495e;
  letter-spacing: 1px;
}

.vue-subtitle {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
}

.links {
  padding-top: 15px;
}
</style>