@extends('layouts.website')

@section('content')
@include('website.account.account-breadcrumbs')
<section>
    <div class="row">
        <div class="container">
            <div class="row">
                @include('website.account.accountsidebar')
            </div>
        </div>
    </div>
</section>
@endsection
