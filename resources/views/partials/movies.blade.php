<div class="card-columns">
    @foreach ($movies as $movie)
        <div class="card text-center">
            <div class="card-body">
                <img src="{{ $movie->cover_path }}" class="img-fluid mb-3">
                @auth
                    <div class="mb-3">
                        <button type="button" class="btn btn-sm btn-danger m-1">Add/Remove</button>
                        <button type="button" class="btn btn-sm btn-success m-1">Watch/Unwatch</button>
                        <button type="button" class="btn btn-sm btn-warning m-1 active">Star/Unstar</button>
                    </div>
                @endauth
                <h5 class="card-title" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><a href="">{{ $movie->title }}</a></h5>
                <p class="card-text" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $movie->synopsis }}</p>
                <p class="card-text"><small class="text-muted">{{ $movie->release_date }}</small></p>
            </div>
        </div>
    @endforeach
</div>