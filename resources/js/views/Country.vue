<template>
  <div>
    <Inputfield name="country_code" label="Enter Country Code" />
    <Inputfield name="country_name" label="Enter Country Name" />
    <button
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 py-2 px-4 rounded-full"
    >Add</button>
    <hr class="border-2 border-black" />
    <table class="text-center mt-4">
      <tr>
        <th class="border border-black px-3">Country Code</th>
        <th class="border border-black px-3">Country Name</th>
      </tr>
      <tr v-for="item in country" :key="item.id">
        <td class="border border-black">{{ item.code }}</td>
        <td class="border border-black">{{ item.name }}</td>
      </tr>
    </table>
  </div>
</template>

<script>
import Inputfield from "../components/InputField";

export default {
  name: "Country",

  components: {
    Inputfield
  },
  data: () => {
    return {
      country: null
    };
  },
  mounted() {
    console.log(this.user);
    axios
      .get("/api/country/")
      .then(response => {
        this.country = response.data;
      })
      .catch(error => {
        console.log(error);
      });
  }
};
</script>

<style scoped>
</style>
