<template>
    <div class="container-fluid dynamicTile">
        <div class="row ">
        	<div class="col-sm-2 col-xs-6">
        		<div id="tile2" class="tile">
                    <div class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                      		<div class="item" v-for="(a, index) in artikel">
                    			<a :href="a.url">
                    				<img :src="a.img_artikel" class="cover" :alt="a.judul" />
                    				<div class="thumbnail-block"></div>
                    				<div class="tilecaption">
                    					<h3><i class="fa fa-clock-o"></i> SALWA AKTUAL</h3>
                    					<h4>{{ a.judul }}</h4>
                    					{{ a.created }}<br>
                    					<em>{{ a.updated }}</em>
                    				</div>
                    			</a>
                      		</div>
                        </div>
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
                pertanyaan: [],
                informasi: [],
                artikel: [],
                peduli: [],
                video: [],
                forum: [],
                image: [],
            }
        },

        methods: {
            fetchPertanyaan: function() {
                this.$http.get('/api/pertanyaan?limit=5').then(function(d) {
                    this.$set(this, 'pertanyaan', d.body)
                })
            },
            fetchArtikel: function() {
                this.$http.get('/api/artikel?limit=5').then(function(d) {
                    this.$set(this, 'artikel', d.body)
                })
            },
            fetchPeduli: function() {
                this.$http.get('/api/peduli?limit=5').then(function(d) {
                    this.$set(this, 'peduli', d.body)
                })
            },
            fetchVideo: function() {
                this.$http.get('/api/video?limit=5').then(function(d) {
                    this.$set(this, 'video', d.body)
                })
            },
            fetchForum: function() {
                this.$http.get('/api/forum?limit=5').then(function(d) {
                    this.$set(this, 'forum', d.body)
                })
            },
            fetchImage: function() {
                this.$http.get('/api/image?limit=5').then(function(d) {
                    this.$set(this, 'image', d.body)
                })
            },
            fetchInformasi: function() {
                this.$http.get('/api/informasi?limit=5').then(function(d) {
                    this.$set(this, 'informasi', d.body)
                })
            },
        },

        mounted() {
            this.fetchPertanyaan()
            this.fetchInformasi()
            this.fetchArtikel()
            this.fetchPeduli()
            this.fetchVideo()
            this.fetchForum()
            this.fetchImage()

            // $( document ).ready(function() {
            //     $(".tile").height($("#tile1").width());
            //     $(".carousel").height($("#tile1").width());
            //      $(".item").height($("#tile1").width());
            //
            //     $(window).resize(function() {
            //     if(this.resizeTO) clearTimeout(this.resizeTO);
            // 	this.resizeTO = setTimeout(function() {
            // 		$(this).trigger('resizeEnd');
            // 	}, 10);
            //     });
            //
            //     $(window).bind('resizeEnd', function() {
            //     	$(".tile").height($("#tile1").width());
            //         $(".carousel").height($("#tile1").width());
            //         $(".item").height($("#tile1").width());
            //     });
            //
            // });

            console.log('slider ready');
        }
    }
</script>

<style scoped>
    /*.dynamicTile .col-sm-2.col-xs-4{
        padding:0.5px;
    }

    .dynamicTile .col-sm-2.col-xs-6{
        padding:0.5px;
    }

    .dynamicTile .col-sm-4.col-xs-8{
        padding:0.5px;
    }


    .dynamicTile .col-sm-4.col-xs-12{
        padding:0.5px;
    }

    .tile {
        background: rgb(50,93,233);
    }

    #tile4 {
        background-image: url('/images/tanya-ustadz.jpg');
        background-size: cover;
        background-repeat: no-repeat;
    }

    #tile7 {
        background-image: url('/images/salwa-peduli.jpg');
        background-size: cover;
        background-repeat: no-repeat;
    }

    #tile10 {
        background-image: url('/images/salwa-info.jpg');
        background-size: cover;
        background-repeat: no-repeat;
    }

    .tile:hover  {
      background: #333;
      opacity: 0.8;
    }

    .tilecaption {
        position: absolute;
        bottom: 10px;
        left: 10px;
        color:#FFFFFF;
    }

    .tilecaption h3, .tilecaption h4, .tilecaption h5 {
        font-size: 18px;
        margin: 0;
    }

    .tilecaption a, .tilecaption a:hover {
        color: yellow;
        text-decoration: none;
    }

    .carousel-inner > .item > a > img {
        filter: brightness(80%);
        -webkit-filter: brightness(80%);
    }*/
</style>
