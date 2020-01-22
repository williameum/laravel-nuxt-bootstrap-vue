<template>
  <div class="row justify-content-center">
    <div class="text-center w-50">
      <ul >
        <a
          class="text-decoration-none"
          data-toggle="collapse"
          :href="'#dog'+dog.id"
          role="button"
          aria-expanded="false"
          aria-controls="collapseExample"
        >
          <li
            class="list-group-item list-group-item-secondary text-center"
          >Dog Name: {{dog.name}} - Description: {{dog.description}}</li>
        </a>

        <div class="collapse" :id="'dog'+dog.id">
          <div class="card card-body">
            <div class="row">
              <div class="col">
                <form @submit.prevent="edit">
                  <nuxt-link class="btn btn-info btn-lg btn-block" :to="'dog/'+dog.id">Edit</nuxt-link>
                </form>
              </div>
              <div class="col">
                <form @submit.prevent="drop">
                  <button class="btn btn-danger btn-lg btn-block">Delete</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  middleware: "auth",

  name: "ShowDogs",
  props: ["dog"],
  data() {
    return {
      dropId: this.dog.id,
      hidden: false
    };
  },
  methods: {
    drop() {
      this.$emit("dropEvent", this.dropId);
    }
  }
};
</script>

<style scoped>
ul {
  padding-left: 0px !important;
}
</style>