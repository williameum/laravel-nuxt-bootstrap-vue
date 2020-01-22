<template>
  <div class="overflow-auto">
    <div>
      <AddPet @dogSaved="OnSubmited" />
    </div>
    <div>
      <br />
      <h3 class="text-center">List of my Pets</h3>
      <ShowDogs @dropEvent="dropDog" v-for="(dog,item) in arrayDogs" :key="item" :dog="dog" />
    </div>
  </div>
</template>

<script>
import AddPet from "./../components/AddPet";
import ShowDogs from "./../components/Showpet";
import axios from "axios";

export default {
  middleware: "auth",

  components: {
    AddPet,
    ShowDogs
  },

  data() {
    return {
      arrayDogs: []
    };
  },

  created() {
    this.getPets();
  },

  methods: {
    async OnSubmited(data) {
      try {
        let res = await axios.post("/dog", data);
        this.getPets();
      } catch (error) {
        console.log(error);
      }
    },
    async getPets() {
      try {
        let res = await axios.get("/dog");
        this.arrayDogs = res.data;
      } catch (error) {
        console.log(error);
      }
    },
    async dropDog(id) {
      try {
        let res = await axios.delete(`/dog/${id}`);
        this.arrayDogs = res.data;
        this.getPets();
      } catch (error) {
        console.log(error);
      }
    }
  },

  head() {
    return { title: this.$t("home") };
  }
};
</script>

<style>
body{
  background-color:DodgerBlue;
}
</style>