<template>
  <div>
    <div>
      <h1 class="text-lg">Good day, {{ name }}</h1>
    </div>

    <hr class="border-2 border-green-500" />

    <div>
      <div class="flex flex-wrap">
        <div
          class="border border-red-400 mx-2 my-2 p-4 rounded w-96"
          v-for="item in this.news"
          v-bind:key="item.id"
        >
          <div class>
            <img class="h-32 mx-auto py-3" :src="item.urlToImage" alt="news image" />
          </div>
          <div class="text-center mb-3">{{ item.title }}</div>
          <div class>
            <a
              class="underline text-blue-400 block text-center"
              target="_blank"
              :href="item.url"
            >View Article</a>
          </div>
          <div
            class="text-center text-gray-700 font-medium"
          >{{ moment(item.publishedAt).fromNow() }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
export default {
  data: () => {
    return {
      progress: 0,
      name: "123",
      news: []
    };
  },
  methods: {
    getNews() {
      axios
        .get("/api/news")
        .then(res => {
          this.news = res.data.articles;
        })
        .catch(err => console.log(err.response));
    },
    moment
  },
  mounted() {
    this.name = this.$parent.$props.user.name;
    this.getNews();
  }
};
</script>
