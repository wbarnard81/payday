<template>
  <div>
    <div class="p-5 bg-gray-100">
      <div class="flex">
        <div class="w-1/3">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter IRP5 Code</label>
          <input
            class="block w-3/4 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            type="text"
            placeholder="Enter code"
            name="irp5codes_code"
            v-model="irp5codesInput.irp5codes_code"
          />
        </div>
        <div class="w-1/3">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter IRP5 Name</label>
          <input
            class="block w-3/4 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            type="text"
            placeholder="Enter description"
            name="irp5codes_description"
            v-model="irp5codesInput.irp5codes_description"
          />
        </div>
      </div>
      <div class="flex justify-end">
        <button
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 py-2 px-4 rounded-full"
          @click="addIrp5codes()"
        >Submit</button>
      </div>
    </div>

    <hr class="border-2 border-black" />

    <div class="flex justify-center">
      <table class="text-center mt-4">
        <tr>
          <th class="border border-black px-3">IRP5 Code</th>
          <th class="border border-black px-3">IRP5 Description</th>
        </tr>
        <tr v-for="item in irp5codes" :key="item.id">
          <td class="border border-black px-4">{{ item.code }}</td>
          <td class="border border-black px-4">{{ item.description }}</td>
          <td class="border border-black px-4">
            <button
              class="bg-yellow-300 text-grey-700 font-bold py-2 px-2 m-2"
              @click="editIrp5codes(item)"
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
              @click="deleteIrp5codes(item.id)"
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
  name: "IRP5Codes",
  data: () => {
    return {
      irp5codes: null,
      edit: false,
      irp5codesInput: {
        irp5codes_id: "",
        irp5codes_code: "",
        irp5codes_description: ""
      }
    };
  },
  mounted() {
    this.getIrp5codes();
  },
  methods: {
    getIrp5codes() {
      axios
        .get("/api/irp5/")
        .then(response => {
          this.irp5codes = response.data;
        })
        .catch(error => {
          c.responseonsole.log(error);
        });
    },
    addIrp5codes(irp5codes_id) {
      if (this.edit === false) {
        axios
          .post("/api/irp5", this.irp5codesInput)
          .then(res => {
            if (res.status == 201) {
              alert("IRP5 Code Added.");
              this.irp5codesInput.irp5codes_code = "";
              this.irp5codesInput.irp5codes_description = "";
              this.getIrp5codes();
            }
          })
          .catch(err => console.log(err.response));
      } else {
        axios
          .patch(
            `/api/irp5/` + this.irp5codesInput.irp5codes_id,
            this.irp5codesInput
          )
          .then(res => {
            if (res.status == 200) {
              alert("IRP5 Code Updated.");
              this.irp5codesInput.irp5codes_id = "";
              this.irp5codesInput.irp5codes_code = "";
              this.irp5codesInput.irp5codes_description = "";
              this.edit = false;
              this.getIrp5codes();
            }
          })
          .catch(err => console.log(err.response));
      }
    },
    editIrp5codes(item) {
      this.edit = true;
      this.irp5codesInput.irp5codes_id = item.id;
      this.irp5codesInput.irp5codes_code = item.code;
      this.irp5codesInput.irp5codes_description = item.description;
    },
    deleteIrp5codes(irp5codes_id) {
      if (confirm("Are you sure you want to delete this IRP5 Code?")) {
        axios
          .delete(`/api/irp5/${irp5codes_id}`)
          .then(response => {
            alert("IRP5 Code deleted.");
            this.getIrp5codes();
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
