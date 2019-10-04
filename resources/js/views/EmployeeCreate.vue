<template>
  <div>
    <div class="py-2 bg-gray-300">
      <button
        class="border border-gray-700 p-2 ml-4 mx-2"
        :disabled="this.edit"
        @click="addEmployee()"
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
          class="feather text-green-500 feather-plus-square"
        >
          <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
          <line x1="12" y1="8" x2="12" y2="16" />
          <line x1="8" y1="12" x2="16" y2="12" />
        </svg>
      </button>
      <button class="border border-gray-700 p-2 mx-2" @click="deleteEmployee()">
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
          class="feather text-red-500 feather-trash-2"
        >
          <polyline points="3 6 5 6 21 6" />
          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
          <line x1="10" y1="11" x2="10" y2="17" />
          <line x1="14" y1="11" x2="14" y2="17" />
        </svg>
      </button>
      <button class="border border-gray-700 p-2 mx-2">
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
          class="feather text-yellow-500 feather-edit"
        >
          <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
          <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
        </svg>
      </button>
      <button class="border border-gray-700 p-2 mx-2" @click="updateEmployee()">
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
          class="feather text-blue-500 feather-save"
        >
          <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
          <polyline points="17 21 17 13 7 13 7 21" />
          <polyline points="7 3 7 8 15 8" />
        </svg>
      </button>
      <button class="border border-gray-700 p-2 mx-2">
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
          class="feather text-gray-800 feather-arrow-left"
        >
          <line x1="19" y1="12" x2="5" y2="12" />
          <polyline points="12 19 5 12 12 5" />
        </svg>
      </button>
      <button class="border border-gray-700 p-2 mx-2">
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
          class="feather text-gray-800 feather-arrow-right"
        >
          <line x1="5" y1="12" x2="19" y2="12" />
          <polyline points="12 5 19 12 12 19" />
        </svg>
      </button>
    </div>
    <div>
      <div>
        <h3 class="underline">Basic Details</h3>
      </div>
      <div class="bg-gray-200">
        <div class="border border-gray-900 justify-between mt-4 p-2">
          <label class="bg-gray-200" for="empcode">Employee Code</label>
          <input class="bg-white text-right" type="text" disabled v-model="form.id" />
        </div>
        <div class="flex justify-between mt-4">
          <div class>
            <div class="flex mb-2 border border-gray-900 justify-between p-2">
              <label class="bg-gray-200" for="empcode">Title</label>
              <input class="bg-white text-right" type="text" v-model="form.title" />
            </div>
            <div class="flex mb-2 border border-gray-900 justify-between p-2">
              <label class="bg-gray-200" for="empcode">Name</label>
              <input class="bg-white text-right" type="text" v-model="form.first_name" />
            </div>
            <div class="flex mb-2 border border-gray-900 justify-between p-2">
              <label class="bg-gray-200" for="empcode">Nickname</label>
              <input class="bg-white text-right" type="text" v-model="form.nick_name" />
            </div>
            <div class="flex mb-2 border border-gray-900 justify-between p-2">
              <label class="bg-gray-200" for="empcode">Surname</label>
              <input class="bg-white text-right" type="text" v-model="form.last_name" />
            </div>
          </div>
          <div class>
            <div class="flex mb-2 border border-gray-900 justify-between p-2">
              <label class="bg-gray-200" for="empcode">Profile</label>
              <input class="bg-white text-right" type="text" value="2000" />
            </div>
            <div class="flex mb-2 border border-gray-900 justify-between p-2">
              <label class="bg-gray-200" for="empcode">Security Group</label>
              <input class="bg-white text-right" type="text" />
            </div>
            <div class="flex mb-2 border border-gray-900 justify-between p-2">
              <label class="bg-gray-200" for="empcode">Status</label>
              <input class="bg-white text-right" type="text" v-model="form.status" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="p-4">
      <ul class="flex border-b-2 border-blue-800">
        <li class="-mb-px mr-1">
          <a
            :class="[{'activetab': activeTab === 'personal'}, 'inactivetab']"
            @click="activeTab = 'personal'"
            href="#"
          >Personal</a>
        </li>
        <li class="mr-1">
          <a
            :class="[{'activetab': activeTab === 'payment'}, 'inactivetab']"
            @click="activeTab = 'payment'"
            href="#"
          >Payment</a>
        </li>
        <li class="mr-1">
          <a
            :class="[{'activetab': activeTab === 'rates'}, 'inactivetab']"
            @click="activeTab = 'rates'"
            href="#"
          >Rates</a>
        </li>
        <li class="mr-1">
          <a
            :class="[{'activetab': activeTab === 'tax'}, 'inactivetab']"
            @click="activeTab = 'tax'"
            href="#"
          >Tax</a>
        </li>
        <li class="mr-1">
          <a
            :class="[{'activetab': activeTab === 'loan'}, 'inactivetab']"
            @click="activeTab = 'loan'"
            href="#"
          >Loan/Savings</a>
        </li>
        <li class="mr-1">
          <a
            :class="[{'activetab': activeTab === 'leave'}, 'inactivetab']"
            @click="activeTab = 'leave'"
            href="#"
          >Leave</a>
        </li>
        <li class="mr-1">
          <a
            :class="[{'activetab': activeTab === 'user'}, 'inactivetab']"
            @click="activeTab = 'user'"
            href="#"
          >User Def.</a>
        </li>
        <li class="mr-1">
          <a
            :class="[{'activetab': activeTab === 'statutory'}, 'inactivetab']"
            @click="activeTab = 'statutory'"
            href="#"
          >Statutory</a>
        </li>
        <li class="mr-1">
          <a
            :class="[{'activetab': activeTab === 'funds'}, 'inactivetab']"
            @click="activeTab = 'funds'"
            href="#"
          >Funds</a>
        </li>
        <li class="mr-1">
          <a
            :class="[{'activetab': activeTab === 'skills'}, 'inactivetab']"
            @click="activeTab = 'skills'"
            href="#"
          >Skills/Equity</a>
        </li>
      </ul>
    </div>
    <div>
      <ul>
        <li v-for="employee in employees" :key="employee.id">
          {{ employee.title }} -
          <a @click="editEmployee(employee)">{{ employee.first_name }}</a>
          - {{ employee.nick_name }} - {{ employee.last_name }} - {{ employee.status }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "EmployeeCreate",
  data: () => {
    return {
      activeTab: "personal",
      edit: false,
      employees: [],
      form: {
        id: "",
        title: "",
        first_name: "",
        nick_name: "",
        last_name: "",
        status: ""
      },
      user: ""
    };
  },
  components: {},
  methods: {
    getEmployees() {
      axios
        .get("/api/employee/")
        .then(response => {
          this.employees = response.data;
        })
        .catch(error => {
          console.log(error.response);
        });
    },
    addEmployee() {
      axios
        .post("/api/employee", this.form)
        .then(res => {
          if (res.status == 200) {
            alert("Employee Added.");
            this.form.title = "";
            this.form.first_name = "";
            this.form.nick_name = "";
            this.form.last_name = "";
            this.form.status = "";
            this.getEmployees();
          }
        })
        .catch(err => console.log(err.resonse));
    },
    updateEmployee() {
      axios
        .patch(`/api/employee/` + this.form.id, this.form)
        .then(res => {
          if (res.status == 200) {
            alert("Employee Updated.");
            this.form.id = "";
            this.form.title = "";
            this.form.first_name = "";
            this.form.nick_name = "";
            this.form.last_name = "";
            this.form.status = "";
            this.edit = false;
            this.errors = [];
            this.getEmployees();
          }
        })
        .catch(err => console.log(err.response));
    },
    editEmployee(item) {
      this.edit = true;
      this.form.id = item.id;
      this.form.title = item.title;
      this.form.first_name = item.first_name;
      this.form.nick_name = item.nick_name;
      this.form.last_name = item.last_name;
      this.form.status = item.status;
    },
    deleteEmployee() {
      if (confirm("Are you sure you want to delete this employee?")) {
        axios
          .delete(`/api/employee/${this.form.id}`)
          .then(response => {
            alert("Employee deleted.");
            this.getEmployees();
          })
          .catch(err => {
            console.log(err.response);
          });
      }
    }
  },
  computed: {},
  mounted() {
    this.getEmployees();
  }
};
</script>

<style scoped>
.activetab {
  background-color: #bee3f8 !important;
  display: inline-block !important;
  border-left-width: 1px !important;
  border-top-width: 1px !important;
  border-right-width: 1px !important;
  border-color: #2c5282 !important;
  border-top-left-radius: 0.5rem !important;
  border-top-right-radius: 0.5rem !important;
  padding-top: 0.5rem !important;
  padding-bottom: 0.5rem !important;
  padding-right: 1rem !important;
  padding-left: 1rem !important;
  color: #2c5282 !important;
  font-weight: 600 !important;
}

.inactivetab {
  background-color: #fff;
  display: inline-block;
  border-left-width: 1px;
  border-top-width: 1px;
  border-right-width: 1px;
  border-color: #718096;
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
  padding-right: 1rem;
  padding-left: 1rem;
  color: #4299e1;
  font-weight: 600;
}

.inactivetab:hover {
  color: #2c5282;
}
</style>
