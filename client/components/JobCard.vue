<template>
  <div>
    <b-col md="">
      <b-card
        :title="name"
        :img-src="'https://loremflickr.com/320/240/'+index"
        img-alt="Job-Info"
        img-top
        tag="article"
        style="max-width:20rem"
        class="mb-2"
        footer="card footer"
      >
        <b-card-text>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt ipsam quo ipsa magnam debitis sapiente mollitia</b-card-text>
        <b-button variant="primary">Apply</b-button>
      </b-card>
    </b-col>
  </div>
</template>

<script>
export default {
  props:{
    name:'',
    index:''
  }
};
</script>

<style scoped>
</style>