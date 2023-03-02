<template>
  <div v-if="currentTutorial" class="edit-form py-3">
    <p class="headline">Edit Tutorial</p>

    <v-form ref="form" lazy-validation>
      <v-text-field
        v-model="currentTutorial.name"
        :rules="[(v) => !!v || 'Name is required']"
        label="Name"
        required
      ></v-text-field>

      <v-text-field
        v-model="currentTutorial.sex"
        :rules="[(v) => !!v || 'Sex is required']"
        label="Sex"
        required
      ></v-text-field>

      <v-text-field
        v-model="currentTutorial.religion"
        :rules="[(v) => !!v || 'Religion is required']"
        label="Religion"
        required
      ></v-text-field>

      <v-text-field
        v-model="currentTutorial.phone"
        :rules="[(v) => !!v || 'Phone is required']"
        label="Phone"
        required
      ></v-text-field>

      <v-text-field
        v-model="currentTutorial.address"
        :rules="[(v) => !!v || 'Address is required']"
        label="Address"
        required
      ></v-text-field>

      <v-text-field
        v-model="currentTutorial.nik"
        :rules="[(v) => !!v || 'Nik is required']"
        label="Nik"
        required
      ></v-text-field>

      <!-- <label><strong>Status:</strong></label>
      {{ currentTutorial.published ? "Published" : "Pending" }}

      <v-divider class="my-5"></v-divider> -->

      <v-btn color="success" small @click="updateTutorial">
        Update
      </v-btn>
    </v-form>

    <p class="mt-3">{{ message }}</p>
  </div>

  <div v-else>
    <p>Please click on a Tutorial...</p>
  </div>
</template>

<script>
import PasienDataService from "../services/PasienDataService";

export default {
  name: "tutorial",
  data() {
    return {
      currentTutorial: null,
      message: "",
    };
  },
  methods: {
    getTutorial(id) {
      PasienDataService.get(id)
        .then((response) => {
          this.currentTutorial = response.data.result[0];
          console.log(response.data);
        })
        .catch((e) => {
          console.log(e);
        });
    },

    updateTutorial() {
      // console.log(JSON.stringify(this.currentTutorial));
      PasienDataService.update(this.currentTutorial.id, this.currentTutorial)
        .then((response) => {
          console.log(response.data);
          this.message = "The tutorial was updated successfully!";
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
  mounted() {
    this.message = "";
    this.getTutorial(this.$route.params.id);
  },
};
</script>

<style>
.edit-form {
  max-width: 300px;
  margin: auto;
}
</style>
