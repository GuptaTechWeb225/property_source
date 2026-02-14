@extends('backend.master')
@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $data['title'] }}</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a>
                            </li>
                            <li class="breadcrumb-item">{{ $data['title'] }}</li>
                        </ol>
                </div>
            </div>
        </div>

        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ _trans('common.SMS Alert Logs') }}</h4>
                </div>
                <div class="card-body ot-card">
                    <div class="table-responsive">
                        <table class="table table-bordered ot-table-bg language-table">
                            <thead class="thead">
                                <tr>
                                    <th class="serial">{{ _trans('common.sr no') }}</th>
                                    <th class="purchase">{{ _trans('common.Receiver Name') }}</th>
                                    <th class="purchase">{{ _trans('common.Receiver Phone') }}</th>
                                    <th class="purchase">{{ _trans('common.Message') }}</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>0142221411</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, earum!</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Limon Shah</td>
                                    <td>521444442</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, earum!</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Kuddus</td>
                                    <td>5454454</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, earum!</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Robi Ratno</td>
                                    <td>4777444</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, earum!</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Hannan Sardar</td>
                                    <td>343434</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, earum!</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
