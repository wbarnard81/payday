<template>
  <div>
    <div>
      <label
        class="block w-1/4 text-gray-700 text-sm font-bold my-2"
        for="employer_type"
      >Employer Type</label>
      <select
        class="block appearance-none w-1/4 bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
        id="employer_type"
        v-model="form.employer_type"
      >
        <option value disabled selected>Select an employer type</option>
        <option v-for="item in employertypes" :key="item.id">{{ item.name }}</option>
      </select>
    </div>

    <!-- If Indevidual -->
    <div v-if="form.employer_type">
      <div class>
        <label class="block w-1/4 text-gray-700 text-sm font-bold my-2" for="first_name">First Name</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="first_name"
          type="text"
          v-model="form.first_name"
        />
      </div>
      <div class>
        <label class="block w-1/4 text-gray-700 text-sm font-bold my-2" for="last_name">Last Name</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="last_name"
          type="text"
          v-model="form.last_name"
        />
      </div>
      <div class>
        <label class="block w-1/4 text-gray-700 text-sm font-bold my-2" for="initials">Initials</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="initials"
          type="text"
          v-model="form.initials"
        />
      </div>
      <div class>
        <label class="block w-1/4 text-gray-700 text-sm font-bold my-2" for="birthday">Birthday</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="birthday"
          type="text"
          v-model="form.birthday"
        />
      </div>
      <div>
        <label
          class="block w-1/4 text-gray-700 text-sm font-bold my-2"
          for="employer_type"
        >Employer Type</label>
        <select
          class="block appearance-none w-1/4 bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="employer_type"
          v-model="form.id_type"
        >
          <option value disabled selected>Select an ID type</option>
          <option v-for="item in idtypes" :key="item.id">{{ item.name }}</option>
        </select>
      </div>
    </div>

    <!-- If RSA ID -->
    <div v-if="form.id_type === 'RSA ID'">
      <div class>
        <label class="block w-1/4 text-gray-700 text-sm font-bold my-2" for="idnumber">ID Number</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="idnumber"
          type="text"
          v-model="form.idnumber"
        />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "EmployerCreate",
  data: () => {
    return {
      employertypes: null,
      idtypes: null,
      form: {
        first_name: "",
        last_name: "",
        initials: "",
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
      user: ""
    };
  },
  methods: {
    procede: function() {
      this.progress = this.progress + 10;
    },
    getEmployerType() {
      axios
        .get("/api/emprtype/")
        .then(response => {
          this.employertypes = response.data;
        })
        .catch(error => {
          console.log(error.response);
        });
    },
    getIdtypes() {
      axios
        .get("/api/idtype/")
        .then(response => {
          this.idtypes = response.data;
        })
        .catch(error => {
          console.log(error.response);
        });
    },
    submitData: () => {
      console.log(this.form);
    }
  },
  mounted() {
    this.user = "Werner Barnard";
    this.getEmployerType();
    this.getIdtypes();
  }
};
</script>
