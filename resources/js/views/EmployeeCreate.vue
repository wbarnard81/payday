<template>
  <div></div>
</template>

<script>
export default {
  name: "EmployeeCreate",
  data: () => {
    return {
      form: {
        first_name: "",
        last_name: "",
        birthday: "",
        idnumber: "",
        passport_number: "",
        ppcountry: "",
        id_type: "",
        telephone: "",
        cellphone: "",
        business_number: "",
        email: "",
        unit_number: "",
        complex_name: "",
        street_number: "",
        street_name: "",
        suburb: "",
        city_name: "",
        country: "",
        same_address: "",
        employer_type: ""
      },
      progress: 0,
      user: ""
    };
  },
  components: {},
  methods: {},
  mounted() {}
};
</script>
