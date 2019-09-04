<template>
  <div>
    <h1 class>Good day, {{ user }}</h1>
    <hr class="border-2" />
  </div>
</template>

<script>
export default {
  data: () => {
    return {
      progress: 0,
      user: ""
    };
  },
  mounted() {
    this.user = "Werner Barnard";
    console.log("Component mounted.");
  }
};
</script>
