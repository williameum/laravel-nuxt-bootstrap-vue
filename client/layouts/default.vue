<template>
  <div class="layout">
    <navbar v-if="state" />
    <!-- <TopHeader v-if="!state" /> -->
    <div class="container mt-4">
      <nuxt />
    </div>
  </div>
</template>

<script>

import Navbar from "~/components/Navbar";
import TopHeader from "~/components/TopHeader";
export default {
  components: {
    Navbar,
    TopHeader
  },
  data() {
    return{
      state: true
    }
  },
  created() {

  }
};
</script>
