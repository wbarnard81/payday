<template>
  <div class>
    <div class="p-5 bg-gray-100">
      <div class="flex">
        <div class="w-1/3">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter SIC7 Code</label>
          <input
            class="block w-3/4 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            type="text"
            placeholder="Enter SIC7 code"
            name="sic7_code"
            v-model="sic7Input.sic7_code"
          />
        </div>
        <div class="w-1/3">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter SIC7 Name</label>
          <input
            class="block w-3/4 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            type="text"
            placeholder="Enter description"
            name="sic7_description"
            v-model="sic7Input.sic7_description"
          />
        </div>
      </div>

      <div class="flex justify-end">
        <button
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 py-2 px-4 rounded-full"
          @click="addSic7()"
        >Submit</button>
      </div>
    </div>

    <hr class="border-2 border-black" />

    <div class="flex justify-center">
      <table class="text-center mt-4">
        <tr>
          <th class="border border-black px-3">SIC7 Code</th>
          <th class="border border-black px-3">SIC7 Description</th>
        </tr>
        <tr v-for="item in sic7s" :key="item.id">
          <td class="border border-black px-4">{{ item.code }}</td>
          <td class="border border-black px-4">{{ item.description }}</td>
          <td class="border border-black px-4">
            <button
              class="bg-yellow-300 text-grey-700 font-bold py-2 px-2 m-2"
              @click="editSic7(item)"
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
              @click="deleteSic7(item.id)"
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
  name: "SIC7",
  data: () => {
    return {
      sic7s: null,
      edit: false,
      sic7Input: {
        sic7_id: "",
        sic7_code: "",
        sic7_description: ""
      }
    };
  },
  mounted() {
    this.getSic7s();
  },
  methods: {
    getSic7s() {
      axios
        .get("/api/sic7/")
        .then(response => {
          this.sic7s = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    addSic7(sic7_id) {
      if (this.edit === false) {
        axios
          .post("/api/sic7", this.sic7Input)
          .then(res => {
            if (res.status == 201) {
              alert("SIC7 Code Added.");
              this.sic7Input.sic7_code = "";
              this.sic7Input.sic7_description = "";
              this.getSic7s();
            }
          })
          .catch(err => console.log(err.response));
      } else {
        axios
          .patch(`/api/sic7/` + this.sic7Input.sic7_id, this.sic7Input)
          .then(res => {
            if (res.status == 200) {
              alert("SIC7 Code Updated.");
              this.sic7Input.sic7_id = "";
              this.sic7Input.sic7_code = "";
              this.sic7Input.sic7_description = "";
              this.edit = false;
              this.getSic7s();
            }
          })
          .catch(err => console.log(err.response));
      }
    },
    editSic7(item) {
      this.edit = true;
      this.sic7Input.sic7_id = item.id;
      this.sic7Input.sic7_code = item.code;
      this.sic7Input.sic7_description = item.description;
    },
    deleteSic7(sic7_id) {
      if (confirm("Are you sure you want to delete this SIC7 Code?")) {
        axios
          .delete(`/api/sic7/${sic7_id}`)
          .then(response => {
            alert("SIC7 Code deleted.");
            this.getSic7s();
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
