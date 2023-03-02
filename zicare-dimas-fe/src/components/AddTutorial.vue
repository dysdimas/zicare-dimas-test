<template>
  <div class="submit-form mt-3 mx-auto">
    <p class="headline">Add Pasien</p>

    <div v-if="!submitted">
      <v-form ref="form" lazy-validation>
        <v-text-field
          v-model="tutorial.name"
          :rules="[(v) => !!v || 'Name is required']"
          label="Name"
          required
        ></v-text-field>

        <v-text-field
          v-model="tutorial.sex"
          :rules="[(v) => !!v || 'Sex is required']"
          label="Sex"
          required
        ></v-text-field>

        <v-text-field
          v-model="tutorial.religion"
          :rules="[(v) => !!v || 'Religion is required']"
          label="Religion"
          required
        ></v-text-field>

        <v-text-field
          v-model="tutorial.phone"
          :rules="[(v) => !!v || 'Phone is required']"
          label="Phone"
          required
        ></v-text-field>

        <v-text-field
          v-model="tutorial.address"
          :rules="[(v) => !!v || 'Address is required']"
          label="Address"
          required
        ></v-text-field>

        <v-text-field
          v-model="tutorial.nik"
          :rules="[(v) => !!v || 'Nik is required']"
          label="Nik"
          required
        ></v-text-field>
      </v-form>

      <v-btn color="primary" class="mt-3" @click="saveTutorial">Submit</v-btn>
    </div>

    <div v-else>
      <v-card class="mx-auto">
        <v-card-title>
          Submitted successfully!
        </v-card-title>

        <v-card-subtitle>
          Click the button to add new Tutorial.
        </v-card-subtitle>

        <v-card-actions>
          <v-btn color="success" @click="newTutorial">Add</v-btn>
        </v-card-actions>
      </v-card>
    </div>
  </div>
</template>

<script>
import PasienDataService from "../services/PasienDataService";

export default {
  name: "add-tutorial",
  data() {
    return {
      tutorial: {
        name: "",
        sex: "",
        religion: "",
        phone: "",
        address: "",
        nik: "",
        published: false,
      },
      submitted: false,
    };
  },
  methods: {
    saveTutorial() {
      var data = {
        title: this.tutorial.title,
        description: this.tutorial.description,
      };

      PasienDataService.create(data)
        .then((response) => {
          this.tutorial.id = response.data.id;
          console.log(response.data);
          this.submitted = true;
        })
        .catch((e) => {
          console.log(e);
        });
    },

    newTutorial() {
      this.submitted = false;
      this.tutorial = {};
    },
  },
};
</script>

<style>
.submit-form {
  max-width: 300px;
}
</style>
