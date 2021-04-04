@extends('user.layoutsUser.master_user')
@section('content')

    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>Anak IT -  Tutorial Login, Register, Validasi dengan Laravel 5.4</h1>
            <p>Hallo, {{Session::get('nama')}}. Apakabar?</p>

            <h2>* NISN : {{Session::get('nisn')}}</h2>
            <h2>* Status Login : {{Session::get('login')}}</h2>
            <a href="/logoutUser" class="btn btn-primary btn-lg">Logout</a>

        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@stop