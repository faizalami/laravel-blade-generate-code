<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 01/11/18
 * Time: 8:48
 */
?>

{{ '<?'.'php' }}

namespace App\Http\Controllers;

class {{ $className }} extends Controller {
    @foreach($props as $key => $value)
        @isset($value['assignment'])
            {{ $value['modifier'] }} {{ $value['name'] }} = {{ $value['assignment'] }};
        @else
            {{ $value['modifier'] }} {{ $value['name'] }};
        @endisset
    @endforeach

    @foreach($methods as $key => $value)
        @isset($value['args'])
            {{ $value['modifier'] }} function {{ $value['name'] }} ({{ $value['args'] }}) {
                 {{$value['body'] }}
            }
        @else
            {{ $value['modifier'] }} function {{ $value['name'] }} () {
                {{$value['body'] }}
            }
        @endisset
    @endforeach
}
