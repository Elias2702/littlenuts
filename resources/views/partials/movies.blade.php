<div class="card-columns">
    @foreach ($movies as $movie)
        <div class="card text-center">
            <div class="card-body">
                <a href="{{ route('movies.one', $movie->id) }}">
                    <img src="{{ $movie->cover_path }}" class="img-fluid mb-3">
                </a>
                @auth
                    <div class="mb-3">
                        <button type="button" class="btn btn-sm btn-danger m-1">
                            {{ Auth::user()->hasInWatchList($movie->id) ? 'Remove' : 'Add' }}
                        </button>
                        <button type="button" class="btn btn-sm btn-success m-1">
                            {{ Auth::user()->hasInWatchedList($movie->id) ? 'Unwatch' : 'Watch' }}
                        </button>
                        <button type="button" class="btn btn-sm btn-warning m-1 active">
                            {{ Auth::user()->hasInStarredList($movie->id) ? 'Unstar' : 'Star' }}
                        </button>
                    </div>
                @endauth
                <h5 class="card-title" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                    <a href="{{ route('movies.one', $movie->id) }}">{{ $movie->title }}</a>
                </h5>
                <p class="card-text" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $movie->synopsis }}</p>
                <p class="card-text">
                    <small class="text-muted">{{ $movie->release_date }}</small>
                </p>
            </div>
        </div>
    @endforeach
</div>