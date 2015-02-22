<div class="ibox float-e-margins">
    <div class="ibox-title no-height"><h2>Comments ({{ $comments->count() }})</h2></div>
    <div class="ibox-content no-padding">

      <ul class="list-group"><div class="comments-list">
        @foreach($comments as $comment)
          <li class="list-group-item clearfix">
            <a href="{{ URL::to('freelancer',$comment->user->id) }}" class="pull-left margin-right-10">
                <img alt="image" class="img-circle" src="{{ $comment->user->avatar->url('thumbnail') }}">
            </a>
            <div class='pull-left'>
              <p><a class="text-info" href="{{ URL::to('freelancer',$comment->user->id) }}">{{ "@".$comment->user->username }} {{ $comment->user_badge() }}</a>&nbsp;&nbsp;{{ $comment->message }} </p>
              <small class="block text-muted"><i class="fa fa-clock-o"></i> {{ $comment->created_at->diffForHumans() }}</small>
            </div>
          </li>
        @endforeach
      </ul>
      </div>
</div>
