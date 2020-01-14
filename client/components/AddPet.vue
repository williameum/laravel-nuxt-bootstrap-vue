<template>
  <div class="row justify-content-center">
    <form @submit.prevent="onSubmit">
      <div class="card">
        <div class="card-header">Add a New Pet</div>
        <div class="card-body">
          <div class="row">
            <div class>
              <input
                id="myInput1"
                type="text"
                placeholder="Dog's Name"
                v-model="dogInfo.name"
                class="form-control text-center"
              />
              <input
                id="myInput2"
                type="text"
                placeholder="Description"
                v-model="dogInfo.description"
                class="form-control text-center"
              />
            </div>
          </div>
          <br />
          <div class="container form-group text-center">
            <input @click="clearInput" type="submit" value="Add" class="btn btn-primary" />
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "AddPet",
  data() {
    return {
      dogInfo: {
        name: "",
        description: ""
      }
    };
  },
  methods: {
    onSubmit() {
      this.$emit("dogSaved", this.dogInfo);
      // this.clearInput;
    },

    clearInput() {
      document.getElementById("myInput1").value = "";
      document.getElementById("myInput2").value = "";
    }
  }
};
</script>

<style lang="css">
</style>