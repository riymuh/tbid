<ul class="list-group">
    <li class="list-group-item {{Request::is('home') ? 'active' : ''}}"><a href="{{route('home')}}" style="color:black"><i class="fa fa-chart-line" aria-hidden="true" style="color:black"></i> Dashboard</a></li>
    <li class="list-group-item {{Request::is('quiz') ? 'active' : ''}}"><a href="{{route('quiz.index')}}" style="color:black"><i class="fa fa-th-list" style="color:black"></i> Quiz</a></li>
</ul>
