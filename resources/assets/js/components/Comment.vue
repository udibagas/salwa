<template>
    <div class="">
        <div class="panel panel-default" v-for="c in comments">
            <div class="panel-body">
                <div class="media">
        			<div class="media-left media-middle">
        				<div style="height:40px;width:40px;">
        					<img class="media-object img-circle cover" :src="'/'+c.user.img_user">
        				</div>
        			</div>
        			<div class="media-body">
        				<strong>{{ c.user.name }}</strong><br>
        				<span class="text-muted">{{ c.created_at }}</span>
        			</div>
        		</div>
        		<br>

        		<h4>{{ c.title }}</h4>
        		<div v-html="c.content"></div>
            </div>
        </div>

        <!-- <div class="panel panel-default">
        	<div class="panel-heading">
        		<h3 class="panel-title">TULIS KOMENTAR</h3>
        	</div>
        	<div class="panel-body">
        		<form class="" action="" method="post">
                    <input type="hidden" name="commentable_id" :value="commentable_id">
                    <input type="hidden" name="commentable_type" :value="commentable_type">

        			<div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Judul Komentar">
        				<span class="help-block">
        					<strong>Harus diisi</strong>
        				</span>
        			</div>

        			<div class="form-group">
                        <textarea name="content" rows="4" class="form-control" placeholder="Komentar Anda"></textarea>
        				<span class="help-block">
        					<strong>Harus diisi</strong>
        				</span>
        			</div>

        			<div class="form-group">
        				<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-send"></i> KIRIM KOMENTAR</button>
        			</div>
        		</form>
        	</div>
        </div> -->

    </div>
</template>

<script>
    export default {

        props: ['id', 'type', 'approved'],

        data() {
            return {
                comments: [],
                commentable_id: 0,
                commentable_type: 'artikel'
            }
        },

        methods: {

            fetchComments: function() {
                this.$http.get('/api/comment?id='+this.id+'&type='+this.type+'&approved='+this.approved).then(function(h) {
                   this.$set(this, 'comments', h.body)
                })
            },

            postComment: function() {
                this.$http.post('/api/comment').then(function(j) {
                   this.fetchComments();
                });
            }

        },

        mounted() {
            this.fetchComments()
        }

    }
</script>
