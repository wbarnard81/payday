<template>
  <div>
    <h1
      class="fill-current text-3xl text-center text-blue-600 capitalize underline"
    >Let's add an employer</h1>

    <div class="w-full">
      <div class="shadow w-full bg-grey-light">
        <div
          class="bg-green-500 text-xs leading-none py-2 text-center text-white mb-6"
          :style="{ width: progress + '%' }"
        >Progress: {{ progress + '%' }}</div>
      </div>
    </div>

    <form @submit.prevent="submitData">
      <Selectfield
        name="employer_type"
        label="Employer Type"
        @update:field="form.employer_type = $event"
        @change="procede()"
      />

      <div v-if="form.employer_type == 1">
        <Inputfield
          name="first_name"
          label="First Name(s)"
          placeholder="John William"
          @update:field="form.first_name = $event"
        />
        <Inputfield
          name="last_name"
          label="Last Name"
          placeholder="Doe"
          @update:field="form.last_name = $event"
        />
        <Inputfield
          name="birthday"
          label="Date of Birth"
          placeholder="DD/MM/YYYY"
          @update:field="form.birthday = $event"
        />

        <Selectfield name="id_type" label="ID Type" @update:field="form.id_type = $event" />
      </div>

      <div v-if="form.id_type == 1">
        <Inputfield
          name="idnumber"
          label="ID Number"
          placeholder="800123 5050 080"
          @update:field="form.idnumber = $event"
        />
      </div>

      <div v-if="form.id_type == 2">
        <Inputfield
          name="passport_number"
          label="Passport Number"
          placeholder="800123 5050 080"
          @update:field="form.passport_number = $event"
        />

        <Selectfield name="ppcountry" label="ID Type" @update:field="form.ppcountry = $event" />
      </div>

      <div v-if="form.ppcountry || form.idnumber.length > 9">
        <Inputfield
          name="telephone"
          label="Telephone Number"
          placeholder="012 345 6789"
          @update:field="form.telephone = $event"
        />

        <Inputfield
          name="cellphone"
          label="Cellphone Number"
          placeholder="012 345 6789"
          @update:field="form.cellphone = $event"
        />
        <Inputfield
          name="business_number"
          label="Business Number"
          placeholder="012 345 6789"
          @update:field="form.business_number = $event"
        />
        <Inputfield
          name="email"
          label="Email Address"
          placeholder="someone@example.com"
          @update:field="form.email = $event"
        />
        <Inputfield
          name="unit_number"
          label="Unit Number"
          placeholder="123"
          @update:field="form.unit_number = $event"
        />
        <Inputfield
          name="complex_name"
          label="Complex Name"
          placeholder="Sunrise Rainbow"
          @update:field="form.complex_name = $event"
        />
        <Inputfield
          name="street_number"
          label="Street Number"
          placeholder="11a"
          @update:field="form.street_number = $event"
        />
        <Inputfield
          name="street_name"
          label="Street Name"
          placeholder="North avenue"
          @update:field="form.street_name = $event"
        />
        <Inputfield
          name="suburb"
          label="Suburb Name"
          placeholder="City Deep"
          @update:field="form.suburb = $event"
        />
        <Inputfield
          name="city_name"
          label="City Name"
          placeholder="Nowhere"
          @update:field="form.city_name = $event"
        />

        <Selectfield name="country" label="Country" @update:field="form.country = $event" />
      </div>

      <div v-if="form.country">
        <Selectfield
          name="same_address"
          label="Is the Postal Address the same as the Street Address?"
          @update:field="form.same_address = $event"
        />
      </div>

      <!-- <div v-if="form.same_address"> -->
      <div>
        <button
          class="bg-green-500 hover:bg-green-700 text-white font-bold my-2 py-2 px-4 rounded-full"
        >Submit</button>
      </div>
    </form>
  </div>
</template>

<script>
import Inputfield from "../components/InputField";
import Selectfield from "../components/Selectfield";
export default {
  name: "EmployerCreate",
  data: () => {
    return {
      form: {
        first_name: "",
        last_name: "",
        birthday: "",
        idnumber: "",
        passport_number: "",
        ppcountry: "",
        id_type: "",
        telephone: "",
        cellphone: "",
        business_number: "",
        email: "",
        unit_number: "",
        complex_name: "",
        street_number: "",
        street_name: "",
        suburb: "",
        city_name: "",
        country: "",
        same_address: "",
        employer_type: ""
      },
      progress: 0,
      user: ""
    };
  },
  components: {
    Inputfield,
    Selectfield
  },
  methods: {
    procede: function() {
      this.progress = this.progress + 10;
    },
    submitData: () => {
      console.log(this.form);
    }
  },
  mounted() {
    this.user = "Werner Barnard";
    console.log("Component mounted.");
  }
};
</script>
