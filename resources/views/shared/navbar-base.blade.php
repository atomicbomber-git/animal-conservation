<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="{{ route('main') }}">
            <img style="width: 50px; height: 50px" src="{{ asset("img/logo.png") }}" alt="Logo">
            Cempaka
        </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		@yield("content-collapsible")
    	</div>
    </div>
</nav>

<div style="height: 150px">
    
</div>