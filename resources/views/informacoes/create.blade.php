@extends('informacoes.layout')

@section('title',__('Criar (Corona CRUD Laravel) - i9W3b'))

@push('css')
<style>
    /* Personalizar layout*/
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span>@lang('Os numeros de telefones estão perto das datas, cuidado ao copiar')</span>
                        <a href="{{ url('informacoes') }}" class="btn-info btn-sm">
                            <i class="fa fa-arrow-left"></i> @lang('Voltar')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    {!! Form::open(['action' =>'InformacaoController@store', 'method' => 'POST'])!!}

                    <div class="form-group">
                        {!! Form::label(__('Nome:')) !!}
                        {!! Form::text("nome", null ,["class"=>"form-control"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Email:')) !!}
                        {!! Form::text("email", "email@mail.com" ,["class"=>"form-control"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Telefone:')) !!}
                        {!! Form::number("telefone", null ,["class"=>"form-control"]) !!}
                    </div>


                    <div class="well well-sm clearfix">
                        <button class="btn btn-success pull-right" title="@lang('Salvar')"
                            type="submit">@lang('Adicionar')</button>
                    </div>

                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script language='JavaScript'>
    $(".mmss").focusout(function () {
        var id = $(this).attr('id');
        var vall = $(this).val();
        var regex = /[^0-9]/gm;
        const result = vall.replace(regex, ``);
        $('#' + id).val(result);
    });
</script>

<script language='JavaScript'>
jQuery(function ($) {
    $(".tel").mask("(99) 999999999");
});
</script>
@endpush