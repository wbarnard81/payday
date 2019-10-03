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
          <label class="block text-gray-700 text-sm font-bold my-2">Enter New Account Relationship</label>
          <input
            class="block w-3/4 bg-white focus:outline-none border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            :class="{invalid: !$v.accrelationship.name.minLength}"
            type="text"
            placeholder="Enter Account Relationship"
            name="name"
            v-model.trim="$v.accrelationship.name.$model"
          />
        </div>
      </div>
      <div class="flex justify-end">
        <button
          class="bg-blue-500 hover:bg-blue-700 focus:outline-none text-white font-bold my-2 py-2 px-4 rounded-full"
          @click="addAccrelationship()"
          :disabled="$v.$invalid"
        >Submit</button>
      </div>
    </div>

    <hr class="border-2 border-black" />

    <div class="flex justify-center">
      <table class="text-center mt-4">
        <tr>
          <th class="border border-black px-3">Account Relationship</th>
        </tr>
        <tr v-for="item in accrelationships" :key="item.id">
          <td class="border border-black px-4">{{ item.name }}</td>
          <td class="border border-black px-4">
            <button
              class="bg-yellow-300 text-grey-700 font-bold py-2 px-2 m-2"
              @click="editActcrelationship(item)"
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
              @click="deleteAccrelationship(item.id)"
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
  name: "AccRelationship",
  components: { Back },
  data: () => {
    return {
      accrelationships: null,
      edit: false,
      errors: [],
      accrelationship: {
        id: "",
        name: ""
      }
    };
  },
  mounted() {
    this.getAccrelationships();
  },
  validations: {
    accrelationship: {
      name: {
        required,
        minLength: minLength(3)
      }
    }
  },
  methods: {
    getAccrelationships() {
      axios
        .get("/api/accrel/")
        .then(response => {
          this.accrelationships = response.data;
        })
        .catch(error => {
          console.log(error.response);
        });
    },
    addAccrelationship(id) {
      if (this.edit === false) {
        axios
          .post("/api/accrel", this.accrelationship)
          .then(res => {
            if (res.status == 200) {
              alert("Activity Code Added.");
              this.accrelationship.name = "";
              this.getAccrelationships();
            }
          })
          .catch(err => console.log(err.response));
      } else {
        axios
          .patch(`/api/accrel/` + this.accrelationship.id, this.accrelationship)
          .then(res => {
            if (res.status == 200) {
              alert("Activity Code Updated.");
              this.accrelationship.id = "";
              this.accrelationship.name = "";
              this.edit = false;
              this.errors = [];
              this.getAccrelationships();
            }
          })
          .catch(err => console.log(err.response));
      }
    },
    editActcrelationship(item) {
      this.edit = true;
      this.accrelationship.id = item.id;
      this.accrelationship.name = item.name;
    },
    deleteAccrelationship(id) {
      if (confirm("Are you sure you want to delete this activity code?")) {
        axios
          .delete(`/api/accrel/${id}`)
          .then(response => {
            alert("Activity Code deleted.");
            this.getAccrelationships();
          })
          .catch(err => {
            console.log(err.response);
          });
      }
    }
  }
};
</script>

<style scoped>
</style>
