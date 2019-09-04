<template>
  <div class>
    <label class="block w-1/4 text-gray-700 text-sm font-bold my-2" :for="name">{{ label }}</label>
    <input
      class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
      :id="name"
      type="text"
      :placeholder="placeholder"
      @input="updateField()"
      v-model="value"
    />
  </div>
</template>

<script>
export default {
  name: "InputField",

  props: ["name", "label", "placeholder"],

  data: function() {
    return {
      value: ""
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
