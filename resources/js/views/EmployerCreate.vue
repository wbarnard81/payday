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
        <label class="block w-1/4 text-gray-700 text-sm font-bold my-2" for="employer_type">ID Type</label>
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

    <!-- If Passport -->
    <div v-if="form.id_type === 'Passport'">
      <div class>
        <label
          class="block w-1/4 text-gray-700 text-sm font-bold my-2"
          for="idnumber"
        >Passport Number</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="passport_number"
          type="text"
          v-model="form.passport_number"
        />
      </div>
      <div>
        <label class="block w-1/4 text-gray-700 text-sm font-bold my-2" for="employer_type">Country</label>
        <select
          class="block appearance-none w-1/4 bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="employer_type"
          v-model="form.ppcountry"
        >
          <option value disabled selected>Select country</option>
          <option v-for="item in countries" :key="item.id">{{ item.name }}</option>
        </select>
      </div>
    </div>

    <!-- After ID/Passport Entries -->
    <div v-if="form.idnumber.length === 10 || form.ppcountry">
      <div>
        <label
          class="block w-1/4 text-gray-700 text-sm font-bold my-2"
          for="business_number"
        >Business Number</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="business_number"
          type="text"
          v-model="form.business_number"
        />
      </div>
      <div>
        <label
          class="block w-1/4 text-gray-700 text-sm font-bold my-2"
          for="telephone"
        >Telephone Number</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="telephone"
          type="text"
          v-model="form.telephone"
        />
      </div>
      <div>
        <label
          class="block w-1/4 text-gray-700 text-sm font-bold my-2"
          for="cellphone"
        >Cellphone Number</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="cellphone"
          type="text"
          v-model="form.cellphone"
        />
      </div>
      <div>
        <label class="block w-1/4 text-gray-700 text-sm font-bold my-2" for="email">Email Address</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="email"
          type="text"
          v-model="form.email"
        />
      </div>
      <div>
        <label
          class="block w-1/4 text-gray-700 text-sm font-bold my-2"
          for="unit_number"
        >Unit Number</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="unit_number"
          type="text"
          v-model="form.unit_number"
        />
      </div>
      <div>
        <label
          class="block w-1/4 text-gray-700 text-sm font-bold my-2"
          for="complex_name"
        >Complex Name</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="complex_name"
          type="text"
          v-model="form.complex_name"
        />
      </div>
      <div>
        <label
          class="block w-1/4 text-gray-700 text-sm font-bold my-2"
          for="street_number"
        >Street Number</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="street_number"
          type="text"
          v-model="form.street_number"
        />
      </div>
      <div>
        <label
          class="block w-1/4 text-gray-700 text-sm font-bold my-2"
          for="street_name"
        >Street Name</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="street_name"
          type="text"
          v-model="form.street_name"
        />
      </div>
      <div>
        <label class="block w-1/4 text-gray-700 text-sm font-bold my-2" for="suburb">Suburb Name</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="suburb"
          type="text"
          v-model="form.suburb"
        />
      </div>
      <div>
        <label class="block w-1/4 text-gray-700 text-sm font-bold my-2" for="city_name">City Name</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="city_name"
          type="text"
          v-model="form.city_name"
        />
      </div>
      <div>
        <label class="block w-1/4 text-gray-700 text-sm font-bold my-2" for="country">Country</label>
        <select
          class="block appearance-none w-1/4 bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="country"
          v-model="form.country"
        >
          <option value disabled selected>Select country</option>
          <option v-for="item in countries" :key="item.id">{{ item.name }}</option>
        </select>
      </div>
    </div>

    <!-- After address country -->
    <div v-if="form.country" class="md:flex md:items-center my-3">
      <div class="md:w-1/3"></div>
      <label class="md:w-2/3 block text-gray-500 font-bold">
        <input class="mr-2 leading-tight" v-model="form.same_address" type="checkbox" />
        <span class="text-sm">Postal address is not the same as Street Address.</span>
      </label>
    </div>

    <!-- If postal not same as home address -->
    <div v-if="form.same_address">
      <div>
        <label
          class="block w-1/4 text-gray-700 text-sm font-bold my-2"
          for="postal_unit_number"
        >Postal Address Unit Number</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="postal_unit_number"
          type="text"
          v-model="form.postal_unit_number"
        />
      </div>
      <div>
        <label
          class="block w-1/4 text-gray-700 text-sm font-bold my-2"
          for="postal_complex_name"
        >Postal Address Complex Name</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="postal_complex_name"
          type="text"
          v-model="form.postal_complex_name"
        />
      </div>
      <div>
        <label
          class="block w-1/4 text-gray-700 text-sm font-bold my-2"
          for="postal_street_number"
        >Postal Address Street Number</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="postal_street_number"
          type="text"
          v-model="form.postal_street_number"
        />
      </div>
      <div>
        <label
          class="block w-1/4 text-gray-700 text-sm font-bold my-2"
          for="postal_street_name"
        >Postal AddressStreet Name</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="postal_street_name"
          type="text"
          v-model="form.postal_street_name"
        />
      </div>
      <div>
        <label
          class="block w-1/4 text-gray-700 text-sm font-bold my-2"
          for="postal_suburb"
        >Postal Address Suburb Name</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="postal_suburb"
          type="text"
          v-model="form.postal_suburb"
        />
      </div>
      <div>
        <label
          class="block w-1/4 text-gray-700 text-sm font-bold my-2"
          for="postal_city_name"
        >Postal Address City Name</label>
        <input
          class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
          id="postal_city_name"
          type="text"
          v-model="form.postal_city_name"
        />
      </div>
      <div>
        <label
          class="block w-1/4 text-gray-700 text-sm font-bold my-2"
          for="postal_country"
        >Postal Address Country</label>
        <select
          class="block appearance-none w-1/4 bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="postal_country"
          v-model="form.postal_country"
        >
          <option value disabled selected>Select country</option>
          <option v-for="item in countries" :key="item.id">{{ item.name }}</option>
        </select>
      </div>
      <button
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 py-2 px-4 rounded-full"
        @click="addEmployer()"
      >Submit</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "EmployerCreate",
  data: () => {
    return {
      employertypes: null,
      countries: null,
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
        email: "",
        postal_unit_number: "",
        postal_complex_name: "",
        postal_street_number: "",
        postal_street_name: "",
        postal_suburb: "",
        postal_city_name: "",
        postal_country: "",
        employer_type: "",
        same_address: false
      },
      user: ""
    };
  },
  methods: {
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
    getCountries() {
      axios
        .get("/api/country/")
        .then(response => {
          this.countries = response.data;
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
    this.getCountries();
  }
};
</script>
