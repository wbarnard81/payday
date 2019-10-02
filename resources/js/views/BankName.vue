<template>
  <div>
    <div class="p-5 bg-gray-100">
      <div
        class="text-red-400 text-center"
        v-for="error in errors"
        :key="error.index"
      >{{ error[0] }}</div>
      <div class="flex">
        <div class="w-1/3">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter Bank Name</label>
          <input
            class="block w-3/4 bg-white focus:outline-none border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            :class="{invalid: !$v.banknameInput.name.minLength}"
            type="text"
            placeholder="Enter bank name"
            name="name"
            v-model.trim="$v.banknameInput.name.$model"
          />
        </div>
      </div>
      <div class="flex justify-end">
        <button
          class="bg-blue-500 hover:bg-blue-700 focus:outline-none text-white font-bold my-2 py-2 px-4 rounded-full"
          @click="addBankName()"
          :disabled="$v.$invalid"
        >Submit</button>
      </div>
    </div>

    <hr class="border-2 border-black" />

    <div class="flex justify-center">
      <table class="text-center mt-4">
        <tr>
          <th class="border border-black px-3">Account Type</th>
        </tr>
        <tr v-for="item in banknames" :key="item.id">
          <td class="border border-black px-4">{{ item.name }}</td>
          <td class="border border-black px-4">
            <button
              class="bg-yellow-300 text-grey-700 font-bold py-2 px-2 m-2"
              @click="editBankName(item)"
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
              @click="deleteBankName(item.id)"
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
export default {
  name: "BankName",
  data: () => {
    return {
      banknames: null,
      edit: false,
      errors: [],
      banknameInput: {
        id: "",
        name: ""
      }
    };
  },
  mounted() {
    this.getBankNames();
  },
  validations: {
    banknameInput: {
      name: {
        required,
        minLength: minLength(3)
      }
    }
  },
  methods: {
    getBankNames() {
      axios
        .get("/api/bank/")
        .then(response => {
          this.banknames = response.data;
        })
        .catch(error => {
          console.log(error.response);
        });
    },
    addBankName(id) {
      if (this.edit === false) {
        axios
          .post("/api/bank", this.banknameInput)
          .then(res => {
            if (res.status == 200) {
              alert("Bank Name Added.");
              this.banknameInput.name = "";
              this.getBankNames();
            }
          })
          .catch(err => console.log(err.response));
      } else {
        axios
          .patch(`/api/bank/` + this.banknameInput.id, this.banknameInput)
          .then(res => {
            if (res.status == 200) {
              alert("Bank Name Updated.");
              this.banknameInput.id = "";
              this.banknameInput.name = "";
              this.edit = false;
              this.errors = [];
              this.getBankNames();
            }
          })
          .catch(err => console.log(err.response));
      }
    },
    editBankName(item) {
      this.edit = true;
      this.banknameInput.id = item.id;
      this.banknameInput.name = item.name;
    },
    deleteBankName(id) {
      if (confirm("Are you sure you want to delete this bank name?")) {
        axios
          .delete(`/api/bank/${id}`)
          .then(response => {
            alert("Bank name deleted.");
            this.getBankNames();
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
