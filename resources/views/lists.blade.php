{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('is_watched', 'Is_watched:') !!}
			{!! Form::text('is_watched') !!}
		</li>
		<li>
			{!! Form::label('is_favorited', 'Is_favorited:') !!}
			{!! Form::text('is_favorited') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}