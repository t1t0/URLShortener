@extends('layouts.app')

@section('content')
<div>
    <div class="uk-container uk-margin-top uk-margin-bottom">
        <h1>Top Visited URLs</h1>
        <table class="uk-table uk-table-hover uk-table-divider">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Shortlink</th>
                    <th>URL</th>
                    <th>Visits</th>
                    <th>NSFW</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ( $topUrls as  $topUrl )
                <tr>
                    <td>{{ $i++ }}</td>
                    <td><a href="{{ $topUrl->shortenLink() }}" class="shortLink" data-nsfw="{{ $topUrl->nsfw }}">{{ $topUrl->shortenLink() }}</a></td>
                    <td>{{ $topUrl->url }}</td>
                    <td>{{ $topUrl->visits }}</td>
                    <td>{{ $topUrl->nsfw ? "true" : "false" }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $(".shortLink").on("click", function(e){
            e.preventDefault()
            var link = $(this).attr("href")
            var nsfw = $(this).data("nsfw")
            if(nsfw){
                setTimeout(() => {  location.href=link }, 10000);
                UIkit.modal.confirm('The Link is marked as NSFW. Do you want to continue?').then(function() {
                    console.log('Confirmed.')
                    location.href=link
                }, function () {
                    console.log('Rejected.')
                });
            }else{
                location.href=link
            }
        })
    });
</script>
@endsection