<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Games List</div>

                    <div class="card-body">
                        <ul>
                            <li v-for="game, i in gamesList" :key="`game-${i}`">
                                {{ game.title }} - {{ game.subtitle}} - {{ game.rating }}
                            </li>
                        </ul>
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
                gamesList: [],
            }
        },

        methods: {

            getGamesList() {
            
                axios
                .get('/api/games/list')
                .then(r => this.gamesList = r.data)
                .catch(e => console.error(e));
            },
        },

        mounted() {

            console.log('GamesList component mounted.');

            this.getGamesList();
        }
    }
</script>
