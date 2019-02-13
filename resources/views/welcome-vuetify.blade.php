<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
     <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
    <title>Laravel & Vuetify</title>
    <style>
        .v-toolbar__title {
            font-size: 20px;
            font-weight: 350;
            letter-spacing: .02em;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>
<body>
    <div id="app">
    <v-app>
        <v-toolbar dark color="blue darken-3">
            <!-- <v-toolbar-side-icon></v-toolbar-side-icon> -->
            <v-toolbar-title>Administracion y Gestion de Escuelas</v-toolbar-title>
            <v-spacer></v-spacer>
            <!-- Si deseamos que la barra tenga iconos del lado izquierdo -->
            <v-toolbar-items class="hidden-sm-and-down">
              <!-- <v-btn flat>Link One</v-btn>-->
            </v-toolbar-items>
          </v-toolbar>
      <v-content>
        <v-container>
          <v-layout>
            <v-flex xs8 sm8 offset-sm2>
              <v-toolbar dark color="light-blue accent-4">
                <v-toolbar-title>Lista de usuarios</v-toolbar-title>
                <v-divider
                  class="mx-2"
                  inset
                  vertical
                ></v-divider>
              <v-spacer></v-spacer>
              <v-btn color="indigo" dark class="mb-2">Nuevo Usuario</v-btn>
              </v-toolbar>
              <!-- v-card -->
              <v-card>
                <v-card-text>
                  <v-data-table
                    :headers="headers"
                    :items="usuarios"
                    class="elevation-1"
                  >
                    <template slot="items" slot-scope="props">
                      <td class="text-xs-left">@{{ props.item.name }}</td>
                      <td class="justify-center layout px-0">
                          <v-icon small class="mr-2">
                            edit
                          </v-icon>
                          <v-icon small>
                            delete
                          </v-icon>
                        </td>
                    </template>
                  </v-data-table>
                </v-card-text>
              </v-card>
              <!-- /v-card -->
            </v-flex>
          </v-layout>
        </v-container>
      </v-content>
    </v-app>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
    var urlUsers = 'https://jsonplaceholder.typicode.com/users';
    new Vue({
      el: '#app',
      data: () => ({
        usuarios: [],
        headers: [
          { text:'Nombre', align:'left', sortable: false, value:'name' },
          { text:'Acciones', align:'center', sortable: false }
        ],
      }),
      created () {
        this.initialize()
      },
      methods: {
        initialize: function(){
          axios.get(urlUsers).then(response => {
                        this.usuarios = response.data
                    });
        }
      }
    });
  </script>
</body>
</html>
