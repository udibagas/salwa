<div class="player">
	<div class="pull-right">
		<span class="btn-group" style="margin-top:2px;">
			<a href="#" class="btn btn-info btn-sm prev">
				<i class="glyphicon glyphicon-step-backward"></i>
			</a>
			<a href="#" class="btn btn-info btn-sm pause">
				<i class="glyphicon glyphicon-pause"></i>
			</a>
			<a href="#" class="btn btn-info btn-sm play">
				<i class="glyphicon glyphicon-play"></i>
			</a>
			<a href="#" class="btn btn-info btn-sm next">
				<i class="glyphicon glyphicon-step-forward"></i>
			</a>
		</span>
	</div>
	{!! Form::select('qari', \App\Ayah::getQariList(), request('qari'), ['class' => 'form-control', 'style' => 'max-width:205px;']) !!}
</div>
