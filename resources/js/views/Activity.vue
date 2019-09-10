<template>
  <div>
    <div>
      <label class="block w-1/4 text-gray-700 text-sm font-bold my-2">Enter Profit Code</label>
      <input
        class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
        type="text"
        placeholder="Enter SIC7 code"
        name="profit_code"
        v-model="activityInput.profit_code"
      />
    </div>
    <div>
      <label class="block w-1/4 text-gray-700 text-sm font-bold my-2">Enter Loss Code</label>
      <input
        class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
        type="text"
        placeholder="Enter SIC7 code"
        name="loss_code"
        v-model="activityInput.loss_code"
      />
    </div>
    <div>
      <label class="block w-1/4 text-gray-700 text-sm font-bold my-2">Enter Description</label>
      <input
        class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
        type="text"
        placeholder="Enter description"
        name="activity_description"
        v-model="activityInput.activity_description"
      />
    </div>

    <button
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 py-2 px-4 rounded-full"
      @click="addActivity()"
    >Submit</button>
    <hr class="border-2 border-black" />
    <table class="text-center mt-4">
      <tr>
        <th class="border border-black px-3">Profit Code</th>
        <th class="border border-black px-3">Loss Code</th>
        <th class="border border-black px-3">Activity Description</th>
        <th class="border border-black px-3">Action</th>
      </tr>
      <tr v-for="item in activities" :key="item.id">
        <td class="border border-black">{{ item.profit_code }}</td>
        <td class="border border-black">{{ item.loss_code }}</td>
        <td class="border border-black">{{ item.description }}</td>
        <td class="border border-black">
          <button
            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-2 border border-yellow-700 rounded-full"
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
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 border border-red-700 rounded-full"
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
</template>

<script>
export default {
  name: "Activities",
  data: () => {
    return {
      activities: null,
      edit: false,
      activityInput: {
        activity_id: "",
        profit_code: "",
        loss_code: "",
        activity_description: ""
      }
    };
  },
  mounted() {
    this.getActivities();
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
    addActivity(activity_id) {
      if (this.edit === false) {
        axios
          .post("/api/activity", this.activityInput)
          .then(res => {
            if (res.status == 201) {
              alert("Activity Added.");
              this.activityInput.profit_code = "";
              this.activityInput.loss_code = "";
              this.activityInput.activity_description = "";
              this.getActivities();
            }
          })
          .catch(err => console.log(err.response));
      } else {
        axios
          .patch(
            `/api/activity/` + this.activityInput.activity_id,
            this.activityInput
          )
          .then(res => {
            if (res.status == 200) {
              alert("Activity Updated.");
              this.activityInput.activity_id = "";
              this.activityInput.profit_code = "";
              this.activityInput.loss_code = "";
              this.activityInput.activity_description = "";
              this.edit = false;
              this.getActivities();
            }
          })
          .catch(err => console.log(err.response));
      }
    },
    editActivity(item) {
      this.edit = true;
      this.activityInput.activity_id = item.id;
      this.activityInput.profit_code = item.profit_code;
      this.activityInput.loss_code = item.loss_code;
      this.activityInput.activity_description = item.description;
    },
    deleteActivity(activity_id) {
      if (confirm("Are you sure you want to delete this activity?")) {
        axios
          .delete(`/api/activity/${activity_id}`)
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
