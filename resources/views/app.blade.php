@extends('adminlte::page')

@section('title', 'POCM Projects Rewards')

@section('content_header')
    <h4>Projects List</h4>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="dataTable" class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Total Staking</th>
                            <th>Daily reward/100 NULS</th>
                            <th>Participants</th>
                            <th>Minimum NULS required</th>
                            <th>Opções</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ url(mix('js/app.js')) }}"></script>
@stop
