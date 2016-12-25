<template>
    <div class="container-fluid dynamicTile">
        <div class="row ">
        	<div class="col-sm-2 col-xs-6">
        		<div id="tile2" class="tile">
                    <div class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                      		<div class="item" v-for="(a, index) in artikel" :class="{active:index==0}">
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
            <div class="col-sm-2 col-xs-6">
            	<div id="tile1" class="tile">

                 <div class="carousel slide" data-ride="carousel">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
          		  <div class="item" v-for="(i, index) in image" :class="{active:index==0}">
          			 <a :href="i.url">
        				 <div class="thumbnail-block">
        					 <img :src="'/'+i.img_images" class="cover" :alt="i.judul" />
        				 </div>
        			 </a>
          		  </div>
                  </div>
                </div>

            	</div>
        	</div>
        	<div class="col-sm-4 col-xs-12">
        		<div id="tile3" class="tile">

                <div class="carousel slide" data-ride="carousel">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
        		  	  <div class="item" v-for="(v, index) in video" :class="{active:index==0}">
        				 <a :href="v.url">
        		  		 <img :src="'/'+ v.img_video" class="cover" :alt="v.title" />
        				 <div class="video-block"></div>
        				 <div class="tilecaption">
        					 <h3><i class="fa fa-video-camera"></i> SALWA VIDEO</h3>
        					 <h3>{{ v.title }}</h3>
        					 {{ v.created }}<br>
        					 <em>{{ v.updated }}</em>
        				 </div>
        				 </a>
        		  	  </div>
                    </div>
                 </div>
        		</div>
        	</div>
        	<div class="col-sm-4 col-xs-12">
        		<div id="tile4" class="tile">

                <div class="carousel slide" data-ride="carousel">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
          			<div class="item" v-for="(p, index) in pertanyaan" :class="{active:index==0}">
        				<a :href="v.url">
        					<div class="thumbnail-block">
        					</div>
        					<div class="tilecaption">
        						<h3><i class="fa fa-question-circle"></i> TANYA USTADZ</h3>
        						<h3>{{ v.judul_pertanyaan }}</h3>
        						{{ v.jenis_kelamin }}<br>
        						<em>{{ v.updated }}</em>
        					</div>
        			   </a>
          			</div>
                  </div>
                </div>

        		</div>
        	</div>
        </div>

        <div class="row">
        	<div class="col-sm-4 col-xs-12">
        		<div id="tile7" class="tile">

                <div class="carousel slide" data-ride="carousel">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
          		<div class="item" v-for="(p, index) in peduli" :class="{active:index==0}">
        			<a :href="p.url">
        				<div class="thumbnail-block"></div>
        				<div class="tilecaption">
        					<h3><i class="fa fa-heart"></i> SALWA PEDULI</h3>
        					<h3>{{ a.judul }}</h3>
        					{{ a.updated }}
        				</div>
        	   		</a>
          		</div>
                  </div>
                </div>

        		</div>
        	</div>
        	<div class="col-sm-4 col-xs-12">
        		<div id="tile8" class="tile">

                 <div class="carousel slide" data-ride="carousel">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
          		  <div class="item" v-for="(f, index) in forum" :class="{active:index==0}">
        			  <a :href="f.url">
          				<img :src="'/'+f.group.img_group" class="cover" :alt="f.title" />
        			  <div class="thumbnail-block"></div>
        			  <div class="tilecaption">
        				  <h3><i class="fa fa-comment"></i> {{ f.updatedby }}</h3>
        				  <h3>{{ f.title }}</h3>
        				  {{ f.created }}<br>
        				  <em>{{ f.updated }}</em>
        			  </div>
        			  </a>
          		  </div>
                    </div>
                 </div>

        		</div>
        	</div>
        	<div class="col-sm-4 col-xs-12">
        		<div id="tile10" class="tile">
                   <div class="carousel slide" data-ride="carousel">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
        		  	  <div class="item" v-for="(i, index) in informasi" :class="{active:index==0}">
        				  <a :href="i.url">
        				  <div class="thumbnail-block"></div>
        				  <div class="tilecaption">
        					  <h3><i class="fa fa-info-circle"></i> SALWA INFO</h3>
        					  <h3>{{ a.judul }}</h3>
        					  {{ a.updated }}
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

            $( document ).ready(function() {
                $(".tile").height($("#tile1").width());
                $(".carousel").height($("#tile1").width());
                 $(".item").height($("#tile1").width());

                $(window).resize(function() {
                if(this.resizeTO) clearTimeout(this.resizeTO);
            	this.resizeTO = setTimeout(function() {
            		$(this).trigger('resizeEnd');
            	}, 10);
                });

                $(window).bind('resizeEnd', function() {
                	$(".tile").height($("#tile1").width());
                    $(".carousel").height($("#tile1").width());
                    $(".item").height($("#tile1").width());
                });

            });

            console.log('slider ready');
        }
    }
</script>

<style scoped>
    .dynamicTile .col-sm-2.col-xs-4{
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
    }
</style>
