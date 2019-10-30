<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <router-link :to="'home'" class="navbar-brand" >SMS To Parent</router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li v-for="(route, key) in routes"  class="nav-item">
                            <router-link  :to="{ name : route.path }" :key="key" class="nav-link" style="text-transform:capitalize;">{{route.name}}</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header - set the background image for the header in the line below -->
        <header class="py-5 bg-image-full">

        </header>

        <div>
            <router-view></router-view>
        </div>
        <header class="py-5 bg-image-full">
            <br>
            <br>
        </header>
        <!-- Footer -->
        <footer class="py-5 bg-dark mt-5 fixed-bottom">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; SMS To Parent 2019</p>
            </div>
            <!-- /.container -->
        </footer>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                navBarBrand: 'navbar-brand',
                routes: [
                    {
                        name: 'Accueil',
                        path: 'home'
                    },

                    {
                        name: 'Connexion',
                        path: 'login'
                    },

                    {
                        name: 'A propos',
                        path: 'about'
                    }
                ]
            }
        },
        mounted() {

        }
    }
</script>