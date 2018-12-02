<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-default">
        <div class="card-header p-2">
            Solicitação de Serviço
        </div>
          <div class="tab-pane active show" id="settings">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="inputName" class="col-md-12 mt-4 control-label">Lista dos Tipos de Serviços Cadastrados</label>

                <div class="col-sm-10">

                    <select id="service-types-options" class="form-control" name="service-types-list" style="width:100%">
                        <option 
                            v-for="service in services_list" 
                            :key="service.id" 
                            value="service['tipo-do-servico']"
                        >
                            
                            {{ service['tipo-do-servico']}}

                        </option>
                      
                    </select>

                  <!-- <input
                    type="text"
                    v-model="form.service_type"
                    class="form-control"
                    id="inputServiceType"
                    placeholder="Tipo de serviço"
                    :class="{ 'is-invalid':form.errors.has('service_type') }"
                  > -->
                  <has-error :form="form" field="name"></has-error>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                  <input
                    type="email"
                    v-model="form.email"
                    class="form-control"
                    id="inputEmail"
                    placeholder="Email"
                    :class="{ 'is-invalid':form.errors.has('email') }"
                  >
                  <has-error :form="form" field="email"></has-error>
                </div>
              </div>
              <!-- <div class="form-group">
                      <label for="inputName2" class="col-sm-2 control-label">Name</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                      </div>
              </div>-->
              <div class="form-group">
                <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                <div class="col-sm-10">
                  <textarea
                    class="form-control"
                    id="inputExperience"
                    placeholder="Experience"
                    v-model="form.bio"
                  ></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="avatar" class="col-md-12 control-label">Choose a profile picture:</label>
                <div class="col-sm-10">
                  <input
                    type="file"
                    @change=""
                    id="avatar"
                    name="avatar"
                    accept="image/png, image/jpeg"
                  >
                </div>
              </div>

              <div class="form-group">
                <label for="dropzone" class="col-md-12 control-label">Choose a profile picture:</label>

                <form action="/action" class="dropz" id="dropzone"></form>
              </div>

              <div class="form-group">
                <label
                  for="inputSkills"
                  class="col-md-12 control-label"
                >Password (leave blank if not changing)</label>

                <div class="col-sm-10">
                  <input
                    type="text"
                    class="form-control"
                    id="inputSkills"
                    placeholder="Password"
                    :class="{ 'is-invalid': form.errors.has('password') }"
                  >
                  <has-error :form="form" field="password"></has-error>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> I agree to the
                      <a href="#">terms and conditions</a>
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button
                    type="submit"
                    @click.prevent="updateProfile"
                    class="btn btn-danger fas fa-circle-plus"
                  >Update</button>
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
export default {
  data() {
    return {
      services_list: [], 
      users_list: [], 
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
      this.fetchUsersList();
  },
  methods: {
      fetchServicesList(){
        axios.get('api/tipos-de-servico').then(server_response => {
            this.services_list = server_response.data.data
            // console.log('this.services_list',this.services_list)
            // console.log('server_response',server_response)
        })
        axios.get('api/users-list').then(server_response => {
          this.users_list = server_response.data.data
          console.log('this.users_list',this.users_list)
          console.log('server_response',server_response)
        })
      }
  }
};
</script>
