@extends('freelancer.profile.layout')

@section('feedback')
	Feedbacks
	@if($user->offers->count()>0)
		@foreach($user->offers as $offer)
			<div class="ibox margin-bottom">
				<div class="ibox-title">
					<h4>
						{{ $offer->project->title }} by {{ $offer->project->user->username }}
					</h4>
				</div>
				<div class="ibox-content">
					<p>{{ $offer->project->title }}</p>
				</div>
			</div>
		@endforeach
	@else
		User has no feedbacks
	@endif

@stop

@if($user->projects->count()>0)
	@section('projects')
		<ol class='no-list-style'>
		@foreach($user->projects as $project)
			<li><a href="{{ URL::to('freelancer/projects',$project->id) }}">{{ $project->title }}</a></li>
		@endforeach
		</ol>
	@stop
@else
	User has no projects
@endif

@if($github)
	@section('sidebar')
		<div class="panel panel-default">
		  <div class="panel-heading">GitHub details</div>
		  <div class="panel-body">
		    <ul class='attributes'>
		    	@if($github['location'])
		    		<li><span class='attribute'>Location:</span> <span class='value'>{{ $github['location'] }}</span></li>
		    	@endif
		    	@if($github['company'])
		    		<li><span class='attribute'>Company:</span> <span class='value'>{{ $github['company'] }}</span></li>
		    	@endif
		    	<li><span class='attribute'>Username:</span> <span class='value'><a href="https://github.com/{{ $github['login'] }}">{{ $github['login'] }}</a></span></li>
		    	<li><span class='attribute'>Public Repositories:</span> <span class='value'>{{ $github['public_repos'] }}</span></li>
		    	<li><span class='attribute'>Followers:</span> <span class='value'>{{ $github['followers'] }}</span></li>
		    </ul>
		  </div>
		</div>
	@stop
@endif