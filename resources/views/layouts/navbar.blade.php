<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
    <nav class="uk-light uk-background-primary uk-navbar-transparent uk-navbar-container" uk-navbar>
        <div class="uk-navbar-left">
            <img src="https://www.ltvco.com/assets/images/ltv-logo.png" width="35" class="uk-margin-small-left"/>
            <ul class="uk-navbar-nav">
                <li class="{{ Request::path() === '/' ? 'uk-active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                <li class="{{ Request::path() === '/tops' ? 'uk-active' : '' }}"><a href="{{ route('topUrls') }}">Top Visited Urls</a></li>
            </ul>
        </div>
    </nav>    
</div>