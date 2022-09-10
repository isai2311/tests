Vue.component('vue-multiselect', window.VueMultiselect.default)

var usuarios = new Vue({
  el: '#usuarios',
  components: { Multiselect: 'vue-multiselect' },
  data() {
    return {
      busqueda: {
        email: '',
        name: '',
      },
      perfiles: [],
      usuario: {
        email: '',
        cUsuPerfil: 1,
        name: '',
      },
      cargando: false,
      usuarios: null,
      pagination: {
        total: 0,
        current_page: 0,
        per_page: 0,
        last_page: 0,
        from: 0,
        to: 0,
      },
      offset: 3,
    }
  },
  mounted() {
    this.getUsuarios()
  },
  methods: {
    getUsuarios: async function (page = 1) {
      this.cargando = true
      await axios
        .get(`/usuarios/listado?page=${page}`, { params: this.busqueda })
        .then((response) => {
          const { pagination, Usuario } = response.data
          this.pagination = pagination
          this.usuarios = Usuario
        })
        .catch((error) => {
          console.log(error)
          toastr.warning(error.message, 'Usuarios')
        })
        .finally(() => {
          this.cargando = false
        })
    },

    changePage: function (page) {
      this.pagination.current_page = page
      this.getUsuarios(page)
    },
    limpiar: function () {
      this.usuario = {
        email: '',
        cUsuPassword: 1,
        cUsuPerfil: 1,
        name: '',
      }
    },

    agregar: function () {
      this.limpiar()
      $('#modal-agregar').modal('show')
    },

    addUsuario: async function () {
      await axios
        .post('/usuarios', this.usuario)
        .then((response) => {
          const { success, message } = response.data
          if (success) {
            toastr.success(message, 'Exito')
            this.getUsuarios()
            $('#modal-agregar').modal('hide')
          }
        })
        .catch((error) => {
          console.log(error)
          toastr.warning(error.message, 'Crear Usuario')
        })
    },

    getUsuario: async function (id) {
      await axios
        .get(`/usuarios/${id}`)
        .then((response) => {
          this.usuario = response.data
        })
        .catch((error) => {
          console.log(error)
          toastr.warning(error.message, 'Usuario')
        })
    },

    editar: function (usuario) {
      this.usuario = usuario
      const { id: id } = usuario
      this.getUsuario(id).then(() => {
        $('#modal-editar').modal('show')
      })
    },

    updateUsuario: async function () {
      const { id: id } = this.usuario
      await axios
        .put(`/usuarios/${id}`, this.usuario)
        .then((response) => {
          const { success, message } = response.data
          if (success) {
            toastr.success(message, 'Exito')
            this.getUsuarios()
            $('#modal-editar').modal('hide')
          }
        })
        .catch((error) => {
          console.log(error)
          toastr.warning(error.message, 'Actualizar Usuario')
        })
    },

    reiniciar: function (usuario) {
      this.usuario = usuario
      $('#modal-reiniciar').modal('show')
    },

    resetPassword: async function () {
      const { cUsuFolio: id } = this.usuario
      await axios
        .put(`/usuarios/reiniciar/${id}`)
        .then((response) => {
          const { success, message } = response.data
          if (success) toastr.success(message, 'Exito')
          $('#modal-reiniciar').modal('hide')
        })
        .catch((error) => {
          console.log(error)
          toastr.warning(error.message, 'Reiniciar Contraseña')
        })
    },
  },
  computed: {
    isActived: function () {
      return this.pagination.current_page
    },
    pagesNumber: function () {
      if (!this.pagination.to) {
        return []
      }

      let from = this.pagination.current_page - this.offset
      if (from < 1) {
        from = 1
      }

      let to = from + this.offset * 2
      if (to >= this.pagination.last_page) {
        to = this.pagination.last_page
      }

      let pagesArray = []
      while (from <= to) {
        pagesArray.push(from)
        from++
      }
      return pagesArray
    },
  },
})
