<template>
  <div>
    <h2>Shift Management</h2>

    <!-- Shift List -->
    <ul>
      <li v-for="shift in shifts" :key="shift.id">
        {{ shift.name }} ({{ shift.start_time }} - {{ shift.end_time }})
        <button @click="editShift(shift)">Edit</button>
      </li>
    </ul>

    <!-- Shift Form -->
    <div v-if="editingShift">
      <h3>Edit Shift: {{ editingShift.name }}</h3>
      <form @submit.prevent="updateShift">
        <label>Name:</label>
        <input type="text" v-model="editingShift.name" required>
        <br>
        <label>Start Time:</label>
        <input type="time" v-model="editingShift.start_time" required>
        <br>
        <label>End Time:</label>
        <input type="time" v-model="editingShift.end_time" required>
        <br>
        <button type="submit">Update</button>
        <button @click="cancelEdit">Cancel</button>
      </form>
    </div>

  </div>
</template>

<script>
export default {
  name: "ShiftManagement",
  data() {
    return {
      shifts: [],
      editingShift: null,
    };
  },
  methods: {
    getShifts() {
      axios.get('/api/shifts')
        .then(response => {
          this.shifts = response.data;
        });
    },
    editShift(shift) {
      this.editingShift = { ...shift };
    },
    cancelEdit() {
      this.editingShift = null;
    },
    updateShift() {
      axios.put(`/api/shifts/${this.editingShift.id}`, this.editingShift)
        .then(response => {
          this.getShifts();
          this.cancelEdit();
        });
    },
  },
  mounted() {
    this.getShifts();
  }
};
</script>
