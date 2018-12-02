<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-default">
          <div class="card-header p-2">Solicitação de Serviço</div>
          <div class="tab-pane active show" id="settings">
            <form class="form-horizontal">
              <div class="form-group">
                <label
                  for="inputName"
                  class="col-md-12 mt-4 control-label"
                >Lista dos Tipos de Serviços Cadastrados</label>

                <div class="col-sm-10">
                  <select
                    id="service-types-options"
                    class="form-control"
                    name="service-types-list"
                    style="width:100%"
                    v-model="form.service_type"
                  >
                    <option
                      v-for="service in services_list"
                      :key="service.id"
                      :value="service['tipo-do-servico']"
                      
                    >{{ service['tipo-do-servico']}}</option>
                  </select>

                  <!-- <input
                    type="text"
                    v-model="form.service_type"
                    class="form-control"
                    id="inputServiceType"
                    placeholder="Tipo de serviço"
                    :class="{ 'is-invalid':form.errors.has('service_type') }"
                  >-->
                  <has-error :form="form" field="name"></has-error>
                </div>
              </div>
              <div class="form-group">
                <label
                  for="inputServiceAddress"
                  class="col-sm-12 control-label"
                >Endereço Que o Serviço será Feito</label>

                <div class="col-sm-10">
                  <select
                    id="user-address-list"
                    class="form-control"
                    name="user-address-list"
                    v-model="form.service_address"
                    style="width:100%"
                  >
                    <option
                      v-for="address in current_user.enderecos"
                      :key="address.id"
                      :value="address.id"
                    > cep {{ address.cep + ', nº.' + address.numero }}</option>
                  </select>
                  <span>Selected: {{ form.service_address }}</span>
                </div>

                <!-- <div class="col-sm-10">
                  <input
                    type="email"
                    v-model="form.email"
                    class="form-control"
                    id="inputEmail"
                    placeholder="Email"
                    :class="{ 'is-invalid':form.errors.has('email') }"
                  >
                  <has-error :form="form" field="email"></has-error>
                </div>-->
              </div>

              <!-- ============ CUSTOM DROPZONE BELOW ============ -->
              <div class="form-group col-sm-10" style="border:">
                <label
                  for="custom-dropzone"
                  class="col-md-12 control-label"
                >Fotos do local onde será realizado o serviço para avaliação do funcionário:</label>

                <div id="custom-dropzone">
                  <div class="card-body">
                    <image-uploader id="custom-dropvue" ref="uploaderfiles"></image-uploader>
                  </div>
                </div>
              </div>
              <!-- ============ CUSTOM DROPZONE ABOVE ============ -->


              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button
                    type="submit"
                    @click.prevent="sendServiceRequest"
                    class="btn btn-danger fas fa-circle-plus"
                  >Enviar Solicitação</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ImageUploader from "./ImageUploader";

export default {
  data() {
    return {
      imageFiles: [],

      selected: "",
      services_list: [],
      users_list: [],
      current_user: {},
      form: new Form({
        id: "",
        service_type: "",
        service_address: "",
        pictures: "",
        description_details: "",
        user: ""
      })
    };
  },

  mounted() {
    console.log("RequireServiceForm mounted.");
  },
  created() {
    console.log("RequireServiceForm created.");

    this.fetchServicesList();
    this.fetchCurrentUser();
  },
  methods: {
    fetchServicesList() {
      axios.get("api/tipos-de-servico").then(server_response => {
        this.services_list = server_response.data.data;
        // console.log('this.services_list',this.services_list)
        // console.log('server_response',server_response)
      });
    },
    fetchCurrentUser() {
      // console.log("get current user");
      axios.get("api/current-user-profile").then(server_response => {
        this.current_user = server_response.data;
        console.log("this.current_user", this.current_user);
        console.log("server_response", server_response);
      });
    },
    sendServiceRequest() {

    },
  }
};
</script>
