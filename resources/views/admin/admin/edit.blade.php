@extends('layouts.admin')

@section('content')

    <?php
    $breadName = '修改密码';
    ?>

    <?php

    $breadcrumb = [
        [
            'link' => '',
            'text' => $breadName,
            'active' => true
        ],
    ];

    ?>

    <form action="" method="get">
    <table class="table table-bordered">

        <tr>
            <td>登录名:</td>
            <td><input type="text" placeholder="登录名" name="name" readonly="readonly" value="{{ $model->name }}"></td>
        </tr>

        <tr>
            <td>密码:</td>
            <td><input type="password" placeholder="" name="password"  value=""></td>
        </tr>
        <tr>
            <td>确认新密码:</td>
            <td><input type="password" placeholder="" name="repeat_password"  value=""></td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="submit" value="提交">
            </td>
        </tr>
    </table>
    </form>

@endsection


@section('scripts')

    <script type="text/javascript">
        var msg = '{{ $msg }}'
        if (msg.length > 0) {
            alert(msg)
        }
    </script>
@endsection