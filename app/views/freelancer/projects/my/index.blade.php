@extends('layouts.freelancer.master')

@section('body')
	<div class='clearfix margin-bottom'>
		<a href="{{ URL::to('freelancer/projects/create') }}" class="btn btn-success pull-right">
			<i class="glyphicon glyphicon-plus"></i> Create Project
		</a>
	</div>
	<div>
		@foreach($projects as $project)
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<div class='clearfix'>
						<div class="pull-left">
							<a href="{{ URL::to('freelancer/projects',$project->id) }}">{{ $project->title }}</a>
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