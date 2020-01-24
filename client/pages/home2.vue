<template>
  <div>
    <b-container class="bv-example-row">
      <b-row align-v="center">
        <JobCard v-for="(job,index) in displayJobs" :key="index" :name="job.name" :index="index"/>
      </b-row>
      <b-row align-h="center">
        <b-col cols="6">
          <b-pagination
            v-model="currentPage"
            :total-rows="rows"
            :per-page="perPage"
            first-text="First"
            prev-text="Prev"
            next-text="Next"
            last-text="Last"
            pills
            @input="paginate(currentPage)"
          ></b-pagination>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
import JobCard from "~/components/JobCard";
import TopHeader from "~/components/TopHeader";
export default {
  name: "home",
  components: { JobCard, TopHeader },
  data() {
    return {
      jobs: [
        {
          name: "ABC Job123",
          id: 1
        },
        {
          name: "CDE Job123",
          id: 2
        },
        {
          name: "FGH Job123",
          id: 15
        },
        {
          name: "JKL Job123",
          id: 3
        },
        {
          name: "LMN Job123",
          id: 4
        },
        {
          name: "OPQ Job123",
          id: 5
        },
        {
          name: "QRS Job123",
          id: 6
        },
        {
          name: "TUV Job123",
          id: 7
        },
        {
          name: "WXY Job123",
          id: 8
        },
        {
          name: "ZZZ Job123",
          id: 9
        },
        {
          name: "ZZZ Job567",
          id: 10
        },
        {
          name: "ZaZZ Job999",
          id: 11
        },
        {
          name: "ZZZ Journey",
          id: 12
        },
        {
          name: "ZZZ Indigo",
          id: 13
        }
      ],
      displayJobs: [],
      perPage: 3,
      rows: 1,
      currentPage: 1
    };
  },

  mounted() {
    this.fetchData();
  },
  methods: {
    fetchData() {
      this.displayJobs = this.jobs.slice(0, 3);
      this.rows = this.jobs.length;
    },
    paginate(currentPage) {
      const start = (this.currentPage - 1) * this.perPage;
      this.displayJobs = this.jobs.slice(start, start + 3);
    }
  }
};
</script>

<style>
</style>