<template>
  <div>
    <h1>Role Management</h1>

    <!-- Role List -->
    <ul>
      <li v-for="role in roles" :key="role.id">
        {{ role.name }}
        <button @click="editRole(role)">Edit</button>
      </li>
    </ul>

    <!-- Role Form -->
    <div v-if="editingRole">
      <h2>Edit Role: {{ editingRole.name }}</h2>
      <form @submit.prevent="updateRole">
        <label>Name:</label>
        <input type="text" v-model="editingRole.name" required>
        <br>
        <label>Description:</label>
        <input type="text" v-model="editingRole.description">
        <br>
        <button type="submit">Update</button>
        <button @click="cancelEdit">Cancel</button>
      </form>

      <!-- Permission Management -->
      <div>
        <h3>Permissions</h3>
        <ul>
          <li v-for="permission in permissions" :key="permission.id">
            <input type="checkbox" :checked="hasPermission(editingRole, permission)" @change="togglePermission(editingRole, permission)">
            {{ permission.name }}
          </li>
        </ul>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: "RoleManagement",
  data() {
    return {
      roles: [],
      permissions: [],
      editingRole: null,
    };
  },
  methods: {
    getRoles() {
      axios.get('/api/roles')
        .then(response => {
          this.roles = response.data;
        });
    },
    getPermissions() {
      axios.get('/api/permissions')
        .then(response => {
          this.permissions = response.data;
        });
    },
    editRole(role) {
      this.editingRole = { ...role };
    },
    cancelEdit() {
      this.editingRole = null;
    },
    updateRole() {
      axios.put(`/api/roles/${this.editingRole.id}`, this.editingRole)
        .then(response => {
          this.getRoles();
          this.cancelEdit();
        });
    },
    hasPermission(role, permission) {
      return role.permissions.some(p => p.id === permission.id);
    },
    togglePermission(role, permission) {
      if (this.hasPermission(role, permission)) {
        axios.delete(`/api/roles/${role.id}/permissions`, { data: { permission_id: permission.id } })
            .then(() => this.getRoles());
      } else {
        axios.post(`/api/roles/${role.id}/permissions`, { permission_id: permission.id })
            .then(() => this.getRoles());
      }
    }
  },
  mounted() {
    this.getRoles();
    this.getPermissions();
  }
};
</script>
