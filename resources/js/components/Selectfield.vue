<template>
  <div class>
    <label class="block w-1/4 text-gray-700 text-sm font-bold my-2" :for="name">{{ label }}</label>
    <select
      class="block appearance-none w-1/4 bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
      :id="name"
      @change="updateField()"
      v-model="value"
    >
      <option value="0" disabled selected>Select an employer type</option>
      <option value="1">Individual</option>
      <option value="2">Partnership</option>
      <option value="3">Company</option>
    </select>
  </div>
</template>

<script>
export default {
  name: "SelectField",

  props: ["name", "label"],

  data: function() {
    return {
      value: 0
    };
  },

  computed: {},

  methods: {
    updateField: function() {
      this.$emit("update:field", this.value);
    }
  }
};
</script>

<style scoped>
</style>
