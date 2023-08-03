@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <h3 class="title-5 m-b-35">all user</h3>
                <div class="table-data__tool">

                    <div class="table-data__tool-right">
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>add user</button>
                    </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>full name</th>
                                <th>email</th>
                                <th>role</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tr-shadow">
                                <td>1</td>
                                <td><a href="{{ route('task.show') }}">Lori Lynch</a></td>
                                <td>
                                    <span class="block-email">lori@example.com</span>
                                </td>
                                <td class="text"></td>
                                <td>
                                    <div class="table-data-feature">

                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </button>
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>

                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>

                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
@endsection
