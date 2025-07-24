<template>
  <div>
    <h2>Zone Management</h2>

    <!-- Zone List -->
    <ul>
      <li v-for="zone in zones" :key="zone.id">
        {{ zone.name }} (Lat: {{ zone.latitude }}, Lng: {{ zone.longitude }}, Radius: {{ zone.radius }}m)
        <button @click="editZone(zone)">Edit</button>
      </li>
    </ul>

    <!-- Zone Form -->
    <div v-if="editingZone">
      <h3>Edit Zone: {{ editingZone.name }}</h3>
      <form @submit.prevent="updateZone">
        <label>Name:</label>
        <input type="text" v-model="editingZone.name" required>
        <br>
        <label>Latitude:</label>
        <input type="number" step="any" v-model="editingZone.latitude" required>
        <br>
        <label>Longitude:</label>
        <input type="number" step="any" v-model="editingZone.longitude" required>
        <br>
        <label>Radius (meters):</label>
        <input type="number" step="any" v-model="editingZone.radius" required>
        <br>
        <button type="submit">Update</button>
        <button @click="cancelEdit">Cancel</button>
      </form>
    </div>

  </div>
</template>

<script>
export default {
  name: "ZoneManagement",
  data() {
    return {
      zones: [],
      editingZone: null,
    };
  },
  methods: {
    getZones() {
      axios.get('/api/zones')
        .then(response => {
          this.zones = response.data;
        });
    },
    editZone(zone) {
      this.editingZone = { ...zone };
    },
    cancelEdit() {
      this.editingZone = null;
    },
    updateZone() {
      axios.put(`/api/zones/${this.editingZone.id}`, this.editingZone)
        .then(response => {
          this.getZones();
          this.cancelEdit();
        });
    },
  },
  mounted() {
    this.getZones();
  }
};
</script>
