@extends('layouts.sidebar')

@section('content')
@if($_SERVER['QUERY_STRING'] == '')

<style>.nav-tabs{border-bottom:1px solid #ddd}.nav-tabs > li.active > a,.nav-tabs > li.active > a:hover,.nav-tabs > li.active > a:focus{color:#555;cursor:default;background-color:#fff;border:1px solid #ddd;border-bottom-color:transparent}.nav>li>a{position:relative;display:block;padding:10px 15px!important}.nav-tabs > li > a{margin-right:2px;line-height:1.428571429;border:1px solid transparent;border-radius:4px 4px 0 0}.nav-tabs>li.active>a,.nav-tabs>li.active>a:hover,.nav-tabs>li.active>a:focus{color:#555;cursor:default;background-color:#fff;border:1px solid #ddd!important;border-bottom-color:transparent}.nav-tabs > li > a:hover{border-color:#eee #eee #ddd}.nav-tabs > li > a:focus{outline:none}.tab-content > .tab-pane{display:none}.tab-content > .active{display:block}ul{padding:0}ul.nav{list-style:none;margin:0;padding:0}ul.nav > li{float:left}ul.nav > li > a{display:block;padding:3px 10px;text-decoration:none}ul.nav > li.active > a,ul.nav > li > a:hover{background-color:#eee}.tab-content{border-top:none;padding:10px}.tab-content > .tab-pane{padding:5px}</style>

<div><h2>Tabs</h2></div>

<div id="exTab2" class="">	
<ul id="myTab" class="nav nav-tabs">
			<li class="active">
            <a  href="#1" data-toggle="tab">Config</a>
			</li>
			<li><a href="#2" data-toggle="tab">Advanced Config</a>
			</li>
			<li><a href="#3" data-toggle="tab">Take Backup</a>
			</li>
			<li><a href="#4" data-toggle="tab">All Backups</a>
			</li>
			<li><a href="#5" data-toggle="tab">Diagnosis</a>
			</li>
		</ul>
<div class="tab-content ">


<div class="tab-pane active" id="1">
<section class="shadow text-gray-400">
<h2 class="mb-4 card-header"><i class="bi bi-link-45deg"> Config</i></h2>
<div class="card-body p-0 p-md-3">

<style>
.option{
	background-color: #343a40;
	color: rgba(255, 255, 255, 0.8) !important;
	height: 100px;
	padding: 20px;
	border-radius: 5px;
}
.opt-img{
	font-size: 4rem;
	vertical-align: middle;
	display: flex;
	padding-right: 20px;
	padding-left: 10px;
	color: white;
}
.opt-txt{
	bottom: 10px;
	position: relative;
}
</style>

<div class="option"><a href="?alternative-config">
<div class="row"><i class="bi bi-pencil-square opt-img"></i><div>
<h3 class="">Alternative Config Editor</h3><p class="text-muted opt-txt">Use the Alternative Config Editor to edit the config directly</p>
</div></div></a></div><br>

<div class="option"><a href="{{ url('env-editor') }}">
<div class="row"><i class="bi bi-gear-fill opt-img"></i><div>
<h3 class="">Config Manager</h3><p class="text-muted opt-txt">Manage, download, upload, backup and restore your config</p>
</div></div></a></div><br>

<div class="option"><a href="{{ url('panel/phpinfo') }}">
<div class="row"><i class="bi bi-filetype-php opt-img"></i><div>
<h3 class="">PHP info</h3><p class="text-muted opt-txt">Display debuggin infromation about your PHP setup</p>
</div></div></a></div><br>

@include('components.config.config')

</div>
</section>
</div>


<div class="tab-pane" id="2">
<section class="shadow text-gray-400">
<h2 class="mb-4 card-header"><i class="bi bi-pencil-square"> Advanced config</i></h2>
<div class="card-body p-0 p-md-3">
@include('components.config.advanced-config')
</div>
</section>
</div>


<div class="tab-pane" id="3">
<section class="shadow text-gray-400">
<h2 class="mb-4 card-header"><i class="bi bi-link-45deg"> Backup</i></h2>
<div class="card-body p-0 p-md-3">
@include('components.config.backup')
</div>
</section>
</div>


<div class="tab-pane" id="4">
<section class="shadow text-gray-400">
<h2 class="mb-4 card-header"><i class="bi bi-link-45deg"> Backups</i></h2>
<div class="card-body p-0 p-md-3">
@include('components.config.backups')
</div>
</section>
</div>


<div class="tab-pane" id="5">
<section class="shadow text-gray-400">
<h2 class="mb-4 card-header"><i class="bi bi-braces-asterisk"> Debugging information</i></h2>
<div class="card-body p-0 p-md-3">
@include('components.config.diagnose')
</div>
</section>
</div>


</div>
</div>
@elseif($_SERVER['QUERY_STRING'] == 'alternative-config')
@include('components.config.alternative-config')
@endif


@push("sidebar-scripts")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
$('#myTab a').click(function(e) {
  e.preventDefault();
  $(this).tab('show');
});

// store the currently selected tab in the hash value
$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
  var id = $(e.target).attr("href").substr(1);
  window.location.hash = id;
});

// on load of the page: switch to the currently selected tab
var hash = window.location.hash;
$('#myTab a[href="' + hash + '"]').tab('show');
</script>
@endpush

@endsection
