@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="content-wrapper">
<section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <br/>
                           <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New</button>
                           <div class="table-responsive">
                           <br/>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode Reward</th>
                                            <th>Deskripsi</th>
                                            <th>point</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reward as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$data->code_rewards}}</td>
                                            <td>{{$data->description}}</td>
                                            <td>{{$data->score}}</td>
                                                <td><button type="button" class="btn btn-warning btn-sm">Edit</button><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                                        </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
</div>
<div class="modal fade" role="dialog" id="myModal">
<div class="modal-dialog">
    <div class="modal-content">
            <div class="modal-header">
                    <h3 class="mb-0"> Input Reward </h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form method="post" action="{{route ('reward.create')}}">
                    @csrf

                    <div class="form-group{{ $errors->has('code_rewards') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('code_rewards') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Code Reward') }}" type="text" name="code_rewards" required autofocus>
                            </div>
                            @if ($errors->has('code_rewards'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('code_rewards') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('score') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('score') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Score') }}" type="number" name="score" value="{{ old('score') }}"
                                    required autofocus>
                            </div>
                            @if ($errors->has('score'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('score') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('deskripsi') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class=""></i></span>
                                </div>
                                <textarea class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Description') }}" name="description" value="{{ old('description') }}"
                                    required autofocu rows="4", cols="54"  style="resize:none;"></textarea>
                            </div>
                            @if ($errors->has('deskripsi'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('deskripsi') }}</strong>
                            </span>
                            @endif
                        </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mt-4">{{ __('save') }}</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@include('layouts.footers.auth')
</div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush