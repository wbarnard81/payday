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
          <label class="block text-gray-700 text-sm font-bold my-2">Enter Profit Code</label>
          <input
            class="block w-3/4 bg-white focus:outline-none border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            :class="{invalid: !$v.activityInput.profit_code.numeric}"
            type="text"
            placeholder="Enter SIC7 code"
            name="profit_code"
            v-model.trim="$v.activityInput.profit_code.$model"
          />
        </div>
        <div class="w-1/3">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter Loss Code</label>
          <input
            class="block w-3/4 bg-white focus:outline-none border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            :class="{invalid: !$v.activityInput.loss_code.numeric}"
            type="text"
            placeholder="Enter SIC7 code"
            name="loss_code"
            v-model.trim="$v.activityInput.loss_code.$model"
          />
        </div>
        <div class="w-1/3">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter Description</label>
          <input
            class="block w-3/4 bg-white focus:outline-none border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            :class="{invalid: !$v.activityInput.description.minLength}"
            type="text"
            placeholder="Enter description"
            name="description"
            v-model.trim="$v.activityInput.description.$model"
          />
        </div>
      </div>
      <div class="flex justify-end">
        <button
          class="bg-blue-500 hover:bg-blue-700 focus:outline-none text-white font-bold my-2 py-2 px-4 rounded-full"
          @click="addActivity()"
          :disabled="$v.$invalid"
        >Submit</button>
      </div>
    </div>

    <hr class="border-2 border-black" />

    <div class="flex justify-center">
      <table class="text-center mt-4">
        <tr>
          <th class="border border-black px-3">Profit Code</th>
          <th class="border border-black px-3">Loss Code</th>
          <th class="border border-black px-3">Activity Description</th>
        </tr>
        <tr v-for="item in activities" :key="item.id">
          <td class="border border-black px-4">{{ item.profit_code }}</td>
          <td class="border border-black px-4">{{ item.loss_code }}</td>
          <td class="border border-black px-4">{{ item.description }}</td>
          <td class="border border-black px-4">
            <button
              class="bg-yellow-300 text-grey-700 font-bold py-2 px-2 m-2"
              @click="editActivity(item)"
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
              @click="deleteActivity(item.id)"
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
import { required, minLength, numeric } from "vuelidate/lib/validators";
import Back from "../components/Back";
export default {
  name: "Activities",
  components: { Back },
  data: () => {
    return {
      activities: null,
      edit: false,
      errors: [],
      activityInput: {
        id: "",
        profit_code: "",
        loss_code: "",
        description: ""
      }
    };
  },
  mounted() {
    this.getActivities();
  },
  validations: {
    activityInput: {
      profit_code: {
        required,
        minLength: minLength(3),
        numeric
      },
      loss_code: {
        required,
        minLength: minLength(3),
        numeric
      },
      description: {
        required,
        minLength: minLength(4)
      }
    }
  },
  methods: {
    getActivities() {
      axios
        .get("/api/activity/")
        .then(response => {
          this.activities = response.data;
        })
        .catch(error => {
          console.log(error.response);
        });
    },
    addActivity(id) {
      if (this.edit === false) {
        axios
          .post("/api/activity", this.activityInput)
          .then(res => {
            if (res.status == 200) {
              alert("Activity Added.");
              this.activityInput.profit_code = "";
              this.activityInput.loss_code = "";
              this.activityInput.description = "";
              this.getActivities();
            }
          })
          .catch(error => {
            console.log(error.response);
          });
      } else {
        axios
          .patch(`/api/activity/` + this.activityInput.id, this.activityInput)
          .then(res => {
            if (res.status == 200) {
              alert("Activity Updated.");
              this.activityInput.id = "";
              this.activityInput.profit_code = "";
              this.activityInput.loss_code = "";
              this.activityInput.description = "";
              this.edit = false;
              this.errors = [];
              this.getActivities();
            }
          })
          .catch(err => console.log(err.response));
      }
    },
    editActivity(item) {
      this.edit = true;
      this.activityInput.id = item.id;
      this.activityInput.profit_code = item.profit_code;
      this.activityInput.loss_code = item.loss_code;
      this.activityInput.description = item.description;
    },
    deleteActivity(id) {
      if (confirm("Are you sure you want to delete this activity?")) {
        axios
          .delete(`/api/activity/${id}`)
          .then(response => {
            alert("Activity deleted.");
            this.getActivities();
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
