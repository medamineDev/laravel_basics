@extends("pages.master")


        <!--dynamic table-->
<link href="{{ URL::asset('template/js/advanced-datatable/css/demo_page.css') }}" rel="stylesheet"/>
<link href="{{ URL::asset('template/js/advanced-datatable/css/demo_table.css') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ URL::asset('template/js/data-tables/DT_bootstrap.css') }}"/>

<style>

    #dynamic-table_length, #dynamic-table_filter {

        display: none;
    }

    .form-control {
        width: 257px;
        margin-left: 10px
    }

    .form-group {

        display: inline-flex;
    }

    .save_btn{
        margin-left: 26px;
        width: 779px;
    }

</style>


@section("main")


        <!-- page start-->


<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
              users table
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
            </header>
            <div class="panel-body">

                <div class="form-group">
                    <input id="name_txt" type="text" placeholder="nom" class="form-control">
                    <input   id="email_txt" type="text" placeholder="email" class="form-control">
                    <input  id="age_txt" type="text" placeholder="age" class="form-control">
                    <input type="button" class="btn btn-success save_btn"  onclick="save_user()" value="Save">


                </div>


                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th class="hidden-phone">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="tbody">

                        <tr class="gradeX">
                            <td>Salem</td>
                            <td>Salem@gmail.com
                            </td>
                            <td>32</td>
                            <td class="center hidden-phone">

                                <input type="button" class="btn btn-info" value="Afficher">

                            </td>
                        </tr>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th class="hidden-phone">Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>


<!-- page end-->


@endsection


@section("javascript_section")


        <!--dynamic table-->
<script type="text/javascript" language="javascript"
        src="{{ URL::asset('template/js/advanced-datatable/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('template/js/data-tables/DT_bootstrap.js') }}"></script>
<!--dynamic table initialization -->
<script src="{{ URL::asset('template/js/dynamic_table_init.js') }}"></script>


@endsection

