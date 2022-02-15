<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Games List</div>

                    <div class="card-body">
                        <ul>
                            <li 
                            class="m-3"
                            v-for="game, i in gamesList" 
                            :key="`game-${i}`">
                                {{ game.title }} 
                                - {{ game.subtitle}} 
                                - {{ game.rating }}
                                <button 
                                class="btn btn-danger mx-2" 
                                @click="deleteGame(game.id)">
                                    Delete
                                </button>
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

            deleteGame(id) {
                axios
                .get(`/api/game/delete/${id}`)
                .then(r => console.log(r.data))
                .catch(e => console.error(e));
                this.getGamesList();
            }
        },

        mounted() {

            console.log('GamesList component mounted.');

            this.getGamesList();
        }
    }
</script>
