Vue.component('vue-multiselect', window.VueMultiselect.default)

var pruebas = new Vue({
  el: '#pruebas',
  components: { Multiselect: 'vue-multiselect' },
  data() {
    return {
        nombre: '',
        archivo: '',
      busqueda: {
        Descripcion: '',
        id: '',
        Resultados: '',
      },
      opcion:{
        id: '',
        Pregunta: '',
        Correcta: false,
      },
      pregunta: {
        Descripcion: '',
        Tipo: 1,
        opcion: {},
        opciones: [],
      },
      usuarios: [],
      prueba: {
        Descripcion: 'Preparando prueba',
        Resultados: false,
        preguntas: [{
            opciones: [],
            opcion: {
                id: '',
                Pregunta: '',
                Correcta: false,
            },
            Descripcion: '',
            Tipo: 1,
        }]
      },
      cargando: false,
      pruebas: null,
      pagination: {
        total: 0,
        current_page: 0,
        per_page: 0,
        last_page: 0,
        from: 0,
        to: 0,
      },
      offset: 3,
      cargaExcel: false,
    }
  },
  mounted() {
    this.getPruebas ();
    this.getUsuarios ();
  },
  methods: {
    importar : function (pregunta) {
        this.cargaImportacion = 1
        let formData = new FormData()
        formData.append('file', this.nombre)
        axios
          .post(`/preguntas/cargar/${pregunta.id}`, formData, {
            headers: { 'content-type': 'multipart/form-data' },
          })
          .then((response) => {
            console.log(response)
            if (response.status === 200) {
              this.cargaImportacion = 0
              toastr.success('Importacion hecha con éxito')
            }
          })
          .catch((error) => {
            console.log(error)
            this.cargaImportacion = 0
            toastr.warning('Error:', error.message)
          })
      },
    async getPruebas (page = 1) {
      this.cargando = true
      let url = `/pruebas/paginado?page=${page}`
      await axios
        .get(url, { params: this.busqueda })
        .then((response) => {
          this.pruebas = response.data.Prueba
          this.pagination = response.data.pagination
        })
        .catch((error) => {
          console.log(error)
          toastr.warning(error.message, 'pruebas')
        })
        .finally(() => {
          this.cargando = false
        })
    },

    changePage: function (page) {
      this.pagination.current_page = page
      this.getPruebas (page)
    },


    limpiar: function () {
      this.prueba = {
        Descripcion: '',
        Resultados: false,
        preguntas: [{
            opciones: [],
            id: '',
            opcion: {
                id: '',
                Pregunta: '',
                Correcta: false,
            },
            Descripcion: 'Prueba',
            Tipo: 1,
        }]
      }
    },
    ver: function($prueba){
        const { id } = $prueba;
        window.location.href = `/pruebas/ver/${id}`;
    },
    limpiarPregunta: function () {
        this.pregunta = {
            id: '',
            Descripcion: 'Preparando pregunta',
            Tipo: 1,
            opciones: [],
            opcion: {
                id: '',
                Pregunta: '',
                Correcta: false,
            },
        }
    },

    agregar: function () {
      this.limpiar()
      $('#modalAgregar').modal('show')
    },
    eliminarOpcion: function (index,index2){
        if(this.prueba.preguntas[index].opciones[index2].id != ''){
            this.eliminarOpcionExistente(this.prueba.preguntas[index].opciones[index2].id,index,index2);
        }else{
            this.prueba.preguntas[index].opciones.splice(index2,1)
        }
    },

    agregarPregunta: function () {
        this.prueba.preguntas.push(this.pregunta);
        this.limpiarPregunta()
    },
    eliminarPregunta: function (index) {
        if(this.prueba.preguntas[index].id != ''){
            this.eliminarPreguntaExistente(this.prueba.preguntas[index].id)
        }else{
            this.prueba.preguntas.splice(index,1)
        }
    },
    async eliminarOpcionExistente(id,index,index2){
        let url = `/opciones/${id}`
        await axios
            .delete(url)
            .then((response) => {
                this.prueba.preguntas[index].opciones.splice(index2,1)
            })
            .catch((error) => {
                console.log(error)
                toastr.warning(error.message, 'opciones')
            })
            .finally(() => {
                this.cargando = false
            })
    },
    async eliminarPreguntaExistente(id){
        var this_aux = this;
        let url = `/preguntas/${id}`
        await axios
            .delete(url)
            .then((response) => {
                this.getprueba(this.prueba.id);
                toastr.success(response.data.message, 'pruebas')
            })
            .catch((error) => {
                console.log(error)
                toastr.warning(error.message, 'pruebas')
            })
            .finally(() => {
                this.cargando = false
            })
    },
    agregarOpcion: function (index) {
        console.log(index);
        this.prueba.preguntas[index].opciones.push(this.prueba.preguntas[index].opcion);
        this.limpiarOpcion(index)
    },
    limpiarOpcion: function (index) {
        this.prueba.preguntas[index].opcion = {
            id: '',
            Pregunta: '',
            Correcta: false,
        }
    },
    async addprueba() {
      await axios
        .post('/pruebas', this.prueba)
        .then((response) => {
          if (response.data.success) {
            toastr.success(response.data.message, 'Exito')
            this.getPruebas ()
            $('#modalAgregar').modal('hide')
          }
        })
        .catch((error) => {
          console.log(error)
          toastr.warning(error.message, 'Crear prueba')
        })
    },

    async getprueba(id) {
      await axios
        .get(`/pruebas/${id}`)
        .then((response) => {
          this.prueba = response.data
        })
        .catch((error) => {
          console.log(error)
          toastr.warning(error.message, 'prueba')
        })
    },

    editar: function (prueba) {
      let { id } = prueba
      this.getprueba(id).then(() => {
        $('#modalEditar').modal('show')
      })
    },

    async updatePrueba() {
      let id = this.prueba.id
      await axios
        .put(`/pruebas/${id}`, this.prueba)
        .then((response) => {
          if (response.data.success) {
            toastr.success(response.data.message, 'Exito')
            this.getPruebas ()
            $('#modalEditar').modal('hide')
          }
        })
        .catch((error) => {
          console.log(error)
          toastr.warning(error.message, 'Actualizar prueba')
        })
    },
    showDelete: function (prueba) {
        this.prueba = prueba

        $('#modalEliminar').modal('show')
    },
    downloadExcel: function () {
        window.open('/template/excel')
    },
    cambiarArchivo: function (e) {
        console.log(e);
        this.nombre = e.target.files[0]
        this.archivo = this.nombre.name
      },
    async deletePrueba() {
        let id = this.prueba.id
        await axios
          .delete(`/pruebas/${id}`)
          .then((response) => {
            if (response.data.success) {
              toastr.success(response.data.message, 'Exito')
              this.getPruebas ()
              $('#modalEliminar').modal('hide')
            }
          })
          .catch((error) => {
            console.log(error)
            toastr.warning(error.message, 'Actualizar prueba')
          })
      },

    async getUsuarios() {
      await axios
        .get('/pruebas/usuario')
        .then((response) => {
          this.usuarios = response.data
        })
        .catch((error) => {
          console.log(error)
          toastr.warning(error.message, 'Usuarios')
        })
    },

    excel: async function () {
      this.cargaExcel = true
      let url = `/pruebas/excel`
      let data = { pruebas: this.pruebas.data }
      axios({ method: 'post', url, responseType: 'blob', data })
        .then((response) => {
          let blob = new Blob([response.data], {
            type: 'application/Excel',
          })
          let link = document.createElement('a')
          link.href = window.URL.createObjectURL(blob)
          link.download = 'pruebas.csv'
          link.click()
          this.cargaExcel = false
        })
        .catch((error) => {
          console.log(error)
          toastr.warning(error.message, 'Exportar Excel')
          this.cargaExcel = false
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
