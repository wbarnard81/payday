<template>
  <div>
    <Inputfield name="irp5codes" label="Add IRP5 Codes" />
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
