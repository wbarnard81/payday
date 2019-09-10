<template>
  <div>
    <div>
      <label class="block w-1/4 text-gray-700 text-sm font-bold my-2">Enter Employee Type</label>
      <input
        class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-1/4 appearance-none leading-normal"
        type="text"
        placeholder="Enter type"
        name="employee_type"
        v-model="employeeInput.employee_type"
      />
    </div>

    <button
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 py-2 px-4 rounded-full"
      @click="addEmployeeType()"
    >Submit</button>
    <hr class="border-2 border-black" />
    <table class="text-center mt-4">
      <tr>
        <th class="border border-black px-3">Employee Type</th>
        <th class="border border-black px-3">Action</th>
      </tr>
      <tr v-for="item in employee" :key="item.id">
        <td class="border border-black">{{ item.name }}</td>
        <td class="border border-black">
          <button
            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-2 border border-yellow-700 rounded-full"
            @click="editEmployeeType(item)"
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
            @click="deleteEmployeeType(item.id)"
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
  name: "EmployeeType",
  data: () => {
    return {
      employee: null,
      edit: false,
      employeeInput: {
        empltype_id: "",
        employee_type: ""
      }
    };
  },
  mounted() {
    this.getEmployeeType();
  },
  methods: {
    getEmployeeType() {
      axios
        .get("/api/empltype/")
        .then(response => {
          this.employee = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    addEmployeeType(empltype_id) {
      if (this.edit === false) {
        axios
          .post("/api/empltype", this.employeeInput)
          .then(res => {
            if (res.status == 201) {
              alert("Employee Type Added.");
              this.employeeInput.employee_type = "";
              this.getEmployeeType();
            }
          })
          .catch(err => console.log(err));
      } else {
        axios
          .patch(
            `/api/empltype/` + this.employeeInput.empltype_id,
            this.employeeInput
          )
          .then(res => {
            if (res.status == 200) {
              alert("Employee Type Updated.");
              this.employeeInput.empltype_id = "";
              this.employeeInput.employee_type = "";
              this.edit = false;
              this.getEmployeeType();
            }
          })
          .catch(err => console.log(err));
      }
    },
    editEmployeeType(item) {
      this.edit = true;
      this.employeeInput.empltype_id = item.id;
      this.employeeInput.employee_type = item.name;
    },
    deleteEmployeeType(empltype_id) {
      if (confirm("Are you sure you want to delete this employee type?")) {
        axios
          .delete(`/api/empltype/${empltype_id}`)
          .then(response => {
            alert("Employee type deleted.");
            this.getEmployeeType();
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
