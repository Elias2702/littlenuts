<div class="card-columns">
    @foreach ($movies as $movie)
        <div class="card text-center">
            <div class="card-body">
                <a href="{{ route('movies.one', $movie->id) }}">
                    <img src="{{ $movie->cover_path }}" class="img-fluid mb-3">
                </a>
                @auth
                    <div class="mb-3">
                        {{-- Watch list form --}}
                        @if (Auth::user()->hasInWatchList($movie->id))
                            <form action="{{ route('remove-from-watch-list') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $movie->id }}">
                                <button type="submit" class="btn btn-sm btn-danger m-1" onclick="this.form.submit()">
                                    Remove
                                </button>
                            </form>
                        @else
                            <form action="{{ route('add-to-watch-list') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $movie->id }}">
                                <button type="submit" class="btn btn-sm btn-danger m-1" onclick="this.form.submit()">
                                    Add
                                </button>
                            </form>
                        @endif
                        
                        {{-- Watched list form --}}
                        @if (Auth::user()->hasInWatchedList($movie->id))
                            <form action="{{ route('remove-from-watched-list') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $movie->id }}">
                                <button type="submit" class="btn btn-sm btn-success m-1" onclick="this.form.submit()">
                                    Unwatch
                                </button>
                            </form>
                        @else
                            <form action="{{ route('add-to-watched-list') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $movie->id }}">
                                <button type="submit" class="btn btn-sm btn-success m-1" onclick="this.form.submit()">
                                    Watch
                                </button>
                            </form>
                        @endif
                        
                        {{-- Starred list form --}}
                        @if (Auth::user()->hasInStarredList($movie->id))
                            <form action="{{ route('remove-from-starred-list') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $movie->id }}">
                                <button type="submit" class="btn btn-sm btn-warning m-1" onclick="this.form.submit()">
                                    Unstar
                                </button>
                            </form>
                        @else
                            <form action="{{ route('add-to-starred-list') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $movie->id }}">
                                <button type="submit" class="btn btn-sm btn-warning m-1" onclick="this.form.submit()">
                                    Star
                                </button>
                            </form>
                        @endif
                        
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