<div>
    @if($show)
    <div class="uk-card uk-card-default uk-card-body">
        <div class="uk-card-header">
            <h3 class="uk-card-title">{{ $recentUrl ?? '' }}</h3>
        </div>
        <div class="uk-card-body">
            <a href="{{ $recentShortLink ?? '' }}" target="_blank" class="uk-text-primary">{{ $recentShortLink ?? '' }}</a>
        </div>
        @if($recentNsfw)
        <div class="uk-card-footer">
            <span class="uk-label uk-label-danger">Danger</span>
        </div>
        @endif
    </div>
    @endif
</div>
