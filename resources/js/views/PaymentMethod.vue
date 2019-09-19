<template>
  <div>
    <div class="p-5 bg-gray-100">
      <div class="flex">
        <div class="w-1/3">
          <label class="block text-gray-700 text-sm font-bold my-2">Enter Payment Method</label>
          <input
            class="block w-3/4 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 appearance-none leading-normal"
            type="text"
            placeholder="Enter code"
            name="name"
            v-model="paymethodInput.name"
          />
        </div>
      </div>
      <div class="flex justify-end">
        <button
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-2 py-2 px-4 rounded-full"
          @click="addPaymethod()"
          :disabled="isDisabled"
        >Submit</button>
      </div>
    </div>

    <hr class="border-2 border-black" />

    <div class="flex justify-center">
      <table class="text-center mt-4">
        <tr>
          <th class="border border-black px-3">Payment Method</th>
        </tr>
        <tr v-for="item in paymethods" :key="item.id">
          <td class="border border-black px-4">{{ item.name }}</td>
          <td class="border border-black px-4">
            <button
              class="bg-yellow-300 text-grey-700 font-bold py-2 px-2 m-2"
              @click="editPaymethods(item)"
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
              @click="deletePaymethod(item.id)"
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
  name: "PayMethod",
  data: () => {
    return {
      paymethods: null,
      edit: false,
      paymethodInput: {
        paymethod_id: "",
        name: ""
      }
    };
  },
  mounted() {
    this.getPaymethods();
  },
  computed: {
    isDisabled: function() {
      return !this.paymethodInput.name;
    }
  },
  methods: {
    getPaymethods() {
      axios
        .get("/api/paymethod/")
        .then(response => {
          this.paymethods = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    addPaymethod(paymethod_id) {
      if (this.edit === false) {
        axios
          .post("/api/paymethod", this.paymethodInput)
          .then(res => {
            if (res.status == 201) {
              alert("Payment Method Added.");
              this.paymethodInput.name = "";
              this.getPaymethods();
            }
          })
          .catch(err => console.log(err));
      } else {
        axios
          .patch(
            `/api/paymethod/` + this.paymethodInput.paymethod_id,
            this.paymethodInput
          )
          .then(res => {
            if (res.status == 200) {
              alert("Payment Method Updated.");
              this.paymethodInput.paymethod_id = "";
              this.paymethodInput.name = "";
              this.edit = false;
              this.getPaymethods();
            }
          })
          .catch(err => console.log(err));
      }
    },
    editPaymethods(item) {
      this.edit = true;
      this.paymethodInput.paymethod_id = item.id;
      this.paymethodInput.name = item.name;
    },
    deletePaymethod(paymethod_id) {
      if (confirm("Are you sure you want to delete this Payment Method?")) {
        axios
          .delete(`/api/paymethod/${paymethod_id}`)
          .then(response => {
            alert("Payment Method deleted.");
            this.getPaymethods();
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
