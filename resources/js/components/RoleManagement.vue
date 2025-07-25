<template>
  <div class="card">
    <div class="card-header pb-0">
      <h6>Roles</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="role in roles" :key="role.id">
              <td>
                <div class="d-flex px-2 py-1">
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">{{ role.name }}</h6>
                  </div>
                </div>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{ role.description }}</p>
              </td>
              <td class="align-middle">
                <a href="javascript:;" @click="editRole(role)" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit role">
                  Edit
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Edit Role Modal -->
    <div v-if="editingRole">
      <div class="modal fade show" style="display: block;" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Role: {{ editingRole.name }}</h5>
              <button type="button" class="close" @click="cancelEdit">
                <span>&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form @submit.prevent="updateRole">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" v-model="editingRole.name" required>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <input type="text" class="form-control" v-model="editingRole.description">
                </div>
                <hr>
                <h6>Permissions</h6>
                <div class="form-check" v-for="permission in permissions" :key="permission.id">
                  <input class="form-check-input" type="checkbox" :checked="hasPermission(editingRole, permission)" @change="togglePermission(editingRole, permission)">
                  <label class="form-check-label">{{ permission.name }}</label>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" @click="cancelEdit">Close</button>
              <button type="button" class="btn btn-primary" @click="updateRole">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-backdrop fade show"></div>
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
      const hasPerm = this.hasPermission(role, permission);
      if (hasPerm) {
        axios.delete(`/api/roles/${role.id}/permissions`, { data: { permission_id: permission.id } })
            .then(() => {
                const index = role.permissions.findIndex(p => p.id === permission.id);
                role.permissions.splice(index, 1);
            });
      } else {
        axios.post(`/api/roles/${role.id}/permissions`, { permission_id: permission.id })
            .then(() => {
                role.permissions.push(permission);
            });
      }
    }
  },
  mounted() {
    this.getRoles();
    this.getPermissions();
  }
};
</script>
