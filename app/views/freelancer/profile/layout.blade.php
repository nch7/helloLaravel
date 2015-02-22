@extends('layouts.freelancer.master')

@section('custom-header') 
	<div class="row dashboard-header white-bg border-bottom">
		<h2 class="pull-left">Profile</h2>
		<div class="clearfix pull-right" style="margin-top:7px">
			@section('buttons')

		    @show
		</div>
	</div>
@stop

@section('body')


<div class='clearfix row'>
	<div class='col-xs-18'>
		<div class="ibox border-bottom">
			<div class='profile-container'>
				<div class="ibox-title">
					<div class='clearfix'>
						<h3 class='pull-left'>{{ $user->firstname }} {{ $user->lastname }}</h3>
						<div class='profile-email pull-left'>@section('name') @show </div>
					</div>
				</div>
				<div class="ibox-content">
					<p>{{ nl2br($user->bio) }}</p>
				</div>
			</div>
			
		</div>
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

		<div class = 'ibox border-bottom margin-top-big'>
			<div class='ibox-title'>
				<h4>Projects from this client</h4>
			</div>
			<div class = 'ibox-content'>
					@section('projects')
			    		No projects.
			        @show
			</div>
		</div>
	</div>

	<div class='col-xs-6'>
		
		<div class="ibox border-bottom">
		  <div class="ibox-title">Freelancer details</div>
		  <div class="ibox-content">
		    <ul class='attributes'>
		    	<li><b class='attribute'>Gender:</b> <span class='value'>{{ $user->getGenderText() }}</span></li>
		    	<li><b class='attribute'>Registered:</b> <span class='value'>{{ $user->created_at->diffForHumans() }}</span></li>
		    	<li><b class='attribute'>Number of offers sent:</b> <span class='value'>{{ $user->offers->count() }}</span></li>
		    	<li><b class='attribute'>Number of projects:</b> <span class='value'>{{ $user->projects->count() }}</span></li>
		    	@section('attributes')

		        @show
		    </ul>
		  </div>
		</div>
		
		@section('sidebar')@show
</div>
@stop