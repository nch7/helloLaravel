@extends('layouts.freelancer.master')

@section('custom-header') 
	<div class="row dashboard-header white-bg border-bottom">
		<h2 class="pull-left">Projects</h2>
		<div class="clearfix pull-right" style="margin-top:7px">
			<a href="{{ URL::to('freelancer/projects/create') }}" class="btn btn-success pull-right">
				<i class="glyphicon glyphicon-plus"></i> Create Project
			</a>
		</div>
	</div>
@stop

@section('body')
	<div>
		@foreach($projects as $project)
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<div class='clearfix'>
						<div class="pull-left">
							<a href="{{ URL::to('freelancer/projects',$project->id) }}">{{ $project->title }}</a> By <a href="{{ URL::to('freelancer',$project->user->id) }}"> {{ $project->user->firstname }} {{ $project->user->lastname }}</a>
						</div>
						<div class="pull-right">
						@if($project->isExpired())
							<span class="label label-danger">Expired</span>
						@elseif($project->isNew())
							<span class="label label-success">New</span>
						@else
						<span class="label label-success">Expires: {{ $project->expires->diffForHumans() }}</span>
							<span class="label label-primary">Active</span> 
						@endif
						</div>
					</div>
				</div>
				<div class="ibox-content">
					{{ $project->body }}
				</div>
			</div>
		@endforeach
	</div>
	{{ $projects->links(); }}
@stop