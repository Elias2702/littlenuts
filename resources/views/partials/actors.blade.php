<div class="card-columns">
    @foreach ($actors as $actor)
    <div class="card text-center">
            <div class="card-body">
                <a href="{{ route('actors.one', $actor->id) }}">
                    <img src="{{ $actor->picture_path }}" class="img-fluid mb-3">
                </a>
                <h5 class="card-title" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                    <a href="{{ route('actors.one', $actor->id) }}">{{ $actor->first_name }} {{ $actor->last_name }}</a>
                </h5>
            </div>
            </div>
    @endforeach
</div>