<template>
  <v-row align="center" class="list px-3 mx-auto">
    <v-col cols="12" md="8"> </v-col>
    <v-col cols="12" sm="12">
      <v-card class="mx-auto" tile>
        <v-card-title>Data Pasien</v-card-title>

        <v-data-table
          :headers="headers"
          :items="tutorials"
          disable-pagination
          :hide-default-footer="true"
        >
          <template v-slot:[`item.actions`]="{ item }">
            <v-icon small class="mr-2" @click="editTutorial(item.id)"
              >mdi-pencil</v-icon
            >
            <v-icon small @click="deleteTutorial(item.id)">mdi-delete</v-icon>
          </template>
        </v-data-table>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
import PasienDataService from "../services/PasienDataService";
export default {
  name: "tutorials-list",
  data() {
    return {
      tutorials: [],
      title: "",
      headers: [
        { text: "Name", value: "name", sortable: false },
        { text: "Sex", value: "sex", sortable: false },
        { text: "Religion", value: "religion", sortable: false },
        { text: "Phone", value: "phone", sortable: false },
        { text: "Address", value: "address", sortable: false },
        { text: "NIK", value: "nik", sortable: false },
        { text: "Actions", value: "actions", sortable: false },
      ],
    };
  },
  methods: {
    retrieveTutorials() {
      PasienDataService.getAll()
        .then((response) => {
          this.tutorials = response.data.result;
          console.log(response.data);
        })
        .catch((e) => {
          console.log(e);
        });
    },

    refreshList() {
      this.retrieveTutorials();
    },

    editTutorial(id) {
      this.$router.push({ name: "tutorial-details", params: { id: id } });
    },

    deleteTutorial(id) {
      PasienDataService.delete(id)
        .then(() => {
          this.refreshList();
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
  mounted() {
    this.retrieveTutorials();
  },
};
</script>

<style>
.list {
  max-width: 750px;
}
</style>
