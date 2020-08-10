@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quiz</div>

                <div class="card-body">
                    <table class="table table-bordered" id="quiz-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Country</th>
                                <th>Document</th>
                                <th>Site</th>
                                <th>Quiz completion</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>

$(function() {
    var table = $('#quiz-table').DataTable({
        processing: true,
        serverSide: true,
        dom: 'Bfrtip',
        buttons: ['pageLength', 'csv', 'excel', 'pdf', 'print'],
        ajax: '{{route('quiz.index')}}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'country', name: 'country' },
            { data: 'document', name: 'document' },
            { data: 'site', name: 'site' },
            { data: 'quiz_completion', name: 'quiz_completion' },
        ],
        "columnDefs":[
          {
            targets:[1],
            orderable: false,
          }
        ],
    });
});
</script>
@endsection
