<template>
  <div>
    <div>
      <label class="block w-1/4 text-gray-700 text-sm font-bold my-2">Enter Country Code</label>
      <input
        class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
        type="text"
        placeholder="Enter code"
        name="country_code"
        v-model="countryInput.country_code"
      />
    </div>
    <div>
      <label class="block w-1/4 text-gray-700 text-sm font-bold my-2">Enter Country Name</label>
      <input
        class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
        type="text"
        placeholder="Enter name"
        name="country_name"
        v-model="countryInput.country_name"
      />
    </div>

    <button
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 py-2 px-4 rounded-full"
      @click="addCountry()"
    >Submit</button>
    <hr class="border-2 border-black" />
    <table class="text-center mt-4">
      <tr>
        <th class="border border-black px-3">Country Code</th>
        <th class="border border-black px-3">Country Name</th>
        <th class="border border-black px-3">Action</th>
      </tr>
      <tr v-for="item in country" :key="item.id">
        <td class="border border-black">{{ item.code }}</td>
        <td class="border border-black">{{ item.name }}</td>
        <td class="border border-black">
          <button
            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 border border-yellow-700 rounded"
            @click="editCountry(item)"
          >Edit</button>
          <button
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded"
            @click="deleteCountry(item.id)"
          >Delete</button>
        </td>
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
      country: null,
      edit: false,
      countryInput: {
        country_id: "",
        country_code: "",
        country_name: ""
      }
    };
  },
  mounted() {
    this.getCountries();
  },
  methods: {
    getCountries() {
      axios
        .get("/api/country/")
        .then(response => {
          this.country = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    addCountry(country_id) {
      if (this.edit === false) {
        axios
          .post("/api/country", this.countryInput)
          .then(res => {
            if (res.status == 201) {
              alert("Country Added.");
              this.countryInput.country_code = "";
              this.countryInput.country_name = "";
              this.getCountries();
            }
          })
          .catch(err => console.log(err));
      } else {
        axios
          .patch(
            `/api/country/` + this.countryInput.country_id,
            this.countryInput
          )
          .then(res => {
            if (res.status == 200) {
              alert("Country Updated.");
              this.countryInput.country_id = "";
              this.countryInput.country_code = "";
              this.countryInput.country_name = "";
              this.edit = false;
              this.getCountries();
            }
          })
          .catch(err => console.log(err));
      }
    },
    editCountry(item) {
      this.edit = true;
      this.countryInput.country_id = item.id;
      this.countryInput.country_code = item.code;
      this.countryInput.country_name = item.name;
    },
    deleteCountry(country_id) {
      if (confirm("Are you sure you want to delete this country?")) {
        axios
          .delete(`/api/country/${country_id}`)
          .then(response => {
            alert("Country deleted.");
            this.getCountries();
          })
          .catch(err => {
            console.log(err);
          });
      }
    }
  }
};
</script>

<style scoped>
</style>
