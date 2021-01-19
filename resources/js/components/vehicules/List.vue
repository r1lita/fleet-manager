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
                                <h3 class="card-title">DataTable with default features</h3>
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
                                        <tr v-for="vehicule in vehicules" :key="vehicule.id">
                                            <td>{{ vehicule.vehicule_maker }}</td>
                                            <td>{{ vehicule.vehicule_model }}</td>
                                            <td>{{ vehicule.color }}</td>
                                            <td>
                                                <span v-if="vehicule.in_service == 1">Oui</span>
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
    import { mapState } from 'vuex'

    export default {
        name: 'VehiculesList',
        data () {
            return {}
        },
        computed: {
            ...mapState(['vehicules']),
        },
    }
</script>