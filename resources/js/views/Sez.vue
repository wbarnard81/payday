<template>
  <div class>
    <div class="p-5 bg-gray-100">
      <div class="flex">
        <div class="w-1/3">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter SEZ Code</label>
          <input
            class="block w-3/4 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            type="text"
            placeholder="Enter code"
            name="sez_code"
            v-model="sezInput.sez_code"
          />
        </div>
        <div class="w-1/3">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter SEZ Description</label>
          <input
            class="block w-3/4 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            type="text"
            placeholder="Enter description"
            name="sez_description"
            v-model="sezInput.sez_description"
          />
        </div>
      </div>
      <div class="flex justify-end">
        <button
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 py-2 px-4 rounded-full"
          @click="addSez()"
          :disabled="isDisabled"
        >Submit</button>
      </div>
    </div>

    <hr class="border-2 border-black" />

    <div class="flex justify-center">
      <table class="text-center mt-4">
        <tr>
          <th class="border border-black px-3">SEZ Code</th>
          <th class="border border-black px-3">SEZ Description</th>
        </tr>
        <tr v-for="item in sez" :key="item.id">
          <td class="border border-black px-4">{{ item.code }}</td>
          <td class="border border-black px-4">{{ item.description }}</td>
          <td class="border border-black px-4">
            <button
              class="bg-yellow-300 text-grey-700 font-bold py-2 px-2 m-2"
              @click="editSez(item)"
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
              @click="deleteSez(item.id)"
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
  name: "SEZ",
  data: () => {
    return {
      sez: null,
      edit: false,
      sezInput: {
        sez_id: "",
        sez_code: "",
        sez_description: ""
      }
    };
  },
  mounted() {
    this.getSez();
  },
  computed: {
    isDisabled: function() {
      return !this.sezInput.sez_description;
    }
  },
  methods: {
    getSez() {
      axios
        .get("/api/sez/")
        .then(response => {
          this.sez = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    addSez(sez_id) {
      if (this.edit === false) {
        axios
          .post("/api/sez", this.sezInput)
          .then(res => {
            if (res.status == 201) {
              alert("SEZ Added.");
              this.sezInput.sez_code = "";
              this.sezInput.sez_description = "";
              this.getSez();
            }
          })
          .catch(err => console.log(err));
      } else {
        axios
          .patch(`/api/sez/` + this.sezInput.sez_id, this.sezInput)
          .then(res => {
            if (res.status == 200) {
              alert("sez Updated.");
              this.sezInput.sez_id = "";
              this.sezInput.sez_code = "";
              this.sezInput.sez_description = "";
              this.edit = false;
              this.getSez();
            }
          })
          .catch(err => console.log(err));
      }
    },
    editSez(item) {
      this.edit = true;
      this.sezInput.sez_id = item.id;
      this.sezInput.sez_code = item.code;
      this.sezInput.sez_description = item.description;
    },
    deleteSez(sez_id) {
      if (confirm("Are you sure you want to delete this SEZ?")) {
        axios
          .delete(`/api/sez/${sez_id}`)
          .then(response => {
            alert("SEZ deleted.");
            this.getSez();
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
