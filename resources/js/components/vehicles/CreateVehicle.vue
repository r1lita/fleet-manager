<template>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Ajouter un nouveau véhicule</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#/">Accueil</a></li>
                    <li class="breadcrumb-item active"><router-link to="/vehicles">Tous les véhicules</router-link></li>
                    <li class="breadcrumb-item active">Ajouter</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        
        <div class="content">
            <div class="container-fluid">
            <div class="card-body ">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="alert alert-success">Message</div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">&nbsp;</div>
                                    <div class="col-md-6">
                                        <form @submit="onSubmit">
                                            <div class="form-group">
                                                <label for="car-maker">Constructeur</label>
                                                <input v-model="fields.vehicle_maker" name="vehicle_maker" type="text" class="form-control" id="car-maker" placeholder="Constructeur">
                                            </div>
                                            <div class="form-group">
                                                <label for="car-model">Modèle</label>
                                                <input v-model="fields.vehicle_model" name="vehicle_model" type="text" class="form-control" id="car-model" placeholder="Modèle">
                                            </div>
                                            <div class="form-group">
                                                <label for="car-color">Couleur</label>
                                                <input type="text" v-model="fields.color" name="color" class="form-control" id="car-color" placeholder="Couleur">
                                            </div>
                                            <div class="form-group">
                                                <label for="car-vin">VIN</label>
                                                <input type="text" v-model="fields.vin" name="vin" class="form-control" id="car-vin" placeholder="VIN">
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" :value="1" v-model="fields.in_service" name="vin" class="form-check-input" id="car-in_service">
                                                <label for="car-in_service">En service</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Ajouter</button>
                                            <router-link 
                                                to="/vehicles"
                                                class="btn btn-primary"
                                                >
                                                <i class="fas fa-add"></i>
                                                Annuler
                                            </router-link>
                                        </form>
                                    </div>
                                    <div class="col-md-3">&nbsp;</div>
                                </div>
                                   
                            </div> <!-- .card-body -->    
                        </div> <!-- .card -->        
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div> <!-- content-wrapper --> 
</template>

<script>
    import { mapActions } from 'vuex'
    
    export default {
        name: 'CreateVehicle',
        data () {
            return {
                fields: {}
            }
        },
        methods: {
            ...mapActions(['addVehicle']),
            onSubmit(e) {
                e.preventDefault();
                this.addVehicle(this.fields);
                this.$router.push('/vehicles/');
            }
        },    
    }
</script>