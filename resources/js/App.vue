<template>
  <header class="text-gray-700 body-font">
      <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
          <a href="" class="flex title-font font-medium items-center text-gray-900 mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"> <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/> </svg>
              <span class="ml-3 text-xl">Shopping Cart</span>
          </a>
          <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-500">
              <router-link
                  class="mr-5 hover:text-gray-900"
                  :to="{name: 'products.index'}"
              >
                  Products
              </router-link>
          </nav>
          <router-link
              class="inline-flex items-center bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-xl"
              :to="{name: 'order.checkout'}"
          >
              Checkout<span class="inline-block ml-1" v-text="'(' + $store.state.cart.length + ' items)'"></span>
          </router-link>
      </div>
  </header>
  <router-view></router-view>
</template>

<script>
export default {

}
</script>

<style>

</style>