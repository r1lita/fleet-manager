<template>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Liste des véhicules</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item active">Tous les véhicules</li>
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
                                <router-link 
                                    to="/vehicles/add"
                                    class="btn btn-flat btn-primary"
                                    >
                                    <i class="fas fa-add"></i>
                                    Ajouter un véhicule
                                </router-link>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" role="grid" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Constructeur</th>
                                        <th>Modèle</th>
                                        <th>Couleur</th>
                                        <th>En service</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="vehicle in allVehicles" :key="vehicle.id">
                                            <td>{{ vehicle.vehicle_maker }}</td>
                                            <td>
                                                <router-link :to="{ name: 'editVehicle', params: { id: vehicle.id }}">{{ vehicle.vehicle_model }}</router-link>
                                            </td>
                                            <td>{{ vehicle.color }}</td>
                                            <td>
                                                <span v-if="vehicle.in_service == 1">Oui</span>
                                                <span v-else>Non</span>
                                            </td>
                                        </tr>                                        
                                    </tbody>
                                </table>        
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
    import { mapGetters, mapActions } from 'vuex'

    export default {
        name: 'VehiclesList',
        // data() {
        //     return {
        //         vehicles: []
        //     }
        // },
        methods: {
            ...mapActions(['fetchVehicles']),
            // editVehicle(id) {
            //     this.$router.push('/vehicles/edit/' + id);
            // }
        },
        computed: mapGetters(["allVehicles"]),
        created() {
            this.fetchVehicles();
        }
    }
</script>