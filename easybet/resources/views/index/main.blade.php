@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <ul class="nav nav-pills nav-justified bg-secondary">
                    <li class="nav-item border-right border-dark p-1">
                        <a class="nav-link text-white" href="#">Categories</a>
                    </li>
                    <li class="nav-item p-1">
                        <a class="nav-link text-white" href="#">Jeux</a>
                    </li>
                    <li class="nav-item border-left border-dark p-1">
                        <a class="nav-link text-white" href="#">E-sport</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-3 p-0">
                <div class="card rounded-0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-10 offset-5">
                                Search
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="#">
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">Game</label>
                                <div class="col-6">
                                    <input class="form-control" type="text" name="game">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">Category</label>
                                <div class="col-6">
                                    <select class="form-control" type="text" name="category">
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                        <option>Category 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-10 offset-4">
                                    <button class="btn btn-outline-primary">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">Categories</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center">Category 1</td>
                    </tr>
                    <tr>
                        <td class="text-center">Category 2</td>
                    </tr>
                    <tr>
                        <td class="text-center">Category 3</td>
                    </tr>
                    <tr>
                        <td class="text-center">Category 4</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-6 p-0">
                <ul class="nav nav-pills nav-justified bg-dark p-4">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jeux 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jeux 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jeux 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jeux 4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jeux 5</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jeux 6</a>
                    </li>
                </ul>
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th colspan="3" class="text-center">Matches</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-3 p-0">
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th colspan="3" class="text-center">Most Popular Matches</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection