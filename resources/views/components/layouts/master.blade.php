<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Unicode Academy' }}</title>
    <meta name="description" content="{{$description ?? 'Unicode Academy'}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">

    <style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .todos {
        padding: 20px;
    }

    .todos .todo-list {
        list-style: none;
    }

    .todos .todo-list span.completed {
        text-decoration: line-through;
        color: gray;
    }

    .modal.open {
        display: block;
        position: fixed;
        inset: 0;
        background: #00000096;
    }
    </style>

    <!-- <script src="https://cdn.tailwindcss.com"></script> -->


</head>

<body>
    <div x-data="{ isShowModal: false }" @keyup.esc="isShowModal=false">
        {{$slot}}
        <div class="modal" :class="isShowModal ? 'open': ''" tabindex="-1" @click="isShowModal=false">
            <div class="modal-dialog" @click.stop>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" @click="isShowModal=false"></button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="isShowModal=false">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="//unpkg.com/alpinejs" defer></script>
 -->

</body>

</html>