@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Wallet
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('add-funds') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">Add funds</label>
                                <div class="col-6">
                                    <input class="form-control @error('wallet') is-invalid @enderror" type="number"
                                           name="wallet">
                                    @error('wallet')
                                    <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6 offset-4">
                                    <button class="btn btn-success" type="submit">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
