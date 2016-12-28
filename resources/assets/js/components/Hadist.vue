<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i :class="'fa fa-'+icon"></i> {{ header }}</h3>
        </div>
        <ul class="list-group">
            <li v-for="h in hadist" class="list-group-item">
                <strong>
                    <a :href="h.url">{{ h.judul }}</a>
                </strong>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {

        props: ['group', 'limit', 'header', 'icon'],

        data() {
            return {
                hadist: [],
            }
        },

        methods: {
           fetchHadist: function() {
               this.$http.get('/api/hadist?limit='+this.limit+'&group='+this.group+'&order=RAND()').then(function(h) {
                   this.$set(this, 'hadist', h.body.data)
               })
           }
        },

        mounted() {
            this.fetchHadist()
        }

    }
</script>
