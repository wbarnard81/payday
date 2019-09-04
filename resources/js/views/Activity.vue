<template>
  <div>
    <Inputfield name="profit_code" label="Enter Profit Code" />
    <Inputfield name="loss_code" label="Enter Loss Code" />
    <Inputfield name="description" label="Description" />
    <button
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 py-2 px-4 rounded-full"
    >Add</button>
  </div>
</template>

<script>
import Inputfield from "../components/InputField";

export default {
  name: "AccountType",

  components: {
    Inputfield
  }
};
</script>

<style scoped>
</style>
