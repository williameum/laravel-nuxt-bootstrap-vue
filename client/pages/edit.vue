<template>
  <div class="row justify-content-center">
    <form @submit.prevent="updatePet" class="text-center">
      <div class="text-center">
        <label for="name">Dog's Name</label>
        <input id="name" type="text" class="form-control text-center" v-model="dogUpdate.name" />
        <br />
        <label for="description">Dog's Description</label>
        <input
          id="description"
          type="text"
          class="form-control text-center"
          v-model="dogUpdate.description"
        />
      </div>
      <br />
      <div class="text-center">
        <button
          type="submit"
          class="btn btn-success"
          onclick="javascript:window.location.href='/home'"
        >Update</button>
        <nuxt-link to="/home" class="btn btn-danger">Cancel</nuxt-link>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      arrayDogs: [],
      dogUpdate: {
        name: "",
        description: ""
      }
    };
  },

  created() {
    this.getPets();
  },

  methods: {
    async getPets() {
      try {
        let res = await axios.get(`/dog/${this.$route.params.id}`);
        this.arrayDogs = res.data;
        this.dogUpdate.name = this.arrayDogs.name;
        this.dogUpdate.description = this.arrayDogs.description;
      } catch (error) {
        return window.location.assign("/home");
        // console.log("Error: 401");
      }
    },

    async updatePet() {
      try {
        let res = await axios.put(
          `/dog/${this.$route.params.id}`,
          this.dogUpdate
        );
      } catch (error) {
        console.log(error);
      }
    }
  }
};
</script>

<style lang="css">
</style>