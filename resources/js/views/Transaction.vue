<template>
  <div>
    <div class="p-5 bg-gray-100">
      <div class="flex">
        <div class="w-1/3">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter Employee Name</label>
          <input
            class="block w-3/4 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            type="text"
            placeholder="Enter name"
            name="employee_name"
            v-model="transactionInput.employee_name"
          />
        </div>
        <div class="w-1/3">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter Date</label>
          <input
            class="block w-3/4 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            type="text"
            placeholder="DD-MM-YYYY"
            name="date"
            v-model="transactionInput.date"
          />
        </div>
        <div class="w-1/3">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter Employer Name</label>
          <input
            class="block w-3/4 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            type="text"
            placeholder="Enter employer name"
            name="employer_name"
            v-model="transactionInput.employer_name"
          />
        </div>
      </div>
      <div class="flex">
        <div class="w-1/4">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter Description</label>
          <input
            class="block w-3/4 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            type="text"
            placeholder="Enter description"
            name="description"
            v-model="transactionInput.description"
          />
        </div>
        <div class="w-1/4">
          <label class="block text-gray-700 text-sm font-bold my-2">Select IRP5 Code</label>
          <select
            class="block appearance-none w-3/4 bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="irp5_code"
            v-model="transactionInput.irp5_code"
          >
            <option value disabled selected>Select the IRP5 Code</option>
            <option
              v-for="item in irp5_codes"
              :key="item.id"
            >{{ item.code }} - {{ item.description }}</option>
          </select>
        </div>
        <div class="w-1/4">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter Amount</label>
          <input
            class="block w-3/4 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            type="text"
            placeholder="Enter amount"
            name="amount"
            v-model="transactionInput.amount"
          />
        </div>
        <div class="w-1/4">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter Notes</label>
          <input
            class="block w-3/4 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            type="text"
            placeholder="Enter notes"
            name="note"
            v-model="transactionInput.note"
          />
        </div>
      </div>
      <div class="flex justify-end">
        <button
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 py-2 px-4 rounded-full"
          @click="addTransaction()"
          :disabled="isDisabled"
        >Submit</button>
      </div>
    </div>
    <div>
      <hr class="border-2 border-black" />

      <div class="flex justify-center">
        <table class="text-center mt-4">
          <tr>
            <th class="border border-black px-3">Employee Name</th>
            <th class="border border-black px-3">Date</th>
            <th class="border border-black px-3">Employer</th>
            <th class="border border-black px-3">Description</th>
            <th class="border border-black px-3">IRP5 Code</th>
            <th class="border border-black px-3">Amount</th>
            <th class="border border-black px-3">Note</th>
          </tr>
          <tr v-for="item in transactions" :key="item.id">
            <td class="border border-black px-4">{{ item.employee }}</td>
            <td class="border border-black px-4">{{ item.date }}</td>
            <td class="border border-black px-4">{{ item.employer }}</td>
            <td class="border border-black px-4">{{ item.description }}</td>
            <td class="border border-black px-4">{{ item.irp5_code }}</td>
            <td class="border border-black px-4">R {{ item.amount }}</td>
            <td class="border border-black px-4">{{ item.note }}</td>
            <td class="border border-black px-4">
              <button
                class="bg-yellow-300 text-grey-700 font-bold py-2 px-2 m-2"
                @click="editTransaction(item)"
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
                @click="deleteTransaction(item.id)"
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
  </div>
</template>

<script>
export default {
  name: "Transactions",
  data: () => {
    return {
      transactions: null,
      irp5_codes: null,
      edit: false,
      transactionInput: {
        transaction_id: "",
        employee_name: "",
        date: "",
        irp5_code: "",
        employer_name: "",
        description: "",
        amount: "",
        note: ""
      }
    };
  },
  mounted() {
    this.getTransactions();
    this.getIrp5Codes();
  },
  computed: {
    isDisabled: function() {
      return !this.transactionInput.note;
    }
  },
  methods: {
    getTransactions() {
      axios
        .get("/api/transaction/")
        .then(response => {
          this.transactions = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    getIrp5Codes() {
      axios
        .get("/api/irp5/")
        .then(response => {
          this.irp5_codes = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    addTransaction(transaction_id) {
      if (this.edit === false) {
        axios
          .post("/api/transaction", this.transactionInput)
          .then(res => {
            if (res.status == 201) {
              alert("Transaction Added.");
              this.transactionInput.transaction_id = "";
              this.transactionInput.employee_name = "";
              this.transactionInput.date = "";
              this.transactionInput.employer_name = "";
              this.transactionInput.description = "";
              this.transactionInput.amount = "";
              this.transactionInput.note = "";
              this.getTransactions();
            }
          })
          .catch(err => console.log(err.response));
      } else {
        console.log(this.transactionInput);
        axios
          .patch(
            `/api/transaction/` + this.transactionInput.transaction_id,
            this.transactionInput
          )
          .then(res => {
            if (res.status == 200) {
              alert("Transaction Updated.");
              this.transactionInput.transaction_id = "";
              this.transactionInput.employee_name = "";
              this.transactionInput.date = "";
              this.transactionInput.employer_name = "";
              this.transactionInput.description = "";
              this.transactionInput.amount = "";
              this.transactionInput.note = "";
              this.edit = false;
              this.getTransactions();
            }
          })
          .catch(err => console.log(err.resonse));
      }
    },
    editTransaction(item) {
      this.edit = true;
      this.transactionInput.transaction_id = item.id;
      this.transactionInput.employee_name = item.employee;
      this.transactionInput.date = item.date;
      this.transactionInput.employer_name = item.employer;
      this.transactionInput.description = item.description;
      this.transactionInput.irp5_code = item.irp5_code;
      this.transactionInput.amount = item.amount;
      this.transactionInput.note = item.note;
    },
    deleteTransaction(transaction_id) {
      if (confirm("Are you sure you want to delete this Transaction?")) {
        axios
          .delete(`/api/transaction/${transaction_id}`)
          .then(response => {
            alert("Transaction deleted.");
            this.getTransactions();
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
