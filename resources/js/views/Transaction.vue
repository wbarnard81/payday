<template>
  <div>
    <Inputfield name="employee" label="Employee Name" />
    <Inputfield name="date" label="Date" />
    <Inputfield name="employer" label="Employer Name" />
    <Inputfield name="description" label="Description" />
    <Selectfield
      name="irp5_code"
      label="Select IRP5 Code"
      @update:field="form.employer_type = $event"
    />
    <Inputfield name="amount" label="Enter Amount" />
    <Inputfield name="notes" label="Enter Notes" />
    <button
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 py-2 px-4 rounded-full"
    >Submit</button>
  </div>
</template>

<script>
import Inputfield from "../components/InputField";
import Selectfield from "../components/Selectfield";

export default {
  name: "AccountType",

  components: {
    Inputfield,
    Selectfield
  }
};
</script>

<style scoped>
</style>
