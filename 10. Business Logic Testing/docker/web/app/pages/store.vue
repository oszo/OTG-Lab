<template>
  <v-layout justify-center>
    <v-flex>
      <v-container
        fluid
        grid-list-xl
      >
        <v-layout row wrap>
          <v-flex
            v-for="card in cards"
            :key="card.title"
            xs12 sm6 md4
          >
            <v-card>
              <v-img
                :src="card.src"
                height="200px"
              >
                <v-container
                  fill-height
                  fluid
                  pa-2
                >
                  <v-layout fill-height>
                    <v-flex xs12 align-end flexbox>
                      <span class="headline white--text" v-text="card.title"></span>
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-img>

              <v-card-actions>
                <v-list-tile-content>
                  <v-list-tile-title v-text="card.price"></v-list-tile-title>
                </v-list-tile-content>
                <v-spacer></v-spacer>
                <v-btn icon>
                  <v-icon>shopping_cart</v-icon>
                </v-btn>
                <v-btn icon>
                  <v-icon>favorite</v-icon>
                </v-btn>
                <v-btn icon>
                  <v-icon>share</v-icon>
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-flex>
  </v-layout>
</template>
<script>
  export default {
    data: () => ({
      cards: [
        { title: 'Bag', price: '20$', src: '/img/product-1.jpg'},
        { title: 'Shoes', price: '299$', src: '/img/product-2.jpg'},
        { title: 'Dress', price: '49$', src: '/img/product-3.jpg'},
        { title: 'Shoes', price: '100$', src: '/img/product-4.jpg'},
        { title: 'Wallet', price: '12$', src: '/img/product-5.jpg'},
        { title: 'Hat', price: '10$', src: '/img/product-6.jpg'},
        { title: 'Watch', price: '799$', src: '/img/product-7.jpg'},
        { title: 'Sunglasses', price: '30$', src: '/img/product-8.jpg'},
        { title: 'Wallet', price: '14$', src: '/img/product-9.jpg'}
      ]
    })
  }
</script>