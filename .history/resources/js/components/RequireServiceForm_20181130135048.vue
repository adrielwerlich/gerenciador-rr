<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                form: new Form({
                    id: '',
                    service_type: '',
                    service_address: '',
                    pictures: '',
                    description_details: '',
                    user: ''
                }),
            }
        },


        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
