<template>
  <div>
    <div class="p-5 bg-gray-100">
      <div
        class="text-red-400 text-center"
        v-for="error in errors"
        :key="error.index"
      >{{ error[0] }}</div>
      <div>
        <Back />
      </div>
      <div class="flex">
        <div class="w-1/3">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter Country Code</label>
          <input
            class="block w-3/4 bg-white focus:outline-none border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            :class="{invalid: !$v.countryInput.code.minLength}"
            type="text"
            placeholder="Enter code"
            name="code"
            v-model.trim="$v.countryInput.code.$model"
          />
        </div>
        <div class="w-1/3">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter Country Name</label>
          <input
            class="block w-3/4 bg-white focus:outline-none border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            :class="{invalid: !$v.countryInput.name.minLength}"
            type="text"
            placeholder="Enter name"
            name="name"
            v-model.trim="$v.countryInput.name.$model"
          />
        </div>
      </div>
      <div class="flex justify-end">
        <button
          class="bg-blue-500 hover:bg-blue-700 focus:outline-none text-white font-bold my-2 py-2 px-4 rounded-full"
          @click="addCountry()"
          :disabled="$v.$invalid"
        >Submit</button>
      </div>
    </div>

    <hr class="border-2 border-black" />

    <div class="flex justify-center">
      <table class="text-center mt-4">
        <tr>
          <th class="border border-black px-3">Country Code</th>
          <th class="border border-black px-3">Country Name</th>
        </tr>
        <tr v-for="item in country" :key="item.id">
          <td class="border border-black px-4">{{ item.code }}</td>
          <td class="border border-black px-4">{{ item.name }}</td>
          <td class="border border-black px-4">
            <button
              class="bg-yellow-300 text-grey-700 font-bold py-2 px-2 m-2"
              @click="editCountry(item)"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-edit"
              >
                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
              </svg>
            </button>
            <button
              class="bg-red-300 text-grey-700 font-bold py-2 px-2 m-2"
              @click="deleteCountry(item.id)"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-trash-2"
              >
                <polyline points="3 6 5 6 21 6" />
                <path
                  d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"
                />
                <line x1="10" y1="11" x2="10" y2="17" />
                <line x1="14" y1="11" x2="14" y2="17" />
              </svg>
            </button>
          </td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
import { required, minLength } from "vuelidate/lib/validators";
import Back from "../components/Back";
export default {
  name: "Country",
  components: { Back },
  data: () => {
    return {
      country: null,
      edit: false,
      errors: [],
      countryInput: {
        id: "",
        code: "",
        name: ""
      }
    };
  },
  mounted() {
    this.getCountries();
  },
  validations: {
    countryInput: {
      code: {
        required,
        minLength: minLength(3)
      },
      name: {
        required,
        minLength: minLength(4)
      }
    }
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
    addCountry(id) {
      if (this.edit === false) {
        axios
          .post("/api/country", this.countryInput)
          .then(res => {
            if (res.status == 200) {
              alert("Country Added.");
              this.countryInput.code = "";
              this.countryInput.name = "";
              this.getCountries();
            }
          })
          .catch(err => console.log(err));
      } else {
        axios
          .patch(`/api/country/` + this.countryInput.id, this.countryInput)
          .then(res => {
            if (res.status == 200) {
              alert("Country Updated.");
              this.countryInput.id = "";
              this.countryInput.code = "";
              this.countryInput.name = "";
              this.edit = false;
              this.errors = [];
              this.getCountries();
            }
          })
          .catch(err => console.log(err));
      }
    },
    editCountry(item) {
      this.edit = true;
      this.countryInput.id = item.id;
      this.countryInput.code = item.code;
      this.countryInput.name = item.name;
    },
    deleteCountry(id) {
      if (confirm("Are you sure you want to delete this country?")) {
        axios
          .delete(`/api/country/${id}`)
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
