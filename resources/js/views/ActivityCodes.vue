<template>
  <div>
    <div class="p-5 bg-gray-100">
      <div class="flex">
        <div class="w-1/3">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter Activity Code</label>
          <input
            class="block w-3/4 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            type="text"
            placeholder="Enter Activity code"
            name="code"
            v-model="activitycodeInput.code"
          />
        </div>
        <div class="w-1/3">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter Description</label>
          <input
            class="block w-3/4 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            type="text"
            placeholder="Enter description"
            name="description"
            v-model="activitycodeInput.description"
          />
        </div>
      </div>
      <div class="flex justify-end">
        <button
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 py-2 px-4 rounded-full"
          @click="addActivitycode()"
          :disabled="isDisabled"
        >Submit</button>
      </div>
    </div>

    <hr class="border-2 border-black" />

    <div class="flex justify-center">
      <table class="text-center mt-4">
        <tr>
          <th class="border border-black px-3">Activity Code</th>
          <th class="border border-black px-3">Activity Description</th>
        </tr>
        <tr v-for="item in activitycodes" :key="item.id">
          <td class="border border-black px-4">{{ item.code }}</td>
          <td class="border border-black px-4">{{ item.description }}</td>
          <td class="border border-black px-4">
            <button
              class="bg-yellow-300 text-grey-700 font-bold py-2 px-2 m-2"
              @click="editActivitycode(item)"
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
export default {
  name: "ActivityCode",
  data: () => {
    return {
      activitycodes: null,
      edit: false,
      activitycodeInput: {
        activitycode_id: "",
        code: "",
        description: ""
      }
    };
  },
  mounted() {
    this.getActivitycodes();
  },
  computed: {
    isDisabled: function() {
      return !this.activitycodeInput.description;
    }
  },
  methods: {
    getActivitycodes() {
      axios
        .get("/api/actcode/")
        .then(response => {
          this.activitycodes = response.data;
        })
        .catch(error => {
          console.log(error.response);
        });
    },
    addActivitycode(activitycode_id) {
      if (this.edit === false) {
        axios
          .post("/api/actcode", this.activitycodeInput)
          .then(res => {
            if (res.status == 201) {
              alert("Activity Code Added.");
              this.activitycodeInput.code = "";
              this.activitycodeInput.loss_code = "";
              this.activitycodeInput.description = "";
              this.getActivitycodes();
            }
          })
          .catch(err => console.log(err.response));
      } else {
        axios
          .patch(
            `/api/actcode/` + this.activitycodeInput.activitycode_id,
            this.activitycodeInput
          )
          .then(res => {
            if (res.status == 200) {
              alert("Activity Code Updated.");
              this.activitycodeInput.activitycode_id = "";
              this.activitycodeInput.code = "";
              this.activitycodeInput.loss_code = "";
              this.activitycodeInput.description = "";
              this.edit = false;
              this.getActivitycodes();
            }
          })
          .catch(err => console.log(err.response));
      }
    },
    editActivitycode(item) {
      this.edit = true;
      this.activitycodeInput.activitycode_id = item.id;
      this.activitycodeInput.code = item.code;
      this.activitycodeInput.description = item.description;
    },
    deleteActivity(activitycode_id) {
      if (confirm("Are you sure you want to delete this activity code?")) {
        axios
          .delete(`/api/actcode/${activitycode_id}`)
          .then(response => {
            alert("Activity Code deleted.");
            this.getActivitycodes();
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
