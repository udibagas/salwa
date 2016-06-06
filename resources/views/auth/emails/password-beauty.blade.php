@extends('beautymail::templates.minty')

@section('content')

    @include('beautymail::templates.minty.contentStart')
        <tr>
            <td class="paragraph">
                Anda telah meminta recorevy password.
            </td>
        </tr>
        <tr>
            <td width="100%" height="25"></td>
        </tr>
        <tr>
            <td>
                @include('beautymail::templates.minty.button', ['text' => 'Klik disini untuk reset password Anda', 'link' => 'aaa'])
            </td>
        </tr>
        <tr>
            <td width="100%" height="25"></td>
        </tr>
    @include('beautymail::templates.minty.contentEnd')

@stop
