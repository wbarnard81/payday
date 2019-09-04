<template>
  <div>
    <Inputfield name="activity_codes" label="Enter Activity Code" />
    <Inputfield name="activity_description" label="Description" />
    <button
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 py-2 px-4 rounded-full"
    >Add</button>
  </div>
</template>

<script>
import Inputfield from "../components/InputField";

export default {
  name: "ActivityCodes",

  components: {
    Inputfield
  }
};
</script>

<style scoped>
</style>
