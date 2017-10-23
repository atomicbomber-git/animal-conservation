<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="{{ route('admin.dashboard') }}"> Cempaka </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
                <li class="nav-item {{ isset($page_category) && ($page_category === "user") ? "active" : "" }}">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="fa fa-users"> </i>
                        Pengguna
                    </a>
                </li>
            </ul>
    	</div>
    </div>
</nav>

<div style="height: 70px">
    
</div>