@extends('app')

@section('css')
    <link href="{{ asset('/css/components/form-advanced.almost-flat.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/components/form-select.almost-flat.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/components/autocomplete.almost-flat.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="uk-grid uk-grid-collapse">
        <div class="uk-width-small-2-3 uk-container-center">
            <div class="uk-panel">
                <form class="uk-form uk-container-center uk-form-horizontal" role="form" method="POST" action="{{ url('company') }}">
                    <fieldset data-uk-margin>
                        <legend>添加企业账号</legend>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="uk-form-row">
                            <label  class="uk-form-label">登陆名</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        <div class="uk-form-row">
                            <label  class="uk-form-label">企业名称</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="uk-form-row">
                            <label  class="uk-form-label">联系人</label>
                            <input type="text" class="form-control" name="contact_name" required>
                        </div>
                        <div class="uk-form-row">
                            <label  class="uk-form-label">联系电话</label>
                            <input type="text" class="form-control" name="contact_phone" required>
                        </div>
                        <div class="uk-form-row">
                            <label  class="uk-form-label">登陆密码</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        @if(!$self_as_parent)
                            <div class="uk-form-row">
                                <label  class="uk-form-label">父级企业</label>
                                <select name="parent_id">
                                    <option value="1">无</option>
                                    @foreach($parents as $parent)
                                        <option value="{{$parent->id}}">{{$parent->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <div class="uk-form-row">
                                <label  class="uk-form-label">父级企业</label>
                                <select name="parent_id">
                                    @foreach($parents as $parent)
                                        <option value="{{$parent->id}}" selected="selected">{{$parent->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </fieldset>
                    <fieldset>
                        <div class="uk-form-row">
                            <button type="submit" class="uk-button uk-button-primary">提交</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('/js/components/form-select.min.js') }}"></script>
    <script src="{{ asset('/js/components/autocomplete.min.js') }}"></script>
@endsection