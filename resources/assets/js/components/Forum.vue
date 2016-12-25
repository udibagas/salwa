<template>
    <div class="">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" v-for="(g, index) in group" :class="{active:index==0}">
                <a :href="'#'+index+1" :aria-controls="index+1" role="tab" data-toggle="tab">
                    {{ g.group_name }}
                </a>
            </li>
        </ul>

        <br />

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" v-for="(g, index) in group" :id="index+1" :class="[index==0 ? 'active' : '', 'tab-pane']">
                <div class="panel panel-default">
                    <ul class="list-group">
                        <li class="list-group-item" v-for="f in g.forums">
                            <a :href="f.url"><strong>{{ f.title }}</strong></a>
                            <div class="text-muted">
                                {{ f.user ? f.user.name + ' - ' : '' }}
                                {{ f.updated }}
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                group: []
            }
        },

        methods: {
           fetchKategori: function() {
               this.$http.get('/api/forum/group').then(function(d) {
                   this.$set(this, 'group', d.body)
               })
           }
        },

        mounted() {
            this.fetchKategori()
        }

    }
</script>
